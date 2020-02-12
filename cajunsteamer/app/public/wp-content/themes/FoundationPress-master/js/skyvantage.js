	//jquery calendar inputs
	function customRange(input) {
		if (input.id == 'return_date') {
			return { minDate: $('#depart_date').datepicker('getDate') };
			}
		else if (input.id == 'depart_date') {
			return {
				maxDate: $('#return_date').datepicker('getDate')
				};
		}
	}
	jQuery(document).ready(function($){
		$('#depart_date, #return_date').datepicker({
			minDate: '+1'
		});
		$('#depart_date, #return_date').datepicker('option', {
			beforeShow: customRange
			});
		$('#ui-datepicker-div').hide()
	});
	//Skyvantage JS
	function hide_return() {
		jQuery('.hide_return').hide();
		jQuery('.hide_return').va('');
		}
	function show_return() {
		jQuery('.hide_return').show();
		jQuery('.hide_return').val('');
		}
	
	var allowUnaccompaniedChildren = true;
	
	function updateODList(obj, origBox, destBox, labelDest, fromOnload)
	{
		var origIndex	= eval(origBox.selectedIndex);
		var destIndex	= eval(destBox.selectedIndex);
		var initDest	= 0;
		
		
		obj=jQuery(obj);
		var from=destBox;
		var to=origBox;
		var tindex=origIndex;
		if(obj.attr('name')=='dest')// if the handled box is from origins
		{
			from=origBox;
			to=destBox;
			tindex=destIndex;
		}
		
		jQuery(from).find('option').each(function(){
			jQuery(this).attr('disabled',false)
		});
		jQuery(from.options[tindex]).attr('disabled', true);
		if(to.selectedIndex==from.selectedIndex)
		{
			jQuery(from).val('');
		}


	}	// updateODList
	
	function checkSearchForm()
	{
		jQuery('.formError').remove();
		var success=true;
		// Make sure cities are entered

		if (document.forms.search.origin.value=='')
		{
			jQuery("#sb_origin").validationEngine('showPrompt', 'Please select the city you will be departing from.', 'red','bottomLeft',true);
			success=false;
		}
		if (document.forms.search.dest.value=='')
		{
			jQuery("#sb_dest").validationEngine('showPrompt', 'Please choose your destination.', 'red','bottomLeft',true);
			success=false;
		}
		if (document.forms.search.depart_date.value == '' || document.forms.search.depart_date.value == 'mm/dd/yyyy')
		{
			jQuery("#depart_date").validationEngine('showPrompt', 'Please select a valid departure date.', 'red','bottomLeft',true);
			success=false;
		}
		if ((document.forms.search.return_date.value == '' || document.forms.search.return_date.value == 'mm/dd/yyyy') && !jQuery("#r1").is(':checked'))
		{
			jQuery("#return_date").validationEngine('showPrompt', 'Please select a valid return date.', 'red','bottomLeft',true);
			success=false;
		}
		var origBox = document.forms.search.origin;
		var destBox = document.forms.search.dest;
		if(origBox.options[origBox.selectedIndex].value!="" && origBox.options[origBox.selectedIndex].value==destBox.options[destBox.selectedIndex].value)
		{
			// updateODList(document.forms.search.origin,
			// document.forms.search.dest, '', false);
			jQuery("#sb_dest").validationEngine('showPrompt', 'The destination selected is not available when departing from ' + (origBox.options[ origBox.selectedIndex ].text) + '.', 'red','bottomLeft',true);
			success=false;
		}
		return success;
	}  // end checkSearchForm
	
	function updatePaxCount() {
		jQuery('.formError').remove();
		
		var adults = (document.forms.search.adult_passengers.value);
		var children = (document.forms.search.child_passengers.value);
		var infants = (document.forms.search.infant_passengers.value);
		var pets = (document.forms.search.pets_passengers.value);
		
		if (infants > adults) {
			jQuery("#sb_infant_passengers").validationEngine('showPrompt', "You have specified " + infants + " infant passenger" + (infants > 1 ? "s" : "") + ", but " + (adults == 0 ? "no adults" : ("only " + adults + " adult" + (adults > 1 ? "s"  : ""))) + ". Infants are not assigned a seat, and each infant must ride on the lap of an adult passenger.", 'load','bottomLeft',true);
			return false;
		}else if ((infants > 0) && (infants == adults)) {
			jQuery("#sb_infant_passengers").validationEngine('showPrompt', "You have specified that " + infants + " infant passenger" + (infants > 1 ? "s" : "") + " will be accompanying you on your flight. Due to the airline seating restrictions, reservations for infants (defined as a Lap Child) must be made by calling 1-888-359-2541. Reservations Center agents will communicate Lap Children policies to you over the telephone. Thanks for choosing Branson AirExpress!", 'load','bottomLeft',true);
			return false;
		}else if ((children > 0) && (adults == 0)) {
			jQuery("#sb_child_passengers").validationEngine('showPrompt', "You have specified " + children + " child passenger" + (children > 1 ? "s" : "") + ", but no adults. Due to the airline seating restrictions, reservations for Unaccompanied Minors must be made by calling 1-888-359-2541. Reservations Center agents will communicate Unaccompanied Minor policies to you over the telephone. Thanks for choosing Branson AirExpress!", 'load','bottomLeft',true);
			return false;
		}else if (!allowUnaccompaniedChildren && (children > 0) && (adults == 0)) {
			jQuery("#sb_child_passengers").validationEngine('showPrompt', "You have specified " + children + " child passenger" + (children > 1 ? "s" : "") + ", but no adults. All child passengers MUST be accompanied by an adult passenger.", 'load','bottomLeft',true);
			return false;
		}else if (pets > 0) {
			jQuery("#sb_pets_passengers").validationEngine('showPrompt', "You have specified that " + pets + " pet" + (pets > 1 ? "s" : "") + " will be accompanying you on your flight. Due to airline restrictions, reservations for pets as flight passengers must be made by calling 1-888-359-2541. Reservations Center agents will communicate our pet policies to you over the telephone.", 'load','bottomLeft',true);
			return false;
		}else{
			document.forms.search.passengers.value = (adults + children);
			return true;
		}
	}
	
	function updateLuggageCount() {
		var carryon = (document.forms.search.luggage_carryOn.value);
		var checked = (document.forms.search.luggage_checked.value);
		
		if (checked > 0) {
			alert("You have specified " + checked + " checked luggage item" + (checked > 1 ? "s" : "") + ". Be aware, there is a surcharge per checked item that will be due upon check-in at Branson Airport. We allow a maximum of 2 checked items per passenger, $25.00 for the first piece and $25.00 for the second. See our site's Terms and Conditions for more details on allowable items and luggage dimensions.");
			return false;
		}
	}