/* validate password */

function valPass(){

var P1 = document.getElementById("password1").value ;
var P2 = document.getElementById("pword").value ;

if(P1!=P2)
    document.getElementById("password1").setCustomValidity("Passwords Don't Match");
else
    alert("Passwords do not match"); 
//empty string means no validation error
}
}