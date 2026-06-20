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
        // 根據網址參數 bid 準備刪除佈告的 SQL 指令
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        #echo $sql;
        // 執行 SQL 刪除指令，並檢查是否執行成功
        if (!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";
        }else{
            echo "佈告刪除成功";
        }
        // 無論刪除結果如何，三秒後自動跳轉回佈告欄列表頁
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
