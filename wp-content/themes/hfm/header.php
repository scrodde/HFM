<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

		?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/assets/css/style.css" />
	
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/modernizr-2.5.3.min.js"></script>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div class="container">
	
	<div class="row" id="header">
		<div class="span12">
		<?php /* Display featured posts if available and on frontpage.. */ ?>
		<?php if( (is_home() || is_front_page()) && hfm_has_featured_posts() ) : ?>

			<div id="featuredWrapper" class="featuredWrapper">
				<div class="slides">
				<?php
					$q = hfm_query_featured_posts();
					while($q->have_posts()) : 
						$q->the_post();
				?>
						<div class="slide <?php echo ($q->current_post == 0) ? ' current ' : ''; ?>" id="slide-<?php the_ID(); ?>">
							<?php the_content(); ?>
						</div>
				<?php endwhile; ?>
				</div>
				<ul class="slideNav">
					<?php foreach($q->posts as $p) : ?>
						<li class="<?php echo ($p->ID == $q->posts[0]->ID) ? ' current ' : ''; ?>"><a href="#" data-target="slide-<?php echo $p->ID; ?>"></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
	
		<?php endif; ?>
		
		<div class="row">
			<div class="span3 logo">
				<img src="http://placehold.it/350x150&text=HFM LOGO" />
			</div>
			<div class="span9">
				<?php wp_nav_menu( array('theme_location' => 'primary', 'container_class' => 'menu-container') ); ?>
				<?php get_search_form( true ); ?>
			</div>
		</div>
		
		</div> <!-- .span12 -->
	</div> <!-- #header -->

