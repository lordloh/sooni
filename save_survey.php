<?php
$DB = "db/survey.db";
$table = 'survey';
//print_r($_POST);
$json_output="{";
$all_keys=array_keys($_POST);
$all_data_fields=['num_domains','shark','host'];
$all_data_fields_type=['INTEGER','INTEGER','STRING'];
$other_data=['REMOTE_ADDR','HTTP_USER_AGENT'];
$other_data_type=['STRING','STRING'];
$all_fields=array_merge($all_data_fields,$other_data);
$sqlite_type=array_merge($all_data_fields_type,$other_data_type);
$sqlite_list="";
$sqlite_field="";
$sqlite_values="";
foreach($all_data_fields as $k=>$dt){
    $sqlite_list.=$dt." ".$all_data_fields_type[$k].", ";
    $sqlite_field.=$dt.", ";
    if($all_data_fields_type[$k]=="STRING"){
        $sqlite_values.='"'.fix_inputs($_POST[$dt]).'", ';
    }else{
        $sqlite_values.=$_POST[$dt].', ';
    }
}
foreach($other_data as $k=>$dt){
    $sqlite_list.=$dt." ".$other_data_type[$k].", ";
    $sqlite_field.=$dt.", ";
    if($other_data_type[$k]=="STRING"){
        $sqlite_values.='"'.$_SERVER[$dt].'", ';
    }else{
        $sqlite_values.=$_SERVER[$dt].', ';
    }
}
$sqlite_list=trim($sqlite_list,", ");
$sqlite_field=trim($sqlite_field,", ");
$sqlite_values=trim($sqlite_values,", ");

$all_present=true;
$missing_fields = array_diff($all_data_fields, $all_keys);
if (count($missing_fields)==0){
    $email_db = new SQLite3($DB,SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
    $email_db->busyTimeout(1500);
    $email_db->exec('CREATE TABLE IF NOT EXISTS '.$table.' ('.$sqlite_list.');');
    $ins = $email_db->exec("INSERT INTO $table (".$sqlite_field.") VALUES(".$sqlite_values.")");
    $json_output.='"result":0, "msg":"okay"';
}else{
    $json_output.='"result":1, "msg":"missing data parts","missing":["'.implode('","',$missing_fields).'"]';
}
$json_output.="}";
echo $json_output;

function fix_inputs($val){
    if (is_array($val)){
        $o=implode(",",$val);
        return $o;
    }else{
     return $val;   
    }
}
?>