<?php
// English

$lang['scalar']       = 'Scalar';

$lang['install_name'] = (getenv('SCALAR_INSTALL_NAME') ? getenv('SCALAR_INSTALL_NAME') : 'Scalar');  // Will be displayed on the top of the book index page, e.g., could be changed to "Scalar for the Maker Lab"

$lang['book']     = 'book';
$lang['or']       = 'or';
$lang['and']      = 'and';
$lang['language'] = 'language';

$lang['login.hello']           = 'Hello';
$lang['login.sign_in']         = 'Sign in';
$lang['login.sign_out']        = 'Sign out';
$lang['login.register']        = 'register';
$lang['login.more_privileges'] = 'for additional privileges';
$lang['login.unknown_user']    = 'form.hello';
$lang['login.you_have']        = 'You have';
$lang['login.privileges']      = 'privileges';
$lang['login.back_to_book']    = 'Back to book';
$lang['login.back_to_index']   = 'Back to index';
$lang['login.manage_content']  = 'Dashboard';
$lang['login.index']           = 'Index';
$lang['login.guide']           = 'Guide';
$lang['login.confirm_sign_out'] = 'Are you sure you wish to sign out?';
$lang['login.choose_new_lang']  = 'Please choose language';
$lang['login.invalid']          = 'Invalid email or password';
$lang['login.is_reset']         = 'The password for this account has been reset.  Please see your email for reset instructions or contact an administrator.';
$lang['login.header']           = 'Please sign in below';
$lang['login.email']            = 'Email';
$lang['login.password']         = 'Password';
$lang['login.login']            = 'Login';
$lang['login.forgot_password']  = 'Forgot password?';
$lang['login.message_created']  = 'Your account has been created.<br />Sign in for the first time below.';
$lang['login.message_login']    = 'Please sign in to view the requested page';
$lang['login.message_reset']    = 'Your password has been reset.  Please login below to continue.';
$lang['login.message_edit']     = 'Please sign in to edit the requested page';
$lang['login.message_restricted'] = 'Please sign in to access pages that are restricted to book authors and editors';
$lang['login.message_restricted_version'] = 'Please sign in to access a past version that is restricted to book authors and editors';

$lang['form.submit']          = 'Go';
$lang['form.clear']           = 'clear';
$lang['form.begin']           = 'begin';

$lang['register.header']        = 'Please register a new account below';
$lang['register.email_alt']     = 'Your email address is your login to Scalar, though no communication between your email provider and Scalar will occur.';
$lang['register.full_name']     = 'Full name';
$lang['register.password_confirm'] = 'Confirm<br />password';
$lang['register.register']      = 'Register';
$lang['register.tos_accepted']  = 'I have found, read and accepted the <a href="http://scalar.usc.edu/terms-of-service/" target="_blank">Terms of Service</a>';
$lang['register.tos_empty']     = 'Please indicate that you have accepted the Terms of Service';
$lang['register.email_empty']   = 'Email is a required field';
$lang['register.email_duplicate'] = 'Email already in use';
$lang['register.email_invalid'] = 'Could not resolve email';
$lang['register.fullname_empty'] = 'Full name is a required field';
$lang['register.fullname_invalid'] = 'Could not resolve fullname';
$lang['register.password_empty'] = 'Password is a required field';
$lang['register.password_confirm_empty'] = 'Confirm password is a required field';
$lang['register.password_not_confirmed'] = 'Password and confirm password do not match';
$lang['register.recaptcha_invalid'] = 'Invalid ReCAPTCHA form field';
$lang['register.recaptcha_fail'] = 'CAPTCHA did not validate';
$lang['register.recaptcha_incorrect'] = 'Incorrect CAPTCHA value';

$lang['forgot_password.header'] = 'Please enter your login email address below. An email will be sent to you with reset instructions.';
$lang['forgot_password.reset']  = 'Reset password';
$lang['forgot_password.empty']  = 'Please enter your login email address';
$lang['forgot_password.not_found'] = 'Could not find the entered email address';

$lang['footer.return_to_index'] = 'Return to index';
$lang['footer.tos']             = 'Terms of Service';
$lang['footer.register']        = 'Register an account';

$lang['welcome.search_book']    = "Search Books";
$lang['welcome.showing_books']  = 'Showing your books and others that have been revealed as live by their authors';
$lang['welcome.your_books']     = 'Your Books';
$lang['welcome.your_books_missing'] = 'You haven\'t created any books yet. You can in the Dashboard\'s My Account tab.';
$lang['welcome.featured_books'] = 'Featured Books';
$lang['welcome.other_books']    = 'Self-published Books';
$lang['welcome.search']         = 'Search';
$lang['welcome.view_all']       = 'View All';
$lang['welcome.enter_search_term'] = 'Please enter a search term';
$lang['welcome.no_books_found'] = 'No books found for "%s"';

$lang['page.no_content_author'] = 'Content hasn\'t yet been added to this page, click Edit below to add some.';
$lang['page.no_content']        = 'Content hasn\'t yet been added to this page.';

$lang['email.forgot_password_subject'] = 'Password Reset';
$lang['email.admin_intro'] = 'You are receiving this email because you are a Scalar admin'."\n\n";
$lang['email.forgot_password_intro'] = 'You are receiving this email because you provided your email address in Scalar\'s forgot password form.  Please follow the link below to reset your password.'."\n\n".'The link may be broken due to a line break, in which case please cut-and-paste the full URL into your browser window.'."\n\n";
$lang['email.forgot_password_outro'] = 'Thank you!'."\n\n".'The Scalar Team';

$lang['email.new_comment_subject'] = 'New Comment for "%s"';
$lang['email.new_comment_intro'] = 'A new comment has been submitted to the book "%s":';
$lang['email.new_comment_outro'] = 'The comment is already live, but you can manage it by logging in to your book below and visiting the Dashboard\'s Comments tab:';
$lang['email.new_comment_outro_moderated'] = '<b>The comment isn\'t live yet.</b> To moderate, log in to your book below and visit the Dashboard\'s Comments tab:';
$lang['email.new_comment_footer'] = 'Thank you!'."\n\n".'The Scalar Team';

//EOF

?>