<?php
/**
 * This file is a part of the phpMussel notifications plugin package.
 * - https://github.com/phpMussel/plugin-notifications
 *
 * This file: Japanese language data (last modified: 2017.04.03).
 */

/** Prevents execution from outside of phpMussel. */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

$phpMussel['lang']['config_notifications_to_addr'] = '通知を受信人のＥメールアドレス。';
$phpMussel['lang']['config_notifications_from_addr'] = '通知を差出人のＥメールアドレス。';

$phpMussel['lang']['notifications_template'] = 'こんにちは、

これはphpMusselからの自動通知です。 ファイルのアップロードがブロックされました。

時間/日/月/年： {time}
発信元ＩＰアドレス： {ipaddr}
ブロックされた理由： {whyflagged}

';
