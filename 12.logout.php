<?php
    // 啟動 session
    session_start();
    // 刪除 session 中儲存的使用者帳號
    unset($_SESSION["id"]);
    // 顯示登出成功訊息
    echo "登出成功....";
    // 3 秒後自動跳轉回登入頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";

?>
