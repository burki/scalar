<?if (!defined('BASEPATH')) exit('No direct script access allowed')?>

<script>
$(window).ready(function() {

    $('.save_changes').next('a').click(function() {
    	$('#sharing_form').submit();
    	return false;
    });

	var $title = $('<div>'+$('input[name="title"]').val()+'</div>');
	var is_duplicatable = ('undefined'==typeof($title.children(":first").attr('data-duplicatable'))) ? 0 : 1;
	var is_joinable = ('undefined'==typeof($title.children(":first").attr('data-joinable'))) ? 0 : 1;
	var auto_approve = ('undefined'==typeof($title.children(":first").attr('data-auto-approve'))) ? 0 : 1;
	var email_authors = ('undefined'==typeof($title.children(":first").attr('data-email-authors'))) ? 0 : 1;
	var hypothesis = ('undefined'==typeof($title.children(":first").attr('data-hypothesis'))) ? 0 : 1;
	var thoughtmesh = ('undefined'==typeof($title.children(":first").attr('data-thoughtmesh'))) ? 0 : 1;
	$('#duplicatable').val(is_duplicatable);
	$('#joinable').val(is_joinable);
	$('#hypothesis').val(hypothesis);
	$('#thoughtmesh').val(thoughtmesh);
	$('#auto-approve').val(auto_approve);
	$('#email-authors').val(email_authors);

	$('#duplicatable, #joinable, #hypothesis,#thoughtmesh,#auto-approve,#email-authors').change(function() {
		var $title = $('<div>'+$('input[name="title"]').val()+'</div>');
		if (!$title.children(':first').is('span')) $title.contents().wrap('<span></span>');
		var $span = $title.children(':first');
		var prop_arr = ['duplicatable', 'joinable', 'hypothesis', 'thoughtmesh','auto-approve','email-authors'];
		var all_false = true;
		for (var j in prop_arr) {
			var prop = prop_arr[j];
			var make_true = (parseInt($('#'+prop).val())) ? true : false;
			all_false = (all_false && !make_true) ? true : false;
			if (make_true) {
				$span.attr('data-'+prop, 'true');
			} else {
				$span.removeAttr('data-'+prop);
			}
		}

		if(all_false && $title.children(':first').is('span')) {
			$title.children(':first').contents().unwrap();
		}
		$('input[name="title"]').val( $title.html() );
	});

});
</script>

<form id="sharing_form" action="<?=confirm_slash(base_url())?>system/dashboard" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="do_save_sharing" />
<input type="hidden" name="zone" value="sharing" />
<? if (!empty($book)): ?>
<input type="hidden" name="book_id" value="<?=$book->book_id?>" />
<? endif ?>
<table cellspacing="0" cellpadding="0" style="width:100%;" class="trim_horz_padding">


