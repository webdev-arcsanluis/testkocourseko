<?php
class Controller_Admin_Guidance extends Controller_Admin
{

	public function action_index()
	{
		$data['guidances'] = Model_Guidance::find('all');
		$this->template->title = "Guidances";
		$this->template->content = View::forge('admin/guidance/index', $data);

	}

	public function action_view($id = null)
	{
		$data['guidance'] = Model_Guidance::find($id);

		$this->template->title = "Guidance";
		$this->template->content = View::forge('admin/guidance/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Guidance::validate('create');

			if ($val->run())
			{
				$guidance = Model_Guidance::forge(array(
					'username' => Input::post('username'),
					'password' => Input::post('password'),
					'group' => Input::post('group'),
					'email' => Input::post('email'),
					'last_login' => Input::post('last_login'),
					'login_hash' => Input::post('login_hash'),
					'profile_fields' => Input::post('profile_fields'),
				));

				if ($guidance and $guidance->save())
				{
					Session::set_flash('success', e('Added guidance #'.$guidance->id.'.'));

					Response::redirect('admin/guidance');
				}

				else
				{
					Session::set_flash('error', e('Could not save guidance.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Guidances";
		$this->template->content = View::forge('admin/guidance/create');

	}

	public function action_edit($id = null)
	{
		$guidance = Model_Guidance::find($id);
		$val = Model_Guidance::validate('edit');

		if ($val->run())
		{
			$guidance->username = Input::post('username');
			$guidance->password = Input::post('password');
			$guidance->group = Input::post('group');
			$guidance->email = Input::post('email');
			$guidance->last_login = Input::post('last_login');
			$guidance->login_hash = Input::post('login_hash');
			$guidance->profile_fields = Input::post('profile_fields');

			if ($guidance->save())
			{
				Session::set_flash('success', e('Updated guidance #' . $id));

				Response::redirect('admin/guidance');
			}

			else
			{
				Session::set_flash('error', e('Could not update guidance #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$guidance->username = $val->validated('username');
				$guidance->password = $val->validated('password');
				$guidance->group = $val->validated('group');
				$guidance->email = $val->validated('email');
				$guidance->last_login = $val->validated('last_login');
				$guidance->login_hash = $val->validated('login_hash');
				$guidance->profile_fields = $val->validated('profile_fields');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('guidance', $guidance, false);
		}

		$this->template->title = "Guidances";
		$this->template->content = View::forge('admin/guidance/edit');

	}

	public function action_delete($id = null)
	{
		if ($guidance = Model_Guidance::find($id))
		{
			$guidance->delete();

			Session::set_flash('success', e('Deleted guidance #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete guidance #'.$id));
		}

		Response::redirect('admin/guidance');

	}

}
