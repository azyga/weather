 $(document).ready(function(){

});

function getWeather(){
	
	if(!isValid()){
		window.alert('Complete the city field and select the country!');
		return;
	}
	
  	$.ajax({
	    url: '/getWeather',
	    type: "GET",
	    data: {
            'city': $("input#city").val(),
            'country-code': $("select#country").val()
            },
	    dataType: "json",
	    success: function (data) {
	        if(data[2] != 'ERROR'){
				setData(data);
			}
			if(data[3] != undefined) {
				window.alert(data[3]);
			}
	    }
	});
}

function isValid(){
	
	var valid = true;
	if($("input#city").val()== '' || $("select#country").val() == ''){
		valid = false;
	}
	return valid;
}

function setData(data){
	$("#weatherIcon").remove();
	
	$("#cw_date").text(data[1].date);
	$("#cw_desc").text(data[1].weatherDesc);
	$("#cw_image").prepend($('<img>',{id:'weatherIcon', src:data[1].weatherIconUrl}));
	$("#cw_temp").text(data[0].temperature.toFixed(2)+" °C");
	$("#cw_hum").text(data[0].humidity.toFixed(2)+" %");
	$("#cw_pres").text(data[0].pressure.toFixed(0)+" hPa");
}
