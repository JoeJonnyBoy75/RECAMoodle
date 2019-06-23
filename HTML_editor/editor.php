<?php
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 
    
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>

<?php
$page = "editor";
$title = "Content Structure | RECA SCO Editor";

include 'header.php';

?>


<div class="container m90">
<div class="row">
  <div class="col-xs-12">
    
    <h1>SCO: <?php echo $_GET['sco'];?></h1>
    <h3>Topics List</h3>
    
    <?php
    
    function my_json_decode($s) {
        $s = str_replace("\n", "", $s);
        $s = str_replace("\r", "", $s);

        $s = preg_replace('/(sections):/i', '"\1":', $s);
        $s = preg_replace('/(sectiontitle):/i', '"\1":', $s);
        $s = preg_replace('/(content):/i', '"\1":', $s);
        
        
        //print_r($s);
        return json_decode($s);
    }
    
    
    
    
    if (isset($_GET['sco'])) {
        
        $sco = $_GET['sco'];
        
        $file = file_get_contents('packages/'. $sco . '/structure/services/unit.js', true);  
        $pos = strrpos ($file, ';');
        $file = substr($file,0,$pos);
        $pos = strrpos ($file, ';');
        $file = substr($file,0,$pos);
        $pos = strpos($file, 'return');  
        $json = substr($file,$pos+7);
        
        
        //var_dump(my_json_decode($json)); 
        
        $unit = my_json_decode($json);
        
        $directories = glob('packages/'. $sco . '/content' . '/section*' , GLOB_ONLYDIR);
        
        if($unit){
          for($i = 0; $i < count($directories); $i++){  
            
           
            echo "<b>".$unit->sections[$i]->sectiontitle."</b><br>";
            
            
            $files = glob($directories[$i] . '/content*');
            
            for($j = 0; $j < count($unit->sections[$i]->content); $j++){ 
              $url='packages/'. $sco . '/content' . '/section' . $i . '/content' . ($j+1) . '.html'; 
              echo "&nbsp;&nbsp;&nbsp;&nbsp;&rarr; <a href='file.php?file=$url&sco=$sco'> ".$unit->sections[$i]->content[$j]."</a> <br>";
            }
            
          }
        
        }
        else{
            foreach($directories as $dir){  
        
       
                echo "<b>/".end(explode('/', $dir))."</b><br>";
                
                $files = glob($dir . '/content*');
                
                foreach($files as $file){  
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&rarr; <a href='file.php?file=$file&sco=$sco'> ".end(explode('/', $file))."</a> <br>";
                }
                
            }
        
        }
        
        
        
    ?>
    
    <br>
    <h3>Activities</h3>
    
    <?php
        
        
        $activities = glob('packages/'. $sco . '/activities/services' . '/activity*' );
        
    
        foreach($activities as $file){  
          echo "&rarr; <a href='file.php?file=$file&sco=$sco'> ".end(explode('/', $file))."</a> <br>";
        }
            
        
        
    ?>    
        
         
        <br><br>

        <a href="<?php echo 'packages/'. $sco;?>/index.html" target="_blank" role="button" class="btn btn-secondary" style="" data-toggle="popover" title="Verify Changes" data-content="See your recent changes in the context of the online course.">Verify Changes</a>        
        <input type="button" class="btn btn-primary" onclick="location.href='zip.php?path=<?php echo $sco;?>'" value="Download SCO as Zip File" data-toggle="popover" title="Download SCO" data-content="If you are happy with your recent changes, download the SCO package to your computer."/>
        <input type="button" class="btn btn-info" onclick="location.href='list.php'" value="Return to List of SCOs" data-toggle="popover" title="Return" data-content="Return to the main menu of SCO packages you have uploaded."/>
        
        <br><br>
        
        
    <?php    
        
    }else{
        echo "The SCORM package name specified is not valid.";
    }
    
    ?>
    
  </div>


</div>
</div>
  
<?php

include 'footer.php';

?>
