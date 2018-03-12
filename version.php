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
//

/**
 * version.php - Contains properties of Extract text plugin .
 *
 * @package    local_extracttext
 * @subpackage extracttext
 * @copyright  2017 Gojko Todorovic ic15m008@technikum-wien.at
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;

$plugin->version   = 2014051200;
$plugin->requires  = 2014051200;
$plugin->component = 'local_extracttext';
$plugin->cron      = 0;
$plugin->maturity  = MATURITY_STABLE;
$plugin->release   = '1.012';
$plugin->dependencies = array(
    'mod_forum' => ANY_VERSION,
    'mod_data'  => 2014020300
);