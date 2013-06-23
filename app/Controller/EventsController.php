<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// $dan = date('Y-m-d H:i:s', strtotime('2012-12-12 12:12:12'));
		// $datum = date_create($dan);
		// debug($datum->getTimestamp());
		// die();
		$this->Event->recursive = 0;
		$events = $this->Event->find('all');
		$this->set('events', $events);
	}

/**
 * overview method
 *
 * @return void
 */
	public function overview() {
		$this->layout = 'admin';
		$this->Event->recursive = 0;
		$this->paginate = array(
	        'limit' => 10
	    );

		$this->set('events', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('Your event has been saved successfully'), 'good_flash');
				$this->redirect(array('action' => 'overview'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'bad_flash');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'admin';
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash('Your event has been updated', 'good_flash');
				$this->redirect(array('action' => 'overview'));
			} else {
				$this->Session->setFlash('Your event could not be updated, please try again');
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash('Your event has been deleted.', 'good_flash');
			$this->redirect(array('action' => 'overview'));
		}
		$this->Session->setFlash('Could not delete this event..', 'bad_flash');
		$this->redirect(array('action' => 'overview'));
	}

	public function addToCalender() {
		$event = array(
			'id' => $this->request->query['id'],
			'title' => $this->request->query['title'],
	        'address' => $this->request->query['location'],
			'description' => '',
			'datestart' => $this->request->query['start'],
			'dateend' => $this->request->query['end'],
			'address' => $this->request->query['location']
		);
		 
		//set correct content-type-header
		if($this->request->query['id']){
			// header('Content-type: text/calendar; charset=utf-8');
			// header('Content-Disposition: attachment; filename=mohawk-event.ics');

			// $event = "BEGIN:VCALENDAR\n";
			// $event .= "PRODID:-//Microsoft Corporation//Outlook 12.0 MIMEDIR//EN\n";
			// $event .= "VERSION:2.0\n";
			// $event .= "METHOD:PUBLISH\n";
			// $event .= "X-MS-OLK-FORCEINSPECTOROPEN:TRUE\n";
			// $event .= "BEGIN:VEVENT\n";
			// $event .= "CLASS:PUBLIC\n";
			// $event .= "CREATED:".time()."\n";
			// $event .= "DESCRIPTION:Don't forget your free burger at Mr. Burger!\\n\\n\\nSee you then\n";
			// $event .= "DTEND:".$this->dateToCal($event['start'])."\n";
			// $event .= "DTSTAMP:".time()."\n";
			// $event .= "DTSTART:".$this->dateToCal($event['end'])."\n";
			// $event .= "LAST-MODIFIED:20091109T101015Z\n";
			// $event .= "LOCATION:".$event['address']."\n";
			// $event .= "PRIORITY:5\n";
			// $event .= "SEQUENCE:0\n";
			// $event .= "SUMMARY;LANGUAGE=en-us:".$event['description']."\n";
			// $event .= "TRANSP:OPAQUE\n";
			// $event .= "UID:".md5($event['id'])."\n";
			// $event .= "X-MICROSOFT-CDO-BUSYSTATUS:BUSY\n";
			// $event .= "X-MICROSOFT-CDO-IMPORTANCE:1\n";
			// $event .= "X-MICROSOFT-DISALLOW-COUNTER:FALSE\n";
			// $event .= "X-MS-OLK-ALLOWEXTERNCHECK:TRUE\n";
			// $event .= "X-MS-OLK-AUTOFILLLOCATION:FALSE\n";
			// $event .= "X-MS-OLK-CONFTYPE:0\n";

			// $event .= "BEGIN:VALARM\n";
			// $event .= "TRIGGER:-PT1440M\n";
			// $event .= "ACTION:DISPLAY\n";
			// $event .= "DESCRIPTION:Reminder\n";
			// $event .= "END:VALARM\n";
			// $event .= "END:VEVENT\n";
			// $event .= "END:VCALENDAR\n";
			$this->redirect(array('action' => 'index'));
			
		} else {
			// If $id isn't set, then kick the user back to home. Do not pass go, and do not collect $200.
			$this->redirect(array('action' => 'index'));
		}
	}

	public function dateToCal($time) {
		$this->autorender = false;
		return date('Ymd\This', strtotime($time)) . 'Z';
	}
}
