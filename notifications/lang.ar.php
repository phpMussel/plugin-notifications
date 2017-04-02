<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Arabic language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'عنوان البريد الإلكتروني لإرسال الإشعارات إلى.';
$phpMussel['lang']['config_notifications_from_addr'] = 'عنوان البريد الإلكتروني لإرسال الإشعارات من.';

$phpMussel['lang']['notifications_template'] = 'مرحبا،

هذه رسالة إلكترونية تلقائية من phpMussel لإعلامك بأنه تم حظر عملية تحميل.

الوقت/التاريخ: {time}
عنوان IP المنشأ: {ipaddr}
السبب المحظور: {whyflagged}

';
