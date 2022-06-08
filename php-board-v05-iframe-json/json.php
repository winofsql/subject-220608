<?php
require_once("setting.php");

header( "Content-Type: text/plain; charset=utf-8" );

$log_data = @file_get_contents( "./board.json" );

// print $log_data;

$json = json_decode( $log_data );

print "\n";

// print_r( $json );

// print "\n";

// print_r( $json->item );

print "{$json->item[1]->subject}\n";
print "{$json->item[1]->name}\n";

?>
