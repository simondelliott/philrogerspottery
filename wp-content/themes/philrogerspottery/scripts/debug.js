/**
	Provides debugging functions.

	@author elliottsd@hotmail.com
*/
function dump(obj){

	var s = "";
	for (var i in obj){
		s += "obj[" + i + "]=" + obj[i] + "\r\n";
	}

	alert (s);
}

var gbl = "";
function scanElementHirearchy(obj, propToDrop){
	
	gbl = "(" + obj.id + ":" + propToDrop + "=" + obj[propToDrop] + ")" + gbl;
	if(obj.parentElement){
		scanElementHirearchy(obj.parentElement, propToDrop)
	}
	else{
		alert(gbl);
		gbl = "";
	}
}