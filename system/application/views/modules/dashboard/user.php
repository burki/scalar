<?if (!defined('BASEPATH')) exit('No direct script access allowed')?>
<?$this->template->add_js(path_from_file(__FILE__).'../../widgets/modals/jquery.duplicatabledialog.js')?>

<script>
$(window).ready(function() {
    $('.save_changes').next('a').click(function() {
    	$('#user_form').submit();
    	return false;
    });
    $('.add_book_form').submit(function() {
    	if (!this.title.value.length||this.title.value=='<?=lang('dashboard.new_book_title')?>') {
        	alert('<?=lang('dashboard.book_title_empty')?>');
        	return false;
        }
        $(this).find('input[type="submit"]').prop('disabled','disabled');
    });
    $('input[name="is_duplicate"]').change(function() {
		var checked = $(this).is(':checked');
		if (!checked) {
			$('input[name="book_to_duplicate"]').val(0);
			$('input[name="is_duplicate"]').parent().find('span:first').html('<?=lang('dashboard.is_duplicate')?>');
		} else {
			$('<div></div>').duplicatabledialog({
				'url':$('link#sysroot').attr('href')+'system/api/get_duplicatable_books',
				'callback':function(book_id, title) {
					if (!book_id) {
						$('input[name="book_to_duplicate"]').val(0);
						$('input[name="is_duplicate"]').parent().find('span:first').html('<?=lang('dashboard.is_duplicate')?>');
						$('input[name="is_duplicate"]').prop('checked',false);
					} else {
						$('input[name="book_to_duplicate"]').val(book_id);
						$('input[name="is_duplicate"]').parent().find('span:first').html('Duplicate of: <b>'+title+'</b>');
					}
				}
			});
		};
    });
});
</script>

<? if (isset($_REQUEST['action']) && 'user_saved'==$_REQUEST['action']): ?>
<div class="saved"><?=lang('dashboard.user_saved')?><a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;"><?=lang('dashboard.clear')?></a></div>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'email_exists'==$_REQUEST['error']): ?>
<div class="error"><?=lang('dashboard.email_exists')?><a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;"><?=lang('dashboard.clear')?></a></div>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'fullname_required'==$_REQUEST['error']): ?>
<div class="error"><?=lang('dashboard.fullname_required')?><a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;"><?=lang('dashboard.clear')?></a></div>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'incorrect_password'==$_REQUEST['error']): ?>
<div class="error"><?=lang('dashboard.incorrect_password')?><a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;"><?=lang('dashboard.clear')?></a></div>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'password_match'==$_REQUEST['error']): ?>
<div class="error"><?=lang('dashboard.password_match')?><a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;"><?=lang('dashboard.clear')?></a></div>
<? endif ?>

<form action="<?=confirm_slash(base_url())?>system/dashboard" method="post" id="user_form">
<input type="hidden" name="action" value="do_save_user" />
<input type="hidden" name="id" value="<?=$login->user_id?>" />
<input type="hidden" name="book_id" value="<?=@$book_id?>" />
<table cellspacing="0" cellpadding="0" style="width:100%;" class="trim_horz_padding">
<? if ($login_is_super): ?>
<tr class="styling_sub">
	<td><h4 class="content_title"><?=lang('dashboard.my_account')?></h4></td><td></td>
</tr>
<tr class="odd" typeof="books">
	<td style="vertical-align:middle;white-space:nowrap;"><?=lang('dashboard.admin_status')?></td>
	<td style="vertical-align:middle;"><?=lang('dashboard.admin_true')?></td>
</tr>
<? endif ?>
<tr class="odd" typeof="books">
	<td style="vertical-align:middle;white-space:nowrap;"><?=lang('dashboard.email_login')?></td>
	<td style="vertical-align:middle;">
		<input name="email" type="text" value="<?=htmlspecialchars($login->email)?>" style="width:100%;" />
	</td>
</tr>
<tr class="odd" typeof="books">
	<td style="vertical-align:middle;white-space:nowrap;"><?=lang('dashboard.full_name')?></td>
	<td style="vertical-align:middle;">
		<input name="fullname" type="text" value="<?=htmlspecialchars($login->fullname)?>" style="width:100%;" />
	</td>
</tr>
<tr class="odd" typeof="books">
	<td style="vertical-align:middle;white-space:nowrap;"><?=lang('dashboard.website')?></td>
	<td style="vertical-align:middle;">
		<input name="url" type="text" value="<?=htmlspecialchars($login->url)?>" style="width:100%;" placeholder="http://" />
	</td>
</tr>
<tr class="odd" typeof="books">
	<td style="vertical-align:middle;white-space:nowrap;"><?=lang('dashboard.change_password')?></td>
	<td style="vertical-align:middle;">
		<span style="white-space:nowrap;"><?=lang('dashboard.password_current')?>
		<input name="old_password" type="password" value="" style="width:150px;" autocomplete="off" /></span>
		&nbsp; <span style="white-space:nowrap;"><?=lang('dashboard.password_new')?>
		<input name="password" type="password" value="" style="width:150px;" autocomplete="off" /></span>
		&nbsp; <span style="white-space:nowrap;"><?=lang('dashboard.password_retype')?>
		<input name="password_2" type="password" value="" style="width:150px;" autocomplete="off" /></span>
	</td>
