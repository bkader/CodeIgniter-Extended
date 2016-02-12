{block name=title}{__("Welcome to CodeIgniter")}{/block}
{block name=content}
<div class="container">
	<div class="row">
		<div class="col-x-12">
			<div class="box">
				<div class="box-header">
					<h4>{__("Welcome to CodeIgniter")}</h4>
					<div class="box-action float-{current_lang('direction')}">
						<div class="btn-dropdown">
							<a href="#" role="button" class="btn btn-small toggle-dropdown" title="{current_lang('name')}"><i class="flag flag-{current_lang('flag')}"></i></a>
							<ul class="menu-right menu-{current_lang('direction')}">
{foreach from=$languages item=lang}{if $lang.folder neq current_lang('folder')}
								<li><a href="{site_url('welcome/lang/')}/{$lang.code}"><i class="flag flag-{$lang.flag}"></i> {$lang.name}</a></li>
{/if}{/foreach}
							</ul>
						</div>
					</div>
				</div>
				<div class="box-content">
					<p>{__("The page you are looking at is being generated dynamically by CodeIgniter.")}</p>
					<p>{__("If you would like to edit this page you'll find it located at:")}</p>
					<p><code>application/views/welcome_message.php</code></p>
					<p>{__("The corresponding controller for this page is found at:")}</p>
					<p><code>application/controllers/Welcome.php</code></p>
					<p>{__("If you are exploring CodeIgniter for the very first time, you should start by reading the")} <a href="http://www.codeigniter.com/user_guide/" target="_blank">{__("User Guide")}</a>.</p>
				</div>
				<div class="box-footer text-right">
					<a href="http://bit.ly/CI3GitHub" class="btn btn-small float-left btn-github" target="_blank"><i class="fa fa-github-square"></i> Github</a>
					{__("Page rendered in")} <strong>{$elapsed_time}</strong> {_dgettext("system", "Seconds")}. {if $ENVIRONMENT eq 'development'}CodeIgniter Version <strong>{$CI_VERSION}</strong>{/if}
				</div>
			</div>
		</div>
	</div>
</div>
{/block}