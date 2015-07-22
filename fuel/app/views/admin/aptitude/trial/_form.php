<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Question', 'question', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('question', Input::post('question', isset($aptitude_trial) ? $aptitude_trial->question : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Question')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Right answer', 'right_answer', array('class'=>'control-label')); ?>

				<?php echo Form::input('right_answer', Input::post('right_answer', isset($aptitude_trial) ? $aptitude_trial->right_answer : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Right answer')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Wrong answer1', 'wrong_answer1', array('class'=>'control-label')); ?>

				<?php echo Form::input('wrong_answer1', Input::post('wrong_answer1', isset($aptitude_trial) ? $aptitude_trial->wrong_answer1 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Wrong answer1')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Wrong answer2', 'wrong_answer2', array('class'=>'control-label')); ?>

				<?php echo Form::input('wrong_answer2', Input::post('wrong_answer2', isset($aptitude_trial) ? $aptitude_trial->wrong_answer2 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Wrong answer2')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Wrong answer3', 'wrong_answer3', array('class'=>'control-label')); ?>

				<?php echo Form::input('wrong_answer3', Input::post('wrong_answer3', isset($aptitude_trial) ? $aptitude_trial->wrong_answer3 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Wrong answer3')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Category', 'category', array('class'=>'control-label')); ?>

				<?php echo Form::input('category', Input::post('category', isset($aptitude_trial) ? $aptitude_trial->category : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Category')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($aptitude_trial) ? $aptitude_trial->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>