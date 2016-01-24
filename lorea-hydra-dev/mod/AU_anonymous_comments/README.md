# AU Anonymous Comments

Allow for not-logged-in users to comment on public content anonymously with moderation
and spam control

## Installation

Unzip to the mod directory of your elgg installation

## Spam Control Measures

Anonymous commenters are checked against the stop forum spam database prior to comment save.
Additionally the number of urls allowed in a comment is limited, and tighter htmlawed rules
are imposed limiting the type of html that can be submitted.

Suggested plugin: recaptcha - https://github.com/beck24/elgg_recaptcha | https://elgg.org/plugins/2368593


## Moderation

Comments submitted anonymously are saved in the disabled state and are only visible to users
who have edit capability on the content that was commented on.

Users with moderation ability will see unapproved comments with a unique style and an option to approve
or delete the comment.  A batch approval/deletion interface is also provided with each comment having a checkbox.

Content owners are notified by email when an anonymous comment is submitted, the email contains tokenized
links to allow for moderation directly from email regardless of logged in status.