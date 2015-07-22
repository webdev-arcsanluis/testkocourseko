<h2>Viewing #<?php echo $aptitude_trial->id; ?></h2>

<p>
	<strong>Question:</strong>
	<?php echo $aptitude_trial->question; ?></p>
<p>
	<strong>Right answer:</strong>
	<?php echo $aptitude_trial->right_answer; ?></p>
<p>
	<strong>Wrong answer1:</strong>
	<?php echo $aptitude_trial->wrong_answer1; ?></p>
<p>
	<strong>Wrong answer2:</strong>
	<?php echo $aptitude_trial->wrong_answer2; ?></p>
<p>
	<strong>Wrong answer3:</strong>
	<?php echo $aptitude_trial->wrong_answer3; ?></p>
<p>
	<strong>Category:</strong>
	<?php echo $aptitude_trial->category; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $aptitude_trial->user_id; ?></p>

<?php echo Html::anchor('admin/aptitude/trial/edit/'.$aptitude_trial->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/aptitude/trial', 'Back'); ?>