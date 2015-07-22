<?php
class Controller_Admin_Personalitytrial extends Controller_Admin
{

	public function action_index()
	{
		$data['personalitytrials'] = Model_Personalitytrial::find('all');
		$this->template->title = "Personalitytrials";
		$this->template->content = View::forge('admin/personalitytrial/index', $data);

	}

	public function action_view($id = null)
	{
		$data['personalitytrial'] = Model_Personalitytrial::find($id);

		$this->template->title = "Personalitytrial";
		$this->template->content = View::forge('admin/personalitytrial/view', $data);

	}

	public function action_create($id = null)
	{
	   $view = View::forge('admin/personalitytrial/create');
	 
	   if (Input::method() == 'POST')
	   {
	      $personalitytrial = Model_Personalitytrial::forge(array(
	         'item' => Input::post('item'),
	         'user_id' => Input::post('user_id'),
	      ));
	 
	      if ($personalitytrial and $personalitytrial->save())
	      {
	         Session::set_flash('success', 'Added Personality Item #'.$personalitytrial->id.'.');
	         Response::redirect('admin/personalitytrial');
	      }
	 
	      else
	      {
	         Session::set_flash('error', 'Could not save personalitytrial.');
	      }
	   }
	 
	   // Set some data
	   $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	 
	   $this->template->title = "Create Personalitytrials";
	   $this->template->content = $view;
	}

	// public function action_create()
	// {
	// 	if (Input::method() == 'POST')
	// 	{
	// 		$val = Model_Personalitytrial::validate('create');

	// 		if ($val->run())
	// 		{
	// 			$personalitytrial = Model_Personalitytrial::forge(array(
	// 				'item' => Input::post('item'),
	// 				'user_id' => Input::post('user_id'),
	// 			));

	// 			if ($personalitytrial and $personalitytrial->save())
	// 			{
	// 				Session::set_flash('success', e('Added personalitytrial #'.$personalitytrial->id.'.'));

	// 				Response::redirect('admin/personalitytrial');
	// 			}

	// 			else
	// 			{
	// 				Session::set_flash('error', e('Could not save personalitytrial.'));
	// 			}
	// 		}
	// 		else
	// 		{
	// 			Session::set_flash('error', $val->error());
	// 		}
	// 	}

	// 	$this->template->title = "Personalitytrials";
	// 	$this->template->content = View::forge('admin/personalitytrial/create');

	// }

	public function action_edit($id = null)
	{
	   $view = View::forge('admin/personalitytrial/edit');
	    
	   $personalitytrial = Model_Personalitytrial::find($id);
	 
	   if (Input::method() == 'POST')
	   {
	      $personalitytrial->item = Input::post('item');
	      $personalitytrial->user_id = Input::post('user_id');
	 
	      if ($personalitytrial->save())
	      {
	         Session::set_flash('success', 'Updated personalitytrial #' . $id);
	         Response::redirect('admin/personalitytrial');
	      }
	 
	      else
	      {
	         Session::set_flash('error', 'Could not update personalitytrial #' . $id);
	      }
	   }
	 
	   else
	   {
	      $this->template->set_global('personalitytrial', $personalitytrial, false);
	   }
	    
	   // Set some data
	   $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	 
	   $this->template->title = "Edit Personalitytrial";
	   $this->template->content = $view;
	}

	// public function action_edit($id = null)
	// {
	// 	$personalitytrial = Model_Personalitytrial::find($id);
	// 	$val = Model_Personalitytrial::validate('edit');

	// 	if ($val->run())
	// 	{
	// 		$personalitytrial->item = Input::post('item');
	// 		$personalitytrial->user_id = Input::post('user_id');

	// 		if ($personalitytrial->save())
	// 		{
	// 			Session::set_flash('success', e('Updated personalitytrial #' . $id));

	// 			Response::redirect('admin/personalitytrial');
	// 		}

	// 		else
	// 		{
	// 			Session::set_flash('error', e('Could not update personalitytrial #' . $id));
	// 		}
	// 	}

	// 	else
	// 	{
	// 		if (Input::method() == 'POST')
	// 		{
	// 			$personalitytrial->item = $val->validated('item');
	// 			$personalitytrial->user_id = $val->validated('user_id');

	// 			Session::set_flash('error', $val->error());
	// 		}

	// 		$this->template->set_global('personalitytrial', $personalitytrial, false);
	// 	}

	// 	$this->template->title = "Personalitytrials";
	// 	$this->template->content = View::forge('admin/personalitytrial/edit');

	// }

	public function action_delete($id = null)
	{
		if ($personalitytrial = Model_Personalitytrial::find($id))
		{
			$personalitytrial->delete();

			Session::set_flash('success', e('Deleted personalitytrial #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete personalitytrial #'.$id));
		}

		Response::redirect('admin/personalitytrial');

	}

}
