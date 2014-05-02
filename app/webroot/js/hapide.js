$(document).ready(function(){

	// 初期値
	var	realtime_search;
	var old_search_word;
	var map;
	var marker = [];

	$('#searchForm').keydown(function(){

		old_search_word = $("#searchForm").val();	

	});

	$('#searchForm').keyup(function(event){

		var search_word = $("#searchForm").val();	

		if (search_word == old_search_word){
			return;
		}

		if (realtime_search){
			clearTimeout(realtime_search);
		}

		realtime_search = setTimeout(function(){
			$.when($.ajax({url:"/cake/main/find/",type:"post",data:{sw: search_word}})).done(function(data){
				$("#searchResult").html(data);
				$(".resultCont").animate({opacity: "1"}, 500);
			});
		}, 1000);
	});

	$('#searchResult').on('click','div.resultCont',function(){
		var spotName = $('.spotName').html().replace(/\s+/g, "");
		var latlng = new google.maps.LatLng($('.longitude').val(),$('.latitude').val());
		marker.push(new google.maps.Marker({
				position: latlng, 
				map: map, 
				title: spotName
		}));
		$('#dropList').append('<span>'+spotName+'</span>');
		$('#dropList').append('<button class="deleteSpot" value="'+spotName+'">削除</button>');
	});

	$('#mapArea').on('click', '.deleteSpot', function(){
		deleteSpotName = $('.deleteSpot').val();	
		for (var i = 0; i < marker.length; i++){
			if (marker[i]['title'] == deleteSpotName) {
				marker[i].setMap(null);
				delete marker[i];
			}
		}
		$(this).prev().remove();
		$(this).remove();
	});

	function initialize() {
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({
			'address': '東京駅'
		}, function(result, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var latlng = result[0].geometry.location;
				var myOptions = {
					zoom: 10,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				 };
				map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
			} else {
				alert('取得できませんでした…');
			}
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);

});
