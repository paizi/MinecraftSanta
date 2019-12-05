<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <title>给！你的圣诞帽</title>
    <meta name="description" content="Add a Santa Hat to your Minecraft character">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	<style>.center{text-align:center}</style>
</head>
<body>
	<div class="ui container center" style="padding-top:20px;">
		<h1>为你的 Minecraft 角色添加一顶圣诞帽吧！</h1><br>
	</div>
	
		<?php
			if (isset($_GET['user']) && ! empty($_GET['user'])) {
				$user = $_GET['user'];
				require('process.php');
			}
		if (isset($_GET['user']) && $_GET['user'] != "") {
			if (!preg_match("/^[\w]{3,16}$/", $_GET['user'])) {
			    header("Location: /mcsanta/?error=char");
			    die();
			}
			$user = $_GET['user'];
			$error = false;
			if ($error !== false)
			{
				die();
			}
			include './requires/show.php';
		}
		else {
			include './requires/post.php';
		}
		if (isset($_GET['error'])) {
		  echo '<section id="error">';
			  if ($_GET['error'] == "char") { echo "请检查用户名格式"; }
			  else { echo "发生了一个未知错误，请稍后再试";}
		  echo '</section>';
		} 
?>
</body>
</html>