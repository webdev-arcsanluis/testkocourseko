<?php
class Controller_Admin_Aptitude_Trial extends Controller_Admin
{

	public function action_index()
	{
		$data['aptitude_trials'] = Model_Aptitude_Trial::find('all');
		$this->template->title = "Aptitude_trials";
		$this->template->content = View::forge('admin/aptitude/trial/index', $data);

	}

	public function action_view($id = null)
	{
		$data['aptitude_trial'] = Model_Aptitude_Trial::find($id);

		$this->template->title = "Aptitude_trial";
		$this->template->content = View::forge('admin/aptitude/trial/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Aptitude_Trial::validate('create');

			if ($val->run())
			{
				$aptitude_trial = Model_Aptitude_Trial::forge(array(
					'question' => Input::post('question'),
					'right_answer' => Input::post('right_answer'),
					'wrong_answer1' => Input::post('wrong_answer1'),
					'wrong_answer2' => Input::post('wrong_answer2'),
					'wrong_answer3' => Input::post('wrong_answer3'),
					'category' => Input::post('category'),
					'user_id' => Input::post('user_id'),
				));

				if ($aptitude_trial and $aptitude_trial->save())
				{
					Session::set_flash('success', e('Added aptitude_trial #'.$aptitude_trial->id.'.'));

					Response::redirect('admin/aptitude/trial');
				}

				else
				{
					Session::set_flash('error', e('Could not save aptitude_trial.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Aptitude_Trials";
		$this->template->content = View::forge('admin/aptitude/trial/create');

	}

	public function action_edit($id = null)
	{
		$aptitude_trial = Model_Aptitude_Trial::find($id);
		$val = Model_Aptitude_Trial::validate('edit');

		if ($val->run())
		{
			$aptitude_trial->question = Input::post('question');
			$aptitude_trial->right_answer = Input::post('right_answer');
			$aptitude_trial->wrong_answer1 = Input::post('wrong_answer1');
			$aptitude_trial->wrong_answer2 = Input::post('wrong_answer2');
			$aptitude_trial->wrong_answer3 = Input::post('wrong_answer3');
			$aptitude_trial->category = Input::post('category');
			$aptitude_trial->user_id = Input::post('user_id');

			if ($aptitude_trial->save())
			{
				Session::set_flash('success', e('Updated aptitude_trial #' . $id));

				Response::redirect('admin/aptitude/trial');
			}

			else
			{
				Session::set_flash('error', e('Could not update aptitude_trial #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$aptitude_trial->question = $val->validated('question');
				$aptitude_trial->right_answer = $val->validated('right_answer');
				$aptitude_trial->wrong_answer1 = $val->validated('wrong_answer1');
				$aptitude_trial->wrong_answer2 = $val->validated('wrong_answer2');
				$aptitude_trial->wrong_answer3 = $val->validated('wrong_answer3');
				$aptitude_trial->category = $val->validated('category');
				$aptitude_trial->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('aptitude_trial', $aptitude_trial, false);
		}

		$this->template->title = "Aptitude_trials";
		$this->template->content = View::forge('admin/aptitude/trial/edit');

	}

	public function action_delete($id = null)
	{
		if ($aptitude_trial = Model_Aptitude_Trial::find($id))
		{
			$aptitude_trial->delete();

			Session::set_flash('success', e('Deleted aptitude_trial #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete aptitude_trial #'.$id));
		}

		Response::redirect('admin/aptitude/trial');

	}

}
