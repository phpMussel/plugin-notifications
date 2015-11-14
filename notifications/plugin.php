<?php
/*    _____  _     _  _____  _______ _     _ _______ _______ _______
 <   |_____] |_____| |_____] |  |  | |     | |______ |______ |______ |        >
     |       |     | |       |  |  | |_____| ______| ______| |______ |_____

 This "plugin.php" file belongs to a plugin of phpMussel.

 PLUGIN INFORMATION BEGIN
        Plugin Name: Notifications.
      Plugin Author: Caleb M / Maikuolan.
     Plugin Version: 1.0.0
   Download Address: https://github.com/Maikuolan/phpMussel-plugin-notifications
    Min. Compatible: 0.9.0
    Max. Compatible: -
       Tested up to: 0.9.0
      Last Modified: 2015.11.15
 Plugin Description: Receive email notifications from phpMussel whenever a file
                     upload is blocked (requires PHP "mail" function to be
                     correctly configured; for more information, please refer
                     to http://php.net/manual/en/function.mail.php).
 PLUGIN INFORMATION END */

if(!defined('phpMussel'))die('[phpMussel] This should not be accessed directly.');

phpMussel_Register_Hook('phpMussel_Notify','before_html_out');

if(!isset($MusselConfig['notifications']))$MusselConfig['notifications']=array();
if(!isset($MusselConfig['notifications']['to_addr']))$MusselConfig['notifications']['to_addr']='';
if(!isset($MusselConfig['notifications']['from_addr']))$MusselConfig['notifications']['from_addr']='';

function phpMussel_Notify($input)
	{
	if(!$GLOBALS['MusselConfig']['notifications']['to_addr']||!$GLOBALS['MusselConfig']['notifications']['from_addr']||empty($GLOBALS['whyflagged']))return false;
	$NotifyLang=(!file_exists($GLOBALS['vault'].'plugins/notifications/template.'.$GLOBALS['MusselConfig']['general']['lang'].'.eml'))?'en':$GLOBALS['MusselConfig']['general']['lang'];
	$NotifyVars=array();
	$NotifyVars['whyflagged']=$GLOBALS['whyflagged'];
	$NotifyVars['ipaddr']=$_SERVER[$GLOBALS['MusselConfig']['general']['ipaddr']];
	$NotifyVars['time']=date('r');
	$content=phpMusselV($NotifyVars,phpMusselFile($GLOBALS['vault'].'plugins/notifications/template.'.$NotifyLang.'.eml',0,true));
	mail($GLOBALS['MusselConfig']['notifications']['to_addr'],$GLOBALS['MusselConfig']['lang']['denied'],$content,"MIME-Version: 1.0\nContent-type: text/plain; charset=iso-8859-1\nFrom: ".$GLOBALS['MusselConfig']['notifications']['from_addr'],'-f'.$GLOBALS['MusselConfig']['notifications']['from_addr']);
	return true;
	}

?>