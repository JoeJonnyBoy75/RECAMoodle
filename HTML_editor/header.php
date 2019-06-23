<?php

    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200, initial-scale=1.0, user-scalable=yes">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    


    <META NAME="author" content="Media Learning Systems Inc.">
    <META NAME="country" CONTENT="Canada">
    <META NAME="coverage" CONTENT="Worldwide">
    <META NAME="copyright" CONTENT="Copyright (c) 1995-2017 medialearningsystems.com">
    
    
    <meta name="robots" content="noindex,nofollow">
    <link href="favicon.ico" rel="SHORTCUT ICON">
    <link rel="icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png"/>
    
    
    <?php
    
    
    if (isset($title) && !empty($title)) {
       echo "<title>".$title."</title>";
       }
    else{
       echo "<title>MediaLearningSystems.com</title>";
    }
    ?>
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    
            
    
    
    <script src="js/jquery-2.1.0.min.js"></script>  
    
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<!--     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
    
    <script src="js/bootstrap.min.js"></script>
    
    
    
    <script src='tinymce/tinymce.min.js'></script>
    <script>
    
    </script> 
    
    
    
    
    <script>
      $(document).ready(function(){
           $('[data-toggle="popover"]').popover({
              trigger: 'hover',
              placement: 'top',
              delay: { "show": 2000, "hide": 100 }

           })
           
      
      });
    </script>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <span class="navbar-brand" href="#">RECA SCO Editor</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($page == "home") echo "active"; ?>" >
            <a class="nav-link" href="index.php">Home </a>
          </li>
          <li class="nav-item <?php if($page == "list") echo "active"; ?>" >
            <a class="nav-link" href="list.php">List of SCOs </a>
          </li>
          <li class="nav-item <?php if($page == "help") echo "active"; ?>" >
            <a class="nav-link" href="help.php">Help</a>
          </li>
 
 
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
        <div class="form-inline my-2 my-lg-0 username">
                     
          <?php 
            if(!empty($_SESSION['user'])){
                echo 'Logged in as: '.$_SESSION['user'] .'&nbsp;&nbsp;<a class="btn btn-primary btn-sm" href="logout.php" role="button">Log Out</a>'; 
            } 
            else{
                echo 'Not logged in';
            }
          ?>
          
        </div>
      </div>
    </nav>

    <div class="clearfix">
     
    </div>  

