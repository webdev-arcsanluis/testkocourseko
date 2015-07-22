<?php
class Controller_Admin_Interesttrial extends Controller_Admin
{

	public function action_index()
	{
		$data['interesttrials'] = Model_Interesttrial::find('all');
		$this->template->title = "Interesttrials";
		$this->template->content = View::forge('admin/interesttrial/index', $data);

	}

	public function action_view($id = null)
	{
		$data['interesttrial'] = Model_Interesttrial::find($id);

		$this->template->title = "Interesttrial";
		$this->template->content = View::forge('admin/interesttrial/view', $data);

	}

	public function action_create($id = null)
	{
	   $view = View::forge('admin/interesttrial/create');
	 
	   if (Input::method() == 'POST')
	   {
	      $interesttrial = Model_Interesttrial::forge(array(
	         'item' => Input::post('item'),
	         'user_id' => Input::post('user_id'),
	      ));
	 
	      if ($interesttrial and $interesttrial->save())
	      {
	         Session::set_flash('success', 'Added interesttrial #'.$interesttrial->id.'.');
	         Response::redirect('admin/interesttrial');
	      }
	 
	      else
	      {
	         Session::set_flash('error', 'Could not save interesttrial.');
	      }
	   }
	 
	   // Set some data
	   $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	 
	   $this->template->title = "Create Interesttrial";
	   $this->template->content = $view;
	}

	// public function action_create()
	// {
	// 	if (Input::method() == 'POST')
	// 	{
	// 		$val = Model_Interesttrial::validate('create');

	// 		if ($val->run())
	// 		{
	// 			$interesttrial = Model_Interesttrial::forge(array(
	// 				'item' => Input::post('item'),
	// 				'user_id' => Input::post('user_id'),
	// 			));

	// 			if ($interesttrial and $interesttrial->save())
	// 			{
	// 				Session::set_flash('success', e('Added interesttrial #'.$interesttrial->id.'.'));

	// 				Response::redirect('admin/interesttrial');
	// 			}

	// 			else
	// 			{
	// 				Session::set_flash('error', e('Could not save interesttrial.'));
	// 			}
	// 		}
	// 		else
	// 		{
	// 			Session::set_flash('error', $val->error());
	// 		}
	// 	}

	// 	$this->template->title = "Interesttrials";
	// 	$this->template->content = View::forge('admin/interesttrial/create');

	// }

	public function action_edit($id = null)
	{
	   $view = View::forge('admin/interesttrial/edit');
	    
	   $interesttrial = Model_Interesttrial::find($id);
	 
	   if (Input::method() == 'POST')
	   {
	      $interesttrial->item = Input::post('item');
	      $interesttrial->user_id = Input::post('user_id');
	 
	      if ($interesttrial->save())
	      {
	         Session::set_flash('success', 'Updated interesttrial #' . $id);
	         Response::redirect('admin/interesttrial');
	      }
	 
	      else
	      {
	         Session::set_flash('error', 'Could not update interesttrial #' . $id);
	      }
	   }
	 
	   else
	   {
	      $this->template->set_global('interesttrial', $interesttrial, false);
	   }
	    
	   // Set some data
	   $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));
	 
	   $this->template->title = "Edit Interesttrial";
	   $this->template->content = $view;
	}

	// public function action_edit($id = null)
	// {
	// 	$interesttrial = Model_Interesttrial::find($id);
	// 	$val = Model_Interesttrial::validate('edit');

	// 	if ($val->run())
	// 	{
	// 		$interesttrial->item = Input::post('item');
	// 		$interesttrial->user_id = Input::post('user_id');

	// 		if ($interesttrial->save())
	// 		{
	// 			Session::set_flash('success', e('Updated interesttrial #' . $id));

	// 			Response::redirect('admin/interesttrial');
	// 		}

	// 		else
	// 		{
	// 			Session::set_flash('error', e('Could not update interesttrial #' . $id));
	// 		}
	// 	}

	// 	else
	// 	{
	// 		if (Input::method() == 'POST')
	// 		{
	// 			$interesttrial->item = $val->validated('item');
	// 			$interesttrial->user_id = $val->validated('user_id');

	// 			Session::set_flash('error', $val->error());
	// 		}

	// 		$this->template->set_global('interesttrial', $interesttrial, false);
	// 	}

	// 	$this->template->title = "Interesttrials";
	// 	$this->template->content = View::forge('admin/interesttrial/edit');

	// }

	public function action_delete($id = null)
	{
		if ($interesttrial = Model_Interesttrial::find($id))
		{
			$interesttrial->delete();

			Session::set_flash('success', e('Deleted interesttrial #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete interesttrial #'.$id));
		}

		Response::redirect('admin/interesttrial');

	}

}
