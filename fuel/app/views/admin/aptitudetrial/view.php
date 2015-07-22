<h3>Viewing #<?php echo $aptitudetrial->id; ?></h3>

<p>
	<strong>Question:</strong>
	<?php echo $aptitudetrial->question; ?></p>
<p>
	<strong>Right answer:</strong>
	<?php echo $aptitudetrial->right_answer; ?></p>
<p>
	<strong>Wrong answer1:</strong>
	<?php echo $aptitudetrial->wrong_answer1; ?></p>
<p>
	<strong>Wrong answer2:</strong>
	<?php echo $aptitudetrial->wrong_answer2; ?></p>
<p>
	<strong>Wrong answer3:</strong>
	<?php echo $aptitudetrial->wrong_answer3; ?></p>
<p>
	<strong>Category:</strong>
	<?php echo $aptitudetrial->category; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $aptitudetrial->user_id; ?></p>

<?php echo Html::anchor('admin/aptitudetrial/edit/'.$aptitudetrial->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/aptitudetrial', 'Back'); ?>