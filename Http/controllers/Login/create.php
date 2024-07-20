<?php
    view('Login/create.view.php',[
      'errors'=>$_SESSION['_flash']['errors'] ?? []
  ]);
 