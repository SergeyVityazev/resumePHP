<?php
header ("Content-type: image/png");
$im = @imagecreate (150, 100) or die ("Не удается открыть новую картинку!");
$background_color = imagecolorallocate ($im, 255, 0, 0);
$text_color = imagecolorallocate ($im, 10, 14, 91);
imagestring ($im, 1, 5, 5,  "Hello !!!", $text_color);
imagepng ($im);
