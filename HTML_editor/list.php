<?php
include("functions.php"); 
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 
    
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>

<?php
$page = "list";
$title = "List of SCOs | RECA SCO Editor";

include 'header.php';

?>

<?php
function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
} 


if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "The file you are trying to upload is not a .zip file. Please try again.";
	}
  
	$target_path = "uploads/".(safe_filename($filename)); 
  
  if(!is_writable("uploads/")) $message = "The upload folder is not writable.";
  else {
  	if(move_uploaded_file($source, $target_path)) {
  		$zip = new ZipArchive();
  		$x = $zip->open($target_path);
  		if ($x === true) {
    			$zip->extractTo("packages/". safe_filename(preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename)));
    			$zip->close();
          
          $message = "Your SCORM package was uploaded. You can now select it above.";
      	
  			//unlink($target_path);
  		}
  		
  	} else {	
  		$message = "There was a problem with the upload. Please try again.";
      //$message = $source;
  	}
  }
}

if (isset($_GET['delete'])) {
  if(is_dir("packages/".safe_filename($_GET['delete']))){
    
      rrmdir("packages/".safe_filename($_GET['delete']));
      //header("Location: list.php");
      //die("Redirecting to list.php"); 
      $message = "SCO successfully deleted.";
      
   
  } else {	
		$message = "Delete Error: Invalid SCO path.";
	}
}
?>

<script>

$(document).ready(function(){
    
 $('button[name="remove_levels"]').on('click', function(e) {
  var $form = $(this).closest('form');
  e.preventDefault();
  $('#confirm').modal({
      backdrop: 'static',
      keyboard: false
    })
    .on('click', '#delete', function(e) {
      $form.trigger('submit');
    });
  });
});
</script>

    

<div class="container m90">
<div class="row">
  <div class="col-xs-12">
    <h2>Available SCOs</h2>
    
    
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <b>Instructions: </b> Select the SCO you want to edit or upload a new one.
      
    </div>
    
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Package name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        
        <?php
    
        $directories = glob('packages' . '/*' , GLOB_ONLYDIR);
        for($i = 1; $i <= count($directories); $i++){   
            $folder = substr($directories[$i-1], 9); 
            //echo "&rarr; <a href='editor.php?sco=$folder'> ".$folder."</a><br>";
            echo "<tr><th scope='row'>".$i."</th><td>"."<a href='editor.php?sco=$folder'> ".$folder."</a></td>";
            
            echo "<td><form action='?delete=$folder' method='POST'>";
            echo '  <button class="btn btn-danger btn-sm" type="submit" name="remove_levels" value="delete">Delete</button>';
            echo '</form> </td></tr>';
            
        } 
        ?>
      </tbody>
    </table>
    
   
    
    <h3 class="m50">Upload SCORM package</h3>
    <form enctype="multipart/form-data" method="post" action="?">
    <label>Choose a zip file to upload: <br>
    <input type="file" name="zip_file" /></label>
    <br />
    <button type="submit" class="btn btn-primary" data-toggle="popover" title="Upload SCO" data-content="When you have selected SCO package, click the Upload button to see package in the available SCOs list above.">Upload</button>
    
    </form>
    <?php if($message): ?>
    <div class="alert alert-success alert-dismissible fade show m30" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <?php if($message) echo "$message"; ?>
    </div>
    <?php endif; ?>
  </div>


</div>
</div>



<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="preview_content">
        Deleting SCO can't be reversed.  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete">Delete</button> 
      </div>
    </div>
  </div>
</div>
  
<?php

include 'footer.php';

?>
