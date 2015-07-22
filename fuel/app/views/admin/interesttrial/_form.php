<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Item', 'item', array('class'=>'control-label')); ?>

				<?php echo Form::input('item', Input::post('item', isset($interesttrial) ? $interesttrial->item : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Item')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User', 'user_id'); ?>

			<?php echo Form::select('user_id', Input::post('user_id', isset($post) ? $post->user_id : $current_user->id), $users, array('class' => 'span6')); ?>
		
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>