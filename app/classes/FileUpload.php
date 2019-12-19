<?php
/**
 * Created by PhpStorm.
 * User: modernman00
 * Date: 7/3/2019
 * Time: 1:06 PM
 */

namespace App\classes;


class FileUpload
{
    protected $filename;
    protected $fileszie = 2097152;
    protected $extension;
    protected $path;

    public function getname() {

        return $this->filename;
    }

    protected function setname($file, $name="") {

        if($name === '') {

            $name = pathinfo($file, PATHINFO_FILENAME);
        }

        $name = strtolower(str_replace(['_', ''], '-', $name));
        $hash = md5(microtime()); // it will give some random string
        $ext = $this->file_extension($file);
        //now, join together the name, hash and ext
        $this->filename = "{$name}-{$hash}.{$ext}";
        
    }

    protected function file_extension($file) {

        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);

    }

    public static function filesize ($file) {

        $size = new static;
        return $file > $size->filesize? 'true' : 'false';
    }

    // check if file is an image

    public static function isImage ($file) {

        $right = new static; 
        $get_ext = $right->file_extension($file);
        $valid_ext = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
        if(!in_array($get_ext, $valid_ext)) {

            return false;
        } else {
            return true;
        }
    }

    public function path() {

        return $this->path;
    }

    public static function move($temp_path, $folder, $file, $new_name) {
        // move to temp folder, new folder, file and newname

        $file = new static;
        $ds = DIRECTORY_SEPARATOR;// this is just a slash (/)
        $file->setname($file, $new_name); //set the filename
        $file_name = $file->getname(); // get the name

        // check if there is a folder on the root direct

        if(!is_dir($folder)) {
            mkdir($folder, 0777, true); // ensure you have the permission apache to do this. ensure the upload folder is already existing inside your project
        }

        $file->path = "$folder$ds$file_name";
        $absolute_path = BASE_PATH."{$ds}public{$ds}$file->path";

        if(move_uploaded_file($temp_path, $absolute_path)) {

            return $file;
        } return null;





    }

}