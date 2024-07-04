
function signIn(){
    let buttonField = document.querySelector('.container');
    buttonField.innerHTML = '<div class="container"><div class="form-box"><h1 id="title">Login</h1><form><div class="input-group"><div class="input-field"><i class="fa-solid fa-envelope"></i><input type="email" placeholder="Email"></div><div class="input-field"><i class="fa-solid fa-lock"></i><input type="password" placeholder="Password"></div><p class="forget-password"><a href="#">Forget password</a></p></div><div class="button-field"><button type="button" id="signinButton">Sign in</button></div></form></div></div>'
}