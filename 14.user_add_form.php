<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    error_reporting(0);
    session_start();
    if (!$_SESSION["id"]) {
      // 檢查是否有登入
        echo "請登入帳號";
      // 若未登入，等待 3 秒後自動跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{ 
      // 若已登入，顯示新增使用者的表單
      // 將資料傳送至 15.user_add.php 進行處理
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
