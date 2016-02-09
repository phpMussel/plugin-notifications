<?php
/**
 * Notifications plugin for phpMussel.
 *
 * PLUGIN INFORMATION BEGIN
 *         Plugin Name: Notifications.
 *       Plugin Author: Caleb M / Maikuolan.
 *      Plugin Version: 1.0.2
 *    Download Address: https://github.com/Maikuolan/phpMussel-plugin-notifications
 *     Min. Compatible: 0.10.0
 *     Max. Compatible: -
 *        Tested up to: 0.10.0
 *       Last Modified: 2016.02.09
 * PLUGIN INFORMATION END
 *
 * Receive email notifications from phpMussel whenever a file upload is
 * blocked. Requires PHP "mail" function to be correctly configured; for more
 * information, please refer to "http://php.net/manual/en/function.mail.php".
 *
 * @package Maikuolan/phpMussel-plugin-notifications
 */

/**
 * Prevents direct access (the plugin should only be called from the phpMussel
 * plugin system).
 */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

/**
 * Registers the `phpMussel_Notify()` function to the `before_html_out` hook.
 */
phpMussel_Register_Hook('phpMussel_Notify', 'before_html_out');

/** Fallback for missing "notifications" configuration category. */
if (!isset($phpMussel['MusselConfig']['notifications'])) {
    $phpMussel['MusselConfig']['notifications'] = array();
}
/** Fallback for missing "to_addr" configuration directive. */
if (!isset($phpMussel['MusselConfig']['notifications']['to_addr'])) {
    $phpMussel['MusselConfig']['notifications']['to_addr'] = '';
}
/** Fallback for missing "from_addr" configuration directive. */
if (!isset($phpMussel['MusselConfig']['notifications']['from_addr'])) {
    $phpMussel['MusselConfig']['notifications']['from_addr'] = '';
}

/**
 * The actual plugin code (the "Notifications" plugin only has one small
 * function; nothing else is needed).
 *
 * @param array $input An empty array (we don't need to send anything from the
 *      calling scope to the function, but, the plugin system nonetheless
 *      requires this parameter to exist).
 * @return bool Returns true if everything is working correctly.
 */
function phpMussel_Notify($input) {
    global $phpMussel;
    if (
        !$phpMussel['MusselConfig']['notifications']['to_addr'] ||
        !$phpMussel['MusselConfig']['notifications']['from_addr'] ||
        empty($phpMussel['whyflagged'])
    ) {
    return false;
    }
    $NotifyLang =
        (!file_exists($phpMussel['vault'] . 'plugins/notifications/template.' . $phpMussel['MusselConfig']['general']['lang'] . '.eml')) ?
        'en' :
        $phpMussel['MusselConfig']['general']['lang'];
    $NotifyVars = array();
    $NotifyVars['whyflagged'] = $phpMussel['whyflagged'];
    $NotifyVars['ipaddr'] = $_SERVER[$phpMussel['MusselConfig']['general']['ipaddr']];
    $NotifyVars['time'] = date('r');
    $content = phpMusselV(
        $NotifyVars,
        phpMusselFile($phpMussel['vault'] . 'plugins/notifications/template.' . $NotifyLang . '.eml', 0, true)
    );
    mail(
        $phpMussel['MusselConfig']['notifications']['to_addr'],
        $phpMussel['MusselConfig']['lang']['denied'],
        $content,
        "MIME-Version: 1.0\nContent-type: text/plain; charset=iso-8859-1\nFrom: " . $phpMussel['MusselConfig']['notifications']['from_addr'],
        '-f' . $phpMussel['MusselConfig']['notifications']['from_addr']
    );
    return true;
}
