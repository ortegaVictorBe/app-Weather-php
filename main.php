<?php
include 'CityWeather.php';
//Creating the Object
$cityWeatherLocal= new CityWeather();
$data;
$dataForecast;

function weatherApi($city,$lon,$lat,$type){
        if ($type==0){
            //Daily Weather       
        return "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=e4dfa41e22f93aa72d2e80838a3bb930&units=metric";
        }
        else{
        //Forecast Weather
        return "https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lon&units=metric&exclude=hourly,minutely&appid=e4dfa41e22f93aa72d2e80838a3bb930";
    };
};    

//----------------------------------------------------------------------------------------------------------------------
//function- create the objects for get the wheater info
//----------------------------------------------------------------------------------------------------------------------
function  getWeather(){
        global $data, $dataForecast,$citySelected;
        //Gettinf data from API -weather
        
        $dataJson=file_get_contents(weatherApi($citySelected,0,0,0)) or exit(" <center>City not found, please try again </center>");        
        $data =json_decode($dataJson,true);

        //Getting foreCast
        $forecastJson=file_get_contents(weatherApi($citySelected,$data["coord"]["lon"],$data["coord"]["lat"],1)) or exit("City daily weather not found, please try again");
        $dataForecast=json_decode($forecastJson,true);
        
    };
 
 //----------------------------------------------------------------------------------------------------------------------
//function- set the Objects weather
//----------------------------------------------------------------------------------------------------------------------       
function setObjectWeather(){

        global $cityWeatherLocal, $data, $dataForecast;

        //Setting the Object
        $cityWeatherLocal->setName($data["name"]);
        $cityWeatherLocal->setLon($data["coord"]["lon"]);
        $cityWeatherLocal->setLat($data["coord"]["lat"]);
        $cityWeatherLocal->setDate(date("l d/m/Y", $data["dt"]));
        $cityWeatherLocal->setWeather($data["weather"][0]["main"]);
        $cityWeatherLocal->setIcon($data["weather"][0]["icon"]);
        $cityWeatherLocal->setTemp(round($data["main"]["temp"]));
        $cityWeatherLocal->setMin(round($data["main"]["temp_min"]));
        $cityWeatherLocal->setMax(round($data["main"]["temp_max"]));
        $cityWeatherLocal->setFeels_like($data["main"]["feels_like"]);
        $cityWeatherLocal->setDescription($data["weather"][0]["description"]);

        $cityWeatherLocal->setHumidity($data["main"]["humidity"]);
        $cityWeatherLocal->setPressure($data["main"]["pressure"]);
        $cityWeatherLocal->setWind_speed($data["wind"]["speed"]);
        $cityWeatherLocal->setWind_dir($data["wind"]["deg"]); 


        foreach ($dataForecast["daily"] as $key => $dForecast) {    
        if ($key > 0 && $key <=6){        
            $contentForecast = array ();    
            
            $contentForecast["day"]=date("D", $dForecast["dt"]);
            $contentForecast["min"]=round($dForecast["temp"]["min"]);
            $contentForecast["max"]=round($dForecast["temp"]["max"]);
            $contentForecast["icon"]=$dForecast["weather"][0]["icon"];

            $index = count($cityWeatherLocal->getForecast());        
            $cityWeatherLocal->setForecastElement($index,$contentForecast);
            unset($contentForecast);
            // $cityWeatherLocal->setForecast[$index]["day"]=date("D", $dForecast["dt"]);
            // $cityWeatherLocal->forecast[$index]["min"]=round($dForecast["temp"]["min"]);
            // $cityWeatherLocal->forecast[$index]["max"]=round($dForecast["temp"]["max"]);
            // $cityWeatherLocal->forecast[$index]["icon"]=$dForecast["weather"][0]["icon"];            
        }    
        }
        unset($dForecast);

};

function getPicture(){
    global $cityWeatherLocal;

    // $picJson=file_get_contents("https://api.unsplash.com/search/photos?client_id=KnqxdhP9gviZnH7O9L4xG4KVbrGZHHeooFPfFMTDctg&page=1&query=$cityWeatherLocal->name");
    $picJson=file_get_contents("https://pixabay.com/api/?key=18162730-c3747282f4d9bb7af654ed545&q=$cityWeatherLocal->name&category=weather&image_type=photo");
    $pic=json_decode($picJson,true);    
    $cityWeatherLocal->setUrlPic01($pic["hits"][1]["webformatURL"]);
    $cityWeatherLocal->setUrlPic02($pic["hits"][2]["webformatURL"]);
    $cityWeatherLocal->setUrlPic03($pic["hits"][3]["webformatURL"]);  
     
    
}
//----------------------------------------------------------------------------------------------------------------------
//function- Main
//----------------------------------------------------------------------------------------------------------------------       
function main(){

    getWeather();
    setObjectWeather();
    getPicture();
}


//Execution
main();

?>