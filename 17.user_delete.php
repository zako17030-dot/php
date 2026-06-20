<?php
    error_reporting(0);
// 啟動 Session
    session_start();
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{ 
// 連線至 MySQL 資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
// 準備 SQL 刪除語法 (DELETE)
// 透過 $_GET["id"] 取得要刪除的使用者帳號
        $sql="delete from user where id='{$_GET["id"]}'";
// 執行 SQL 指令並檢查執行結果
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";
        }else{
            echo "使用者刪除成功";
        }
// 無論刪除成功與否，三秒後自動跳轉回使用者列表頁面 (18.user.php)
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
