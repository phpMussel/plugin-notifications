<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Korean language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = '알림을 받을 사람의 이메일 주소입니다.';
$phpMussel['lang']['config_notifications_from_addr'] = '알림을 보낸 사람의 이메일 주소입니다.';

$phpMussel['lang']['notifications_template'] = '안녕하세요,

이것은 phpMussel에서 자동 통지입니다. 파일 업로드를 차단했습니다.

시간/일/월/년: {time}
원본 IP 주소: {ipaddr}
차단 된 이유: {whyflagged}

';
