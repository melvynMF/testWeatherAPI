$(document).ready(function(){
			$("#getWeatherForcast").click(function(){
				var city 	=	$("#city").val();
				var baseURL 	=	'http://api.openweathermap.org/data/2.5/weather';
				var key 	=	'4c1b965ab31cf27e3a085990b50fe984';
				var newURL = baseURL + "?q=" + city + "&appid=" + key + "&units=metric";
				 $.ajax({
					url: newURL,
					dataType:'json',
					type : 'GET',
					success:function(data){
						var wf='';
						$.each(data.weather,function(index,val){
						wf += '<p><b>' + data.name + "</b><img src="+ val.icon +".png></p>"+
						data.main.temp + '&deg;C ' + '|' + val.main +", " + val.description
					});
					$("#showWeatherForcast").html(wf);
					}
					
				});
			});
		});