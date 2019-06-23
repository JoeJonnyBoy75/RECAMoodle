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
$page = "file";
$title = "File Editor | RECA SCO Editor";

include 'header.php';
include 'functions.php';

if (safe_filename($_GET['sco']) != $_GET['sco']) {
    echo('Invalid SCO.');
    exit(-1);
}

?>




  <script>
  $(document).ready(function(){
    

    var url = 'functions.php';
    $("#save").click(function() {  
        tinyMCE.triggerSave();
        var img_folder = "packages/<?php echo $_GET['sco'].'/content/img/'; ?>";
        var html = $('#html_content').val();
        var regex = new RegExp(img_folder, "gi");
        var img_parsed_html = html.replace(regex, "content/img/");  
        //alert(img_parsed_html);
        $.ajax({
            url : url,
            type: 'post',
            data : {
                filename : $("#filename").val(),
                action : 'save',
                content : encodeURIComponent(img_parsed_html)
            }  ,
            success : function() {
                $("#feedback").html("File saved successfully!");
                $("#box").show();
            }   ,
        });
    });
    $("#delete").click(function() {
        $.ajax({
            url : url,
            type: 'post',
            data : {
                filename : $("#filename").val(),
                action : 'delete'
            }
        });
    });
    $("#load").click( function() {
        $.ajax({
            url : url,
            type: 'post',
            data : {
                filename : $("#filename").val(),
                action : 'load'
            },
            success : function(html) {
                $("#html_content").val(html);
            }   ,
            error: function(){
                 alert('error');
            }
        });
    });
    
    $("#preview").click( function() {
        $('#exampleModal').modal('show');
        tinyMCE.triggerSave();
        $.ajax({
            url : url,
            type: 'post',
            data : {
                filename : $("#filename").val(),
                action : 'save',
                content : encodeURIComponent($('#html_content').val())
            }  ,
            success : function() {
            
            $.ajax({
                url : url,
                type: 'post',
                data : {
                    filename : $("#filename").val(),
                    action : 'load'
                },
                success : function(html) {
                    
                    $("#preview_content").html(html);
                }   ,
                error: function(){
                     alert('error');
                }
            });
              
                
            }   ,
        });
        
        
    });
    
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $("#feedback").html(data);
                $("#box").show();
            },
            error: function(data){
                $("#feedback").html(data);
                $("#box").show();
            }
        });
    }));
    


    var filename = getUrlParameter('file');
    $("#filename").val(filename);
    $("#filenamespan").text(filename);
    $("#box").hide();
    
    
    
    $.ajax({
          url : url,
          type: 'post',
          data : {
              filename : $("#filename").val(),
              action : 'load'
          },
          success : function(html) {
              var img_folder = "packages/<?php echo $_GET['sco'].'/content/img/'; ?>";
              var img_parsed_html = html.replace(/content\/img\//gi, img_folder);    
              
             
              $("#html_content").val(img_parsed_html);
              if(filename.slice(-2) != "js"){
                tinymce.init({
                  selector: '#html_content',
                  imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions" ,

                  images_upload_url: "upload.php?folder="+img_folder,
                  //images_upload_base_path: '/some/basepath',
                  images_upload_credentials: true,
                  height: 500,
                  theme: 'modern',
                  plugins: 'mathjax code print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
                  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat code | asciimath asciimathcharmap toggleMath superscript subscript',
                  image_advtab: true,
                  templates: [
                    { title: 'Test template 1', content: 'Test 1' },
                    { title: 'Test template 2', content: 'Test 2' }
                  ],
                  content_css: [
                    'css/main.css',
                    'fonts/font-istok-web.css',
                    
                  ]
                 });
               

              }
              //tinyMCE.remove();
          }   ,
          error: function(){
               alert('error');
          }
      });
    
  });
  var getUrlParameter = function getUrlParameter(sParam) {
          var sPageURL = decodeURIComponent(window.location.search.substring(1)),
          sURLVariables = sPageURL.split('&'),
          sParameterName,
          i;
  
      for (i = 0; i < sURLVariables.length; i++) {
          sParameterName = sURLVariables[i].split('=');
  
          if (sParameterName[0] === sParam) {
              return sParameterName[1] === undefined ? true : sParameterName[1];
          }
      }
  };
  </script>
  

<div class="container m90">
<div class="row">
  <div class="col-xs-12">
  
    <h2>File Editor</h2>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:right;">See Help</button>  -->    
    <p><b>File:</b> <span id="filenamespan"></span></p>
    <input type="hidden" size="100" id="filename" value="undefined">
    
    <textarea id="html_content" style="width:1000px;height:500px;">Content not loaded.</textarea> 
    <div id="box" class="alert alert-success fade show m30" role="alert">
      
      <span id="feedback"> </span>
    </div>
    <br>
    <button type="button" id="save" class="btn btn-primary" data-toggle="popover" title="Save File" data-content="If you are happy with your edits, click the save button to make them permanent.">Save</button> 
    <!-- <button type="button" class="btn btn-primary" id="preview">Save & Preview</button> -->
    <button type="button" onclick="location.href='editor.php?sco=<?php echo $_GET['sco']; ?>'"class="btn btn-secondary" data-toggle="popover" title="Return" data-content="Return to the main course menu of topics in the current SCO.">Return to Topics List</button>
   
    <br>
   
    
                                   
  </div>


</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">How to use the editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="preview_content">
        Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

    
  
<?php

include 'footer.php';

?>
