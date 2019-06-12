<?if (!defined('BASEPATH')) exit('No direct script access allowed')?>
<?$this->template->add_meta('viewport','width=device-width');?>
<?$this->template->add_css('system/application/views/arbors/admin/admin.css')?>
<?$this->template->add_js('system/application/views/arbors/admin/jquery-1.7.min.js')?>
<?$this->template->add_js('system/application/views/arbors/admin/admin.js')?>
<div class="system_wrapper">
<div class="content">
<div class="login_wrapper">
<? if (!empty($login_error)): ?>
<div class="error"><?=$login_error?></div>
<? endif ?>
<? if (isset($_REQUEST['action']) && $_REQUEST['action']=='created'): ?>
<div class="saved"><?=lang('login.message_created')?></div>
<? endif ?>
<? if (isset($_REQUEST['msg']) && $_REQUEST['msg']==1): ?>
<div class="error"><?=lang('login.message_login')?></div>
<? endif ?>
<? if (isset($_REQUEST['msg']) && $_REQUEST['msg']==2): ?>
<div class="saved"><?=lang('login.message_reset')?></div>
<? endif ?>
<? if (isset($_REQUEST['msg']) && $_REQUEST['msg']==3): ?>
<div class="error"><?=lang('login.message_edit')?></div>
<? endif ?>
<? if (isset($_REQUEST['msg']) && $_REQUEST['msg']==4): ?>
<div class="error"><?=lang('login.message_restricted')?></div>
<? endif ?>
<? if (isset($_REQUEST['msg']) && $_REQUEST['msg']==5): ?>
<div class="error"><?=lang('login.message_restricted_version')?></div>
<? endif ?>
	<form action="<?=confirm_slash(base_url())?>system/login" method="post" class="panel">
		<input type="hidden" name="action" value="do_login" />
		<input type="hidden" name="redirect_url" value="<?=((isset($_REQUEST['redirect_url']))?htmlspecialchars($_REQUEST['redirect_url']):'')?>" />
		<input type="hidden" name="msg" value="<?=((isset($_REQUEST['msg']))?filter_var($_REQUEST['msg'],FILTER_SANITIZE_STRING):'')?>" />
		<table class="form_fields">
			<tr>
				<td class="login_header" colspan="2">
					<img src="application/views/modules/login/scalar_logo.png" alt="scalar_logo" width="75" height="68" />
					<h4><?=lang('login.header')?></h4>
				</td>
			</tr>
			<tr>
				<td class="field"><?=lang('login.email')?></td><td class="value"><input type="text" name="email" value="<?=(isset($_POST['email']))?htmlspecialchars(trim($_POST['email'])):''?>" class="input_text" /></td>
			</tr>
			<tr>
				<td class="field"><?=lang('login.password')?></td><td class="value"><input type="password" name="password" value="" class="input_text" autocomplete="off" /></td>
			</tr>
			<tr>
				<td></td>
				<td class="form_buttons">
					<input type="submit" class="generic_button large default" value="<?=lang('login.login')?>" />
					<?=str_repeat("&nbsp; ", 2)?><a href="forgot_password"><small><?=lang('login.forgot_password')?></small></a>
				</td>
			</tr>
		</table>
	</form>
	<div class="login_footer">
		<a href="<?=base_url()?>"><?=lang('footer.return_to_index')?></a> |
		<a href="http://scalar.usc.edu/terms-of-service/" target="_blank"><?=lang('footer.tos')?></a> |
		<a href="register"><?=lang('footer.register')?></a>
	</div>
</div>
<br clear="both" />
</div>
</div>
