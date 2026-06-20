<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0);
    // 啟動 Session
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
    // 連線至 MySQL 資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
    // 根據網址傳遞的 id 參數，從資料庫查詢該使用者的詳細資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
    // 將查詢結果轉為關聯陣列，方便存取欄位資料
        $row=mysqli_fetch_array($result);
    // 顯示修改表單
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
