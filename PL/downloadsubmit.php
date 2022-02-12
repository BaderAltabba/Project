<?php
error_reporting(0);
ini_set('display_errors', 0);
include 'data.php';
if(isset($_GET['file_id']))
{
$id = $_GET['file_id'];

$sql="SELECT * FROM submited_files WHERE id=$id";
$result = mysqli_query($con,$sql);
$file = mysqli_fetch_assoc($result);
$filepath = 'submits/' . $file['image'];

if(file_exists($filepath)){
    header('Content-Type:application/octet-stream');
    header('Content-Description:File Transfer');
    header("Content-Transfer-Encoding: Binary");
    header('Content-Disposition:attachment; filename=' .basename($filepath));
    header('Expires:0');
    header('Cache-Control: must-revalidate');
    header('Pragma:public');
    header('Content-Length:' . filesize('submits/' .$file['image']));
    readfile('submits/' .$file['image']);

    exit;
}


}



?>