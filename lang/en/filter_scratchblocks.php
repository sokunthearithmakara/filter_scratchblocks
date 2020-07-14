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
 * English language strings.
 *
 * @package   filter_scratchblocks
 * @author    Sokunthearith (T) Makara 
 * @copyright 2020 eduton.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Scratchblocks';
$string['filtername'] = 'Scratchblocks';
$string['privacy:metadata'] = 'The filter_scratchblocks plugin does not store any personal data.';
$string['mainjs'] = 'Scratchblocks JS URL';
$string['mainjs_desc'] = 'Provide a link to your custom scratchblocks js file. If empty, the default file will be used.';
$string['translation_desc'] = 'By default, only English blocks are rendered. Enter the link to a translation js file. See <a target="_blank" href="https://github.com/scratchblocks/scratchblocks">https://github.com/scratchblocks/scratchblocks</a> for translation file.';
$string['translation'] = 'Translation JS URL';
$string['languages'] = 'Supported languages';
$string['languages_desc'] = 'Enter a list of supported languages separated by commas (e.g. \'en\', \'ja\', \'km\'). Make sure these languages are included in the translation JS file provided above; otherwise, the whole filter will not work.';
$string['howto'] = 'Instructions';
$string['howto_help'] = 'This filter supports both block and inline Scratch code blocks. Use <b>{scratchblocks}{/scratchblocks}</b> for block Scratch code blocks and <b>{scratchblocksinline}{/scratchblocksinline}</b> for inline code blocks. For help with syntax, see <a href="https://en.scratch-wiki.info/wiki/Block_Plugin/Syntax" target="_blank">Scratch Wiki page</a>.';
