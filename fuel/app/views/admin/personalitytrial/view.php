<h3>Viewing #<?php echo $personalitytrial->id; ?></h3>

<p>
	<strong>Item:</strong>
	<?php echo $personalitytrial->item; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $personalitytrial->user_id; ?></p>

<?php echo Html::anchor('admin/personalitytrial/edit/'.$personalitytrial->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/personalitytrial', 'Back'); ?>