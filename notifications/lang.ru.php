<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Russian language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'Адрес емейл для получения уведомлений.';
$phpMussel['lang']['config_notifications_from_addr'] = 'Адрес емейл для отправки уведомлений.';

$phpMussel['lang']['notifications_template'] = 'Привет,

Это автоматическое е-мейл от phpMussel, чтобы уведомить вас о том, что попытка загрузки файла была заблокирована.

Время/Дата: {time}
Исходный IP-Адрес: {ipaddr}
Причина Заблокирована: {whyflagged}

';
