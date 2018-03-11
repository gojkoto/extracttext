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
 * local_extracttext.php
 *
 * @package    local_extracttext
 * @subpackage extracttext
 * @copyright  2017 Gojko Todorovic ic15m008@technikum-wien.at
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

// General.
$string['pluginname'] = 'Extract Text';

// Settings
$strign['extracttext_explain'] = 'This is a moodle plugin for extract matadata and text from specific file';
$string['settings_enable_extract_text'] = 'Enable extract text';
$string['settings_enable_extract_text_help'] = 'Enable extract text';
$string['settings_hdfs_server_name'] = 'Hortonworks HDFS server host';
$string['settings_hdfs_server_name_help'] = 'Give the full name of HDFS server host that Moodle should use to send files.To specify a non-default port (i.e other than port 22222), you can use the [server]:[port] syntax (eg \'192.168.41.5\')';
$string['settings_hdfs_username'] = 'Hortonworks server HDFS username';
$string['settings_hdfs_username_help'] = 'If you have specified an HDFS server above, and the server requires authentication, then enter the username and password here.';
$string['settings_hdfs_password'] = 'Hortonworks server HDFS password';
$string['settings_hdfs_password_help'] = 'If you have specified an HDFS server above, and the server requires authentication, then enter the username and password here.';
$string['settings_enable_email_notification'] = 'Email notification';
$string['settings_enable_email_notification_help'] = 'If enabled, emails with notifications about new material can be send';
$string['send_files_to_hdfs'] = 'Send file(s) to a Hadoop server for ExtractText Plugin';
$string['update_reports'] = 'Update Report for ExtractText Plugin';
$string['settings_hdfs_remote_port'] = "Remote network port";
$string['settings_hdfs_remote_port_help'] = "Remote network port, e.g 22";
$string['settings_hdfs_remote_folder'] = "Remote folder";
$string['settings_hdfs_remote_folder_help'] = "Remote folder: e.g. /var/www/";
$string['settings_hdfs_results_folder'] = "Remote folder";
$string['settings_hdfs_results_folder_help'] = "Remote folder with key phrases results: e.g. /var/www/";
