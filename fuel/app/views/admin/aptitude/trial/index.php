<h2>Listing Aptitude_trials</h2>
<br>
<?php if ($aptitude_trials): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Question</th>
			<th>Right answer</th>
			<th>Wrong answer1</th>
			<th>Wrong answer2</th>
			<th>Wrong answer3</th>
			<th>Category</th>
			<th>User id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($aptitude_trials as $item): ?>		<tr>

			<td><?php echo $item->question; ?></td>
			<td><?php echo $item->right_answer; ?></td>
			<td><?php echo $item->wrong_answer1; ?></td>
			<td><?php echo $item->wrong_answer2; ?></td>
			<td><?php echo $item->wrong_answer3; ?></td>
			<td><?php echo $item->category; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/aptitude/trial/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/aptitude/trial/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/aptitude/trial/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Aptitude_trials.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/aptitude/trial/create', 'Add new Aptitude trial', array('class' => 'btn btn-success')); ?>

</p>
