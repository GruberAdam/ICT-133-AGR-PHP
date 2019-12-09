<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Glassey
 * Date: 21.11.2018
 * Time: 22:15
 * Title : RefreshFunction.php
 */
const MIN_LENGHT = 10;
const MAX_LENGHT = 31;
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
    "1" => array(1,"This is an info"),
    "2" => array(2, "This a warning"),
    "3" => array(3, "This an error"),
    "4" => array(24, "This an unknown"),
    "5" => array(1, "Too short"),
    "6" => array(1, "This is a very long info messages")
);

foreach ($testValues as $msg)
{
    //Checks if range is accepted
    $accepted = checkMsgToWrite($msg[1],MIN_LENGHT,MAX_LENGHT);
    //If its no accepted skip
    if ($accepted) {
        //here may a good place to call the function prepareMsgToWrite()...
        $msgFormatted = prepareMsgToWrite($msg[1], $msg[0]);
        writeMsgInFile($fileFullPath, $msgFormatted, false);
    }
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
    /*Help
    //http://php.net/manual/en/function.fopen.php
    */

    //TODO - a good place to code ;)
    $strWriter = null;
    if($erase){
        $strWriter = fopen($fileFullPath, "w");
    }
    else{
        $strWriter = fopen($fileFullPath, "a");
        $lineToWrite = $lineToWrite;
    }

    fwrite($strWriter, $lineToWrite  . "\r\n");
    fclose($strWriter);
}

/**
 * This function is designed to proceed a check before writing a message in a file
 * @param $msg : contains the message to be checked
 * @param $minLength : minimal allowed length of the message
 * @param $maxLength : maximal allowed length of the message
 * @return bool|string : the message after check
 * @example : A message too long will be shorted until the maximum allowed
 *            A message too short will be ignored
 */
function checkMsgToWrite($msg, $minLength, $maxLength)
{
    /*Help
        http://php.net/manual/en/function.substr.php
    */
    $numberOfCharacters = nbOfCharInMsg($msg);
    //Checks if the string is in the accepted range
    if ($numberOfCharacters < $minLength || $numberOfCharacters > $maxLength){
        return false;
    }else{
        return true;
    }

    //TODO - a good place to code ;)
}

/**
 * This function is designed to count the amount of char in a string
 * @param $msgToCount : Message to count
 * @return int : amount of char found in msg
 * @example INPUT  : msg = "Hello World!"
 *          OUTPUT : 12
 */
function nbOfCharInMsg($msgToCount)
{
    //Count number of characters
    $numberOfCharacters = strlen($msgToCount);
    return $numberOfCharacters;
    /*Help
        http://php.net/manual/en/function.strlen.php
    */
}

/**
 * This function is designed to prepare the message to be written in the log
 * @param $msg : Contains the message
 * @param $levelNumber : Contains the level of message ("Warning", "Info",...)
 * @return string : Gets the message ready to be written
 * @example INPUT : $msg = "My message"
 *          INPUT : $levelNumber = 1
 *          OUTPUT: TIMESTAMP   Info MyMessage
 *
 *          TIMESTAMP FORMAT : 2018-01-30 12:15:59
 *
 *          The separator between each fields is the tab ("\t")
 */
function prepareMsgToWrite($msg, $levelNumber)
{
    /*Help
	http://php.net/manual/en/function.date.php
	*/
    $timeStamp = date('Y-m-d H:i:s');
    $logLevel = convertLevelIntToDescription($levelNumber);
    $msgFormatted = "";

    $msgFormatted = $timeStamp . "\t" . $logLevel . "\t" . $msg;

    return $msgFormatted;
}

/**
 * This function is designed to convert the log level from int to string description
 * @param $levelNumber
 * @return string - The level description
 * @example Value 1 becomes "Info"
 *          Value 2 becomes "Warning"
 *          Value 3 becomes "Error"
 *          Value up to 3 becomes "Unknown"
 */
function convertLevelIntToDescription($levelNumber)
{
    /*Help
    http://php.net/manual/en/control-structures.switch.php
    */
    $levelDescription = "";
    switch ($levelNumber)
    {
        case 1:
            $levelDescription = "Info";
            break;
        case 2:
            $levelDescription = "Warning";
            break;
        case 3:
            $levelDescription = "Error";
            break;
        default:
            $levelDescription = "Unknown";
            break;
    }
    return $levelDescription;
}

//</editor-fold>
?>