<?php
	if (empty($book)) {
		echo lang('dashboard.select_book_note');
	}
	if (isset($_REQUEST['action']) && $_REQUEST['action']=='book_sharing_saved') {
		echo '<div class="saved">';
		echo lang('dashboard.book_sharing_saved');
		echo '<div style="float:right;">';
		echo '<a href="'.confirm_slash(base_url()).$book->slug.'">'.lang('dashboard.back_to').$book->scope.'</a>';
		echo ' | ';
		echo '<a href="?book_id='.$book->book_id.'&zone=sharing#tabs-sharing">'.lang('dashboard.clear').'</a>';
		echo '</div>';
		echo '</div><br />';
	}

	$row = $book;
	if (!empty($row)):
		// Double check that we're looking at the correct book
		if (!empty($book_id) && $row->book_id != $book_id) die('Could not match book with book ID');

	echo '<tr style="display:none;">';
	echo '<td><p>'.lang('dashboard.book_title').'</p></td>';
	echo '<td colspan="2"><input name="title" type="text" value="'.htmlspecialchars($row->title).'" style="width:100%;" /></td>';
	echo '</tr>'."\n";

	echo '<tr typeof="books">';
	echo '<td><p>'.lang('dashboard.availability').'</p>';
	echo '</td>'."\n";
	echo '<td style="vertical-align:middle;" colspan="2">';
	echo '<p>';
	echo lang('dashboard.url_is_public').' &nbsp;<select name="url_is_public"><option value="0"'.(($row->url_is_public)?'':' selected').'>'.lang('dashboard.no').'</option><option value="1"'.(($row->url_is_public)?' selected':'').'>'.lang('dashboard.yes').'</option></select>';
	echo '<br /><small>'.lang('dashboard.url_is_public_note').'</small>';
	echo '</p>';
	echo '<p>';
	echo lang('dashboard.display_in_index').' &nbsp;<select name="display_in_index"><option value="0"'.(($row->display_in_index)?'':' selected').'>'.lang('dashboard.no').'</option><option value="1"'.(($row->display_in_index)?' selected':'').'>'.lang('dashboard.yes').'</option></select>';
	echo '<br /><small>'.lang('dashboard.display_in_index_note').'</small>';
	echo '</p>';
	echo "</td>\n";
	echo "</tr>\n";
	echo '<tr typeof="books">';
	echo '<td><p>'.lang('dashboard.reviewability').'</p>';
	echo '</td>'."\n";
	echo '<td style="vertical-align:middle;" colspan="2">';
	echo '<p>';
	echo lang('dashboard.auto_approve').' &nbsp;<select id="auto-approve"><option value="0" selected>'.lang('dashboard.no').'</option><option value="1">'.lang('dashboard.yes').'</option></select>';
	echo '<br /><small>'.lang('dashboard.auto_approve_note').'</small>';
	echo '</p>';
	echo '<p>';
	echo lang('dashboard.email_authors').' &nbsp;<select id="email-authors"><option value="0" selected>'.lang('dashboard.no').'</option><option value="1">'.lang('dashboard.yes').'</option></select>';
	echo '<br /><small>'.lang('dashboard.email_authors_note').'</small>';
	echo '</p>';
	echo '<p>';
	echo lang('dashboard.hypothesis').' &nbsp;<select id="hypothesis"><option value="0" selected>'.lang('dashboard.no').'</option><option value="1">'.lang('dashboard.no').'</option></select>';
	echo '<br /><small>'.lang('dashboard.hypothesis_note').'</small>';
	echo '</p>';
	if(isset($plugins) && isset($plugins['thoughtmesh'])) {
		echo '<p>';
		echo 'Add the <a href="http://thoughtmesh.net/" target="_blank">Thoughtmesh</a> widget to the footer? &nbsp;<select id="thoughtmesh"><option value="0" selected>'.lang('dashboard.no').'</option><option value="1">'.lang('dashboard.yes').'</option></select>';
		echo '<br /><small>A widget will be added to the footer of each Scalar 2 page in your book adding <a href="http://thoughtmesh.net/" target="_blank">Thoughtmesh</a> page interconnections</small>';
		echo '</p>';
	}
	echo "</td>\n";
	echo "</tr>\n";
	echo '<td><p>'.lang('dashboard.joinability').'</p>';
	echo '</td>'."\n";
	echo '<td style="vertical-align:middle;" colspan="2">';
	echo '<p>';
	echo lang('dashboard.joinable').' &nbsp;<select id="joinable"><option value="0" selected>'.lang('dashboard.no').'</option><option value="1">'.lang('dashboard.yes').'</option></select>';
	echo '<br /><small>'.lang('dashboard.joinable_note').'</small>';
	echo '</p>';
	echo "</td>\n";
	echo "</tr>\n";
	echo '<tr typeof="books">';
	echo '<td><p>'.lang('dashboard.duplicability').'</p>';
	echo '</td>'."\n";
	echo '<td style="vertical-align:middle;" colspan="2">';
	echo '<p>';
	echo lang('dashboard.duplicatable').' &nbsp;<select id="duplicatable"><option value="0" selected>'.lang('dashboard.no').'</option><option value="1">'.lang('dashboard.yes').'</option></select>';
	echo '<br /><small>'.lang('dashboard.duplicatable_note').'</small>';
	echo '</p>';
	echo "</td>\n";
	echo "</tr>\n";
	// Saves
	echo "<tr>\n";
	echo '<td style="padding-top:8px;text-align:right;" colspan="3"><span class="save_changes">'.lang('dashboard.unsaved_changes').'</span> &nbsp; <a class="generic_button large default" href="javascript:;">'.lang('dashboard.save').'</a></td>';
	echo "</tr>\n";
	endif;
?>
</table>
</form>