<?php error_reporting(E_ERROR);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font Awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Crazy Weather</title>
    <script src="js/script.js" defer></script>
</head>

<body onpageshow="getCityStored()">
    <div class="jumbotron text-center">
        <p>Search the city and click the button "SetCity"</p>
        <form action="" method="post" id="theForm">
            <h4 class="text-"><i class="fas fa-globe-europe fa-spin"></i> Crazy Weather</h4>
            <input type="text" id="city" name="city">
            <input type="submit" id="submit" name="submit" value="Set City">
            <div id="match-list"></div>
        </form>


    </div>

    <?php
     
     if(isset($_REQUEST['submit'])){
        if (isset($_REQUEST['city'])){
            $citySelected=$_REQUEST['city'];
            include 'main.php';
    ?>
    <div class="container" id="container">
        <div class="row d-flex  flex-column flex-md-row">
            <div class="col card m-3" id="main">
                <div class="jumbotron text-center">
                    <h4><?php echo $cityWeatherLocal->name ?></h4>
                    <small><?php echo $cityWeatherLocal->date ?></small><br>
                    <h6><?php echo $cityWeatherLocal->weather ?></h6>
                    <div id="centralImg">
                        <div id="picture"><img
                                src=<?php echo "https://openweathermap.org/img/wn/$cityWeatherLocal->icon@2x.png" ?>
                                alt="weather image"></div>
                        <div id="temp">
                            <h3><?php echo "$cityWeatherLocal->temp °C" ?></h3>
                        </div>

                        <div id="resume">
                            <h6><?php echo "$cityWeatherLocal->min °C / $cityWeatherLocal->max °C Feels like $cityWeatherLocal->feels_like °C" ?>
                            </h6>
                        </div>
                        <div id="description">
                            <h6><?php echo "$cityWeatherLocal->description" ?></h6>
                        </div>
                    </div>
                    <div id="aditionalInfo">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Humidity</th>
                                    <th>Pressure</th>
                                    <th>Wind</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="success">
                                    <td><img src="img/humidity_p.png" alt=""></td>
                                    <td><img src="img/pressure_p.png" alt=""></td>
                                    <td><img src="img/wind_speed_p.png" alt=""></td>

                                </tr>
                                <tr class="success">
                                    <td><?php echo "$cityWeatherLocal->humidity %" ?></td>
                                    <td><?php echo "$cityWeatherLocal->pressure hPa" ?></td>
                                    <td><?php echo "$cityWeatherLocal->wind_speed m/s" ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col card m-3" id="dailyWeather">
                <div class="jumbotron text-center">
                    <div id="tableDaily">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Weather</th>
                                    <th>Day</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        foreach ($cityWeatherLocal->forecast as $oneForecast) {
                            $src_icon_img=$oneForecast["icon"];    
                            $src_icon="https://openweathermap.org/img/wn/$src_icon_img@2x.png";    
                            $day=$oneForecast["day"];
                            $min=$oneForecast["min"];
                            $max=$oneForecast["max"]; 
                            echo "
                                <tr class='success' >                        
                                    <td><img src=$src_icon alt='Weather' width='30%' height='50%'> </td>
                                    <td>$day</td>
                                    <td>$min °C</td>
                                    <td>$max °C</td>
                                </tr>
                                ";                        
                        }
                        unset($oneForecast);                    
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" id="citiPicture">
                <div class="container jumbotron text-center ">
                    <h3><?php echo $cityWeatherLocal->name ?></h3>
                    <div class="row">
                        <div class="col ">
                            <div class="card border-dark  bg-light mb-3" style="max-width: 20rem;">
                                <div class="card-body">
                                    <img style="height: 200px; width: 100%; display: block;"
                                        src=<?php echo $cityWeatherLocal->urlPic01 ?> alt="Card image">
                                </div>
                            </div>
                        </div>
                        <div class="col d-none d-sm-block">
                            <div class="card border-dark  bg-light mb-3" style="max-width: 20rem;">
                                <div class="card-body">
                                    <img style="height: 200px; width: 100%; display: block;"
                                        src=<?php echo $cityWeatherLocal->urlPic02 ?> alt="Card image">
                                </div>
                            </div>
                        </div>
                        <div class="col d-none d-sm-block">
                            <div class="card border-dark  bg-light mb-3" style="max-width: 20rem;">
                                <div class="card-body">
                                    <img style="height: 200px; width: 100%; display: block;"
                                        src=<?php echo $cityWeatherLocal->urlPic03 ?> alt="Card image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php        
        }                
     }    
?>
    <!-- <script src="js/script_search.js"></script> -->
</body>

</html>