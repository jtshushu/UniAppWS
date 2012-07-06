<?php
// This file is part of Moodbile -- http://moodbile.org
//
// Moodbile is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodbile is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodbile.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Forum Discussion Class
 *
 * @package MoodbileServer
 * @subpackage Forum
 * @copyright 2010 Maria José Casañ, Marc Alier, Jordi Piguillem, Nikolas Galanis marc.alier@upc.edu
 * @copyright 2010 Universitat Politecnica de Catalunya - Barcelona Tech http://www.upc.edu
 *
 * @author Jordi Piguillem
 * @author Nikolas Galanis
 * @author Oscar Martinez Llobet
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once(dirname(__FILE__).'/../../config.php');
require_once(UNIAPP_ROOT . '/lib/externalObject.class.php');

/**
 * Discussion Class
 *
 * @package MoodbileServer
 * @subpackage Forum
 * @copyright 2010 Maria José Casañ, Marc Alier, Jordi Piguillem, Nikolas Galanis marc.alier@upc.edu
 * @copyright 2010 Universitat Politecnica de Catalunya - Barcelona Tech http://www.upc.edu
 *
 * @author Jordi Piguillem
 * @author Nikolas Galanis
 * @author Imanol Urra
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

class Discussion extends ExternalObject{

    function __construct($discussionrecord) {
        parent::__construct($discussionrecord);
    }

    public static function get_class_structure() {
        return new external_single_structure(
        array(
                'id'            => new external_value(PARAM_INT,    'discussion id', VALUE_REQUIRED, 0, NULL_NOT_ALLOWED),
                'forum'         => new external_value(PARAM_INT,    'forum id', VALUE_REQUIRED, 0, NULL_NOT_ALLOWED),
                'name'          => new external_value(PARAM_TEXT,   'discussion name', VALUE_REQUIRED, '', NULL_NOT_ALLOWED),
                'firstpost'     => new external_value(PARAM_INT,    'id of the first post', VALUE_REQUIRED, '', NULL_NOT_ALLOWED),
                'userid'        => new external_value(PARAM_INT,    'user id', VALUE_REQUIRED, 0, NULL_NOT_ALLOWED),
                'groupid'       => new external_value(PARAM_INT,    'id of the group', VALUE_REQUIRED, -1, NULL_NOT_ALLOWED),
                'timemodified'  => new external_value(PARAM_INT,    'date of last modification', VALUE_REQUIRED, 0, NULL_NOT_ALLOWED)
            ), 'Discussion'
        );
    }
}
