<?php
/*
Template Name: Login Page
*/

get_header();
?>

<form action="" method="POST">
    <label for="log_name">用户名:</label>
    <input type="text" id="log_name" name="log_name">
    
    <label for="log_pass">密码:</label>
    <input type="password" id="log_pass" name="log_pass">
    
    <button type="submit">登录</button>
</form>

<?php
get_footer();
?>
