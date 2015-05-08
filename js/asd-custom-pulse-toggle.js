// JavaScript Document
jQuery(document).ready(function($) {
	if ($(".sidebar-toggle-button").length) {
		if ($(".s1 .sidebar-content").css("display") == "none" ) { PulseToggleButton(); }
		if ($(".s2 .sidebar-content").css("display") == "none" ) { PulseToggleButton(); }
	}
	
	$(window).resize(function(){	
		if ($(".sidebar-toggle-button").length) {
			if ($(".s1 .sidebar-content").css("display") == "none" ) { PulseToggleButton(); }
			if ($(".s2 .sidebar-content").css("display") == "none" ) { PulseToggleButton(); }
		}
	});
	
	function PulseToggleButton() {
		$(".sidebar-toggle-button").stop( true, true ).effect( "pulsate",  {times: 2}, 3000 );
	}
});