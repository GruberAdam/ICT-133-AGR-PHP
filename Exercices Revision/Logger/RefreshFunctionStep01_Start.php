<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Glassey / Adam Gruber
 * Date: 21.11.2018
 * Time: 22:15
 * Title : RefreshFunction.php
 * Project : I133
 */

//<editor-fold desc="private attributes"> //add region in phpstorm -> https://blog.jetbrains.com/phpstorm/2012/03/new-in-4-0-custom-code-folding-regions/
$logName = "application.log";//define log file name
$fileFullPath = setFullPath($logName);//define the full path until the log file
$logHeader = "TimeStamp\t\t\tLevel\tMessage";//set the header of the future log file
//</editor-fold>

//<editor-fold desc="tests automation - entry point">
//create file and set header
writeMsgInFile($fileFullPath, $logHeader, true);
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
    $currentFile = getcwd();     //Get current file
    $currentFile .= "\\$fName";  //Append the fileGiven
    return $currentFile;        //Return the file
    //TODO - il vous faut coder le corps e cette fonction
}

/**
 * This function is designed to write a string message in a file.
 * -The opening and closing action is managed by the function
 * @param $fileFullPath : The path containing expressing the path from the root to the filename
 * @param $lineToWrite : Is the content to write in the file.
 * @param $erase : Is an option allowing to erase the file before writing or happening the $lineToWrite a the end of the file
 */
function writeMsgInFile($fileFullPath, $lineToWrite, $erase)
{

    /* Help
    //http://php.net/manual/en/function.fopen.php
    */

    //TODO - il vous faut coder le corps e cette fonction
    if ($erase){ // If erase is true
        $mode = 'w+'; //File open with w+
    }
    else{ //Else
        $mode = 'a+'; //Open with a+
    }
    $fOpen = fopen($fileFullPath, $mode); //Opens file with path and the mode
    fwrite($fOpen, $lineToWrite); //Write the variable
    fclose($fOpen); //Close the file
}

//</editor-fold>
?>