</tr>
<tr>
	<td colspan="2" style="padding-top:18px;padding-bottom:16px;text-align:right;">
		<span class="save_changes"><?=lang('dashboard.save_changes')?></span> &nbsp; <a class="generic_button large default" href="javascript:;"><?=lang('dashboard.save')?></a>
	</td>
</tr>
</table>
</form>

<table cellspacing="0" cellpadding="0" width="100%" class="trim_horz_padding">
<tr class="styling_sub">
	<td colspan="2"><h4 class="content_title"><?=lang('dashboard.my_books')?></h4></td>
</tr>
<tr>
	<td style="vertical-align:top;" colspan="2">
		<form id="delete_books_form" action="<?=confirm_slash(base_url())?>system/dashboard" method="post">
		<input type="hidden" name="action" value="do_delete_books" />
		<input type="hidden" name="book_id" value="<?=@$book_id?>" />
		<table cellpadding="0" cellspacing="0" class="trim_padding">
			<?
			foreach ($my_books as $book) {
				$role = '(Could not determine role)';
				for ($j = 0; $j < count($book->users); $j++) {
					if ($book->users[$j]->user_id == $login->user_id) $role = ucwords($book->users[$j]->relationship);
				}
				$user_page_link = confirm_slash(base_url()).confirm_slash($book->slug).'users/'.$login->user_id;
				echo '<tr><td width="200px"><a href="'.confirm_slash(base_url()).$book->slug.'">'.$book->title.'</a></td><td width="150px">'.lang('dashboard.role').': '.$role.'</td><td>'.lang('dashboard.bio_page').': <a href="'.$user_page_link.'">'.$user_page_link.'</a></td></tr>';
			}
			?>
		</table>
		</form>
	</td>
</tr>
<? if (isset($_REQUEST['action']) && 'duplicated'==$_REQUEST['action']): ?>
<tr><td colspan="2"><div class="saved">Book has been duplicated (now present in the list of books above)<a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;"><?=lang('dashboard.clear')?></a></div></td></tr>
<? endif ?>
<? if (isset($_REQUEST['action']) && 'added'==$_REQUEST['action']): ?>
<tr><td colspan="2"><div class="saved"><?=lang('dashboard.book_added')?><a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;"><?=lang('dashboard.clear')?></a></div></td></tr>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'invalid_captcha_1'==$_REQUEST['error']): ?>
<tr><td colspan="2"><div class="error">Invalid CAPTCHA response<a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;">clear</a></div></td></tr>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'invalid_captcha_2'==$_REQUEST['error']): ?>
<tr><td colspan="2"><div class="error">The CAPTCHA was not successful<a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;">clear</a></div></td></tr>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'no_dir_created'==$_REQUEST['error']): ?>
<tr><td colspan="2"><div class="error">Could not create the directory for this new book on the filesystem<a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;">clear</a></div></td></tr>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'no_media_dir_created'==$_REQUEST['error']): ?>
<tr><td colspan="2"><div class="error">Could not create the media folder inside this new book's folder on the filesystem; something may be wrong with the file permissions<a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;">clear</a></div></td></tr>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'not_duplicatable'==$_REQUEST['error']): ?>
<tr><td colspan="2"><div class="error">The chosen book is not duplicatable<a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;">clear</a></div></td></tr>
<? endif ?>
<? if (isset($_REQUEST['error']) && 'error_while_duplicating'==$_REQUEST['error']): ?>
<tr><td colspan="2"><div class="error">There was an error attempting to duplicate the chosen book<a href="?book_id=<?=@$book_id?>&zone=user" style="float:right;">clear</a></div></td></tr>
<? endif ?>
<tr>
	<td style="vertical-align:middle;white-space:nowrap;" width="200px"><?=lang('dashboard.create_book')?></td>
	<td style="vertical-align:middle;">
		<form action="<?=confirm_slash(base_url())?>system/dashboard" method="post" class="add_book_form">
		<input type="hidden" name="action" value="do_add_book" />
		<input type="hidden" name="user_id" value="<?=$login->user_id?>" />
		<input type="hidden" name="book_to_duplicate" value="0" />
		<input name="title" type="text" value="<?=lang('dashboard.new_book_title')?>" style="width:300px;" onclick="if (this.value=='<?=lang('dashboard.new_book_title')?>') this.value='';" />
		<label><input type="checkbox" name="is_duplicate" /><span><?=lang('dashboard.is_duplicate')?></span></label><br />
		<? if (!empty($recaptcha2_site_key)): ?>
		            <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha2_site_key; ?>"></div>
		            <script type="text/javascript"
		                    src="https://www.google.com/recaptcha/api.js?hl=<?php echo 'en'; ?>">
		            </script>
		<? elseif (!empty($recaptcha_public_key)): ?>
				<?  print(recaptcha_get_html($recaptcha_public_key, '', $this->config->item('is_https'))); ?>
		<? endif ?>
		<input type="submit" value="<?=lang('dashboard.create')?>" class="generic_button" />
		</form>
	</td>
</tr>
</table>