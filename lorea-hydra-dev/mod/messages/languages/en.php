<?php
/**
* Elgg send a message action page
* 
* @package ElggMessages
*/

$english = array(
	/**
	* Menu items and titles
	*/

	'messages' => "Messages",
	'messages:back' => "back to messages",
	'messages:user' => "%s's inbox",
	'messages:posttitle' => "%s's messages: %s",
	'messages:inbox' => "Inbox",
	'messages:sent' => "Sent",
	'messages:send' => "Send",
	'messages:message' => "Message",
	'messages:title' => "Subject",
	'messages:to' => "To",
	'messages:from' => "From",
	'messages:who' => "Who",
	'messages:date' => "Date",
	'messages:actions' => "Actions",
	'messages:fly' => "Send",
	'messages:replying' => "Message replying to",
	'messages:sendmessage' => "Send message",
	'messages:compose' => "Compose a message",
	'messages:add' => "Compose a message",
	'messages:sentmessages' => "Sent messages",
	'messages:recent' => "Recent messages",
	'messages:original' => "Original message",
	'messages:yours' => "Your message",
	'messages:answer' => "Reply",
	'messages:toggle' => 'Toggle all',
	'messages:markread' => 'Mark read',
	'messages:delete' => 'Delete marked messages?',
	'messages:recipient' => 'Choose a recipient&hellip;',
	'messages:to_user' => 'To: %s',
	'messages:forward' => "Forward",
	'messages:all:friends' => "All friends",
	'messages:new' => 'New message',

	'notification:method:site' => 'Site',
	'item:object:messages' => 'Messages',
	'item:object:attachment' => 'Message attachments',

	'messages:find' => "Find",
	'messages:find:messages:with' => "Messages with %s",
	'messages:find:title' => "Find messages",
	'messages:find:info' => "Write name",
	'messages:find:button' => "Messages with %s",

	'messages:choose:friend' => "Select friend",
	'messages:choose:collection' => "Select friend collection",
	'messages:to:collection' => "To a collection of friends",

	'messages:settings:title' => "Settings",
	'messages:settings:limit' => "Items pr. page",
	'messages:settings:excerpt' => "Show excerpt",

	'messages:adminsend:label' => "Send message as %s",

	/**
	 * Settings
	 */
	'messages:enable:privacy' => 'Enable privacy for users',
	'messages:friendsonly' => 'Only recieve messages from friends: ',
	'messages:messages_refresh_rate' => "Refresh interval for topbar icon",
	'messages:admin:none' => "No refresh",
	'messages:admin:seconds' => "seconds",
	'messages:admin:minute' => "minute",
	'messages:admin:minutes' => "minutes",
	'messages:adminsend' => "Lets admins use a specific admin account as sender of messages",
	'messages:adminsend:choose' => "Choose admin account to enable",
	'messages:adminsend:not:enabled' => "Disabled",

	/**
	* Status messages
	*/

	'messages:posted' => "Your message was successfully sent.",
	'messages:success:delete:single' => 'Message was deleted',
	'messages:success:delete' => 'Messages deleted',
	'messages:success:read' => 'Messages marked as read',
	'messages:settings:saved' => 'Your settings was saved',

	/**
	* Email messages
	*/

	'messages:email:subject' => 'You have a new message!',
	'messages:email:body' => "You have a new message from %s. It reads:


	%s


	To view your messages, click here:

	%s

	To send %s a message, click here:

	%s

	You cannot reply to this email.",

	/**
	* Error messages
	*/

	'messages:blank' => "Sorry; you need to actually put something in the subject and message body before we can save it.",
	'messages:notfound' => "Sorry; we could not find the specified message.",
	'messages:notdeleted' => "Sorry; we could not delete this message.",
	'messages:nopermission' => "You do not have permission to alter that message.",
	'messages:nomessages' => "There are no messages.",
	'messages:user:nonexist' => "We could not find the recipient in the user database.",
	'messages:user:blank' => "You did not select someone to send this to.",
	'messages:error:messages_not_selected' => 'No messages selected',
	'messages:error:delete:single' => 'Unable to delete the message',
	'messages:error' => 'There was a problem saving your message. Please try again.',
	'messages:attachment:tobig' => 'This attachment is to big: %s',
	'messages:attachment:tomany' => 'Max allowed attacments is %s',
	'messages:deleted_sender' => 'Deleted user',
	'messages:warning' => 'Notice: You are about to send a message to a non-friend user even though you have selected to only recieve messages from friends. If you send the message the user will not be able to answer your message - not nice!',
	'messages:reject' => 'Notice: %s only wishes to recieve messages from friends!',
	'messages:blocked' => 'Notice: Either %s has blocked you, or you have blocked him/her!',
	'messages:override' => 'Notice: Either you or %s only wants to receive messages from friends!<br>Your admin rights override this.',
	'messages:forward:error' => "You do not have access to that message!",
	'messages:settings:failed' => "could not save your settings!",
	'messages:label:notsaved' => 'Your label(s) could not be saved!',

);
		
add_translation("en", $english);
