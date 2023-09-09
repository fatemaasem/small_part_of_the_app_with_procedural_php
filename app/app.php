<?php
function get_transaction_file($path){
    $file_name=[];
    
    foreach(scandir($path) as $file){
       if(!is_dir($file)){
        $file_name[]=$file;
       }
    }
    return $file_name;
}
function get_transactions($path){//return 2D array
    $transaction=[];
    $file=fopen($path,'r');
    $line=fgetcsv($file);
    $transaction[]=$line;
    while($line!==false){       
        $line=fgetcsv($file);
       
        if(is_array($line)){
        $transaction[]=$line;
        }

    }
    return $transaction;
}
?>
