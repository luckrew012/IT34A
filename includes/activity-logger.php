<?php
    function logActivity($pdo,$user_id,$email,$action, $status='success'){
    try{
        //get client ip add

$ip = $_SERVER['HTTP_X_FORWARED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

    //string to array
if (strpos($ip,',') !== false){
    $ip = trim(explode(',',$ip)[0]);
}
    //get user agent (browser)
$user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'unknown' , 0, 255);
    //application query #1
$stmt= $pdo->prepaare("
    INSERT INTO activity_logs(

    user_id,
    user_email,
    activity_log_action,
    activity_log_status,
    activity_log_ip_address,
    activity_log_user_agent,
    ) VALUES (?,?,?,?,?,?)

");

    } catch (PDOException $e){
error_log("Activity Log Error:" . $e->getMessage());
    }



}
?>