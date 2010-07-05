/**
	Creates and handels popup style dialogues.

	Depends
	- xbrowser

	@author elliottsd@hotmail.com
*/

function fadeInMyPopup() {
 for( var i = 0 ; i <= 100 ; i++ )
   setTimeout( "setOpacity(widgets['popup']," + (i / 10) + ")" , 8 * i );
}

function fadeOutMyPopup() {

	for( var i = 0 ; i <= 100 ; i++ ) {
		setTimeout( "setOpacity(widgets['popup']," + (10 - i / 10) + ")" , 8 * i );
	}

	setTimeout("closePopup()", 800 );
}

function closePopup() {
	widgets["popup"].style.display = "none";
	widgets["popupBackground"].style.display = "none";
}

function animatePopup(){

	if (!potToShow.complete){
		setTimeout("animatePopup()", 10);
		return;
	}

	var border = 20;

	var ol = getOffsetLeft(widgets["galleryContainer"]);
	var ot = getOffsetTop(widgets["galleryContainer"]);

 	setOpacity(widgets["imgPot"], 0 );
	//widgets["imgPot"].style.display = "block";
	widgets["imgPot"].src = potToShow.src;
	widgets["imgPot"].width = potToShow.width;
	widgets["imgPot"].height = potToShow.height;
	
	setOpacity(widgets["popupBackground"], 5);
 	widgets["popupBackground"].style.display = "block";

	widgets["popupClose"].style.left = potToShow.width + border - parseInt(widgets["popupClose"].style.width);
	widgets["popupClose"].style.top = border - parseInt(widgets["popupClose"].style.height);

	widgets["popup"].style.width = potToShow.width + (2 * border);
	widgets["popup"].style.top = ot - border;
	widgets["popup"].style.left = ol + (widgets["galleryContainer"].offsetWidth/2) - ((potToShow.width + (2 * border))/2);
	widgets["popupHeader"].style.height = border;
	widgets["popupFooter"].style.height = border;
	widgets["popup"].style.display = "block";
 	setOpacity(widgets['popup'], 10 );


	//setOpacity(widgets["popupBackground"], 10);
 	
	for( var i = 0 ; i <= 100 ; i++ ){
   	//	setTimeout( "setOpacity(widgets['popup']," + (i / 10) + ")" , 5 * i );
   		setTimeout( "setOpacity(widgets['imgPot']," + (i / 10) + ")" , 2 * i );
   	}

}
