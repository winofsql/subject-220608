<!DOCTYPE html>
<html lang="ja">
<head>
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <title>掲示板 v05 JSON</title>
    <link rel="stylesheet" href="client.css?_=<?= time() ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php require_once("iframe-css.php") ?>

<script>

$( function(){

    // フォーム送信イベント
    $("form").on("submit", function(){

        // 日付文字列をクライアントで作成して送信
        var dateNow = new Date();
        var dateString = 
            dateNow.getFullYear() + "/" + 
            ("0"+(dateNow.getMonth()+1)).slice(-2)+ "/" + 
            ("0"+(dateNow.getDate())).slice(-2);
        var timeString = 
            ("0"+(dateNow.getHours())).slice(-2) + ":" + 
            ("0"+(dateNow.getMinutes())).slice(-2) + ":" + 
            ("0"+(dateNow.getSeconds())).slice(-2);

        // hidden フィールドにセット
        $("#datetime").val( dateString + " " + timeString );

    });
});

</script>
</head>

<body>
<div id="bbs">
    <h3 class="alert alert-primary"><a href="control.php" style="color:black;">掲示板 ( JSON )</a></h3>
    <div id="content"
        >
        <form action=""
            target="myframe"
            method="POST">
            <div>
                <span class="title_entry">
                    タイトル
                </span>
                <input
                    type="text"
                    name="subject"
                    >
            </div>
            <div>
                <span class="title_entry">
                    名前
                </span>
                <input
                    type="text"
                    name="name"
                    >
            </div>
            <div>
                <textarea id="body" name="body"></textarea>
            </div>
            <div>
                <input type="submit" name="send" value="送信">
            </div>
            <input type="hidden" name="datetime" id="datetime">
        </form>
    </div>
</div>

<iframe id="extend" src="control.php?page=init" name="myframe"></iframe>

</body>
</html>
