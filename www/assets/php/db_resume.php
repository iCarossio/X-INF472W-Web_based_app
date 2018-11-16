<?php

include("../../../private/db_connection.php");
//include("db_connection.php");

if (isset($_GET['table']) AND isset($_GET['userid'])){

  switch($_GET['table']){
    
    case 'education':
      $sql = "SELECT * FROM education WHERE userid=? ORDER BY dates DESC";
      break;

    case 'experiences':
      $sql = "SELECT * FROM experiences WHERE userid=? ORDER BY dates DESC";
      break;

    case 'skills_pro':
      $sql = "SELECT * FROM skills_pro WHERE userid=?";
      break;

    case 'skills_info':
      $sql = "SELECT * FROM skills_info WHERE userid=?";
      break;

    case 'skills_com':
      $sql = "SELECT * FROM skills_com WHERE userid=? ORDER BY percentage DESC";
      break;

    case 'details':
      $sql = "SELECT * FROM details WHERE userid=?";
      break;

    default:
      die;
      break;
  }

  $req=$cnx->prepare($sql);
  $req->execute(array($_GET['userid']));

  $result = array();
  $index = 0;

  while ($data = $req->fetch()){
      foreach($data as $key => $data_el){
           $data[$key] = htmlspecialchars($data[$key]);
      }
      $data['id'] = $index;
      array_push($result, $data);
      $index++;
  }

  function utf8ize($d) {
    if (is_array($d)) {
       foreach ($d as $k => $v) {
         $d[$k] = utf8ize($v);
       }
    } else if (is_string ($d)) {
       return utf8_encode($d);
    }
     return $d;
  }

  // En prod
  //echo json_encode(utf8ize($result));

  // En développement : 
  echo json_encode($result);

}

