<?php
/*
	Template Name: Frontpage 
*/
get_header(); ?>

<div class="container">

<div class="row">
	<div class="span12" id="header">
	</div>
</div>

<div class="row" id="mainNav">
	<div class="span2" id="logo">
		<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Helsingin miekkailijat logo" />
	</div>
	<div class="span10" id="menu">
		<a class="btn">Etusivu</a>
		<a class="btn">Seura</a>
		<a class="btn">Valmennus</a>
		<a class="btn">Jäsenille</a>
		<a class="btn">Media</a>
		
	</div>
</div>

</div>


<?php
get_footer();
?>