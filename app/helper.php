<?php
 function send_msg($msg,$status,$code){
    return $res=[
        'status'=>$status,
        'message'=>$msg,
    ];
    return response()->json($res,$code);
 }

?>
