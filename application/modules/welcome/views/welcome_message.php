<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="<?php echo strtolower(current_lang('code')); ?>" dir="<?php echo strtolower(current_lang('direction')); ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo __("Welcome to CodeIgniter"); ?></title>
	<link rel="stylesheet" href="http://static.ianhub.com/dinakit/css/dinakit.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<style>body{font:14px/1.5 "Ubuntu",Tahoma,Arial,sans-serif;padding-top:10px;background:#e5e5e5}@media (min-width: 768px){body{padding-top:25px}}.btn-dropdown>ul>li>a>.flag{margin-right:5px}.box-action.float-rtl{right:auto!important;left:0!important}.menu-right.menu-rtl{left:0!important;right:auto!important}.menu-right.menu-rtl>li>a{text-align:right!important}</style>
</head>
<body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-73564021-2', 'auto');
  ga('send', 'pageview');
</script>

<div class="container">
	<div class="row">
		<div class="col-x-12">
			<div class="box">
				<div class="box-header">
					<h4><?php echo __("Welcome to CodeIgniter"); ?></h4>
					<div class="box-action float-<?php echo current_lang('direction'); ?>">
						<div class="btn-dropdown">
							<a href="#" role="button" class="btn btn-small toggle-dropdown" title="<?php echo current_lang('name'); ?>"><i class="flag flag-<?php echo current_lang('flag'); ?>"></i></a>
							<ul class="menu-right menu-<?php echo current_lang('direction'); ?>">
<?php foreach($this->i18n->languages() as $key => $lang): if (current_lang('folder') <> $key): ?>
								<li><a href="<?php echo site_url('welcome/lang/'.$lang['code']); ?>"><i class="flag flag-<?php echo $lang['flag']; ?>"></i> <?php echo $lang['name']; ?></a></li>
<?php endif; endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="box-content">
					<p><?php echo __("The page you are looking at is being generated dynamically by CodeIgniter."); ?></p>
					<p><?php echo __("If you would like to edit this page you'll find it located at:"); ?></p>
					<p><code>application/views/welcome_message.php</code></p>
					<p><?php echo __("The corresponding controller for this page is found at:"); ?></p>
					<p><code>application/controllers/Welcome.php</code></p>
					<p><?php echo __("If you are exploring CodeIgniter for the very first time, you should start by reading the"); ?> <a href="http://www.codeigniter.com/user_guide/" target="_blank"><?php echo __("User Guide"); ?></a>.</p>
				</div>
				<div class="box-footer text-right">
					<span class="float-left">
						<a href="http://bit.ly/CI3GitHub" class="btn btn-small btn-github" target="_blank"><i class="fa fa-github-square"></i> Github</a>
						<a href="<?php echo site_url('welcome/twig'); ?>" class="btn btn-small btn-red">Twig</a>
					</span>
					<?php echo __("Page rendered in"); ?> <strong>{elapsed_time}</strong> <?php echo _dgettext("system", "Seconds"); ?>. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
				</div>
			</div>
		</div>
	</div>
</div>

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="http://static.ianhub.com/dinakit/js/dinakit.js"></script>
</body>
</html>