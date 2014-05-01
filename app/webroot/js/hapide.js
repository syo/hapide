$(document).ready(function(){

	// 初期値
	var	realtime_search;
	var old_search_word;

	$('#searchButton').click(function(){
			var search_word = $("#searchForm").val();	
			$.when($.ajax({url:"/cake/main/find/",type:"post",data:{sw: search_word}})).done(function(data){
				$("#searchResult").html(data);
				$(".resultCont").animate({opacity: "1"}, 500);
			});
	});

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

});
