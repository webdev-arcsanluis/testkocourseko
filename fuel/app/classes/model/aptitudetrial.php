<?php
class Model_Aptitudetrial extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'question',
		'right_answer',
		'wrong_answer1',
		'wrong_answer2',
		'wrong_answer3',
		'category',
		'user_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('question', 'Question', 'required');
		$val->add_field('right_answer', 'Right Answer', 'required|max_length[255]');
		$val->add_field('wrong_answer1', 'Wrong Answer1', 'required|max_length[255]');
		$val->add_field('wrong_answer2', 'Wrong Answer2', 'required|max_length[255]');
		$val->add_field('wrong_answer3', 'Wrong Answer3', 'required|max_length[255]');
		$val->add_field('category', 'Category', 'required|max_length[255]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

		return $val;
	}

}
