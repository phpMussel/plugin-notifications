<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Italian language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'L\'indirizzo e-mail per l\'invio di notifiche a.';
$phpMussel['lang']['config_notifications_from_addr'] = 'L\'indirizzo e-mail per l\'invio di notifiche da.';

$phpMussel['lang']['notifications_template'] = 'Salve,

Questa è un\'email automatica da phpMussel per informare l\'utente che un caricamento di file tentativo è stato bloccato.

Tempo/Data: {time}
IP Indirizzo di Origine: {ipaddr}
Motivo Bloccati: {whyflagged}

';
