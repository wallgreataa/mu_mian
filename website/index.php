<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/iconfont/iconfont.css">
    <?php wp_head(); // WordPress 加载头部资源 ?>
</head>
<body>
    <div class='container' id='container'>
        <div class="form-container sign-up-container">
            <!-- 注册 -->
        <form action="register.php" method="POST">
            <h1>用户注册</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="iconfont icon-qq"></i></a>
                <a href="#" class="social"><i class="iconfont icon-weixin"></i></a>
                <a href="#" class="social"><i class="iconfont icon-weibo-copy"></i></a>
                <a href="#" class="social"><i class="iconfont icon-github"></i></a>
            </div>
            <span>您可以选择以上几种方式注册一个您的账户!</span>
            <input type="text" name='name' placeholder="用户名">
            <input type="password" name="pass" placeholder="密码">
            <input type="password" name="pass1" placeholder="验证密码">
            <input type="email" name="email" placeholder="邮箱">
            <button id="send_code">发送验证码</button>
            <input type="email" name="verify" placeholder="验证码">
            <input type="hidden" name="action" id="actionField" value="">
            <button type="submit" id="logUp">注册</button>
        </form>
        </div>
        <div class="form-container sign-in-container">
            <!-- 登录 -->
            <form  action="login.php" method="POST">
                <h1>用户登录</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="iconfont icon-qq"></i></a>
                <a href="#" class="social"><i class="iconfont icon-weixin"></i></a>
                <a href="#" class="social"><i class="iconfont icon-weibo-copy"></i></a>
                <a href="#" class="social"><i class="iconfont icon-github"></i></a>
            </div>
            <span>您可以选择以上几种方式登录您的账户!</span>
            <input type="text" name="log_name" placeholder="用户名">
            <input type="password" name="log_pass" placeholder="密码">
            <a href="#">忘记密码？</a>

            <button id="logIn">登录</button>
            </form>
        </div>
        <!-- 侧边栏内容 -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>已有帐号？</h1>
                    <p>亲爱的快快点我去进行登录吧。</p>
                    <button class='ghost' id="signIn">登录</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>没有帐号？</h1>
                    <p>点击注册去注册一个属于你的账号吧。</p>
                    <button class='ghost' id="signUp">注册</button>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); // WordPress 加载页脚资源 ?>
    <script src="<?php echo get_template_directory_uri(); ?>/index.js"></script>
</body>
</html>
