<div class="settingsGroup" id="gender">
	<h4>Sukupuolet</h4>
	<fieldset>
	<label for="man">Miehet</label>
	<input type="checkbox"  id="man" />
	<label for="woman">Naiset</label>
	<input type="checkbox"  id="woman" />
	<input type="hidden" id="gender-data" />
	</fieldset>
</div>

<div class="settingsGroup" id="genre">
	<h4>Aselajit:</h4>
	<label for="kalpa">Kalpa</label>
	<input type="checkbox" name="kalpa" id="kalpa" />
	<label for="floretti">Floretti</label>
	<input type="checkbox" name="floretti" id="floretti" />
	<label for="saila">Säilä</label>
	<input type="checkbox" name="saila" id="saila" />
	<hr />
	<input type="text" name="genre-data" id="genre-data" />
	<label for="newGenre">Lisää uusi aselaji</label>
	<input type="text" id="newGenre" class="addBox" />
	<input type="button" class="addBox" value="Lisää"/>
</div>

<div class="settingsGroup" id="age">
	<h4>Ikäluokat:</h4>
	<label for="18">18+</label>
	<input type="checkbox" name="18" id="18" /><br />
	<label for="8-12v">8-12v</label>
	<input type="checkbox" name="8-12v" id="8-12v" /><br />
	<label for="12-18v">12-18v</label>
	<input type="checkbox" name="12-18v" id="12-18v" /><br />
	<hr />
	<input type="hidden" name="age-data" id="age-data" />
</div>

<input type="text" name="contest_settings" id="contest_settings" value="" />
<?php
