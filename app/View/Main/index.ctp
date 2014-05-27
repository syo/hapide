<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script>
// 最寄駅取得用コールバック関数
function getStation(result) {
	var resultStr = result["response"]["station"][0].line + " " + result["response"]["station"][0].name;
	var stationCont = "<div>"+ resultStr +"</div>";
	console.log(resultStr);
	$("#nearestStation").append(stationCont);
}
</script>

<div id="main">
	<div id="searchArea">
		<input type="search" id="searchForm"></input>
		<button id="searchButton">検索</button>
		<div id="searchResult"></div>
	</div>
	<div id="mapArea">
		<button id="showAllMarker">スポット全表示</button>
		<div id="map_canvas"></div>
		<div id="dropList" style="width:300px; height:300px; border:solid 1px black; float: left;"></div>
		<div id="nearestStation" style="width:300px; height:300px; margin-left: 10px; border:solid 1px black; float: left;"></div>
		<button id="saveRoute">保存</button>
	</div>
</div>
