<?php
$filename = 'compteur.txt';
$visitors = array();
$referent = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'no definied'; 
if(file_exists($filename)){
    $visitors = unserialize( file_get_contents($filename) );

  
if(isset($visitors[$_SERVER['REMOTE_ADDR']]) ){

 $nb=$visitors[ $_SERVER['REMOTE_ADDR']  ] [1] ;
 $first=$visitors[ $_SERVER['REMOTE_ADDR']  ] [2] ;
 $firstRef=$visitors[ $_SERVER['REMOTE_ADDR']  ] [3] ;

 if (!in_array($referent, $firstRef ))
 {
      array_push($firstRef, $referent );
  }

 
 $nb++; 
 }
 else{
  $firstRef= [ $referent ];
  $nb =1;
  $first = time();
 }

 $visitors[ $_SERVER['REMOTE_ADDR']]= array( 
    time(),
    $nb,
    $first,
   $firstRef
    );


 file_put_contents( $filename, serialize($visitors) );
}
