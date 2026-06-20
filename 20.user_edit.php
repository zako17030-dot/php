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
          // 執行 SQL 更新指令
          // 將該帳號(id)的密碼(pwd)更新為表單送出的新值
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            echo "修改錯誤";
          // 更新失敗時顯示錯誤訊息，並在 3 秒後導回列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }else{
          // 更新成功時顯示提示，並在 3 秒後導回列表頁
            echo "修改成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>
