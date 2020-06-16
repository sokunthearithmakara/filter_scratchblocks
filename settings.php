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
 * Main filter setting
 *
 * @package   filter_scratchblocks
 * @author    Sokunthearith Makara 
 * @copyright 2020 Eduton.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;

if ($ADMIN->fulltree) {

    $item = new admin_setting_heading('filter_scratchblocks/howto',
                                      new lang_string('howto', 'filter_scratchblocks'),
                                      new lang_string('howto_help', 'filter_scratchblocks'));
    $settings->add($item);

    $default = $CFG->wwwroot . '/filter/scratchblocks/js/scratchblocks-v3.4-min.js';

    $setting = new admin_setting_configtext('filter_scratchblocks/mainjs',
                                         new lang_string('mainjs', 'filter_scratchblocks'),
                                         new lang_string('mainjs_desc', 'filter_scratchblocks'),
                                         $default);
    $settings->add($setting);

    $setting = new admin_setting_configtext('filter_scratchblocks/translation',
                                         new lang_string('translation', 'filter_scratchblocks'),
                                         new lang_string('translation_desc', 'filter_scratchblocks'),
                                         get_string('none'));
    $settings->add($setting);

    $setting = new admin_setting_configtext('filter_scratchblocks/languages',
                                         new lang_string('languages', 'filter_scratchblocks'),
                                         new lang_string('languages_desc', 'filter_scratchblocks'),
                                         '\'en\'');
    $settings->add($setting);

}