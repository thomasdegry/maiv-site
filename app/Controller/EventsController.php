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
		$events = $this->Event->find('all', array(
			'order' => 'Event.start ASC'
		));
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
			header("Content-Type: text/Calendar");
			header("Content-Disposition: inline; filename=".addslashes($event['title']).".ics");
			echo "BEGIN:VCALENDAR\n";
			echo "PRODID:-//Microsoft Corporation//Outlook 12.0 MIMEDIR//EN\n";
			echo "VERSION:2.0\n";
			echo "METHOD:PUBLISH\n";
			echo "X-MS-OLK-FORCEINSPECTOROPEN:TRUE\n";
			echo "BEGIN:VEVENT\n";
			echo "CLASS:PUBLIC\n";
			echo "CREATED:".$this->dateToCal(time())."\n";
			echo "DESCRIPTION:Do not forget your free burger at Mr. Burgers food Trucks!\n\Download the app from the app store to create one.\n";
			echo "DTEND:". $this->dateToCal($event['dateend']) ."\n";
			echo "DTSTAMP:". $this->dateToCal(time()) ."\n";
			echo "DTSTART:". $this->dateToCal($event['datestart']) ."\n";
			echo "LAST-MODIFIED:". $this->dateToCal(time()) ."\n";
			echo "LOCATION:".$event['address']."\n";
			echo "PRIORITY:5\n";
			echo "SEQUENCE:1\n";
			echo "SUMMARY;LANGUAGE=en-us:".$event['title']."\n";
			echo "TRANSP:OPAQUE\n";
			echo "UID:040000008200E00074C5B7101A82E008000000008062306C6261CA01000000000000000\n";
			echo "X-MICROSOFT-CDO-BUSYSTATUS:BUSY\n";
			echo "X-MICROSOFT-CDO-IMPORTANCE:1\n";
			echo "X-MICROSOFT-DISALLOW-COUNTER:FALSE\n";
			echo "X-MS-OLK-ALLOWEXTERNCHECK:TRUE\n";
			echo "X-MS-OLK-AUTOFILLLOCATION:FALSE\n";
			echo "X-MS-OLK-CONFTYPE:0\n";
			//Here is to set the reminder for the event.
			echo "BEGIN:VALARM\n";
			echo "TRIGGER:-PT1440M\n";
			echo "ACTION:DISPLAY\n";
			echo "DESCRIPTION:Reminder\n";
			echo "END:VALARM\n";
			echo "END:VEVENT\n";
			echo "END:VCALENDAR\n";
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
