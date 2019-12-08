<p class="center">
	<a class="center" href="<?php echo " https://labs.blw.moe/mcsanta/tmp/".$user; ?>-santa.png">点击这里下载你的圣诞皮肤！</a>
</p>
<p class="center">
	<a href="<?php echo "https://labs.blw.moe/mcsanta/tmp/".$user; ?>.png">原始皮肤下载</a>
</p>
<p class="center">
	<a href="<?php echo "https://my.minecraft.net/zh-hans/profile/skin/remote?url=https://labs.blw.moe/mcsanta/tmp/".$user; ?>-santa.png">一键更换Minecraft皮肤(本站不会保存您的任何账户信息，点击将直接跳转到Minecraft.net官方网站更换)</a>
</p>
<div id="skin_container" class="center"></div>
<p class="center">Thanks to <a href="https://crafatar.com">Crafatar</a> for providing player skins.</p>
<script src="https://cdn.jsdelivr.net/npm/three@0.111.0/build/three.min.js"></script>
<script src="skinview3d.min.js"></script>
<script>
	let skinViewer = new skinview3d.SkinViewer({
		domElement: document.getElementById("skin_container"),
		width: 350,
		height: 350,
		skinUrl: "<?php echo "https://labs.blw.moe/mcsanta/tmp/".$user; ?>-santa.png"
	});
	let control = new skinview3d.createOrbitControls(skinViewer);
	skinViewer.animation = new skinview3d.CompositeAnimation();
	let walk = skinViewer.animation.add(skinview3d.WalkingAnimation);
	walk.speed = 1.5;
	control.enableRotate = true;
	control.enableZoom = false;
	let rotate = skinViewer.animation.add(skinview3d.RotatingAnimation);
</script>