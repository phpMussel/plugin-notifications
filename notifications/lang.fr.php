<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: French language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'L\'adresse électronique pour recevoir les notifications.';
$phpMussel['lang']['config_notifications_from_addr'] = 'L\'adresse email pour envoyer les notifications.';

$phpMussel['lang']['notifications_template'] = 'Salut,

Ceci est un message automatique de phpMussel pour vous informer qu\'un tentative de téléchargement d\'un fichier a été bloquée.

Temps/Date: {time}
Adresse IP d\'Origine: {ipaddr}
Raison Bloquée: {whyflagged}

';
