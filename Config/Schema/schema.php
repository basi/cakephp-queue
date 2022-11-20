<?php
class QueueSchema extends CakeSchema {

	public $connection = 'queue';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $cron_tasks = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'jobtype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'data' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'task / method', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'notbefore' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'fetched' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'completed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'failed' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'unsigned' => true),
		'failure_message' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'workerkey' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'interval' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'comment' => 'in minutes'),
		'status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	public $queued_tasks = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'jobtype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'data' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'group' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'reference' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'notbefore' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'fetched' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'progress' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '3,2', 'unsigned' => true),
		'completed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'failed' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'unsigned' => true),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => '5', 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'failure_message' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'workerkey' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'priority' => array('column' => 'priority', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);
}
