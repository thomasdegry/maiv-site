<?php
App::uses('AppController', 'Controller');

class PushController extends AppController {
    public function overview() {
        $this->layout = 'admin';
        $this->loadModel('Creation');


        if($this->request->is('post')) {
            $users = $this->Creation->query('SELECT mrb_users.* FROM mrb_users INNER JOIN mrb_creations ON mrb_creations.user_id = mrb_users.id INNER JOIN mrb_burgers ON mrb_burgers.id = mrb_creations.hamburger_id WHERE mrb_creations.used = 0 AND mrb_burgers.event_id = 2 GROUP BY mrb_users.id LIMIT 0,' . $this->data["Push"]["size"]);

            $url = 'https://api.parse.com/1/push';

            $appId = 'NtnxE18I4w5dIAHEec1UvRrRaMzwYQnY4EZ3VOwz';
            $restKey = 'zM4UDGMAzHbQfZoJMJBxmILBiVluznji6T0iVbFy';

            foreach ($users as $key => $value) {
                ob_start();

                $device_token = $value["mrb_users"]["device_token"];  // using object Id of target Installation.

                $push_payload = json_encode(array(
                        "where" => array(
                            "deviceToken" => $device_token,
                        ),
                        "data" => array(
                            "alert" => 'Hey you ! Don\'t forget to get your free burger ! '
                        )
                ));


                $rest = curl_init();
                curl_setopt($rest,CURLOPT_URL,$url);
                curl_setopt($rest,CURLOPT_PORT,443);
                curl_setopt($rest,CURLOPT_POST,1);
                curl_setopt($rest,CURLOPT_POSTFIELDS,$push_payload);
                curl_setopt($rest,CURLOPT_HTTPHEADER,
                    array("X-Parse-Application-Id: " . $appId,
                        "X-Parse-REST-API-Key: " . $restKey,
                        "Content-Type: application/json"));

                $response = curl_exec($rest);
                ob_end_clean();
            }
        }
    }
}
