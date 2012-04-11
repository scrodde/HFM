function updateGroupData(groupElement) {
	var dataHolder = jQuery('#' + groupElement.attr('id') + '-data');
	dataHolder.val('');
	
	var groupSettings = new Object();
	groupSettings.name = groupElement.attr('id');
	groupSettings.parameters = new Array();
	
	jQuery(groupElement).children('input:checked').each(function () {
		var label = jQuery('label[for="'+jQuery(this).attr('id')+'"]');
		groupSettings.parameters.push(label.text());
		
	});
	
	var jsonStr = JSON.stringify(groupSettings);
	dataHolder.val(jsonStr);
}

function onUpdateSettings() {
	jQuery('input[type="checkbox"]', '#contest-settings').change(function() {		
		updateGroupData( jQuery(this).parents('.settingsGroup') );
	});
}

jQuery(document).ready(function () {
	
	jQuery('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
	
	onUpdateSettings();

	jQuery('input[type="button"].addBox').click(function() {
		var controlsContainer = jQuery(this).parents('.settingsGroup');
		var textControl = controlsContainer.children('input[type="text"].addBox');
		if(textControl.val().length != 0) {
			var id = 'box-' + parseInt(Math.random()*1000);
			var name = textControl.val();
			controlsContainer
				.children('input[type="checkbox"]:last')
				.after('<label for="'+id+'">'+name+'</label><input type="checkbox" id="'+id+'"/>');
			onUpdateSettings();
			
			jQuery('#'+id).attr('checked', 'checked');
		}
	});
});