<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Chinese (simplified) language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = '通知接收人的电子邮件地址。';
$phpMussel['lang']['config_notifications_from_addr'] = '通知发件人的电子邮件地址。';

$phpMussel['lang']['notifications_template'] = '你好，

这是一个自动电子邮件从phpMussel为通知您一个文件上传已被受阻。

时间/日期：{time}
始发IP地址：{ipaddr}
原因受阻：{whyflagged}

';
