<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Portuguese language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'O endereço de email para receber notificações.';
$phpMussel['lang']['config_notifications_from_addr'] = 'O endereço de email para enviar notificações.';

$phpMussel['lang']['notifications_template'] = 'Olá,

Este é um e-mail automático de phpMussel para notificá-lo que um arquivo carregamento tentado foi bloqueado.

Tempo/Data: {time}
IP Endereço de Origem: {ipaddr}
Motivo Bloqueado: {whyflagged}

';
