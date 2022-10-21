<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filerobot image editor</title>
</head>
<body>
    <h1>Image Editor</h1>
    <div id="images-container" style="width: 100%; margin-bottom: 50px; display: flex; flex-wrap:wrap;">
        <?php 
            foreach (scandir('./images') as $dir ) {
                if ($dir == "." || $dir == "..") {
                    continue;
                } ?>
        <div class="image-to-edit" style="width: 15%; margin-right: 10px; margin-bottom: 15px">
            <img src="./images/<?php echo $dir ?>" alt="img" style="width: 100%;">
            <?php echo $dir ?>
        </div>
        <?php    } ?>

    </div>

    <script src="./filerobot-image-editor/filerobot-image-editor.min.js"></script>
	<!--<script src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-image-editor/latest/filerobot-image-editor.min.js"></script>-->
    <script src="./index.js"></script>
</body>
</html>