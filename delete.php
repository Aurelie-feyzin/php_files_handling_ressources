<?php
include('src/FileManager.php');
$fileManager = new FileManager();
if (isset($_GET['nameFile'])) {
    $fileManager->deleteFile($_GET['nameFile']);
}
if (isset($_GET['nameDirectory'])) {
    $fileManager->deleteDirectory($_GET['nameDirectory']);
}
header("Location: index.php");