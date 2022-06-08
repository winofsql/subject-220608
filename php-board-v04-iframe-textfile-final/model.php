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

// *************************************
// データの読込み
// *************************************
function read_data( $dataFile ) {

    global $kensu,$line_data;

    // *************************************
    // ファイルの読込み( A )
    // テキストファイルを読み込んで行を要素とした配列にする
    // *************************************
    $posts = @file($dataFile, FILE_IGNORE_NEW_LINES);
    
    // 配列を逆順に変換する( 最後に追加した行が先頭になる )
    if ( $posts !== FALSE ) {
        $posts = array_reverse($posts);
    }
    else {
        // ファイルが無い場合空の配列
        $posts = array();
    }

    $kensu = count($posts);

    // *************************************
    // 画面用データの作成( B )
    // *************************************
    if ( $kensu != 0 ) {
        foreach ($posts as $post) {
            $lines = explode( "\t", $post );

            $message = htmlspecialchars( $lines[0] );
            $user = htmlspecialchars( $lines[1] );
            $time_stamp = $lines[2];
            $body = $lines[3];

            $line_data .= "<li>{$message} {$user} - {$time_stamp} <br>{$body}</li>";
        }
    }
    else {
        $line_data .= '<li>投稿データはありません</li>';
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
