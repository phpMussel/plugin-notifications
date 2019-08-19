<?php
/**
 * Notifications plugin for phpMussel.
 *
 * PLUGIN INFORMATION BEGIN
 *         Plugin Name: Notifications.
 *       Plugin Author: Caleb M / Maikuolan.
 *      Plugin Version: 3.0.0
 *    Download Address: https://github.com/phpMussel/plugin-notifications
 *     Min. Compatible: 1.12.0
 *     Max. Compatible: -
 *        Tested up to: 2.0.0
 *       Last Modified: 2019.08.19
 * PLUGIN INFORMATION END
 *
 * Receive email notifications from phpMussel whenever a file upload is
 * blocked (requires PHP "mail" function to be correctly configured).
 */

/**
 * Prevents direct access (the plugin should only be called from the phpMussel
 * plugin system).
 */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

/** Configuration defaults. */
$phpMussel['Config']['Config Defaults']['notifications'] = [
    'to_addr' => ['type' => 'string', 'default' => ''],
    'from_addr' => ['type' => 'string', 'default' => '']
];

/** Configuration category fallback. */
if (!isset($phpMussel['Config']['notifications'])) {
    $phpMussel['Config']['notifications'] = [];
}

/** Configuration directive fallbacks. */
array_walk($phpMussel['Config']['Config Defaults']['notifications'], function ($Values, $Key) use (&$phpMussel) {
    if (!isset($phpMussel['Config']['notifications'][$Key])) {
        $phpMussel['Config']['notifications'][$Key] = $Values['default'];
    }
    $phpMussel['AutoType']($phpMussel['Config']['notifications'][$Key], $Values['type']);
});

/**
 * Registers the `$phpMussel_Notifications` closure to the `before_html_out`
 * hook.
 */
$phpMussel['Register_Hook']('phpMussel_Notifications', 'before_html_out');

/**
 * The plugin closure.
 *
 * @return bool Returns true if everything is working correctly.
 */
$phpMussel_Notifications = function () use (&$phpMussel) {
    if (
        empty($phpMussel['Config']['notifications']['to_addr']) ||
        empty($phpMussel['Config']['notifications']['from_addr']) ||
        empty($phpMussel['whyflagged'])
    ) {
        return false;
    }
    $Content = $phpMussel['ParseVars']([
        'whyflagged' => $phpMussel['whyflagged'],
        'ipaddr' => $_SERVER[$phpMussel['Config']['general']['ipaddr']],
        'time' => date('r')
    ], $phpMussel['Notifications-L10N']['notifications_template']);
    mail(
        $phpMussel['Config']['notifications']['to_addr'],
        $phpMussel['Notifications-L10N']['denied'],
        $Content,
        "MIME-Version: 1.0\nContent-type: text/plain; charset=iso-8859-1\nFrom: " . $phpMussel['Config']['notifications']['from_addr'],
        '-f' . $phpMussel['Config']['notifications']['from_addr']
    );
    return true;
};
