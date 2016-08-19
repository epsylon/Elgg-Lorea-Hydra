donation
========

Donation plugin for Elgg

What it does:

Gives you a donation widget for your Elgg site.
Handles Paypal, Bitcoins or bank tranfers (just the account number)
Right click on any user icon (or on their profile) to mark them as a donator
A page where all donators to your site shows
Optional: Put a label on profiles to show who has donated
Optional: Announce donations to the River

Installation:

* Drop donation folder i /mod

* Aktivate plugin in "Tool Administration"

* In the settings specify how you want it setup

* Modify /mod/donation/languages/en.php to get the text right

Setup:

The donation module will show up on all pages with an sidebar. You can disable this and manually add it to pages. See example below:

	$sidebar = elgg_view("donation/sidebar");

	$params = array(
		'content' => $content,
		'title' => $title,
		'sidebar' => $sidebar,
	);
	$body = elgg_view_layout('one_sidebar', $params);



In "Tool Administration" setup how you want it:

* Show donators as: small icons or tiny icons (for the sidebar box)
* Announce donations to River: Yes/No
* Show donation status on profil: Yes/No (Covers profile and user list, see screenshots)
* Number of donators to display: 4/6/8/12/24/36 (How many donators should the frontpage widget show)
* Optional: Insert Paypal code here: Paste your Paypal code here (If not, everything refering to Paypal will not be shown)
* Optional: Setup Bitcoin: (If not, everything refering to Bitcoin transfer will not be shown)
* Optional: A bank account number for bank tranfers: (If not, everything refering to Bank transfer will not be shown)

That's it.
