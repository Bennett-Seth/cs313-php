function doPasswordsMatch(){
    var pw1 = document.getElementById('password').value;
    var pw2 = document.getElementById('password_repeat').value;
    if (pw1 != pw2){
        document.getElementById('yesMatch').style.color = 'green';
        document.getElementById('yesMatch').style.visibility = 'visible';
        document.getElementById('noMatch').style.visibility = 'hidden';
        }else{
            document.getElementById('noMatch').style.color = 'red';
            document.getElementById('noMatch').style.visibility = 'visible';
            document.getElementById('yesMatch').style.visibility = 'hidden';
            }
    }
            