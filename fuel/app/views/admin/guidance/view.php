<h2>Viewing #<?php echo $guidance->id; ?></h2>

<p>
	<strong>Username:</strong>
	<?php echo $guidance->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $guidance->password; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $guidance->group; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $guidance->email; ?></p>
<p>
	<strong>Last login:</strong>
	<?php echo $guidance->last_login; ?></p>
<p>
	<strong>Login hash:</strong>
	<?php echo $guidance->login_hash; ?></p>
<p>
	<strong>Profile fields:</strong>
	<?php echo $guidance->profile_fields; ?></p>

<?php echo Html::anchor('admin/guidance/edit/'.$guidance->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/guidance', 'Back'); ?>