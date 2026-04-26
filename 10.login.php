<?php
   // mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
   // mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   // mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   while ($row=mysqli_fetch_array($result)) {
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;
     }
   }
   // 如果登入成功
   if ($login==TRUE) {
    session_start();
    // 將使用者帳號存入 session
    $_SESSION["id"]=$_POST["id"];
    echo "登入成功";
    // 3 秒後自動跳轉到 bulletin 頁面
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }

  else{
    // 顯示錯誤訊息
    echo "帳號/密碼 錯誤";
    // 3 秒後返回登入頁面
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
