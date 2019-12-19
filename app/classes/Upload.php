<?php

namespace App\classes;

use Trinify\Trinify;

class Upload
{
    public $fileLocation;
    public $formInputName;
    public $filename_location;
    public $filename;
    public $filetemp;
    public $error = array();
    public $size;
    public $ext;

    /*
     Instantiate the class with filelocation and forminputname
     call $this->filename to set the filename in the $_POST
     call the $this->error and if it empty
     call the move function 
     else echo the error

    */

    function __construct($fileLocation, $formInputName)
    {
        $this->fileLocation = $fileLocation;
        $this->formInputName = $formInputName;
        $this->filename = basename($_FILES[$this->formInputName]['name']);
        $this->filename_location = $this->fileLocation . $this->filename;
        $this->filetemp = $_FILES[$formInputName]['tmp_name'];
        $this->size = $_FILES[$formInputName]['size'];
        $this->ext =  strtolower(pathinfo($this->filename_location, PATHINFO_EXTENSION)); # use pathinfo to get the file extension
    }


    private function setExtError()
    {
        if ($this->ext != 'png' && $this->ext != 'PNG' && $this->ext != 'JPEG' && $this->ext != 'jpeg'  && $this->ext != 'jpg' && $this->ext != 'JPG' && $this->ext != 'GIF' && $this->ext != 'gif') {
            $this->error[] .= 'Format must be PNG, jPEG, JPG, or GIF';
        }
    }

    private function isFileErr()
    {
        $check = getimagesize($this->filetemp);
        if ($check == false) {
            $this->error[] .= "File is not an image.";
        }
    }

    private function setSizeErr()
    {
        if ($this->size > 512000) {
            $this->error[] .= 'Sorry, file is too large. The size must not exceed 512kb';
        }
    }


    private function required()
    {
        if (empty($_FILES[$this->formInputName]['name'])) {
            $this->error[] .= 'Please, upload file';
        }
    }

    private function fileExistErr()
    {
        if (file_exists($this->filename_location)) {
            $this->error[] .= "Possibly, the image file $this->filename is already uploaded";
        }
    }

    private function allErrors()
    {
        $this->required();
     //   $this->isFileErr();
        $this->setExtError();
        $this->setSizeErr();
        $this->fileExistErr();
    }

    public function getError()
    {
        $this->allErrors(); // call all errors    
        return $this->error;
    }

    public function moveFile()
    {

        if (move_uploaded_file($this->filetemp, $this->filename_location)) {
            return "Successfully uploaded";
        }
    }
}
