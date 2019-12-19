<?php

/**
 * filelocation: where you want to save the file
 * formInputName : the input name of the $_file
 */
function fileUpload($filelocation, $formInputName)
{
    // UPLOAD PICTURE
    $filename = basename($_FILES[$formInputName]['name']); #the filename
    $filetemp = $_FILES[$formInputName]['tmp_name'];    # the file temp name
    $size = $_FILES[$formInputName]['size'];  # the file size

    $filename_location = $filelocation . $filename;

    // sanitise the file
    $pic_error = "";
    $ext = pathinfo($filename, PATHINFO_EXTENSION); # use pathinfo to get the file extension
    $ext = strtolower($ext); #turn the extension to a lowercase
    if ($ext != 'png' && $ext != 'jpg' && $ext != 'gif') {
        $pic_error .= 'Format must be PNG, JPG, or GIF';
    }
    if ($size > 512000) {
        $pic_error .= 'File size must not exceed 500kb';
    }
    if (file_exists($filename)) {
        $pic_error .= "File $filename already uploaded";
    }

    if (!$pic_error) {
     $result = move_uploaded_file($filetemp, $filename_location);

     return $result;
    }
}

// ADD COUNTRY CODE

function addCountryCode($mobile, $code)
{
    $telephone = $mobile;
    $telephone = substr($telephone, 1);
    $telephone = $code . $telephone;
    return $telephone;
}

// aDD NAIRA TO A NUMBER

function addNaira($money)
{
    $money = (int) $money;
    $money = number_format($money);
    return "<span>&#8358;</span>$money";
}

// only show a page if the session is set (use the session name)

function hidepage($sessionName, $policy)
{

    if (isset($_SESSION["$sessionName"])) {

        echo "<style>
            $policy{
                display:block;
            }
            </style>";
    } else {
        echo "<style>
                $policy{
                    display:none;
                }
                </style>";
    }
}

// Validate the post entry in a single array

function Validate(array $array)
{
    $error = "";
    // check if the important section in personal are not empty

    for ($x = 0; $x < count($array); $x++) {

        if ($_POST[$array[$x]] == "") {

            $error  .= "<li>{$array[$x]} is required in the {$array[$x]} question</li><br>";
        }
    }

    return $error;
}

//GET BROWSWER INFORMATION

function browser()
{

    $browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";

    // $ua = $_SERVER['HTTP_USER_AGENT'].''

    // $browser = get_browser();

    return $browser;
}

// GET IP ADDRESS

function getUserIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


// RETURN DATE AND TIME

function datetime()
{
    date_default_timezone_set('Europe/London');

    $date = strtotime(date('Y-m-d h:i:sa'));
    $date = date('jS \of F Y h:i:sa', $date);
    // $d = strtotime('today');
    return $date;
}


// return email once logged in

function loggedDetection($mailFunction, $name)
{
    $filename = $_SERVER["PHP_SELF"];
    $msg = "Hello, <br><br> This is a notification that a <strong>logged -in</strong> has been detected from this file : $filename at this time: " . datetime() . " and with this IP address: " . getUserIpAddr() . " <br><br> BROWSER USED :" . browser() . " <br><br>Regards,<br><br> IT Security Team";
    $mailFunction('it@showalinvest.com', "logged-in by $name", $msg, "LOGGED-IN DETECTION FROM $name");
}

// make email HTML friendly

$htmlEmail = function ($message) {
    ob_start();
    require($message);
    $htmlMsg = ob_get_contents();
    ob_end_clean();
    return $htmlMsg;
};

// CONVERT NUMBER TO WORDS
$numberToWords = function ($x) {
    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    $f->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-numbering-verbose");
    return  ucwords($f->format($x));
};

$addMonthsToDate = function ($months, $date) {

    $dt = new DateTime($date, new DateTimeZone('Europe/London'));
    $oldDay = $dt->format("d");
    $dt->add(new DateInterval("P{$months}M"));
    $newDay = $dt->format("d");
    if($oldDay != $newDay) {
    // Check if the day is changed, if so we skipped to the next month.
    // Substract days to go back to the last day of previous month.
    $dt->sub(new DateInterval("P" . $newDay . "D"));
    }
    $newDay3 = $dt->format("Y-m-d"); 
    $newDay2 = $dt->format("l jS \of F Y"); // 2016-02-29
  //  return $newDay2;
    $datetime = ['fullDate' => $newDay2, 'dateFormat'=>$newDay3];
    return $datetime;
};

// clean sessions

function clean_session($x) {
    $z = preg_replace('/[^0-9A-Za-z@.]/', '', $x);
    return $z;
  }

?>
