<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Dutch language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'Het e-mailadres voor het versturen van notificaties aan.';
$phpMussel['lang']['config_notifications_from_addr'] = 'Het e-mailadres voor het versturen van notificaties uit.';

$phpMussel['lang']['notifications_template'] = 'Hallo,

Dit is een automatische e-mail van phpMussel om u te informeren dat een gepoogd bestand uploaden van was geblokkeerd.

Tijd/Datum: {time}
Afkomstig IP-Adres: {ipaddr}
Reden Geblokkeerde: {whyflagged}

';
