<?php
/**
 * Notifications plugin for phpMussel.
 *
 * PLUGIN INFORMATION BEGIN
 *         Plugin Name: Notifications.
 *       Plugin Author: Caleb M / Maikuolan.
 *      Plugin Version: 2.0.0
 *    Download Address: https://github.com/phpMussel/plugin-notifications
 *     Min. Compatible: 1.0.0-DEV
 *     Max. Compatible: -
 *        Tested up to: 1.0.0-DEV
 *       Last Modified: 2017.04.03
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
$phpMussel['Config']['Config Defaults']['notifications'] = array(
    'to_addr' => array('type' => 'string', 'default' => ''),
    'from_addr' => array('type' => 'string', 'default' => '')
);
/** Configuration category fallback. */
if (!isset($phpMussel['Config']['notifications'])) {
    $phpMussel['Config']['notifications'] = array();
}
/** Configuration directive fallbacks. */
array_walk($phpMussel['Config']['Config Defaults']['notifications'], function ($Values, $Key) use (&$phpMussel) {
    if (!isset($phpMussel['Config']['notifications'][$Key])) {
        $phpMussel['Config']['notifications'][$Key] = $Values['default'];
    }
    $phpMussel['AutoType']($phpMussel['Config']['notifications'][$Key], $Values['type']);
});

/** Fetch plugin L10N data. */
if (file_exists($phpMussel['pluginPath'] . 'notifications/lang.' . $phpMussel['Config']['general']['lang'] . '.php')) {
    require $phpMussel['pluginPath'] . 'notifications/lang.' . $phpMussel['Config']['general']['lang'] . '.php';
} elseif (file_exists($phpMussel['pluginPath'] . 'notifications/lang.en.php')) {
    require $phpMussel['pluginPath'] . 'notifications/lang.en.php';
} else {
    header('Content-Type: text/plain');
    die('[phpMussel] Unable to load L10N data for the notifications plugin.');
}

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
    $Content = $phpMussel['ParseVars'](array(
        'whyflagged' => $phpMussel['whyflagged'],
        'ipaddr' => $_SERVER[$phpMussel['Config']['general']['ipaddr']],
        'time' => date('r')
    ), $phpMussel['lang']['notifications_template']);
    mail(
        $phpMussel['Config']['notifications']['to_addr'],
        $phpMussel['lang']['denied'],
        $Content,
        "MIME-Version: 1.0\nContent-type: text/plain; charset=iso-8859-1\nFrom: " . $phpMussel['Config']['notifications']['from_addr'],
        '-f' . $phpMussel['Config']['notifications']['from_addr']
    );
    return true;
};
