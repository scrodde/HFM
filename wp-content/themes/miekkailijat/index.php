<?php 
/*
This is the blog page. See frontpage.php for frontpage.
*/
	get_header(); 
	global $post;
	$query = contest_invitations_query();
?>

<div class="row">
	<div class="span6 offset3">
			<h2>Kilpailu kutsut</h2>
			<table class="table table-striped table-bordered">
			  	<thead>
			    	<tr>
			      		<th>Nimi</th>
			      		<th>Ilmo. alkaa</th>
						<th>Ilmo. päättyy</th>
						<th>#</th>
			    	</tr>
			  	</thead>
			<tbody>
			<?php
				if($query->found_posts == 0) {
					echo '<tr><td class="center">Ei kilpailukutsuja</td></tr>';
				}else {
					while($query->have_posts()) {
						$query->the_post();
						$cellData = '';
						if(contest_invitation_is_valid($post)) {
							$cellData = '<i class="icon-ok"></i>&nbsp;<a href="'.get_permalink().'">'.the_title('','',false).'</a>';
						}else {
							$cellData = '<i class="icon-ban-circle"></i>&nbsp;'.the_title('', '', false);
						}
						?>
						
						<tr>
							<td>
							<?php echo $cellData; ?></td>
							<td><?php echo get_post_meta($post->ID, 'registration_start', true); ?></td>
							<td><?php echo get_post_meta($post->ID, 'registration_end', true); ?></td>
							<td>0</td>
						</tr>
						<?php
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>
	
<?php get_footer(); ?>