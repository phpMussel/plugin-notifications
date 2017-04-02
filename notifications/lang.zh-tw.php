<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Chinese (traditional) language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = '通知接收人的電子郵件地址。';
$phpMussel['lang']['config_notifications_from_addr'] = '通知發件人的電子郵件地址。';

$phpMussel['lang']['notifications_template'] = '你好，

這是一個自動電子郵件從phpMussel為通知您一個文件上傳已被受阻。

時間/日期：{time}
始發IP地址：{ipaddr}
原因受阻：{whyflagged}

';
