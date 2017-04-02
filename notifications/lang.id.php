<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Indonesian language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'Alamat email untuk mengirim pemberitahuan ke.';
$phpMussel['lang']['config_notifications_from_addr'] = 'Alamat email untuk mengirim pemberitahuan dari.';

$phpMussel['lang']['notifications_template'] = 'Hai,

Ini adalah email otomatis dari phpMussel untuk memberitahu Anda bahwa file upload adalah diblokir.

Waktu/Tanggal: {time}
IP Address Berasal: {ipaddr}
Alasan Diblokir: {whyflagged}

';
