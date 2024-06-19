<?php 

// Enregistrer des fichiers
if (isset($_FILES["edt"])) {
    $filename = $_FILES["edt"]["name"]; 
    $tempname = $_FILES["edt"]["tmp_name"]; 
    $folder = "view/assets/docs/edt/".$filename; 
    move_uploaded_file($tempname,$folder);
} elseif (isset($_FILES["course_material"])) {
    $filename = $_FILES["course_material"]["name"]; 
    $tempname = $_FILES["course_material"]["tmp_name"]; 
    $folder = "view/assets/docs/course_materials/".$filename; 
    move_uploaded_file($tempname,$folder);
}

?>