<?php
/**
 * Notifications plugin for phpMussel.
 *
 * PLUGIN INFORMATION BEGIN
 *         Plugin Name: Notifications.
 *       Plugin Author: Caleb M / Maikuolan.
 *      Plugin Version: 1.0.4
 *    Download Address: https://github.com/phpMussel/plugin-notifications
 *     Min. Compatible: 0.10.0
 *     Max. Compatible: -
 *        Tested up to: 1.0.0-DEV
 *       Last Modified: 2016.06.27
 * PLUGIN INFORMATION END
 *
 * Receive email notifications from phpMussel whenever a file upload is
 * blocked. Requires PHP "mail" function to be correctly configured; for more
 * information, please refer to "http://php.net/manual/en/function.mail.php".
 */

/**
 * Prevents direct access (the plugin should only be called from the phpMussel
 * plugin system).
 */
if (!defined('phpMussel')) {
    die('[phpMussel] This should not be accessed directly.');
}

/** Fallback for missing "notifications" configuration category. */
if (!isset($phpMussel['Config']['notifications'])) {
    $phpMussel['Config']['notifications'] = array();
}
/** Fallback for missing "to_addr" configuration directive. */
if (!isset($phpMussel['Config']['notifications']['to_addr'])) {
    $phpMussel['Config']['notifications']['to_addr'] = '';
}
/** Fallback for missing "from_addr" configuration directive. */
if (!isset($phpMussel['Config']['notifications']['from_addr'])) {
    $phpMussel['Config']['notifications']['from_addr'] = '';
}

/**
 * Determine whether to use functions or closures (based upon whether we're
 * pre-v1 or post-v1, which can be determined by the presense of certain
 * functions).
 */
if (function_exists('phpMussel_Register_Hook')) {
    /** Pre-v1 code (considered deprecated and will eventually remove). */

    /**
     * Registers the `phpMussel_Notify()` function to the `before_html_out` hook.
     */
    phpMussel_Register_Hook('phpMussel_Notify', 'before_html_out');

    /**
     * The pre-v1 plugin code.
     *
     * @param array $input An empty array (we don't need to send anything from the
     *      calling scope to the function, but, the plugin system nonetheless
     *      requires this parameter to exist).
     * @return bool Returns true if everything is working correctly.
     */
    function phpMussel_Notify($input) {
        global $phpMussel;
        if (
            empty($phpMussel['Config']['notifications']['to_addr']) ||
            empty($phpMussel['Config']['notifications']['from_addr']) ||
            empty($phpMussel['whyflagged'])
        ) {
        return false;
        }
        $NotifyLang =
            (!file_exists($phpMussel['vault'] . 'plugins/notifications/template.' . $phpMussel['Config']['general']['lang'] . '.eml')) ?
            'en' :
            $phpMussel['Config']['general']['lang'];
        $content = phpMusselV(array(
            'whyflagged' => $phpMussel['whyflagged'],
            'ipaddr' => $_SERVER[$phpMussel['Config']['general']['ipaddr']],
            'time' => date('r')
        ), phpMusselFile($phpMussel['vault'] . 'plugins/notifications/template.' . $NotifyLang . '.eml', 0, true));
        mail(
            $phpMussel['Config']['notifications']['to_addr'],
            $phpMussel['Config']['lang']['denied'],
            $content,
            "MIME-Version: 1.0\nContent-type: text/plain; charset=iso-8859-1\nFrom: " . $phpMussel['Config']['notifications']['from_addr'],
            '-f' . $phpMussel['Config']['notifications']['from_addr']
        );
        return true;
    }

} else {
    /** Post-v1 code. */

    /**
     * Registers the `$phpMussel_Notifications` closure to the `before_html_out`
     * hook.
     */
    $phpMussel['Register_Hook']('phpMussel_Notifications', 'before_html_out');

    /**
     * The post-v1 plugin code.
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
        $NotifyLang =
            (!file_exists($phpMussel['vault'] . 'plugins/notifications/template.' . $phpMussel['Config']['general']['lang'] . '.eml')) ?
            'en' :
            $phpMussel['Config']['general']['lang'];
        $content = $phpMussel['ParseVars'](array(
            'whyflagged' => $phpMussel['whyflagged'],
            'ipaddr' => $_SERVER[$phpMussel['Config']['general']['ipaddr']],
            'time' => date('r')
        ), $phpMussel['ReadFile']($phpMussel['vault'] . 'plugins/notifications/template.' . $NotifyLang . '.eml', 0, true));
        mail(
            $phpMussel['Config']['notifications']['to_addr'],
            $phpMussel['Config']['lang']['denied'],
            $content,
            "MIME-Version: 1.0\nContent-type: text/plain; charset=iso-8859-1\nFrom: " . $phpMussel['Config']['notifications']['from_addr'],
            '-f' . $phpMussel['Config']['notifications']['from_addr']
        );
        return true;
    };

}
