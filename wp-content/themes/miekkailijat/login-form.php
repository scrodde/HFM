<<?php wp_loginout(); ?>>
<div class="row">	
	<div class="span6 offset3 tabbable">
		
		<ul class="nav nav-tabs">
			<li class="active">
		    	<a href="#login" data-toggle="tab">Kirjaudu sisään</a>
		  	</li>
		  	<li><a href="#register" data-toggle="tab">Rekisteröidy</a></li>
		</ul>
		
		<div class="tab-content">
			<div class="tab-pane active" id="login">
				<form id="login" method="post" action="<?php echo wp_login_url( get_permalink() ) ?>">
					<fieldset>
						<label>Käyttäjänimi
						<input type="text" value="" name="log" /></label>
						<label>Salasana</label>
						<input type="password" value="" name="pwd"  /></label>
						<input type="submit" />
					</fieldset>
				</form>
			</div>
		
			<div class="tab-pane" id="login">
				<form id="login" method="post" action="<?php echo wp_login_url( get_permalink() ) ?>">
					<fieldset>
						<label>Username
						<input type="text" value="" name="log" /></label>
						<label>Password</label>
						<input type="password" value="" name="pwd"  /></label>
						<input type="submit" />
					</fieldset>
				</form>
			</div>
		</div>
		
	</div>
</div>