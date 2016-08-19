<?php

$english = array(

	'account_removal' => "Account Removal",

	'account_removal:menu:title' => "Account Removal",

	// default disable reason
	'account_removal:disable:default' => "This account has been disabled at the users request",
	
	// admin settings
	'account_removal:admin:settings:user_options' => "Select the available account removal option(s)",
	'account_removal:admin:settings:user_options:disable' => "Disable",
	'account_removal:admin:settings:user_options:remove' => "Remove",
	'account_removal:admin:settings:user_options:disable_and_remove' => "Disable and Remove",
	'account_removal:admin:settings:groupadmins_allowed' => "Group Admins can disable/remove themselves",
	'account_removal:admin:settings:reason_required' => "Account Removal reason required for user",

	// user removal
	'account_removal:user:error:admin' => "Admins are not allowed to disable / remove themselves",
	'account_removal:user:error:user' => "You can only disable / remove yourself",
	'account_removal:user:error:no_user' => "Invalid input; User not found",
	
	'account_removal:user:title' => "Account Removal",

	// user removal form
	'account_removal:forms:user:user_options:description:disable' => "You can <b>disable</b> your account here. This will cause your profile to be disabled. This means your profile details are no longer visible and your account will not appear in any user listing.<br /><br />All your content, like blogs, files and pages will still be accessable by other users.",
	'account_removal:forms:user:user_options:description:remove' => "You can <b>remove</b> your account here. This will cause your profile to be completely removed. This means your profile details are no longer visible and your account will not appear in any user listing.<br /><br />Also <b>all</b> your content, like blogs, files and pages will be removed. This action can not be undone!",
	'account_removal:forms:user:user_options:description:disable_and_remove' => "You can <b>disable</b> or <b>remove</b> your account here. This will disable or remove your profile. This means your profile details are no longer visible and your account will not appear in any user listing.<br /><br />If you choose to <b>disable</b> your account, all your content, like blogs, files and pages will still be accessable by other users.<br />If you choose to <b>remove</b> your account, all your content, like blogs, files and pages will be removed. This action can not be undone!",
	'account_removal:forms:user:user_options:description:general' => "<br />When you submit this Account Removal request you will receive a confirmation email in your email box. The Account Removal will be effectuated when you follow the instructions in this email.",
	
	'account_removal:forms:user:user_options:disable' => "Disable this account",
	'account_removal:forms:user:user_options:remove' => "Remove this account",
	'account_removal:forms:user:reason' => "Please enter a reason for this Account Removal",
	'account_removal:forms:user:required' => "This information is required",

	'account_removal:forms:user:js:error:reason' => "You need to provide a reason",
	'account_removal:forms:user:js:confirm:disable' => "Are you sure you wish to disable this account?",
	'account_removal:forms:user:js:confirm:remove' => "Are you sure you wish to remove this account?",

	'account_removal:forms:user:error:no_user' => "Invalid input; User not found",
	'account_removal:forms:user:error:group_owner' => "You are currently not able to disable or remove yourself as you are still group admin of the following groups.",

	// confirmation message
	'account_removal:message:disable:subject' => "You have requested to disable your account on %s",
	'account_removal:message:disable:body' => "Dear %s,
You have requested that your account be disabled.
All the content you have made on the site will remain available to the other users. However you can no longer login also your account will not appear in any user listing and your profile will be inaccessable.

To confirm that you realy want to disable your account please click the following link:
%s

We hope you've enjoyed our community and thank you for your contributions.",
	
	'account_removal:message:remove:subject' => "You have requested to remove your account on %s",
	'account_removal:message:remove:body' => "Dear %s,
You have requested that your account be removed.
All the content you have made on the site will also be removed

To confirm that you realy want to remove your account please click the following link:
%s

We hope you've enjoyed our community and thank you for your contributions.",
	
	// thank you message
	'account_removal:message:thank_you:remove:subject' => "Thank you for using %s",
	'account_removal:message:thank_you:remove:body' => "Dear %s,
We would like to thank you for using %s. We hope you enjoyed our community.

If at any time you would like to return, you can always create a new account.

Again thank you for your contributions.",
	
	'account_removal:message:thank_you:disable:subject' => "Thank you for using %s",
	'account_removal:message:thank_you:disable:body' => "Dear %s,
We would like to thank you for using %s. We hope you enjoyed our community.

If at any time you would like to return, you can always create a new account or ask the site administrator to reactivate your account.

Again thank you for your contributions.",

	// user removal action
	'account_removal:actions:remove:error:user_guid:admin' => "Admins are not allowed to disable / remove themselves",
	'account_removal:actions:remove:error:user_guid:user' => "You can only disable / remove yourself",
	'account_removal:actions:remove:error:user_guid:unknown' => "Invalid input; User not found",
	'account_removal:actions:remove:error:group_owner' => "You are currently not able to disable or remove yourself as you are still group admin of the following groups",
	'account_removal:actions:remove:error:reason' => "You need to provide a reason",
	'account_removal:actions:remove:error:type_match' => "The requested account removal type is not allowed",
	'account_removal:actions:remove:error:token_mismatch' => "The supplied confirmation token doesn't match. Please request a new e-mail confirmation.",
	
	'account_removal:actions:remove:success:remove' => "Your account was successfully removed",
	'account_removal:actions:remove:success:disable' => "Your account was successfully disabled",
	'account_removal:actions:remove:success:request' => "You have successfully requested to disable / remove your account. Please check your e-mail for a confirmation link.",
	
	'' => "",
);

add_translation("en", $english);
