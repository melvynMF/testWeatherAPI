<!doctype html>
<html">
<head>
    <meta charset="UTF-8">
	<title>Weather</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  
  <input id="city"></input>
  <button id="getWeather">submit</button>
   
   <div id="showWeather"></div>
   
   <script type="text/javascript">
		$(document).ready(function(){
			$("#getWeather").click(function(){
				var city 	=	$("#city").val();
				var baseURL 	=	'http://api.openweathermap.org/data/2.5/weather';
				var key 	=	'4c1b965ab31cf27e3a085990b50fe984';
				
				var newURL = baseURL + "?q=" + city + "&appid=" + key + "&units=metric";//create new URL with new params
				 
				 $.ajax({
					url: newURL,
					dataType:'json',
					type : 'GET',
					success:function(data){
						
						var result='';
						$.each(data.weather,function(index,weather){
						result += '<p><b>' + data.name + "</b><img src=//openweathermap.org/img/w/"+ weather.icon +".png></p>"+
						data.main.temp + '&deg;C ' + '| ' + weather.description});
					
						$("#showWeather").html(result);/*display result*/
					}
				});
			});
		});
   </script>   
<body>
   