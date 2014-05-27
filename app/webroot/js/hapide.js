$(document).ready(function(){

	// 初期値
	var	realtime_search;
	var old_search_word;
	var map;
	var marker = [];
	var directionsService;

	// 前回の入力値を取得
	$('#searchForm').keydown(function(){

		old_search_word = $("#searchForm").val();	

	});

	// 入力値からリアルタイムに検索
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
		}, 500);
	});

	// クリックした検索結果を地図上にマーキング
	$('#searchResult').on('click','div.resultCont',function(){
		var spotName = $('.spotName').html().replace(/\s+/g, "");
		var latlng = new google.maps.LatLng($('.longitude').val(),$('.latitude').val());
		marker.push(new google.maps.Marker({
				position: latlng, 
				map: map, 
				title: spotName
		}));

		if (marker.length > 1){
			displayRoute();
		} else {
			map.panTo(new google.maps.LatLng(marker[marker.length - 1]['position']['k'],marker[marker.length - 1]['position']['A']));
		}

		var appendDropList = '<div class="spotListCont"><span>'+ spotName +'</span>';
		appendDropList += '<input type="hidden" name="dropLatitude" value=' + $('.latitude').val() + '></input>';
		appendDropList += '<input type="hidden" name="dropLongitude" value=' + $('.longitude').val() + '></input></div>';

		$('#dropList').append(appendDropList);
		// $('.spotListCont').append('<button class="zoomSpot" value="'+spotName+'">位置詳細</button>');
		// $('.spotListCont').append('<button class="deleteSpot" value="'+spotName+'">削除</button><br>');
		$("#dropList").sortable({
       update: function(event, ui) {
				 updateSpot($("[name='dropLatitude']"), $("[name='dropLongitude']"));
       }
	  });
		$("#dropList").disableSelection();
		clickSpot($('.latitude').val(),$('.longitude').val());
	});

	function clickSpot(x, y) {
		heartrailsURL = "http://express.heartrails.com/api/json?method=getStations&";
		heartrailsURL += "x=" + x + "&";
		heartrailsURL += "y=" + y + "&";
		heartrailsURL += "jsonp=getStation"; // JSONPのコールバック関数
		var script = document.createElement('script');
		script.src = heartrailsURL;
		document.body.appendChild(script);
	}

	function updateSpot(x, y) {
		$('div#nearestStation').empty();

		for (var i = 0; i < x.length; i++){
			setTimeout ( (function(){
				heartrailsURL = "http://express.heartrails.com/api/json?method=getStations&";
				heartrailsURL += "x=" + x[i]['value'] + "&";
				heartrailsURL += "y=" + y[i]['value'] + "&";
				heartrailsURL += "jsonp=getStation"; 
				var script = document.createElement('script');
				script.src = heartrailsURL;
				document.body.appendChild(script);
			})(), 1000);
		}
	}

	// ルート表示
	function displayRoute(){
		var start = new google.maps.LatLng(marker[0]['position']['k'], marker[0]['position']['A']);
		var end = new google.maps.LatLng(marker[marker.length - 1]['position']['k'], marker[marker.length - 1]['position']['A']);
		var request = {
			//開始位置
			origin:start,
			//終着位置
			destination:end,
			//通過ポイント
			// waypoints:waypts,
			travelMode:google.maps.DirectionsTravelMode.TRANSIT
		};

		directionsService.route(request, function(result, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(result);
			}
		});

		var rendererOptions = {
			map: map,
			suppressMarkers : true
		}

		directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
		directionsDisplay.polylineOptions = { 
			path: null, 
			strokeWeight: 5, 
			strokeColor: "#0000ff", 
			strokeOpacity: "0.5" 
		};

		directionsDisplay.setMap(map);

	}

	// マーカー一覧から削除
	$('#mapArea').on('click', '.deleteSpot', function(){
		var deleteSpotName = $(this).val();	
		for (var i = 0; i < marker.length; i++){
			if (marker[i]['title'] == deleteSpotName) {
				marker[i].setMap(null);
				marker.splice(i,1);
			}
		}
		$(this).prev().remove();
		$(this).remove();
	});

	// マーカー一覧から位置を移動
	$('#mapArea').on('click', '.zoomSpot', function(){
		var zoomSpotName = $(this).val();	
		var zoomSpotLon;
		var zoomSpotLat;
		for (var i = 0; i < marker.length; i++){
			if (marker[i]['title'] == zoomSpotName) {
				zoomSpotLon = marker[i]['position']['k'];
				zoomSpotLat = marker[i]['position']['A'];
			}
		}
		map.panTo(new google.maps.LatLng(zoomSpotLon, zoomSpotLat));
		map.setZoom(18);
	});

	// スポット全表示
	$('#showAllMarker').click(function(){

			if (marker.length == 0){
				return;
			}

			var maxlat = -9999;
			var maxlng = -9999;
			var minlat = 9999;
			var minlng = 9999;

			for(var i = 0; i < marker.length; i++){
				if ( marker[i]['position']['k'] > maxlat) {
					maxlat = marker[i]['position']['k'];
				}
				if ( marker[i]['position']['k'] < minlat) {
					minlat = marker[i]['position']['k'];
				}
				if ( marker[i]['position']['A'] > maxlng) {
					maxlng = marker[i]['position']['A'];
				}
				if ( marker[i]['position']['A'] < minlng) {
					minlng = marker[i]['position']['A'];
				}
			}

		//北西端の座標を設定
		var sw = new google.maps.LatLng(maxlat,minlng);

		//東南端の座標を設定
		var ne = new google.maps.LatLng(minlat,maxlng);
		 
		//範囲を設定
		var bounds = new google.maps.LatLngBounds(sw, ne);
		 
		//自動調整
		map.fitBounds(bounds,5);

	});

	$('#saveRoute').click(function(){
		var route = $('.spotListCont');
		console.log(route);
	});

	// 初期処理
	function initialize() {
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({
			'address': '東京'
		}, function(result, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var latlng = result[0].geometry.location;
				var myOptions = {
					zoom: 15,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				 };
				map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
				directionsService = new google.maps.DirectionsService();
			} else {
				alert('取得できませんでした…');
			}
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);

});
