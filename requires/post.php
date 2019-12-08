<script>
    function login() {
        $('.ui.form')
            .form({
                fields: {
                    post: {
                        rules: [{
                            type: 'empty',
                            prompt: '请输入 ID!'
                        }]
                    }
                }
            })
    }
</script>
<div class="ui container center" style="padding-top:20px">
	<h2>输入你的 Minecraft 正版用户名</h2><br>
    <form class="ui form" method="GET">
        <div class="field">
            <label>ID</label>
            <input type="text" name="user" id="post" placeholder="不区分大小写" style="width:200px;">
        </div>
        <button class="ui button" type="submit" onclick="login()">提交</button>
        <div class="ui error message"></div>
    </form>
</div>
<br><br><br>
<div class="ui container center">
    <h2>或者你只是想 <button class="ui primary button" id="upload">上传你自己的皮肤</button> ，对吧？</h2><br>
    <form method="post" enctype="multipart/form-data" id="file_upload" method="post" action="processup.php">
    <input type="hidden" name="MAX_FILE_SIZE" value="10240" />
　　　　<input type="file" accept="image/png" id="input" name="skin" style="display:none;"><br>
    <button class="ui button" type="submit">提交</button>
    </form>
</div>
<script>
    $("#upload").click(function () {
    $("#input").click();
    });
</script>