<?php     
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 
    //$username = ''; 
    if(!empty($_POST)){ 
        $username = $_POST['username'];
        if($_POST['username'] == 'admin' && $_POST['password'] == 'reca01'){
             $login_ok = true;
        }

        if($login_ok){ 
            $_SESSION['user'] = $username;  
            header("Location: list.php"); 
            die("Redirecting to: list.php"); 
        } 
        else{ 
            $message = "Login failed.";
            $username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?> 

<?php
$page = "home";
$title = "RECA SCO Editor";

include 'header.php';

?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <img src="images/RECA-logo-finalscreen.png" style="max-width: 200px; width:40%;float:right;">
    <h1 class="display-3">Welcome to the RECA SCO Editor!</h1>

    <p>&nbsp; </p>
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Instructions &raquo;</a></p> -->
  </div>
</div>

<div class="container">
<div class="row">
  <!-- <div class="col-md-4">
    <h2>New features</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
  </div>
  <div class="col-md-4">
    <h2>Other info</h2>
    <p>We can have some text here or just center the login form. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
  </div> -->
  <div class="col-sm-8 ml-sm-auto col-md-4 ml-md-auto mx-auto">
    

    
    <?php if(!empty($_SESSION['user'])):  ?>
    
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Logged in</h4>
        <p>You are logged in as. <?php echo $_SESSION['user'];  ?></p>
        <hr>
        <p class="mb-0"><a class="btn btn-primary btn-sm" href="logout.php" role="button">Log Out</a></p>
      </div>
    
    <?php else: ?>
      <h2 class="form-signin-heading">Please sign in</h2>  
      <form action="index.php" method="post" class="form-signin"> 
      <div class="alert alert-warning alert-dismissible fade show" <?php if(!$message) echo "style='display: none;'"; else echo "style='display: block;'"; ?> role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Login failed.</strong> Check your credentials and try again.
      </div>               
      <label for="username" class="sr-only">Username</label>
      <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus value="<?php echo $username; ?>" >
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
     
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <?php endif; ?>
  
    
  </div>
</div>
</div>
  
<?php

include 'footer.php';

?>