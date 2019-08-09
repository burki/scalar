<?if (!defined('BASEPATH')) exit('No direct script access allowed')?>
<?$this->template->add_meta('viewport','width=device-width');?>
<?$this->template->add_css('system/application/views/arbors/admin/admin.css')?>
<?$this->template->add_js('system/application/views/arbors/admin/jquery-1.7.min.js')?>
<?$this->template->add_js('system/application/views/arbors/admin/admin.js')?>
<div class="system_wrapper">
<div class="content">
<div class="login_wrapper">
<? if (!empty($forgot_login_error)): ?>
<div class="error"><?=$forgot_login_error?></div>
<? endif ?>
<? if (isset($_REQUEST['action']) && $_REQUEST['action']=='sent'): ?>
<div class="saved">An email has been sent to the address you provided, with instructions on how to continue.</div>
<? endif ?>
	<form action="<?=confirm_slash(base_url())?>system/forgot_password" method="post" class="panel">
		<input type="hidden" name="action" value="do_forgot_password" />
		<input type="hidden" name="redirect_url" value="<?=((isset($_REQUEST['redirect_url']))?htmlspecialchars($_REQUEST['redirect_url']):'')?>" />
		<input type="hidden" name="msg" value="<?=((isset($_REQUEST['msg']))?filter_var($_REQUEST['msg'],FILTER_SANITIZE_STRING):'')?>" />
		<table class="form_fields">
			<tr>
				<td class="login_header" colspan="2">
					<img src="application/views/modules/login/scalar_logo.png" alt="scalar_logo" width="75" height="68" />
					<h4><?=lang('forgot_password.header')?></h4>
				</td>
			</tr>
			<tr>
				<td class="field"><?=lang('login.email')?></td><td class="value"><input type="text" name="email" value="<?=(isset($_POST['email']))?htmlspecialchars(trim($_POST['email'])):''?>" class="input_text" /></td>
			</tr>
			<tr>
				<td></td>
				<td class="form_buttons">
					<input type="submit" class="generic_button large default" value="<?=lang('forgot_password.reset')?>" />
				</td>
			</tr>
		</table>
	</form>
	<small><a href="<?=base_url()?>"><?=lang('footer.return_to_index')?></a> | <a href="http://scalar.usc.edu/terms-of-service/" target="_blank"><?=lang('footer.tos') ?></a></small>
</div>
<br clear="both" />
</div>
</div>
