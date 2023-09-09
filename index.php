<?php 

$root= __DIR__.DIRECTORY_SEPARATOR;
define('APP_PATH',$root.'app'.DIRECTORY_SEPARATOR);
define('FILE_PATH',$root.'transaction_files'.DIRECTORY_SEPARATOR);
define('VIEWS_PATH',$root.'VIEWS'.DIRECTORY_SEPARATOR);
require APP_PATH.'app.php';

$files=get_transaction_file(FILE_PATH); 
$transactions=[];
foreach ($files as $file){
    $transactions=array_merge( $transactions,get_transactions(FILE_PATH.$file));
}

?>