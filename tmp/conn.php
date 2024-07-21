<?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '12345678';
    $db_name = 'cmuh crs cancer database';

    $link = new mysqli($server_name, $username, $password, $db_name);
    if(!$link){
      echo "<script>
      alert('無法開啟資料庫! 請洽丁主任。'); 
      window.location = 'index.html';
      </script>";
    }

    $link->query('SET NAMES UTF8'); 
    $link->query('SET time_zone = "+8:00"'); 
?>