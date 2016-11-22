<?php
$DB = "db/sooni.db";
//print_r($_POST);
$json_output="{";
if (array_key_exists('email_id',$_POST)){
    if (!empty($_POST['email_id'])){
        $email = filter_var($_POST['email_id'], FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (array_key_exists("geo",$_POST)){
                $geo_lat=$_POST["geo"]["latitude"];
                $geo_lng=$_POST["geo"]["longitude"];
                $geo_acc=$_POST["geo"]["accuracy"];
            }else{
                $geo_lat=0;
                $geo_lng=0;
                $geo_acc=0;
            }
            $submit_date = date('Y-m-d H:i:s');
            $email_db = new SQLite3($DB,SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
            $email_db->busyTimeout(1500);
            $email_db->exec('CREATE TABLE IF NOT EXISTS email (email STRING, date STRING, valid INTEGER, lat NUMERIC, long NUMERIC, accuracy NUMERIC ,PRIMARY KEY(email));');
            $ins = $email_db->exec("INSERT OR IGNORE INTO email (email, date, valid, lat, long, accuracy) VALUES('".$email."', '".$submit_date."', 0, '".$geo_lat."', '".$geo_lng."', '".$geo_acc."' )");
            $email_db->close();
            $json_output.='"result":0,"msg":"okay"';
        }else{
            $json_output.='"result":1,"msg":"bad email"';
        }
    }else{
        $json_output.='"result":3,"msg":"malformed input"';
    }
}else{
    $json_output.='"result":2,"msg":"blank input"';
}
$json_output.="}";
echo $json_output;
?>