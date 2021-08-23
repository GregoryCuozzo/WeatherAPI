// ------------------------------------------- search Data -------------------------------------------------------------

$(document).ready(function() {

    // -------------------------------- variables --------------------------------------------------
    let place = false ;

    // -------------------------------- search form ------------------------------------------------

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

    $('button.add-to-fav').on('click', function(){

        console.log(place)


        $.post('/country/store',place).done(function(result){
            let $result=  $(result);

        }).fail(function(error){
            alert('problem');
        })
    })

    // --------------------------------- search succeded ------------------------------------------

    function callBackGetSuccess(data){
        var country = document.getElementById("country");
        var city = document.getElementById("city")
        var temp_min= document.getElementById("temp_min");
        var temp = document.getElementById("temp");
        var temp_max = document.getElementById("temp_max");

        country.innerHTML =  data.sys.country;
        city.innerHTML = data.name;
        temp_min.innerHTML = data.main.temp_min;
        temp_max.innerHTML= data.main.temp_max;
        temp.innerHTML= data.main.temp;
        pays = data.sys.country;
        ville = data.name;
        place = {
            pays : pays,
            ville: ville,
        };

        $('button.add-to-fav').show();


    }
 // ------------------------------------------- add to favorites -------------------------------------------------------



})

