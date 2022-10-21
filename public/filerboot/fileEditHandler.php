<?php
$imageFile = $_FILES['imageFile'];
$imageName = $_POST['imageName'];

$editedImage = file_get_contents($imageFile['tmp_name']);
file_put_contents($imageName, $editedImage);

// to upload to the server
// move_uploaded_file($imageFile['tmp_name'], 'image-name-to.ext');

echo json_encode(['msg'=>'done']);