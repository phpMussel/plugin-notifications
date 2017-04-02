<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: German language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'Die E-Mail-Adresse um Benachrichtigungen zu senden an.';
$phpMussel['lang']['config_notifications_from_addr'] = 'Die E-Mail-Adresse um Benachrichtigungen zu senden von.';

$phpMussel['lang']['notifications_template'] = 'Hallo,

Dies ist eine automatisch erstelle Email von phpMussel um dich zu informieren, dass ein versuchter Dateiupload blockiert wurde.

Zeit/Datum: {time}
Ursprungs-IP-Adresse: {ipaddr}
Grund der Blockierung: {whyflagged}

';
