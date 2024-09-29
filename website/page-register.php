<?php
/*
Template Name: Register Page
*/

get_header();
?>

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
get_footer();
?>
