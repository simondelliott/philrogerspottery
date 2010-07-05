
function Fader(obj){
	this.object = obj;
	this.name = name;
};

Fader.prototype = {
		
	onComplete: null,
	opacity: 0,
	
	fadeIn: function (){
		this.opacity = 0;
		this.object.style.display = "block";
		_FaderObject = this;
		_FaderDoIt();
	},

	fadeOut: function (){
		/*
		for( var i = 0 ; i <= 100 ; i++ )
			setTimeout( "setOpacity(widgets['popup']," + (10 - i / 10) + ")" , 8 * i );
		*/
	}
	
}

var _FaderObject = null; //global object
function _FaderDoIt(){

	if (_FaderObject.opacity >= 10){
		if (typeof _FaderObject.onComplete == "function" ){
			_FaderObject.onComplete();
		}
	}
	else{
		setOpacity(_FaderObject.object, _FaderObject.opacity);
		_FaderObject.opacity += 0.1;
		setTimeout("_FaderDoIt()", 8);
	}
}


/*


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

*/