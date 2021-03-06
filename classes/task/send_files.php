<?php
/**
 * send_files.php - Contains properties of Extract text plugin .
 *
 * @package    local_extracttext
 * @subpackage extracttext
 * @copyright  2017 Gojko Todorovic ic15m008@technikum-wien.at
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_extracttext\task;

defined('MOODLE_INTERNAL') || die;

require_once(dirname(__FILE__) . '/../../definitions.php');

class send_files extends \core\task\scheduled_task {

    public function get_name() {
        // Shown in admin screens.
        return get_string('send_files_to_hdfs', LOCAL_EXTRACTTEXT_FULL_NAME);
    }

    public function execute() {
        global $CFG;

        require_once($CFG->dirroot.'/local/extracttext/lib.php');
        send_files_to_hdfs();
    }
}