<?php
App::uses('AppModel', 'Model');
/**
 * Admin Model
 *
 */
class Admin extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = '_admins';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function beforeSave() {
       	if(isset($this->data['Admin']['username'])) {
            $this->data['Admin']['password'] = AuthComponent::password($this->data['Admin']['username']);
       	}
       	return true;
  	}
}
