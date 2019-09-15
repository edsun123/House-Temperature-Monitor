//function onSignIn(googleUser) {
//    console.log("Succesfully Singed in!!!");
    
//}
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    $(".g-signin2").css("display", "none");
    $(".right").css("display", "block");
    $(".welcome").css("display", "none");
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        alert("You've been signed out");

        $(".g-signin2").css("display", "block");
        $(".right").css("display", "none");
        $(".welcome").css("display", "block");
    });
}