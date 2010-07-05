<?php
/**
 * Template Name: gallery
 *
 * A custom page template without sidebar.
 *
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
	<head>
    	<title><?php wp_title(); ?> <?php bloginfo('name'); ?></title>
    	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	    <meta name="robots" content="index, follow" />
	    <meta content="ceramic artist specialising in ash glazes, contemporary potter specialising in salt glazes, welsh potter making thrown pottery, shoji hamada, shimaoka,  japan exibhition" name="description">
	    <meta content="pottery, phil rogers,salt, salt glaze,ash, ash glaze,ash glazes, glaze, glazes, gallery, ceramics, ceramic art, craft, ceramic artist, potter, uk, wales, stoneware, stone ware, british potter, marston pottery, rhayader, powys, mid wales, shoji hamada, shimaoka, shinsaku, japan, exibhition" name="keywords">
    	<style type="text/css" media="screen">
      		@import url( <?php bloginfo('stylesheet_url'); ?> );
    	</style>
	    <?php wp_get_archives('type=monthly&format=link'); ?>
	    <?php wp_head(); ?>
	    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	    <link rel="SHORTCUT ICON" href="/favicon.ico">
		<link rel='stylesheet' href='<?php bloginfo('template_directory'); ?>/style/philrogerspottery.css'></link>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/lightbox.css" type="text/css" media="screen" />
		<script src="<?php bloginfo('template_directory'); ?>/scripts/debug.js" ></script>
		<script src="<?php bloginfo('template_directory'); ?>/scripts/Fader.js" ></script>
		<script src="<?php bloginfo('template_directory'); ?>/scripts/xbrowser.js" ></script>
		<script src="<?php bloginfo('template_directory'); ?>/data/galleries.js" ></script>
		<script src="<?php bloginfo('template_directory'); ?>/scripts/popup.js" ></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/prototype.js" type="text/javascript"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/scriptaculous.js?load=effects" type="text/javascript"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/lightbox.js" type="text/javascript"></script>
<script>

var widgets = new Object();
var currentGalleryIndex = 0;

function initalise(){
	currentGalleryIndex = 0;

	widgets["galleryContainer"] = document.getElementById("galleryContainer");
	widgets["potContainer"] = document.getElementById("potContainer");
	widgets["title"] = document.getElementById("pageTitle");
	widgets["imgPot"] = document.imgPot;
	widgets["popup"] = document.getElementById("styled_popup");
	widgets["popupHeader"] = document.getElementById("popupHeader");
	widgets["popupFooter"] = document.getElementById("popupFooter");
	widgets["popupBackground"] = document.getElementById("popupBackground");
	widgets["popupClose"] = document.getElementById("popupClose");
}

var potToShow = null;
function showPot( pot ) {

	potToShow = new Image();
	potToShow.src = pot.imageLocation;

	widgets["popupFooter"].innerHTML = pot.description;
	
	animatePopup();
}


function doMosaicTileClick( pot ){
	showPot(pot);
}

function getMosacTile( galleryIndex, potIndex, pot){

	var idx = potIndex;
	var id = "tile" + idx;
	var mosaic = pot.mosaic;
	 
	var ret="<a ";
	ret += "fred='" + pot.imageLocation + "' ";
	ret += "title='" + pot.description + "' ";
	ret += "rel=\"lightbox\" ";
	ret += "onclick=\"myLightbox.start(this);return false;\" "; 
	ret += "style=\"";
	ret += "position:absolute;";
	ret += "top:" + (mosaic.top + getOffsetTop(widgets["galleryContainer"])) + "px;";
	ret += "left:" + (mosaic.left + getOffsetLeft(widgets["galleryContainer"])) + "px;";
	ret += "height:" + mosaic.height + "px;";
	ret += "width:" + mosaic.width + "px;";
	ret += "background-image: url(" + mosaic.location + ");"; 
	ret += "\" ";
	ret += ">";
	ret += "</a>";

	return ret;
}

var currentGallery = 0;
function drawGallery(galleryIndex){

	state = "gallery";

	currentGallery = galleryIndex;
	var gallery = pageData.galleries[galleryIndex];
	widgets['title'].innerHTML = gallery.title;
	
	document.title = gallery.title;

	var html = ""; 
	for (var i=0; i<gallery.pots.length;i++){
		var pot = gallery.pots[i];
		html += getMosacTile(galleryIndex, i, pot); 
	}

	widgets["galleryContainer"].innerHTML = html;
} 

function doGalleryCoverClick(index){
	drawGallery(index);
}

function getGalleryCover(index, cover, coverWidth){

	var ret = "";
	ret += "<a href='#fred' onclick='doGalleryCoverClick(" + index + ")'><div id='galCover" + index + "' class='galleryCover'  style='background-image:url(" + cover.coverImage + ");width:" + coverWidth + "px;display:none' >";
	ret += "<div class='galleryCoverTitle'>" + cover.title + "</div>"; 
	ret += "</div></a>"

	return ret;
}	

var galleryCovers = new Array();
var faders = new Array();
var fadeCounter = 0;
function drawGalleryCovers(){
	state = "covers";
	
	

	var coverWidth = 160;
	var s = "";
	widgets["title"].innerHTML = s;
	document.title = s;

	var html = ""; 
	for (var i=0; i<pageData.galleries.length;i++){
		var gal = pageData.galleries[i];
		html += getGalleryCover( i, gal, coverWidth);
	}

	var wrapperHtmlPrefix="<div class=\"galleryCoversWrapper\" style=\"width:" + (pageData.galleries.length * coverWidth) + "px\">";
	var wrapperHtmlSuffix="</div>";
	
	widgets["galleryContainer"].innerHTML = wrapperHtmlPrefix + html + wrapperHtmlSuffix;
	
	for (var i=0; i<pageData.galleries.length;i++){
		galleryCovers[i] = document.getElementById("galCover" + i);
		faders[i] = new Fader(galleryCovers[i]);
		faders[i].onComplete = function () {
			++fadeCounter;
			if (fadeCounter<pageData.galleries.length)
				faders[fadeCounter].fadeIn();
		 };
	}	
	
	fadeCounter = 0;
	faders[fadeCounter].fadeIn();
	
	//initLightbox();
}

var state = "covers";
function draw(){
	if(state == "covers")
		drawGalleryCovers();
	else if (state == "gallery")
		drawGallery(currentGallery);
};

window.onload = function (){
	initalise();
	draw();
	//initLightbox();

};

window.onresize = function (){
	draw();
};

window.onscroll = function (){

	//widgets["popupBackground"].style.width = "100%";
	//widgets["popupBackground"].style.height = 

};

function doHomeClick(){
	if (state == "gallery"){
		state = "covers";
		draw();
	}
	else{
			
	
		history.back();
	}
}

</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="pageTitle"></div>
			<div id="galleryContainer"></div>
			
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post gallery_content" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
<?php endwhile; endif; ?>

	<div id="gallery_nav">
		<ul>
		<?php wp_list_pages('title_li='); ?>
		</ul>
	</div>
			
			<div id="potContainer"></div>
		</div>

		
		<div id='popupBackground' 
			name='popupBackground' 
			style='display:none; width: 100%; height: 100%; top: 0px; left: 0px; position: absolute;zoom: 1;background: black'>
		</div>

		<div id='styled_popup' name='styled_popup' style='display:none; position: absolute; top: 100px; left: 0px; background:black;'>
			<div id="popupHeader" style='width: 100%; height: 10px;'>
				<a href='#fred'><div id="popupClose" align="right" style="width:20px;height:20px;position: absolute;background-image: url(images/closer.gif) " onclick="closePopup();"></div></a>
			</div>
			<div id="popupContent" >
				<img name="imgPot" src="gallery/images/salt_glazed_pedastal_dishes.jpg" height="100" width="100">
			</div>
			<div id="popupFooter" style='width: 100%; height: 10px;' class="popupFooter">popup footer</div>
		</div>

       <div id="footer">
			<div id="footer_text">
				created by <a href="http://simondelliott.com">simondelliott</a>	
			</div>
      </div>
      
  <?php wp_footer(); ?>
  <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
    var pageTracker = _gat._getTracker("UA-4534332-2");
    pageTracker._initData();
    pageTracker._trackPageview();
  </script>
</body>
</html>	
