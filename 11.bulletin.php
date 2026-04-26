<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 session
    session_start();
    // 如果 session 裡沒有 id，表示尚未登入
    if (!$_SESSION["id"]) {
        echo "請先登入";
        // 3 秒後跳回登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 顯示歡迎訊息與功能連結
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        // 建立資料庫連線
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 查詢 bulletin（佈告）資料表所有資料
        $result=mysqli_query($conn, "select * from bulletin");
        // 建立表格並顯示欄位名稱
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        // 逐筆讀取資料並顯示在表格中
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        // 結束表格
        echo "</table>";
    
    }

?>
