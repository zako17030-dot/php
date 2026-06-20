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
        // 根據 URL 傳遞的 bid 查詢對應的佈告內容
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        $row=mysqli_fetch_array($result);
        // 初始化 Radio 按鈕狀態變數
        $checked1="";
        $checked2="";
        $checked3="";
        // 根據資料庫中的 type 值，決定哪個類型的 Radio 按鈕需要預設選中 (checked)
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";
        // 輸出修改表單，並將資料庫撈出的內容預填在輸入框中
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
