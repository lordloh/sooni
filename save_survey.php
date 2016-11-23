<?php
$DB = "db/survey.db";
$table = 'survey';
//print_r($_POST);
$json_output="{";
$all_keys=array_keys($_POST);
$all_data_fields=['num_domains','shark','host'];
$sqlite_type=['INTEGER','INTEGER','STRING'];
$sqlite_list="";
$sqlite_field="";
$sqlite_values="";
foreach($all_data_fields as $k=>$dt){
    $sqlite_list.=$dt." ".$sqlite_type[$k].", ";
    $sqlite_field.=$dt.", ";
    if($sqlite_type[$k]=="STRING"){
        $sqlite_values.='"'.$_POST[$dt].'", ';
    }else{
        $sqlite_values.=$_POST[$dt].', ';
    }
}
$sqlite_list=trim($sqlite_list,", ");
$sqlite_field=trim($sqlite_field,", ");
$sqlite_values=trim($sqlite_values,", ");

$all_present=true;
foreach($all_data_fields as $field){
    $pr=in_array($field,$all_keys);
    $all_present=$all_present && $pr;
}

if ($all_present){
    $email_db = new SQLite3($DB,SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
    $email_db->busyTimeout(1500);
    $email_db->exec('CREATE TABLE IF NOT EXISTS '.$table.' ('.$sqlite_list.');');
    $ins = $email_db->exec("INSERT INTO $table (".$sqlite_field.") VALUES(".$sqlite_values.")");
    $json_output.='"result":0, "msg":"okay"';
}else{
    $json_output.='"result":1, "msg":"missing data parts"';
}
$json_output.="}";
echo $json_output;
?>