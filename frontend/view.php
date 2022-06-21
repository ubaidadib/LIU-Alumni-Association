<?php
$filename=$_GET['filename'];
$file_path='../frontend/pdf_files/'.$_REQUEST['filename'];
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file_path));
header('Accept-Ranges: bytes');
@readfile($file_path);
?>