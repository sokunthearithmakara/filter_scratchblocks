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
 * Main filter class
 *
 * @package   filter_scratchblocks
 * @author    Sokunthearith (T) Makara 
 * @copyright 2020 eduton.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


class filter_scratchblocks extends moodle_text_filter {

    /**
     * The filter function is required, but the text just passes through.
     *
     * @param string $text HTML to be processed.
     * @param array $options Options for filter.
     * @return string String containing processed HTML.
     */
    public function filter($text, array $options = array()) {
        global $CFG;
        $langs = '['.get_config("filter_scratchblocks", "languages").']'; //get array of languages from admin
        if (!get_config("filter_scratchblocks", "languages")) {
            $langs = '["en"]'; //if empty, use english
        }

        $mainjs = get_config('filter_scratchblocks', 'mainjs'); //get scratchblock js from admin
        if(!$mainjs) { //if not provided, use default js
                $mainjs = $CFG->wwwroot . '/filter/scratchblocks/js/scratchblocks-v3.4-min.js';
            }

        $scriptblock = '<script> 
        scratchblocks.renderMatching("scratchblocks", {
        style: "scratch3",
        inline: false,
        languages: '.$langs.',
            });
        </script>'; 
        $scriptinline = '<script>
        scratchblocks.renderMatching("scratchblocksinline", {
        style: "scratch3",
        inline: true,
        languages: '.$langs.',
            });
        </script>'; //initialize scratchblock renderers for both block and inline
         
        
        $tranjs = get_config('filter_scratchblocks', 'translation'); //get translation js link from admin

        if (!is_string($text) || empty($text)) {
            return $text;
        }

        $re = "~{scratchblocks}(.*?){/scratchblocks}~isu"; //first find block scratchblocks
        $result = preg_match_all($re, $text, $matches);
        if ($result > 0) {
            foreach ($matches[1] as $idx => $code) {
                $newcode = '<scratchblocks>' .
                    str_replace(['<p>', '</p>'], ['', "<br>"], $code) .
                    '</scratchblocks>';
                $text = str_replace($matches[0][$idx], $newcode, $text);
            }
            $text = $text.$scriptblock;   
        echo '<script src="'.$mainjs.'"></script>'; //add js link to the page
        if($tranjs && $langs !== '["en"]' && $langs !== '[\'en\']') { //if provided, add js link to the page; otherwise, no translation; therefore, english only.
        echo '<script src="'.$tranjs.'"></script>';
        } 
        } else {
            $noblock = true;
        }

        $re = "~{scratchblocksinline}(.*?){/scratchblocksinline}~isu"; //second find inline scratchblocks
        $result = preg_match_all($re, $text, $matches);
        if ($result > 0) {
            foreach ($matches[1] as $idx => $code) {
                $newcode = '<scratchblocksinline>' .
                    str_replace(['<p>', '</p>'], ['', "<br>"], $code) .
                    '</scratchblocksinline>';
                $text = str_replace($matches[0][$idx], $newcode, $text);
            }
            $text = $text.$scriptinline;  
            if ($noblock == true) { //check if js links already added or not to avoid adding twice
                echo '<script src="'.$mainjs.'"></script>'; //add js link to the page
                if($tranjs && $langs !== '["en"]' && $langs !== '[\'en\']') { //if provided, add js link to the page; otherwise, no translation; therefore, english only.
                echo '<script src="'.$tranjs.'"></script>';
                }
            }
        }

        return $text;
    }
}
