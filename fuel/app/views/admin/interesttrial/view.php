<h3>Viewing #<?php echo $interesttrial->id; ?></h3>

<p>
	<strong>Item:</strong>
	<?php echo $interesttrial->item; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $interesttrial->user_id; ?></p>

<?php echo Html::anchor('admin/interesttrial/edit/'.$interesttrial->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/interesttrial', 'Back'); ?>