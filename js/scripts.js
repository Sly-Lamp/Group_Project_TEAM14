//Show password script

var pwdBox;
var showhide = document.getElementById('shwPwd');

function showPw(){
    pwdBox = document.getElementById('pwd');
    if(showhide.checked){
        pwdBox.type = "text";
    } else{
        pwdBox.type = "password";
    }
}