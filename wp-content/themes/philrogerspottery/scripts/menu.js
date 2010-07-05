


function showUpdated( menuItemId, msg ){

	var div = document.getElementById(menuItemId);
	div.innerHTML = "<div class=\"updatedLeft\">" + div.innerHTML + "</div><div class=\"updatedHighlight\">&nbsp;" + msg + "</div>";
	
}