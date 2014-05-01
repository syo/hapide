<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script>
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
      var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
    } else {
      alert('取得できませんでした…');
    }
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="main">
	<div id="searchArea">
		<input type="search" id="searchForm">
		</input>
		<button id="searchButton">
			検索
		</button>
		<div id="searchResult">
		</div>
	</div>
	<div id="mapArea">
		<div id="map_canvas"></div>
	</div>
</div>
