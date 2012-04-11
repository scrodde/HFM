<?php
get_header();

?>
	
	<div class="row">	
		<div class="span6 offset3 tabbable">
			
			<ul class="nav nav-tabs">
				<li class="active">
			    	<a href="#form" data-toggle="tab">Ilmoittautuminen</a>
			  	</li>
			  	<li><a href="#summary" data-toggle="tab">Osallistujat</a></li>
			</ul>
			
			<div class="tab-content">
				<div class="tab-pane active" id="form">
					<h2><?php the_title(); ?></h2>
					<?php
						$content = apply_filters('the_content', $post->post_content);
						echo $content;
					?>
					<form class="well">
					  	<label>Nimi</label>
					  	<input type="text" class="span3" placeholder="Kirjoita nimesi...">
					  	
						<label>Sukupuoli</label>
						<select>
							<option value="man">Mies</option>
							<option value="man">Nainen</option>
						</select>
						<br />
						<div class="form-actions">
					  		<button type="submit" class="btn btn-primary pull-right" style="">Lähetä</button>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="summary">
					<p>summary</p>
				</div>
			</div>
		</div>
	</div>
		
		
</div>
	
<?php
	get_footer();
?>
