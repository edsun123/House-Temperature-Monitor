function add(num1, num2) {
	return num1 + num2;
}

window.addEventListener('load', () => {
    let temperatureDescription = document.querySelector('.description');
    let humidityDescription = document.querySelector('.humidity-degree');
    let locationTimezone = document.querySelector('.location-timezone');
    let temperatureDegree = document.querySelector('.temperature-degree');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            long = position.coords.longitude;
            lat = position.coords.latitude;
            //42.351900, -71.122884
            const proxy = "https://cors-anywhere.herokuapp.com/";

            const api = `${proxy}https://api.darksky.net/forecast/83288ff7de11bebbc519f5408253800b/${lat},${long}';

            fetch(api)
                .then(response=> {
                    return response.json();
                })
                .then(data => {
                    
                    console.log(data);
                    const { temperature, summary , icon, humidity} = data.currently;
                    temperatureDegree.textContent = temperature;
                    
                    temperatureDescription.textContent = summary;
                    
                    locationTimezone.textContent = data.timezone;
                    
                    setIcons(icon, document.querySelector('.icon'));

                    humidityDescription.textContent = humidity*100;
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