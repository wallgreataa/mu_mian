<?php
// 防止直接访问此文件
if (!defined('ABSPATH')) {
    exit; // 直接退出防止恶意访问
}

// 加载自定义样式和脚本
function my_theme_enqueue_styles_scripts() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/style.css');
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/index.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles_scripts');

// 处理用户登录逻辑
function handle_user_login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log_name'], $_POST['log_pass'])) {
        global $wpdb;  // 使用 WordPress 数据库对象
        $name = $_POST['log_name'];
        $password = $_POST['log_pass'];

        // 连接数据库
        $mysqli = new mysqli("localhost", "root", "123456", "test_db");
        if ($mysqli->connect_errno) {
            die("数据库连接错误:" . $mysqli->connect_errno);
        }

        // 查询用户信息
        $sql = "SELECT pass_hash FROM suser WHERE name='$name'";
        $res = $mysqli->query($sql)->fetch_assoc();

        // 验证用户密码
        if ($res) {
            if (password_verify($password, $res['pass_hash'])) {
                echo "<script>
                    alert('登录成功');
                    window.location.href = '" . home_url() . "/index.php';
                </script>";
                exit;
            } else {
                echo "<script>
                    alert('密码错误');
                    window.location.href = '" . home_url() . "/login.php';
                </script>";
                exit;
            }
        } else {
            echo "<script>
                alert('用户不存在');
                window.location.href = '" . home_url() . "/login.php';
            </script>";
            exit;
        }
    }
}
add_action('init', 'handle_user_login');

// 处理用户注册逻辑
function handle_user_registration() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['pass1'])) {
        // 前端验证
        if (empty($_POST["name"])) {
            die("用户名不能为空!!");
        }
        if (strlen($_POST['pass']) < 6) {
            die("密码不能小于六位");
        }
        if ($_POST["pass"] !== $_POST["pass1"]) {
            die("两次输入密码不一致");
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("请输入有效的邮箱格式！！");
        }

        // 口令提前hash
        $pass_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        $name = $_POST["name"];
        $email = $_POST["email"];

        // 连接数据库
        $mysqli = new mysqli("localhost", "root", "123456", "test_db");
        if ($mysqli->connect_errno) {
            die("数据库连接错误:" . $mysqli->connect_errno);
        }

        // 保存用户信息
        $sql = "INSERT INTO suser (name, email, pass_hash) VALUES ('$name', '$email', '$pass_hash')";
        $mysqli->query($sql);

        // 检查插入操作
        if ($mysqli->affected_rows > 0) {
            echo "<script>
                alert('注册成功！');
                window.location.href = '" . home_url() . "/index.php';
              </script>";
            exit;
        } else {
            die("注册失败，请重试");
        }
    }
}
add_action('init', 'handle_user_registration');

// 创建自定义登录页面的模板短代码
function custom_login_shortcode() {
    ob_start(); ?>
    <form action="" method="POST">
        <label for="log_name">用户名:</label>
        <input type="text" id="log_name" name="log_name">
        
        <label for="log_pass">密码:</label>
        <input type="password" id="log_pass" name="log_pass">
        
        <button type="submit">登录</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_login_form', 'custom_login_shortcode');

// 创建自定义注册页面的模板短代码
function custom_register_shortcode() {
    ob_start(); ?>
    <form action="" method="POST">
        <label for="name">用户名:</label>
        <input type="text" id="name" name="name">
        
        <label for="email">邮箱:</label>
        <input type="email" id="email" name="email">
        
        <label for="pass">密码:</label>
        <input type="password" id="pass" name="pass">
        
        <label for="pass1">确认密码:</label>
        <input type="password" id="pass1" name="pass1">
        
        <button type="submit">注册</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_register_form', 'custom_register_shortcode');
