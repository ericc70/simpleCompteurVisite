<?php
$filename = 'compteur.txt';
$visitors = array();
 
if(file_exists($filename)){
    $visitors = unserialize( file_get_contents($filename) );

  
if(isset($visitors[$_SERVER['REMOTE_ADDR']]) ){

$nb=$visitors[ $_SERVER['REMOTE_ADDR']  ] [1] ;
$first=$visitors[ $_SERVER['REMOTE_ADDR']  ] [2] ;
$nb++; 
}
else{$nb =1;
$first = time();
}

$visitors[ $_SERVER['REMOTE_ADDR']]= array( 
   time(),
   $nb,
   $first
   );


file_put_contents( $filename, serialize($visitors) );
}
