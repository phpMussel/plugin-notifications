<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: English language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'The email address for sending notifications to.';
$phpMussel['lang']['config_notifications_from_addr'] = 'The email address for sending notifications from.';

$phpMussel['lang']['notifications_template'] = 'Hi,

This is an automated email from phpMussel to notify you that an attempted file upload has been blocked.

Time/Date: {time}
Originating IP Address: {ipaddr}
Reason Blocked: {whyflagged}

';
