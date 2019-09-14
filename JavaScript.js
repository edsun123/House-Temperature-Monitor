function add(num1, num2) {
	return num1 + num2;
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    $(".g-signin2").css("display", "none");
    $(".data").css("display", "block");
    alert("hi");
    //$("#pic").attr('src', profile.getImageUrl());
    //$("#email").text(profile.getEmail());
}

window.addEventListener('load', () => {
    let long;
    let lat;
    let temperatureDescription = document.querySelector('.temperature-description');
    
    let locationTimezone = document.querySelector('.location-timezone');
    let temperatureDegree = document.querySelector('.temperature-degree');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            long = position.coords.longitude;
            lat = position.coords.latitude;

            const proxy = "https://cors-anywhere.herokuapp.com/";
            //
            const api = `${proxy}https://api.darksky.net/forecast/83288ff7de11bebbc519f5408253800b/37.8267,-122.4233`;
            //37.8267,-122.4233

            fetch(api)
                .then(response=> {
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    const { temperature, summary , icon} = data.currently;
                    temperatureDegree.textContent = temperature;
                    temperatureDescription.textContent = summary;
                    locationTimezone.textContent = data.timezone;

                    setIcons(icon, document.querySelector('.icon'));
                });
        });

       
            
    }
    else {
        hi.textContent = "Geolocation needs to be enabled";
    }

    function setIcons(icon, iconID) {
        const skycons = new Skycons({ color: "white" });
        const currentIcon = icon.replace(/-/g, "_").toUpperCase();
        skycons.play();
        return skycons.set(iconID, Skycons[currentIcon]);
    }
});