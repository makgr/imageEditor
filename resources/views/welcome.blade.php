<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Filerobot image editor</title>
</head>
<body>
    <h1>Image Editor</h1>
    
    <div style="width: 100%; margin-bottom: 50px; display: flex; flex-wrap:wrap;">
        <?php 
          $handle = opendir(public_path('images'));
          while (false !== ($dir = readdir($handle))) {
                if ($dir == "." || $dir == "..") {
                    continue;
                } ?>
        <div id="" class="image-to-edit" style="width: 20%; margin-right: 10px; margin-bottom: 15px">
            <img src="{{asset('images')}}/<?php echo $dir ?>" alt="img" style="width: 100%;">
            <?php echo $dir ?>
        </div>
        <?php    } ?>

    </div>
    <div id="image-editor" style="width: 100%;height: 500px;margin: 0 auto;"></div>

    <script src="{{asset('filerboot/filerobot-image-editor/filerobot-image-editor.min.js')}}"></script>
	<!--<script src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-image-editor/latest/filerobot-image-editor.min.js"></script>-->
    <script src="{{asset('filerboot/index.js')}}"></script>
</body>
</html>