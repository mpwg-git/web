<?php
// Original image
$original_image = 'nature.jpg';
$new_image = 'nature1.jpg';
$image_quality = '95';

// Get dimensions of the original image
list( $current_width, $current_height ) = getimagesize( $original_image );

// Get coordinates x and y on the original image from where we
// will start cropping the image, the data is taken from the hidden fields of form.
$x1 = $_POST['x1'];
$y1 = $_POST['y1'];
$x2 = $_POST['x2'];
$y2 = $_POST['y2'];
$width = $_POST['width'];
$height = $_POST['height'];     
// print_r( $_POST ); die;

// Define the final size of the image here ( cropped image )
$crop_width = 400;
$crop_height = 400;
// Create our small image
$new = imagecreatetruecolor( $crop_width, $crop_height );
// Create original image
$current_image = imagecreatefromjpeg( $original_image );
// resampling ( actual cropping )
imagecopyresampled( $new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $width, $height );
// this method is used to create our new image
imagejpeg( $new, $new_image, $image_quality );

