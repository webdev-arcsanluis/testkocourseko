<h3>Listing Interesttrials | <?php echo Html::anchor('admin/interesttrial/create', 'Add new Interesttrial', array('class' => 'btn btn-success')); ?></h3>
<br>
<?php if ($interesttrials): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Item</th>
			<th>User id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($interesttrials as $item): ?>		<tr>

			<td><?php echo $item->item; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/interesttrial/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/interesttrial/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/interesttrial/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Interesttrials.</p>

<?php endif; ?>