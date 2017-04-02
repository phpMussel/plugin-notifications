<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Spanish language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'La dirección de email para la recepción de notificaciones.';
$phpMussel['lang']['config_notifications_from_addr'] = 'La dirección de email para el envío de notificaciones.';

$phpMussel['lang']['notifications_template'] = 'Hola,

Este es un email automático de phpMussel para notificar que una intentado subir de archivos ha sido bloqueado.

Hora/Fecha: {time}
Originario IP Dirección: {ipaddr}
Razón Bloqueado: {whyflagged}

';
