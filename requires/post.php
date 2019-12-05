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
<div class="ui container">
    <form class="ui form" method="GET">
        <div class="field">
            <label>ID</label>
            <input type="text" name="user" id="post" placeholder="不区分大小写">
        </div>
        <button class="ui button" type="submit" onclick="login()">提交</button>
        <div class="ui error message"></div>
    </form>
</div>