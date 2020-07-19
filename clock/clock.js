var wakeuptime=7;
var noon = 12;
var lunchtime=12;
var naptime= lunchtime+2;
var partytime;
var evening = 18;

var showCurrentTime = function(){
    
    var clock =document.getElementById('clock');
    
    var currentTime = new Date();
    
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    
    var Meridian = "AM";
    
    if(hours >=12){
      Meridian = "PM";  
    }
    
    if(hours >noon){
      hours = hours-12;  
    }
    
    if (minutes <10){
        minutes = "0" + minutes;
    }
    
    if (seconds <10){
        seconds = "0" + seconds;
    }
    
    var clockTime = hours + ":" + minutes + ":" +seconds + " " + Meridian + "!" ;
    
    clock.innerText = clockTime;
};

var updateClock  = function(){
    var time= new Date().getHours();
    var messageText;
    var image= "IMG_20181228_113339.jpg";
    
    var timeEventJS= document.getElementById("timeEvent");
    var catImageJS = document.getElementById("img");
    
    if (time ==partytime){
        
        image = "IMG_20181228_114500.jpg";
        messageText = "It's Party Time!!!";
    }
   else if(time == naptime){
    image = "IMG_20181228_113741.jpg";
    messageText="Sleep Tight!";
   }
   
   else if(time < noon){
    image = "IMG_20181228_113837.jpg";
    messageText="Good Morning!";
   }
   
   else if(time >= evening){
    image = "IMG_20181228_123454.jpg";
    messageText="Good Evening!";
   }
   
   else {
    image = "IMG_20181228_114019.jpg";
    messageText="Sleep Tight!";
   }

   
    console.log(messageText);
    timeEventJS.innerText = messageText;
    img.src = image;
    
    showCurrentTime();
    } ;
    
    updateClock();
    
    var oneSecond = 1000;
    setInterval(updateClock, oneSecond);
    
    var partyButton = document.getElementById("button");
    
    var partyEvent = function(){
        
        if (partytime <0){
            
            partytime = new Date().getHours();
            button.innerText = "Party Over!";
            button.style.backgroundColor = "#fafafa";
            
        }
        
        else{
        partytime =-1;
        button.innerText = "Party Time!";
        button.style.backgroundColor = "#fafafa";
        
            
        }
    };
    
    button.addEventListener("click", partyEvent);
    partyEvent();
    
    
    
    var Wakeuptimeselector = document.getElementById("wakeuptimeselector");
    
    var wakeupEvent = function(){
        wakeuptime = wakeuptimeselector.value;
        
    };
    
    Wakeuptimeselector.addEventListener("change", wakeupEvent);
    
     
     
     var lunchtimeselector = document.getElementById("lunchtimeselector");
    
    var lunchEvent = function(){
        lunchtime = lunchtimeselector.value;
        
    };
    
    lunchtimeselector.addEventListener("change", lunchEvent);
    
    
    var naptimeselector = document.getElementById("naptimeselector");
    
    var napEvent = function(){
        naptime = naptimeselector.value;
        
    };
    
    naptimeselector.addEventListener("change", napEvent);
    
    

    
   
    