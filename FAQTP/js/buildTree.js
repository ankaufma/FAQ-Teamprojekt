function buildTree() {
		$.getJSON('js/level2elements.php', function(data) {
		for(var i=0; i<data.length; i++) {
			$('#level2').append($("<p>" + data[i]+ " ms</p>"));
		}
		});
}
function buildTreeLevel3(){
	$.getJSON('js/level2elements.php', function(data) {
	for(var i=0; i<data.length; i++) {
		$('#level3').append($("<p>" + data[i]+ " ms</p>"));
		}
	});
}
function buildTreeLevel4(){
	$.getJSON('js/level2elements.php', function(data) {
	for(var i=0; i<data.length; i++) {
		$('#level4').append($("<p>" + data[i]+ " ms</p>"));
		}
	});
}
