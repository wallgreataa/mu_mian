const container = document.querySelector('#container');
const signInButton = document.querySelector('#signIn');
const signUpButton = document.querySelector('#signUp');
const logInButton = document.querySelector('#logIn');
const logUpButton = document.querySelector('#logUp');
signUpButton.addEventListener('click', () => container.classList.add
('right-panel-active'));
signInButton.addEventListener('click', () => container.classList.remove
('right-panel-active'));
logUpButton.addEventListener('click', function() {
    // 设置标志，表明 "注册" 按钮被点击
    document.getElementById('actionField').value = 'register';
});

// 登录监听
// logInButton.addEventListener('click', () => container.classList.add
// ('right-panel-active'));
// // 注册监听
// logUpButton.addEventListener('click', () => container.classList.remove
// ('right-panel-active'));
