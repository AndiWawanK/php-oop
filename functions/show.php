<?php

  require_once "library.php";
  $data = new Library();
  $mhsw = $data->view_data();

  while ($u = $mhsw->fetch(PDO::FETCH_OBJ)){
    echo json_encode($u);
  }
