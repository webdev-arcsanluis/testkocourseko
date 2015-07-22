<h3>Listing Personalitytrials | <?php echo Html::anchor('admin/personalitytrial/create', 'Add new Personalitytrial', array('class' => 'btn btn-success')); ?></h3>
<br>
<?php if ($personalitytrials): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Item</th>
			<th>User id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($personalitytrials as $item): ?>		<tr>

			<td><?php echo $item->item; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/personalitytrial/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/personalitytrial/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/personalitytrial/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Personalitytrials.</p>

<?php endif; ?>