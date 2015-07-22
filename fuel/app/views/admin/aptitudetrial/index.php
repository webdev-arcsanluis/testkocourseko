<h3>Listing Aptitudetrials | <?php echo Html::anchor('admin/aptitudetrial/create', 'Add new Aptitudetrial', array('class' => 'btn btn-success')); ?></h3>
<br>
<?php if ($aptitudetrials): ?>
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
<?php foreach ($aptitudetrials as $item): ?>		<tr>

			<td><?php echo $item->question; ?></td>
			<td><?php echo $item->right_answer; ?></td>
			<td><?php echo $item->wrong_answer1; ?></td>
			<td><?php echo $item->wrong_answer2; ?></td>
			<td><?php echo $item->wrong_answer3; ?></td>
			<td><?php echo $item->category; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/aptitudetrial/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/aptitudetrial/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/aptitudetrial/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Aptitudetrials.</p>

<?php endif; ?>
