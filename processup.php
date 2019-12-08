<?php
if (!isset($_FILES["skin"])) {
    die();
}
if ($_FILES["skin"]["error"] > 0) {
    if ($_FILES["skin"]["error"] == 4) {
        die("请选择图片！<a href=\"https://labs.blw.moe/mcsanta\">返回</a>");
    }
    if ($_FILES["skin"]["error"] == 2) {
        die("你确定选的是皮肤吗？回去重选！<a href=\"https://labs.blw.moe/mcsanta\">返回</a>");
    }
    echo "Error:" . $_FILES["skin"]["error"] . "，请联系开发者";
} else {
    $timestamp = time();
    $random = mt_rand();
    $filename = $timestamp . $random;
    move_uploaded_file($_FILES["skin"]["tmp_name"], realpath(dirname(__FILE__)) . "/tmp/" . $filename . ".png");
    $template = imagecreatefrompng(realpath(dirname(__FILE__)) . "/template.png");
    imageAlphaBlending($template, true);
    imageSaveAlpha($template, true);
    $userskin = imagecreatefrompng(realpath(dirname(__FILE__)) . "/tmp/$filename.png");
    if (imagesx($userskin) != 64) {
        die("你确定选的是皮肤吗？回去重选！<a href=\"https://labs.blw.moe/mcsanta\">返回</a>");
    } elseif (imagesy($userskin) != 64 && imagesy($userskin) != 32) {
        die("你确定选的是皮肤吗？回去重选！<a href=\"https://labs.blw.moe/mcsanta\">返回</a>");
    }
    echo ("处理中，请稍候...");
    imageAlphaBlending($userskin, true);
    imageSaveAlpha($userskin, true);
    imagecopy($userskin, $template, 0, 0, 0, 0, 64, 64);
    imagepng($userskin, realpath(dirname(__FILE__)) . "/tmp/$filename-santa.png");
    header('Location: https://labs.blw.moe/mcsanta?file=' . $filename);
}
?>