<?php

error_reporting(0);
// 啟動 Session
session_start();
// 檢查 Session 中是否有 ID
if (!$_SESSION["id"]) {
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else{    
// 建立與 MySQL 資料庫的連線
// 參數依序為：主機位址、帳號、密碼、資料庫名稱
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
// 準備 SQL 新增語法 (INSERT)
// 直接將 $_POST 資料代入字串，存在 SQL Injection 安全風險
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
// 執行 SQL 指令並檢查是否成功
   if (!mysqli_query($conn, $sql)) {
     echo "新增命令錯誤";
   }
   else{
     echo "新增使用者成功，三秒鐘後回到網頁";
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
   }
}
?>
