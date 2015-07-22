<?php

namespace Fuel\Migrations;

class Create_aptitudetrials
{
	public function up()
	{
		\DBUtil::create_table('aptitudetrials', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'question' => array('type' => 'text'),
			'right_answer' => array('constraint' => 255, 'type' => 'varchar'),
			'wrong_answer1' => array('constraint' => 255, 'type' => 'varchar'),
			'wrong_answer2' => array('constraint' => 255, 'type' => 'varchar'),
			'wrong_answer3' => array('constraint' => 255, 'type' => 'varchar'),
			'category' => array('constraint' => 255, 'type' => 'varchar'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('aptitudetrials');
	}
}