// ------------------------------------------- search Data -------------------------------------------------------------

$(document).ready(function() {

    let country = false;


    $('form.queryloc').on('submit', function(e) {
        e.preventDefault();
        let queryloc =$(this).find('input#recherche').val();
        $.get("https://api.openweathermap.org/data/2.5/weather?q="+queryloc+"&appid=c21a75b667d6f7abb81f118dcf8d4611&units=metric", function() {

        }).done(function(data) {
            callBackGetSuccess(data);
        }).fail(function(error) {
            alert(queryloc + " does not exist ");
        });
    });

    function callBackGetSuccess(data){
        console.log(data);
        var country = document.getElementById("country");
        var city = document.getElementById("city")
        var temp_min= document.getElementById("temp_min");
        var temp = document.getElementById("temp");
        var temp_max = document.getElementById("temp_max");
        let weather_desc = document.getElementById("weather_desc");
        country.innerHTML =  data.sys.country;
        city.innerHTML = data.name;
        temp_min.innerHTML = data.main.temp_min;
        temp_max.innerHTML= data.main.temp_max;
        temp.innerHTML= data.main.temp;
        weather_desc.innerHTML= data.weather.description;

    }

})

// ------------------------------------------- other functions ---------------------------------------------------------

function favorites(){
    console.log("try");
    let country =

}