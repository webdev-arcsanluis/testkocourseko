<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin-top: 50px; margin-bottom: 0px; padding-bottom: 0px; }
		footer { background-color: #800; padding: 10px; color: #fff; position: relative; bottom: -160px; left: 0; width: 100%; }
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js',
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>

	<?php if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Test Ko Course Ko</a>
			</div>
			<div class="navbar-collapse collapse">
				<!-- dri ang menu -->
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo "Hello, ".$current_user->username ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
						</ul>
					</li>	
				</ul>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- Sidebar in the making -->	
	<?php if ($current_user): ?>
	<div class="col-md-2copy">
		<ul class="sidemenu">
			<li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
				<?php echo Html::anchor('admin', 'Dashboard') ?>
			</li>
			<?php
				$files = new GlobIterator(APPPATH.'classes/controller/admin/*.php');
				foreach($files as $file)
				{
					$section_segment = $file->getBasename('.php');
					$section_title = Inflector::humanize($section_segment);
			?>
				<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
					<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
				</li>
			<?php
				}
			?>
		</ul>
	</div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<?php if ($current_user): ?><h2><?php echo $title; ?></h2>
				<hr><?php endif; ?>
<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="col-md-10">
<?php echo $content; ?>
			</div>
		</div>	
	</div>
	<?php if ($current_user): ?>
	<footer>
		<p align="center">
			TESTKOCOURSEKO<br>A Course Decision Support Application for College Entrance Examination with SMS Notifier<br>
			<small>Version: 1.0</small>
		</p>
	</footer>
	<?php endif; ?>
</body>
</html>
