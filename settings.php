<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * settings.php - Contains Extract text plugin .
 *
 * @package    local_extracttext
 * @subpackage extracttext
 * @copyright  2017 Gojko Todorovic ic15m008@technikum-wien.at
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die;

// Standard GPL and phpdocs
require_once(__DIR__.'/../../config.php');
require_once(dirname(__FILE__) . '/definitions.php');

$settings_name = get_string('pluginname', LOCAL_EXTRACTTEXT_FULL_NAME);
$settings = new admin_settingpage( LOCAL_EXTRACTTEXT_FULL_NAME, $settings_name);

// Create.
$ADMIN->add( 'localplugins', $settings );


    $settings->add(new admin_setting_configcheckbox(
        LOCAL_EXTRACTTEXT_FULL_NAME . '/extracttext_enable',
        new lang_string('settings_enable_extract_text', LOCAL_EXTRACTTEXT_FULL_NAME),
        new lang_string('settings_enable_extract_text_help', LOCAL_EXTRACTTEXT_FULL_NAME),
        1));

    $settings->add(new admin_setting_configtext(
        LOCAL_EXTRACTTEXT_FULL_NAME . '/hdfs_server',
        new lang_string('settings_hdfs_server_name', LOCAL_EXTRACTTEXT_FULL_NAME),
        new lang_string('settings_hdfs_server_name_help', LOCAL_EXTRACTTEXT_FULL_NAME),
        '',  '/^.*$/'));

    $settings->add(new admin_setting_configtext(
        LOCAL_EXTRACTTEXT_FULL_NAME . '/hdfs_remote_port',
        new lang_string('settings_hdfs_remote_port', LOCAL_EXTRACTTEXT_FULL_NAME),
        new lang_string('settings_hdfs_remote_port_help', LOCAL_EXTRACTTEXT_FULL_NAME),
        '22',  '/^.*$/'));

    $settings->add(new admin_setting_configtext(
        LOCAL_EXTRACTTEXT_FULL_NAME . '/hdfs_remote_folder',
        new lang_string('settings_hdfs_remote_folder', LOCAL_EXTRACTTEXT_FULL_NAME),
        new lang_string('settings_hdfs_remote_folder_help', LOCAL_EXTRACTTEXT_FULL_NAME),
        '/home/nifi/nifidata/getfile',  '/^.*$/'));    
	
	$settings->add(new admin_setting_configtext(
        LOCAL_EXTRACTTEXT_FULL_NAME . '/hdfs_results_folder',
        new lang_string('settings_hdfs_results_folder', LOCAL_EXTRACTTEXT_FULL_NAME),
        new lang_string('settings_hdfs_results_folder_help', LOCAL_EXTRACTTEXT_FULL_NAME),
        '/home/nifi/nifidata/results',  '/^.*$/'));

    $settings->add(new admin_setting_configtext(
        LOCAL_EXTRACTTEXT_FULL_NAME . '/hdfs_username',
        new lang_string('settings_hdfs_username', LOCAL_EXTRACTTEXT_FULL_NAME),
        new lang_string('settings_hdfs_username_help', LOCAL_EXTRACTTEXT_FULL_NAME),
        '',  '/^.*$/'));
		
	$settings->add(new admin_setting_configtext(
        LOCAL_EXTRACTTEXT_FULL_NAME . '/hdfs_password',
        new lang_string('settings_hdfs_password', LOCAL_EXTRACTTEXT_FULL_NAME),
        new lang_string('settings_hdfs_password_help', LOCAL_EXTRACTTEXT_FULL_NAME),
        '',  '/^.*$/'));


