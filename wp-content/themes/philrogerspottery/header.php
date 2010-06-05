
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
	<head>
    	<title><?php wp_title(); ?> <?php bloginfo('name'); ?></title>
    	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	    <meta name="robots" content="index, follow" />
	    <meta content="ceramic artist specialising in ash glazes, contemporary potter specialising in salt glazes, welsh potter making thrown pottery, shoji hamada, shimaoka,  japan exibhition" name="description">
	    <meta content="pottery, phil rogers,salt, salt glaze,ash, ash glaze,ash glazes, glaze, glazes, gallery, ceramics, ceramic art, craft, ceramic artist, potter, uk, wales, stoneware, stone ware, british potter, marston pottery, rhayader, powys, mid wales, shoji hamada, shimaoka, shinsaku, japan, exibhition" name="keywords">
	    <link rel="SHORTCUT ICON" href="/favicon.ico">
    	<style type="text/css" media="screen">
      		@import url( <?php bloginfo('stylesheet_url'); ?> );
    	</style>
	    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	    <?php wp_get_archives('type=monthly&format=link'); ?>
	    <?php wp_head(); ?>
	</head>
 	<body>
		<div id="header">
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		    <h2><?php bloginfo('description'); ?></h2>		
		</div>
