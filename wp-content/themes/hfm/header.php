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
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/less" media="all" href="<?php bloginfo( 'template_url' ); ?>/assets/less/style.less" />
	
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
		<?php $q = hfm_query_featured_posts(); ?>
		<?php if( (is_home() || is_front_page()) && $q->have_posts() ) : ?>

			<div id="featuredWrapper" class="carousel slide">
				<div class="carousel-inner">
				<?php
					while($q->have_posts()) : 
						$q->the_post();
						if( !($imgSrc = hfm_featured_image_src('large')) )
							continue;
				?>
						<div class="item <?php echo ($q->current_post == 0) ? ' active ' : ''; ?>" id="slide-<?php the_ID(); ?>">
							<img src="<?php echo $imgSrc[0] ?>" />
							<div class="carousel-caption">
								<h4 class="title"><?php the_title(); ?></h4>
								<?php the_content(); ?>
							</div>
						</div>
				<?php endwhile; ?>
				</div> <!-- .carousel-inner -->
				
				<?php if($q->post_count > 1) : ?>
  			  	<a class="carousel-control left" href="#featuredWrapper" data-slide="prev">&lsaquo;</a>
  			  	<a class="carousel-control right" href="#featuredWrapper" data-slide="next">&rsaquo;</a>
				<?php endif; ?>
			</div>
	
		<?php endif; ?>
		
		<div class="row">
			<div class="span2 logo">
				<img src="http://placehold.it/100x100&text=HFM LOGO" />
			</div>
			<div class="span10">
				<div class="navigation">
					<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false) ); ?>
					<div class="vertical-line">
						<?php get_search_form( true ); ?>
					</div>
				</div>
			</div>
		</div>
		
		</div> <!-- .span12 -->
	</div> <!-- #header -->

