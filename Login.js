function onSignIn(googleUser) {
    console.log("Succesfully Singed in!!!");
    alert("hi");
}
//function onSignIn(googleUser) {
//    //var profile = googleUser.getBasicProfile();
//    //$(".g-signin2").css("display", "none");
//    //$(".data").css("display", "block");
//    alert("hi");
//    //$("#pic").attr('src', profile.getImageUrl());
//    //$("#email").text(profile.getEmail());
//}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        alert("You've been signed out");

        //$(".g-signin2").css("display", "block");
        //$(".data").css("display", "none");
    });
}