<?php

// XSS対策用関数
function h ($value) {
    return htmlspecialchars($value,ENT_QUOTES);
}


// LOGIN認証チェック関数
// セッションチェック(前ページのSESSION_IDと現在のsession_idを比較)
function loginCheck(){
    if(
        !isset($_SESSION["chk_ssid"]) || 
         $_SESSION["chk_ssid"] != session_id()
        ){
          echo "LOGIN ERROR";
          exit();
        }else{
          // sessionハイジャック対策
          session_regenerate_id(true);
          $_SESSION["chk_ssid"] = session_id();
    }
}


?>