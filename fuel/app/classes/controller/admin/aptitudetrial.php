<?php
class Controller_Admin_Aptitudetrial extends Controller_Admin
{

	public function action_index()
	{
		$data['aptitudetrials'] = Model_Aptitudetrial::find('all');
		$this->template->title = "Aptitudetrials";
		$this->template->content = View::forge('admin/aptitudetrial/index', $data);

	}

	public function action_view($id = null)
	{
		$data['aptitudetrial'] = Model_Aptitudetrial::find($id);

		$this->template->title = "Aptitudetrial";
		$this->template->content = View::forge('admin/aptitudetrial/view', $data);

	}

	public function action_create($id = null)
	{
	   $view = View::forge('admin/aptitudetrial/create');
	 
	   if (Input::method() == 'POST')
	   {
	      $aptitudetrial = Model_Aptitudetrial::forge(array(
	      	 'question' => Input::post('question'),
			 'right_answer' => Input::post('right_answer'),
			 'wrong_answer1' => Input::post('wrong_answer1'),
			 'wrong_answer2' => Input::post('wrong_answer2'),
			 'wrong_answer3' => Input::post('wrong_answer3'),
			 'category' => Input::post('category'),
			 'user_id' => Input::post('user_id'),
	      ));
	 
	      if ($aptitudetrial and $aptitudetrial->save())
	      {
	         Session::set_flash('success', 'Added aptitudetrial #'.$aptitudetrial->id.'.');
	         Response::redirect('admin/aptitudetrial');
	      }
	 
	      else
	      {
	         Session::set_flash('error', 'Could not save aptitudetrial.');
	      }
	   }
	 
	   // Set some data
	   $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	 
	   $this->template->title = "Create Aptitudetrial";
	   $this->template->content = $view;
	}

	// public function action_create()
	// {
	// 	if (Input::method() == 'POST')
	// 	{
	// 		$val = Model_Aptitudetrial::validate('create');

	// 		if ($val->run())
	// 		{
	// 			$aptitudetrial = Model_Aptitudetrial::forge(array(
	// 				'question' => Input::post('question'),
	// 				'right_answer' => Input::post('right_answer'),
	// 				'wrong_answer1' => Input::post('wrong_answer1'),
	// 				'wrong_answer2' => Input::post('wrong_answer2'),
	// 				'wrong_answer3' => Input::post('wrong_answer3'),
	// 				'category' => Input::post('category'),
	// 				'user_id' => Input::post('user_id'),
	// 			));

	// 			if ($aptitudetrial and $aptitudetrial->save())
	// 			{
	// 				Session::set_flash('success', e('Added aptitudetrial #'.$aptitudetrial->id.'.'));

	// 				Response::redirect('admin/aptitudetrial');
	// 			}

	// 			else
	// 			{
	// 				Session::set_flash('error', e('Could not save aptitudetrial.'));
	// 			}
	// 		}
	// 		else
	// 		{
	// 			Session::set_flash('error', $val->error());
	// 		}
	// 	}

	// 	$this->template->title = "Aptitudetrials";
	// 	$this->template->content = View::forge('admin/aptitudetrial/create');

	// }

	public function action_edit($id = null)
	{
	   $view = View::forge('admin/aptitudetrial/edit');
	    
	   $aptitudetrial = Model_Aptitudetrial::find($id);
	 
	   if (Input::method() == 'POST')
	   {
	      $aptitudetrial->question = Input::post('question');
	 	  $aptitudetrial->right_answer = Input::post('right_answer');
	      $aptitudetrial->wrong_answer1 = Input::post('wrong_answer1');
		  $aptitudetrial->wrong_answer2 = Input::post('wrong_answer2');
		  $aptitudetrial->wrong_answer3 = Input::post('wrong_answer3');
		  $aptitudetrial->category = Input::post('category');
		  $aptitudetrial->user_id = Input::post('user_id');
	 
	      if ($aptitudetrial->save())
	      {
	         Session::set_flash('success', 'Updated aptitudetrial #' . $id);
	         Response::redirect('admin/aptitudetrial');
	      }
	 
	      else
	      {
	         Session::set_flash('error', 'Could not update aptitudetrial #' . $id);
	      }
	   }
	 
	   else
	   {
	      $this->template->set_global('aptitudetrial', $aptitudetrial, false);
	   }
	    
	   // Set some data
	   $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	 
	   $this->template->title = "Edit Aptitudetrial";
	   $this->template->content = $view;
	}

	// public function action_edit($id = null)
	// {
	// 	$aptitudetrial = Model_Aptitudetrial::find($id);
	// 	$val = Model_Aptitudetrial::validate('edit');

	// 	if ($val->run())
	// 	{
	// 		$aptitudetrial->question = Input::post('question');
	// 		$aptitudetrial->right_answer = Input::post('right_answer');
	// 		$aptitudetrial->wrong_answer1 = Input::post('wrong_answer1');
	// 		$aptitudetrial->wrong_answer2 = Input::post('wrong_answer2');
	// 		$aptitudetrial->wrong_answer3 = Input::post('wrong_answer3');
	// 		$aptitudetrial->category = Input::post('category');
	// 		$aptitudetrial->user_id = Input::post('user_id');

	// 		if ($aptitudetrial->save())
	// 		{
	// 			Session::set_flash('success', e('Updated aptitudetrial #' . $id));

	// 			Response::redirect('admin/aptitudetrial');
	// 		}

	// 		else
	// 		{
	// 			Session::set_flash('error', e('Could not update aptitudetrial #' . $id));
	// 		}
	// 	}

	// 	else
	// 	{
	// 		if (Input::method() == 'POST')
	// 		{
	// 			$aptitudetrial->question = $val->validated('question');
	// 			$aptitudetrial->right_answer = $val->validated('right_answer');
	// 			$aptitudetrial->wrong_answer1 = $val->validated('wrong_answer1');
	// 			$aptitudetrial->wrong_answer2 = $val->validated('wrong_answer2');
	// 			$aptitudetrial->wrong_answer3 = $val->validated('wrong_answer3');
	// 			$aptitudetrial->category = $val->validated('category');
	// 			$aptitudetrial->user_id = $val->validated('user_id');

	// 			Session::set_flash('error', $val->error());
	// 		}

	// 		$this->template->set_global('aptitudetrial', $aptitudetrial, false);
	// 	}

	// 	$this->template->title = "Aptitudetrials";
	// 	$this->template->content = View::forge('admin/aptitudetrial/edit');

	// }

	public function action_delete($id = null)
	{
		if ($aptitudetrial = Model_Aptitudetrial::find($id))
		{
			$aptitudetrial->delete();

			Session::set_flash('success', e('Deleted aptitudetrial #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete aptitudetrial #'.$id));
		}

		Response::redirect('admin/aptitudetrial');

	}

}
