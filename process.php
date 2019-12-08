<?php
if (!isset($user)) {
    die();
}
$player = "https://api.mojang.com/users/profiles/minecraft/" . $user;
$playerjson = file_get_contents($player);
$decodejson = json_decode($playerjson);
$uuid = ($decodejson->id);
function statu($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 1);
    curl_setopt($curl, CURLOPT_NOBODY, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    $skin = curl_exec($curl);
    $rtn = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return $rtn;
}
if (statu('https://crafatar.com/skins/' . $uuid) == 422) {
    die('<p class="center">该玩家不存在</p>');
}
$skin = file_get_contents('https://crafatar.com/skins/' . $uuid);
if (isset($_GET['refresh']) && $user != "") {
    unlink(realpath(dirname(__FILE__)) . "/tmp/$user-santa.png");
    unlink(realpath(dirname(__FILE__)) . "/tmp/$user.png");
}
if (!file_exists(realpath(dirname(__FILE__)) . "/tmp/" . $user . "-santa.png")) {
    $file = fopen(realpath(dirname(__FILE__)) . "/tmp/$user.png", "w");
    fwrite($file, $skin);
    fclose($file);
    $template = imagecreatefrompng(realpath(dirname(__FILE__)) . "/template.png");
    imageAlphaBlending($template, true);
    imageSaveAlpha($template, true);
    $userskin = imagecreatefrompng(realpath(dirname(__FILE__)) . "/tmp/$user.png");
    imageAlphaBlending($userskin, true);
    imageSaveAlpha($userskin, true);
    imagecopy($userskin, $template, 0, 0, 0, 0, 64, 64);
    imagepng($userskin, realpath(dirname(__FILE__)) . "/tmp/$user-santa.png");
}
?>