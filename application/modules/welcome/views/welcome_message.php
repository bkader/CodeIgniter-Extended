<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<!--[if IE 7]><html class="no-js lt-ie11 lt-ie10 lt-ie9 lt-ie8" lang="<?php echo strtolower(current_lang('code')); ?>" dir="<?php echo strtolower(current_lang('direction')); ?>"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie11 lt-ie10 lt-ie9" lang="<?php echo strtolower(current_lang('code')); ?>" dir="<?php echo strtolower(current_lang('direction')); ?>"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie11 lt-ie10" lang="<?php echo strtolower(current_lang('code')); ?>" dir="<?php echo strtolower(current_lang('direction')); ?>"> <![endif]-->
<!--[if IE 10]><html class="no-js lt-ie11" lang="<?php echo strtolower(current_lang('code')); ?>" dir="<?php echo strtolower(current_lang('direction')); ?>"> <![endif]-->
<!--[if gt IE 10]><!--><html class="no-js" lang="<?php echo strtolower(current_lang('code')); ?>" dir="<?php echo strtolower(current_lang('direction')); ?>"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo __("Welcome to CodeIgniter"); ?></title>
	
	<?php echo meta('description', config('site.description'))."\n"; ?>
	<?php echo meta('keywords', config('site.keywords'))."\n"; ?>
<?php if (config('google.verification')): ?>

	<!-- Google Site Verification -->
	<?php echo meta('google-site-verification', config('google.verification'))."\n"; ?>
<?php endif; ?>
<?php if (config('google.analytics')): ?>
	
	<!-- Google Analytics ID -->
	<?php echo meta('google-analytics', config('google.analytics'))."\n"; ?>
<?php endif; ?>

        <!-- Open Graph -->
<?php if (config('facebook.app_id')) { ?>
        <meta property="fb:app_id" content="<?php echo config('facebook.app_id') ?>">
<?php } ?>
        <meta property="og:title" content="<?php echo isset($title) ? $title : config('site.name'); ?>">
        <meta property="og:description" content="<?php echo isset($description) ? $description : config('site.description'); ?>">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="<?php echo current_lang('locale'); ?>">
        <meta property="og:site_name" content="<?php echo config('site.name') ?>">
<?php if (config('facebook.image')) { ?>
        <meta property="og:image" content="<?php echo img_url(config('facebook.image')) ?>">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="1200">
<?php } ?>
        <meta property="og:url" content="<?php echo base_url() ?>">
        <link rel="canonical" href="<?php echo base_url() ?>">
<?php foreach(languages() as $lang) { if ($lang['folder'] <> current_lang('folder')) { ?>
        <link rel="alternate" hreflang="<?php echo $lang['code'] ?>" href="<?php echo site_url('process/lang/'.$lang['code'].'?redirect='.urlencode(current_url())); ?>">
<?php } /* endif */ } /* endforeach */ ?>

<?php if (config('site.use_cdn') === true): ?>
	<?php echo css('http://static.ianhub.com/dinakit/css/dinakit.css')."\n"; ?>
<?php else: ?>
	<?php echo css('dinakit')."\n"; ?>
<?php endif; ?>
	<?php echo css('style')."\n"; ?>
	<script type="text/javascript">
		var config = {
			site_url: "<?php echo site_url(); ?>",
			ajax_url: "<?php echo site_url('ajax'); ?>",
			base_url: "<?php echo base_url(); ?>",
			current_url: "<?php echo current_url(); ?>",
			lang: "<?php echo current_lang('code'); ?>",
		};
	</script>
</head>
<body>
<?php if (config('google.analytics')): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', '<?php echo config("google.analytics"); ?>', 'auto');
  ga('send', 'pageview');
</script>
<?php endif; ?>

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
								<li><a href="#" role="button" class="clang" data-lang="<?php echo $lang['code']; ?>"><i class="flag flag-<?php echo $lang['flag']; ?>"></i> <?php echo $lang['name']; ?></a></li>
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

<?php if (config('site.use_cdn') === true): ?>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="http://static.ianhub.com/dinakit/js/dinakit.js"></script>
<?php else: ?>
	<?php echo js('vendor/jquery.min')."\n"; ?>
	<?php echo js('dinakit')."\n"; ?>
<?php endif; ?>
	<?php echo js('main')."\n"; ?>

</body>
</html>