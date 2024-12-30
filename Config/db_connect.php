<?php


  $connect = mysqli_connect('localhost:3036','test','test','les delices de yasmine') ;
      if(!$connect) {
    echo 'connection error'.mysqli_connect_error() ;
       }
?>