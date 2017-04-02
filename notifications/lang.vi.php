<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Vietnamese language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = 'Địa chỉ email cho thông báo của người nhận.';
$phpMussel['lang']['config_notifications_from_addr'] = 'Địa chỉ email cho thông báo của người gửi.';

$phpMussel['lang']['notifications_template'] = 'Xin chào,

Đây là một email tự động từ phpMussel để thông báo cho bạn rằng một tập tin tải lên đã bị chặn.

Thời gian / ngày: {time}
Có nguồn gốc IP địa chỉ: {ipaddr}
Lý do bị chặn: {whyflagged}

';
