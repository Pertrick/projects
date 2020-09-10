     
let appId ='5745ba0dce04dae7267e37ac47e0f1e2';
let units = 'metric';
let searchMethod;

function getSearchMethod(searchTerm){
    if(searchTerm.length ===5 && Number.parseInt(searchTerm)+ '' === searchTerm)
       searchMethod ='zip';
    else
        searchMethod = 'q';
}

function searchWeather(searchTerm){
    getSearchMethod(searchTerm);
    fetch(`https://api.openweathermap.org/data/2.5/weather?${searchMethod}=${searchTerm}&APPID=${appId}&units=${units}`).then(result=> {
        return result.json();
    }).then(result => {
        init(result);
    })
}

function init(resultFromServer){
    //console.log(resultFromServer);
    switch(resultFromServer.weather[0].main){
        case 'Clear':
            document.body.style.backgroundImage = 'url("img/clear.jpg")';
            break;

        case 'Clouds':
            document.body.style.backgroundImage = 'url("img/cloud.jpg")';
            break;

        case 'Rain':
        case 'Drizzle':
        case 'Mist':
            document.body.style.backgroundImage = 'url("img/rain.jpg")';
            break;
                
        case 'Thunderstorm':
            document.body.style.backgroundImage = 'url("img/storm.jpg")';
            break;

        case 'Snow':
            document.body.style.backgroundImage = 'url("img/snow.jpg")';
            break;
        
        default:
             break;

    }



    let weatherData = JSON.stringify(resultFromServer);
    if (localStorage.getItem('myData') === null) {
        localStorage.setItem('myData', weatherData);
    } else if (localStorage.getItem('myData') != null) {
        weatherData = JSON.stringify(resultFromServer);
        localStorage.setItem('myData', weatherData);
    }

    const newData = JSON.parse(localStorage.getItem('myData'));


    let now = new Date();
    let date = document.getElementById('date');
    date.innerText = dateBuilder(now);


    let weatherDesrciptionHeader = document.getElementById('weatherDescriptionHeader');
    let temperatureElement = document.getElementById('temperature');
    let humidityElement = document.getElementById('humidity');
    let windSpeedElement = document.getElementById('windSpeed');
    let cityWeather = document.getElementById('cityHeader');
    let weatherIcon = document.getElementById('documentIconImg');

    weatherIcon.src = 'http://openweathermap.org/img/wn/'+ newData.weather[0].icon + '.png';

    let resultDescription = newData.weather[0].description;
    weatherDescriptionHeader.innerText = resultDescription.charAt(0).toUpperCase() + resultDescription.slice(1);

    temperatureElement.innerHTML = Math.floor(newData.main.temp)+ '°c';
    windSpeedElement.innerHTML = "winds at "  + Math.floor(newData.wind.speed) + "m/s";
    cityHeader.innerHTML = newData.name + ", " + newData.sys.country;
    humidityElement.innerHTML ='Humidity levels at ' + newData.main.humidity + '%';
     
    setPositionForWeatherInfo();

    if (localStorage.getItem('myData') !== null) {
  
        let now = new Date();
        let date = document.getElementById('date');
        date.innerText = dateBuilder(now);
    
    
        let weatherDesrciptionHeader = document.getElementById('weatherDescriptionHeader');
        let temperatureElement = document.getElementById('temperature');
        let humidityElement = document.getElementById('humidity');
        let windSpeedElement = document.getElementById('windSpeed');
        let cityWeather = document.getElementById('cityHeader');
        let weatherIcon = document.getElementById('documentIconImg');
    
        weatherIcon.src = 'http://openweathermap.org/img/wn/'+ newData.weather[0].icon + '.png';
    
        let resultDescription = newData.weather[0].description;
        weatherDescriptionHeader.innerText = resultDescription.charAt(0).toUpperCase() + resultDescription.slice(1);
    
        temperatureElement.innerHTML = Math.floor(newData.main.temp)+ '°c';
        windSpeedElement.innerHTML = "winds at "  + Math.floor(newData.wind.speed) + "m/s";
        cityHeader.innerHTML = newData.name + ", " + newData.sys.country;
        humidityElement.innerHTML ='Humidity levels at ' + newData.main.humidity + '%';
         
        setPositionForWeatherInfo();
    }
    function dateBuilder(d){
        let months= ["January","February", "March", "April", "May", "June",
                     "July", "August", "September", "October", "November", "December"];
        
        let days =[ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
                    "Friday", "Saturday"]; 
    
        let day =days[d.getDay()];
        let date =d.getDate();
        let month = months[d.getMonth()];
        let year = d.getFullYear();
    
        return `${day} ${date} ${year}`;
    
    
    }

}

function dateBuilder(d){
    let months= ["January","February", "March", "April", "May", "June",
                 "July", "August", "September", "October", "November", "December"];
    
    let days =[ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
                "Friday", "Saturday"]; 

    let day =days[d.getDay()];
    let date =d.getDate();
    let month = months[d.getMonth()];
    let year = d.getFullYear();

    return `${day} ${date} ${year}`;
}





function setPositionForWeatherInfo(){
    let weatherContainer = document.getElementById('weatherContainer');
    let weatherContainerHeight = weatherContainer.clientHeight;
    let weatherContainerWidth = weatherContainer.clientWidth;

    weatherContainer.style.left = `calc(50% - ${weatherContainerWidth/2}px)`;
    weatherContainer.style.top = `calc(50% - ${weatherContainerHeight/1.3}px)`;
    weatherContainer.style.visibility = 'visible';
}

document.getElementById('searchBtn').addEventListener('click', () =>{
    let searchTerm =document.getElementById('searchInput').value;
    if(searchTerm)
       searchWeather(searchTerm);

})


