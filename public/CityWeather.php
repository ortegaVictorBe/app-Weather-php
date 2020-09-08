<?php
Class CityWeather {
public $name;
public $lon;
public $lat;
public $date;
public $weather;
public $icon;
public $temp;
public $min;
public $max;
public $feels_like;
public $description;
public $humidity;
public $pressure;
public $wind_speed;
public $wind_dir;
public $urlPic01;
public $urlPic02;
public $urlPic03;
public $forecast=[];

/**
 * Get the value of name
 */ 
public function getName()
{
return $this->name;
}

/**
 * Set the value of name
 *
 * @return  self
 */ 
public function setName($name)
{
$this->name = $name;

return $this;
}

/**
 * Get the value of lon
 */ 
public function getLon()
{
return $this->lon;
}

/**
 * Set the value of lon
 *
 * @return  self
 */ 
public function setLon($lon)
{
$this->lon = $lon;

return $this;
}

/**
 * Get the value of lat
 */ 
public function getLat()
{
return $this->lat;
}

/**
 * Set the value of lat
 *
 * @return  self
 */ 
public function setLat($lat)
{
$this->lat = $lat;

return $this;
}

/**
 * Get the value of date
 */ 
public function getDate()
{
return $this->date;
}

/**
 * Set the value of date
 *
 * @return  self
 */ 
public function setDate($date)
{
$this->date = $date;

return $this;
}

/**
 * Get the value of weather
 */ 
public function getWeather()
{
return $this->weather;
}

/**
 * Set the value of weather
 *
 * @return  self
 */ 
public function setWeather($weather)
{
$this->weather = $weather;

return $this;
}

/**
 * Get the value of icon
 */ 
public function getIcon()
{
return $this->icon;
}

/**
 * Set the value of icon
 *
 * @return  self
 */ 
public function setIcon($icon)
{
$this->icon = $icon;

return $this;
}

/**
 * Get the value of temp
 */ 
public function getTemp()
{
return $this->temp;
}

/**
 * Set the value of temp
 *
 * @return  self
 */ 
public function setTemp($temp)
{
$this->temp = $temp;

return $this;
}

/**
 * Get the value of min
 */ 
public function getMin()
{
return $this->min;
}

/**
 * Set the value of min
 *
 * @return  self
 */ 
public function setMin($min)
{
$this->min = $min;

return $this;
}

/**
 * Get the value of max
 */ 
public function getMax()
{
return $this->max;
}

/**
 * Set the value of max
 *
 * @return  self
 */ 
public function setMax($max)
{
$this->max = $max;

return $this;
}

/**
 * Get the value of feels_like
 */ 
public function getFeels_like()
{
return $this->feels_like;
}

/**
 * Set the value of feels_like
 *
 * @return  self
 */ 
public function setFeels_like($feels_like)
{
$this->feels_like = $feels_like;

return $this;
}

/**
 * Get the value of description
 */ 
public function getDescription()
{
return $this->description;
}

/**
 * Set the value of description
 *
 * @return  self
 */ 
public function setDescription($description)
{
$this->description = $description;

return $this;
}

/**
 * Get the value of humidity
 */ 
public function getHumidity()
{
return $this->humidity;
}

/**
 * Set the value of humidity
 *
 * @return  self
 */ 
public function setHumidity($humidity)
{
$this->humidity = $humidity;

return $this;
}

/**
 * Get the value of pressure
 */ 
public function getPressure()
{
return $this->pressure;
}

/**
 * Set the value of pressure
 *
 * @return  self
 */ 
public function setPressure($pressure)
{
$this->pressure = $pressure;

return $this;
}

/**
 * Get the value of wind_speed
 */ 
public function getWind_speed()
{
return $this->wind_speed;
}

/**
 * Set the value of wind_speed
 *
 * @return  self
 */ 
public function setWind_speed($wind_speed)
{
$this->wind_speed = $wind_speed;

return $this;
}

/**
 * Get the value of wind_dir
 */ 
public function getWind_dir()
{
return $this->wind_dir;
}

/**
 * Set the value of wind_dir
 *
 * @return  self
 */ 
public function setWind_dir($wind_dir)
{
$this->wind_dir = $wind_dir;

return $this;
}

/**
 * Get the value of urlPic01
 */ 
public function getUrlPic01()
{
return $this->urlPic01;
}

/**
 * Set the value of urlPic01
 *
 * @return  self
 */ 
public function setUrlPic01($urlPic01)
{
$this->urlPic01 = $urlPic01;

return $this;
}

/**
 * Get the value of urlPic02
 */ 
public function getUrlPic02()
{
return $this->urlPic02;
}

/**
 * Set the value of urlPic02
 *
 * @return  self
 */ 
public function setUrlPic02($urlPic02)
{
$this->urlPic02 = $urlPic02;

return $this;
}

/**
 * Get the value of urlPic03
 */ 
public function getUrlPic03()
{
return $this->urlPic03;
}

/**
 * Set the value of urlPic03
 *
 * @return  self
 */ 
public function setUrlPic03($urlPic03)
{
$this->urlPic03 = $urlPic03;

return $this;
}

/**
 * Get the value of forecast
 */ 
public function getForecastElement($index)
{
return $this->forecast[$index];
}

/**
 * Set the value of forecast
 *
 * @return  self
 */ 
public function setForecastElement($index,$value)
{
$this->forecast[$index] = $value;

return $this;
}

/**
 * Get the value of forecast
 */ 
public function getForecast()
{
return $this->forecast;
}
};


?>