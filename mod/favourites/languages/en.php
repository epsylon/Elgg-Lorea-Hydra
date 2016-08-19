<?php
/**
 * Favourites English language file
 */

$english = array(
        'favourites:groups' => 'Favourite Groups',
        'favourites:users' => 'Favourite Users',
        'favourites:menu' => 'Favourites',
        'favourites:items' => 'All favourites',
	'favourites:this' => 'marked this as favourite',
	'favourites:deleted' => 'Your favourite marking has been removed',
	'favourites:see' => 'See who has marked this as favourite',
	'favourites:remove' => 'Remove marking as favourite',
	'favourites:notdeleted' => 'There was a problem removing your marking as favourite',
	'favourites:added' => 'Marked as favourite',
	'favourites:failure' => 'There was a problem marking this item as favourite',
	'favourites:alreadyfavourite' => 'You have already marked this item as favourite',
	'favourites:notfound' => 'The item you are trying to mark as favourite cannot be found',
	'favourites:markthis' => 'Mark this as favourite',
	'favourites:usermarkedthis' => '%s has marked as favourite',
	'favourites:usersmarkedthis' => '%s have marked as favourite',
	'favourites:river:annotate' => 'marked as favourite',
	'favourites:delete:confirm' => 'Are you sure you want to delete this marking?',

	'river:favourites' => 'marked as favourite %s %s',

	'favourites:notifications:subject' => '%s marked "%s as favourite"',
	'favourites:notifications:body' =>
'Hi %1$s,

%2$s marked "%3$s" as favourite on %4$s

See your original post here:

%5$s

or view %2$s\'s profile here:

%6$s

Thanks,
%4$s
',
	'favourites:allowed_object_subtypes_label' => 'Comma separated list of object subtypes allowed to be marked as favourite (leave ampty to allow marking on all objects): ',
);

add_translation('en', $english);
