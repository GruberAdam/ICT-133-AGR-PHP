<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Glassey
 * Date: 21.11.2018
 * Time: 22:15
 * Title : RefreshFunction.php
 */

//<editor-fold desc="private attributes"> //add region in phpstorm -> https://blog.jetbrains.com/phpstorm/2012/03/new-in-4-0-custom-code-folding-regions/
$logName = "application.log";//define log file name
$fileFullPath = setFullPath($logName);
$logHeader = "TimeStamp\t\t\tLevel\tMessage";//set the header of the future log file
//</editor-fold>

//<editor-fold desc="tests automation - entry point">
//create file and set header
writeMsgInFile($fileFullPath, $logHeader, true);

//http://php.net/manual/en/language.types.array.php
$testValues = array(
    "1" => array(date("Y-m-d H:i:s"), 1, "This is an info",),
    "2" => array(date("Y-m-d H:i:s"), 2, "This a warning"),
    "3" => array(date("Y-m-d H:i:s"), 3, "This an error"),
    "4" => array(date("Y-m-d H:i:s"), 24, "This an unknown"),
    "5" => array(date("Y-m-d H:i:s"), 1, "Too short"),
    "6" => array(date("Y-m-d H:i:s"), 1, "This is a very long info message")
);


$arrayString = "";
//For each array index loop
foreach ($testValues as $msg) {
    //For each value in the array send it to a function
    for ($i = 0; $i < count($testValues['1']); $i++) {
        if ($i == 1) { //If there is a number to convert it
            $msg[$i] = convertLevelIntToDescription($msg[$i]);
        }
        //Send it to prepareMsgToWrite function, it will put the hole string in one var.
        $arrayString = prepareMsgToWrite($msg[$i],$arrayString,$i);
    }
    //send the message
    writeMsgInFile($fileFullPath, $arrayString, false);
}
//</editor-fold>

//<editor-fold desc="function">
/**
 * This function is designed to append a path with the fileName received as parameter
 * -The path will be found by the function
 * @param $fName : The file name to be append to the path
 * @return [String] full path to the log file expressed as a string
 * @example File Name : testFile.log / after function : [pathToFile]\testFile.log
 */
function setFullPath($fName)
{
    /* Help
        get current directory -> http://php.net/manual/en/function.getcwd.php
    */

    $currentPath = getcwd();
    $fullPathToFile = $currentPath . "\\" . $fName;
    return $fullPathToFile;
}

/**
 * This function is designed to write a string message in a file.
 * -The opening and closing action is managed by the fuction
 * @param $fileFullPath : The path containing expressing the path from the root to the filename
 * @param $lineToWrite : Is the content to write in the file.
 * @param $erase : Is an option allowing to erase the file before writing or happening the $lineToWrite a the end of the file
 */
function writeMsgInFile($fileFullPath, $lineToWrite, $erase)
{
    /* Help
    //http://php.net/manual/en/function.fopen.php
    */

    $strWriter = null;
    if ($erase) {
        $strWriter = fopen($fileFullPath, "w+");
    } else {
        $strWriter = fopen($fileFullPath, "a");
    }

    fwrite($strWriter, $lineToWrite . "\r\n");
    fclose($strWriter);
}


/**
 * This function is designed to prepare the message to be written in the log
 * @param $msg : Contents the message
 * @param $levelNumber : Contents the level of message ("Warning", "Info",...)
 * @return string : Gets the message ready to be written
 * @example INPUT : $msg = "My message"
 *          INPUT : $levelNumber = 1
 *          OUTPUT: TIMESTAMP   Info MyMessage
 *
 *          TIMESTAMP FORMAT : 2018-01-30 12:15:59
 *
 *          The separator between each fields is the tab ("\t")
 */

function prepareMsgToWrite($msg,$storeMessage ,$index)
{
    //For the first index don't put a \t
    if ($index == 0){
        $storeMessage = $msg;
    }else{
        //Put a tab for every word
        $storeMessage = $storeMessage ."\t" .$msg;
    }
    //Return the var with the message
    return $storeMessage;
}

/**
 * This function is designed to convert the log level from int to string description
 * @param $levelNumber
 * @return string - The level description
 * @example Value 1 becomes "Info"
 *          Value 2 becomes "Warning"
 *          Value 3 becomes "Error"
 *          Value up to 3 becomes "Unkown"
 */
function convertLevelIntToDescription($levelNumber)
{
    //Var witch will contain the description
    $levelDescription = "";

    //LevelDescription is equal to the number info (in string)
    if ($levelNumber == 1) {
        $levelDescription = 'Info';
    } else if ($levelNumber == 2) {
        $levelDescription = 'Warning';
    } else if ($levelNumber == 3) {
        $levelDescription = 'Error';
    } else if ($levelNumber == 24) {
        $levelDescription = 'Unknown';
    }
    //return the description
    return $levelDescription;
}

//</editor-fold>
?>