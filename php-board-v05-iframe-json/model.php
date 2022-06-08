<?php

// *************************************
// データの書き込み
// *************************************
function write_data() {

    global $logfile;

    // データを一括読み込み
    $log_text = @file_get_contents( $logfile );

    $json = json_decode( $log_text );
    // 空のファイルかまたは、JSON データでは無い場合
    if ( $json === null ) {

        // JSON 用クラス作成
        $json = new stdClass;
        // 行データを格納する配列を作成
        $json->item = [];

    }

    foreach( $_POST as $key => $value ) {

        // HTML 要素を無効にする
        $_POST[$key] = htmlspecialchars( $value );

    }

    // 改行コードを \n のみ(1バイト)にする
    $_POST['body'] = str_replace("\r","",$_POST['body']);

    // 新しい投稿用のクラス作成
    $board_data = new stdClass;

    // text プロパティに 入力された本文をセット
    $board_data->text = $_POST['body'];
    // subject プロパティに 入力されたタイトルをセット
    $board_data->subject = $_POST['subject'];
    // name プロパティに 入力された名前をセット
    $board_data->name = $_POST['name'];
    // subject プロパティに 入力されたタイトルをセット
    $board_data->datetime = $_POST['datetime'];

    // 配列の先頭に 新しい投稿データをセット
    array_unshift($json->item, $board_data);

    // 全ての投稿データを JSON として一括書き込み
    file_put_contents( $logfile, json_encode( $json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) );



}

// *************************************
// データの読込み
// *************************************
function read_data() {

    global $logfile,$kensu;

    // 埋め込み用データを global 宣言
    global $log_text;

    // データを一括読み込み
    $log_data = @file_get_contents( $logfile );
    // ファイルが存在しない場合
    if ( $log_data === false ) {
        $log_text = "ここに投稿データが表示されます";
        return;
    }

    $json = json_decode( $log_data );
    // 空のファイルかまたは、JSON データでは無い
    if ( $json === null ) {
        $log_text = "ここに投稿データが表示されます";
        return;
    }

    $kensu = count($json->item);

    // 表示用の埋め込みに使用される文字列変数
    foreach( $json->item as $v ) {
    
        // **************************************
        // 本文の改行は br 要素で表現します
        // **************************************
        $v->text = str_replace("\n", "<br>\n", $v->text );

        // **************************************
        // 記事の境界を hr 要素で表現します
        // **************************************
        $v->text .= "<hr>\n";

        // **************************************
        // 行毎に表示 HTML を作成
        // **************************************
        $log_text .= "<div class='title'>【{$v->subject}】( {$v->name} : {$v->datetime} ) </div>" . $v->text;
    
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
