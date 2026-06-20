<?php
    error_reporting(0);
    // 啟動 Session
    session_start();
    if (!$_SESSION["id"]) {
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 連線至 MySQL 資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 準備 SQL 新增語法 (INSERT)
        // 從 $_POST 接收標題、內容、類型與時間，並寫入 bulletin 資料表
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        // 執行 SQL 指令並檢查結果
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";
        }
        else{
            // 新增成功，並在三秒後跳轉至佈告列表頁面 (11.bulletin.php)
            echo "新增佈告成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
