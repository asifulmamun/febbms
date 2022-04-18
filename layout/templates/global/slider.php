<div class="gallery autoplay items-3">
  <div class="heading">
    <h1><?php echo $site_name; ?></h1>
    <h2><?php echo $site_description; ?></h2>
    <h4>Total Registered Donor</h4>
    <div class="circle">
      <p><?php echo countDonar('becomedonor'); ?></p>
    </div>
  </div>
  <?php
  
  
  function slider_count($path){
    global $img;
    
    $slider_img_path =  $img . $path;
    $slider_files = scandir($slider_img_path);
    $slider_images = array();

    foreach ($slider_files as &$slider_image_name) {
      $slider_images[] = $slider_image_name;
    }

    return count($slider_images);
  }
  
  // path set if exist uploaded by user eighter default images
  if(slider_count('uploads/slider/') > 2){
    $slider_path =  $img . 'uploads/slider/';
  } else{
   $slider_path =  $img . 'default/slider/';
  }

  $slider_files = scandir($slider_path);
  $slider_images = array();

  foreach ($slider_files as &$slider_image_name) {
    $slider_images[] = $slider_image_name;
  }

  $slider_images_count = count($slider_images);

  for ($i = 2; $i < $slider_images_count; $i++) {
    echo '<figure class="item"><h1><img src="' . $slider_path . $slider_images[$i] . '" /></h1></figure>';
  }
  ?>
  <!-- <div class="controls">
    <a href="#item-1" class="control-button">•</a>
    <a href="#item-2" class="control-button">•</a>
    <a href="#item-3" class="control-button">•</a>
  </div> -->
</div>