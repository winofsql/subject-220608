<?php

// *************************************
// データの書き込み
// *************************************
function write_data() {

    global $dataFile;

    $message = trim($_POST["message"]);
    $user = trim($_POST["user"]);

    if ($message !== "") {

        if ( $user == "" ) {
            $user = "匿名で投稿";
        }

        // データの区切り文字をスペース化する
        $message = str_replace("\t", ' ', $message);
        $user = str_replace("\t", ' ', $user);

        $time_stamp = date('Y-m-d H:i:s');
        
        // 本文から改行とタブを排除
        $body = str_replace("\t", ' ',$_POST["body"]);
        $body = str_replace("\r\n", '<br>',$body);
        $body = str_replace("\n", '<br>',$body);

        $newData = "{$message}\t{$user}\t{$time_stamp}\t{$body}\n";

        // ファイルに書き込み
        $fp = fopen($dataFile, 'a');
        fwrite($fp, $newData);
        fclose($fp);

        //header('Location: control.php');
        //exit;
    }
}


// **************************
// デバッグ表示
// **************************
function debug_print() {

    print "<pre class=\"m-5\">";
    print_r( $_GET );
    print_r( $_POST );
    print_r( $_SESSION );
    print "</pre>";

}

?>
