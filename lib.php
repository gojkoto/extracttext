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
 * lib.php - Contains Extract text plugin .
 *
 * @package    local_extracttext
 * @subpackage extracttext
 * @copyright  2017 Gojko Todorovic ic15m008@technikum-wien.at
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;

/**
 * Send file to external file storage, It checks if any new file was updated to moodle website.
 * @return void
 */
function send_files_to_hdfs(){
	
	if (get_config('local_extracttext', 'extracttext_enable')){
		$array = compare_data_from_dbs();
		insert_data_to_db($array);
	}
}	
	
/**
 * This method compare two database table and return result in an array.
 * @return array, Difference between two databases.
 */
function compare_data_from_dbs(){
	global $DB;
	// $DB->set_debug(true);
					
	$sql_files = "SELECT ANY_VALUE(id) as idfiles , contenthash, ANY_VALUE(userid) as userid, ANY_VALUE(filename) as filename 
				  FROM `mdl_files` 
				  WHERE `author` IS NOT NULL AND `filearea` = 'draft' AND `mimetype` <> 'application/zip' 
				  GROUP BY contenthash
				  ORDER BY ANY_VALUE(id) ASC";
	
	$result_files = $DB->get_records_sql($sql_files);
	
	
	$sql_extracttext_files = "SELECT `idfiles`, contenthash, userid, filename FROM `mdl_local_extracttext_files`";
	$result_extracttext_files = $DB->get_records_sql($sql_extracttext_files);

	$input_files = json_decode(json_encode($result_files), True);
	$input_extracttext_files = json_decode(json_encode($result_extracttext_files), True);

	$i=0;
	$diff = array();
	foreach($input_files as $value) {
		foreach($value as $key => $val) {
			if(isset($val)){
				if($key == "contenthash"){
					if(!check_array($val,$input_extracttext_files)){
						$diff[$i] = $value;
					}
				}
			}
		}
		$i++;
	} 

	return $diff;
	
}

/**
 * This method check and remove duplicate the contenthash value from array.
 * @param $value string
 * @param $array Array to compare.
 * @return boolean .
 */
function check_array($value,$array){
	$bool = false;
	foreach($array as $data){
		foreach($data as $key => $val){
			if($key =="contenthash"){
				if($val == $value){
					$bool = true;
				}
			} 
		}
	}
	return $bool;
}

/**
 * This method check and remove duplicate the contenthash value from array.
 * @param $input Array with values of new files to be send to ext storage.
 * @return void .
 */
function insert_data_to_db($input){
	global $DB;
	// $DB->set_debug(true);
	
	$table = 'local_extracttext_files';
	
	$count_array = count($input);
	if($count_array > 0){
		foreach ($input as $data) {
			//$record = new stdClass();
			foreach($data as $key => $val){
				if (isset($val)) {
					if($key == "idfiles"){
						$idfiles = $val;
					}
					if($key == "contenthash"){
						$contenthash = $val;
					}
					if($key == "userid"){
						$userid = $val;
					}
					if($key == "filename"){
						$filename = $val;
					}
				}	
			}
			
			$DB->insert_record($table, (object)array(
				'idfiles' => $idfiles,
				'contenthash' => $contenthash,
				'userid' => $userid,
				'filename' => $filename
			));
			
			save_files_to_ext_storage($contenthash,$filename);
		}
	}
}



/**
 * This method csends file to external storage with ssh2 scp function.
 * @param $contenthash the hash name of the file.
 * @param $filename the original file name.
 * @return void .
 */

function save_files_to_ext_storage($contenthash,$filename){
	global $CFG;
	
	$admin_hdfs_server = get_config('local_extracttext', 'hdfs_server');
	$admin_hdfs_port = get_config('local_extracttext', 'hdfs_remote_port');
	$admin_hdfs_remote_folder = get_config('local_extracttext', 'hdfs_remote_folder');
	$admin_hdfs_username = get_config('local_extracttext', 'hdfs_username');
	$admin_hdfs_password = get_config('local_extracttext', 'hdfs_password');

	
	$contenthash_folder = substr($contenthash,0,2).'/'.substr($contenthash,2,2).'/';
	
	$srcFile = $CFG->dataroot.'/filedir/'.$contenthash_folder.$contenthash;
	
	
	$dstFile = $admin_hdfs_remote_folder.$filename;

	$send = false;
	$connection = ssh2_connect($admin_hdfs_server, $admin_hdfs_port);
	
	$auth = ssh2_auth_password($connection, $admin_hdfs_username, $admin_hdfs_password);
	
	if($auth){
		ssh2_scp_send($connection, $srcFile, $dstFile, 0777);	
	}

}


function update_reports(){
	
}
