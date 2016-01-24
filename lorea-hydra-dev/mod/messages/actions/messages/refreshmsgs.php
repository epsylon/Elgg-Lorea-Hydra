<?php
/**
 * Elgg messages topbar extender
 * 
 * @package ElggMessages
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd <info@elgg.com>
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.com/
 */
	 

//need to be logged in to send a message
gatekeeper();

//get unread messages
$num_messages = (int) messages_count_unread();

if ($num_messages) {
	$indicator = "<span id='messages-new' class='messages-new'>$num_messages</span>";
} else {
	$indicator = "<span id='messages-new'></span>";
}

$result_array = array(
			'unread_messages' => $indicator,
			);

$json_array = json_encode($result_array);
header("Content-Type: application/json");
echo $json_array;
forward(REFERER);

