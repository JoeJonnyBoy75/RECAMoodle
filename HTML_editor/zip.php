<?php

include('functions.php');

class HZip 
{ 
  /** 
   * Add files and sub-directories in a folder to zip file. 
   * @param string $folder 
   * @param ZipArchive $zipFile 
   * @param int $exclusiveLength Number of text to be exclusived from the file path. 
   */ 
  private static function folderToZip($folder, &$zipFile, $exclusiveLength) { 
    $handle = opendir($folder); 
    if ($handle === false) {
        echo 'Failed to zip: ' . $folder;
        exit;
    }
    while (false !== $f = readdir($handle)) { 
      if ($f != '.' && $f != '..') { 
        $filePath = "$folder/$f";
        
        
        // Remove prefix from file path before add to zip.
        $localPath = substr($filePath, $exclusiveLength); 
        //echo $localPath;
        if (is_file($filePath)) { 
          $zipFile->addFile($filePath, $localPath); 
        } elseif (is_dir($filePath)) { 
          // Add sub-directory. 
          $zipFile->addEmptyDir($localPath); 
          self::folderToZip($filePath, $zipFile, $exclusiveLength); 
        } 
      } 
    } 
    closedir($handle); 
  } 

  /** 
   * Zip a folder (include itself). 
   * Usage: 
   *   HZip::zipDir('/path/to/sourceDir', '/path/to/out.zip'); 
   * 
   * @param string $sourcePath Path of directory to be zip. 
   * @param string $outZipPath Path of output zip file. 
   */ 
  public static function zipDir($sourcePath, $outZipPath) 
  { 
    $pathInfo = pathInfo($sourcePath); 
    $parentPath = $pathInfo['dirname']; 
    
    $dirName = $pathInfo['basename']; 
    $z = new ZipArchive(); 
    $z->open($outZipPath, ZIPARCHIVE::CREATE); 
    self::folderToZip($sourcePath, $z, strlen("$parentPath/".$dirName) + 1); // added $dirName to the strlen to remove the top folder in zip 
    $z->close(); 
  } 
} 
  
$base_name = safe_filename(basename($_GET['path'])); 
if (!$base_name || $base_name == '.') {
    exit(-1);
}
$folder_name = 'packages/' . $base_name;

$file_path = 'uploads/'.$base_name.'.zip';
if (file_exists($file_path)) { unlink ($file_path); }

HZip::zipDir($folder_name, $file_path); 



header('Content-Type: application/zip');
header("Content-Disposition: attachment; filename='$folder_name.zip'");
header('Content-Length: ' . filesize($zipname));
header("Location: $file_path");   
