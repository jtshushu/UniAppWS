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
 * Forum Post Test Library
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
	die('Direct access to this script is forbidden.');	///  It must be included from a Moodle page
}

require_once(dirname(__FILE__).'/../../../config.php');
require_once(UNIAPP_ROOT . '/mod/forum/post.class.php');
print_r(UNIAPP_ROOT . '/mod/forum/post.class.php');

class postclass_test extends UnitTestCase {

	public function test_post_class() {

		$post = new StdClass();
		$post->id = 2;
		$post->discussion = 2;
		$post->parent = 1;
		$post->userid = 2;
		$post->created = 1306943090;
		$post->modified = 1306943096;
		$post->mailed = 0;
		$post->subject = 'Test post';
		$post->message = 'Test post message';
		$post->messageformat = 0;
		$post->messagetrust = 0;
		$post->attachment = null;
		$post->totalscore = 0;
		$post->mailnow = 0;

		$newpost = new ForumPost($post);
		$data = $newpost->get_data();
		$struct = ForumPost::get_class_structure();

		$this->assertEqual(sizeof($struct->keys),sizeof($data), 'Same size');

		foreach ($struct->keys as $key => $value){
			$this->assertEqual($post->$key, $data[$key], 'Same '.$key.' field');
		}

	}

	public function test_forum_class_exception() {

		$post = new StdClass();
		$post->id = 2;
		$post->discussion = 2;
		$post->parent = 1;
		$post->userid = 2;
		$post->created = 1306943090;
		$post->modified = 1306943096;
		$post->mailed = 0;
		$post->subject = 'Test post';
		$post->message = 'Test post message';
		$post->messageformat = 0;
		$post->messagetrust = 0;
		$post->attachment = null;
		$post->totalscore = 0;
		$post->mailnow = 0;

		unset($post->id); // Incomplete record

		$this->expectException('Exception');
		$newpost = new ForumPost($post);
	}

}
