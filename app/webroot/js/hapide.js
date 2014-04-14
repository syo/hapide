$(document).ready(function(){
	$('#searchButton').click(function(){
			var search_word = $("#searchForm").val();	
			$.when($.ajax("/cake/main/find/")).done(function(data){
				alert(data);
			});
	});
});
