<?php

$file_name   = $_FILES["file_name"]["name"];
$target_file = "uploads/" . $file_name;
$temp_file   = $_FILES["file_name"]["tmp_name"];

$allowed   = ['jpg', 'png'];
$extension = pathinfo($file_name, PATHINFO_EXTENSION);

if ( ! in_array($extension, $allowed) )
{
    die("The format is not correct. You may only upload: " . implode(", ", $allowed));
}

$max_size_mb = 0.5;
$max_size_kb = $max_size_mb * 1024 * 1024;

if ( $_FILES["file_name"]["size"] > $max_size_kb )
{
    die("The file size is too large. You may only upload up to: " . $max_size_mb . "MB");
}

move_uploaded_file($temp_file, $target_file);

echo "Your image was successfully uploaded.";