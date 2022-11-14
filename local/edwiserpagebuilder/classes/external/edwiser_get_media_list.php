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
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Sudam Chakor
 */

namespace local_edwiserpagebuilder\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_function_parameters;
use external_value;
use context_system;

/**
 * Service definition for create new form
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait edwiser_get_media_list {

    /**
     * Returns the functional parameter for create and update form methods.
     * @param  boolean                      $id          true if want to add id in parameters
     * @param  boolean                      $forceupdate If true then add forceupdate to settings array
     * @return external_function_parameters              Functional parameters
     */
    public static function edwiser_get_media_list_parameters() {
        return new external_function_parameters(
            array(
                'limitfrom'      => new external_value(PARAM_INT, 'Media file list limit.', VALUE_DEFAULT, '0'),
                'offset'     => new external_value(PARAM_INT, 'Media file list offset.', VALUE_DEFAULT, '20'),
            )
        );
    }

    /**
     * Return the response structure of create and update form services.
     * @return external_single_structure return structure
     */
    public static function edwiser_get_media_list_returns() {
        return new \external_single_structure(
            array(
                'limitto' => new external_value( PARAM_INT, 'Media file id.' ),
                'media'   => new \external_multiple_structure(
                    new \external_single_structure(
                        array(
                            'file_path'    => new external_value( PARAM_TEXT, 'Path of the file.' ),
                            'is_author'    => new external_value( PARAM_BOOL, 'Is current user is author.' ),
                            'file_name'    => new external_value( PARAM_TEXT, 'File name.' ),
                            'file_id'      => new external_value( PARAM_INT, 'File id.' ),
                            'time_created' => new external_value( PARAM_INT, 'File creation time.' ),
                            'size'         => new external_value( PARAM_TEXT, 'Size of the file.' ),
                            'dimension'    => new external_value( PARAM_TEXT, 'Media file dimension if image.' ),
                            'id'           => new external_value( PARAM_INT, 'Media file record id.' ),
                        )
                    )
                )
            )
        );
    }

    /**
     * List down the media from the plugins context.
     * @param  array $limitfrom meida file limit.
     * @param  string $offset offset limit.
     * @return array  [media_file_list]
     */
    public static function edwiser_get_media_list( $limitfrom, $offset ) {
        global $USER;
        $limitto      = $limitfrom + $offset;
        $files_list   = array();
        $file_storage = get_file_storage();
        $context      = context_system::instance();
        self::validate_context($context);
        // array fof the store files. check the file for more detials /moodle/lib/filestorage/stored_file.php .
        $files        = $file_storage->get_area_files( $context->id, self::$plugin_name, self::$plugin_file_area, false, 'itemid', true, 0, $limitfrom, $limitto );
        
        foreach ( $files as $file ) {
            $filename = $file->get_filename();
            if('.' === $filename){
                continue;
            }

            $obj_url  = \moodle_url::make_pluginfile_url( $context->id, self::$plugin_name, self::$plugin_file_area, $file->get_itemid(), $file->get_filepath(), $filename );
            $file_data = array(
                'file_path'    => $obj_url->out(),
                'is_author'    => $USER->id === $file->get_userid(),
                'file_name'    => $filename,
                'file_id'      => $file->get_itemid(),
                'time_created' => $file->get_timemodified(),
                'size'         => self::size_filter($file->get_filesize()),
                'dimension'    => '',
                'id'           => $file->get_id(),
            );
            if($file->is_valid_image()){
                $imageinfo              = $file->get_imageinfo();
                $file_data['dimension'] = $imageinfo['width'].' x '.$imageinfo['height']. ' pixels';
            }
            $files_list[] = $file_data;
        }
        // return $files_list;
        return array(
            'limitto' => $limitfrom+\count($files_list),
            'media'   => $files_list
        );
    }

    private static function size_filter( $bytes ) {
        $label = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB' );
        for( $i = 0; $bytes >= 1024 && $i < ( count( $label ) -1 ); $bytes /= 1024, $i++ );
        return( round( $bytes, 2 ) . " " . $label[$i] );
    }
}
