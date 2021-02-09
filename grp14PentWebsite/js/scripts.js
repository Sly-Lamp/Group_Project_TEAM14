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

// Hamburger panel
function openNav(){
    document.getElementById("myNav").style.width = "100%";
}

function closeNav(){
    document.getElementById("myNav").style.width = "0%";
}

// Sort Dropdown

// var sortbtn, drpdwn, i, opendrpdwn

// sortbtn = document.getElementById('sortbtn');
// drpdwn = document.getElementsByClassName('sortcont');

// sort.addEventListener('click', sortDrp, false);

// function sortDrp(){
//     sort.classList.toggle("show");
// }

// window.onclick = function(event){
//     if(!event.target.matches('.sortbtn')){
//         for(i=0; i < drpdwn.length; i++);
//             opendrpdwn = drpdwn[i];
//             if(opendrpdwn.classList.contains('show')){
//                 opendrpdwn.classList.remove('show');
//             }
//     }
// }