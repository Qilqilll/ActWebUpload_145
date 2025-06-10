<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    $uploadOk = 0;
}

if ($uploadOk == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // Redirect langsung ke halaman daftar file
    header("Location: list_fileupload.php");
    exit();
} else {
    echo "File gagal diunggah. <a href='index.html'>Kembali</a>";
}
?>
