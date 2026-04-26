<html>
    <head><title>使用者管理</title></head><!-- 網頁標題 -->
    <body>
    <?php
        // 關閉錯誤訊息顯示
        error_reporting(0);
        // 啟動 session
        session_start();
        // 如果沒有登入
        if (!$_SESSION["id"]) {
            echo "請登入帳號";
            // 3 秒後跳回登入頁面
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{
            // 顯示頁面標題與功能連結
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            // 連接資料庫
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
            // 查詢 user 資料表所有資料
            $result=mysqli_query($conn, "select * from user");
            // 逐筆讀取資料並顯示
            while ($row=mysqli_fetch_array($result)){
                // 修改與刪除功能
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            // 結束表格
            echo "</table>";
        }
    ?> 
    </body>
</html>
