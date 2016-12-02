// Main Script 

//Load Blueberry Slider
jQuery(window).load(function() {
		jQuery('.blueberry').blueberry();
	});

//doubleTapToGo https://github.com/dachcom-digital/jquery-doubleTapToGo
//Available for use under the MIT License

;(function( $, window, document, undefined )
{
	$.fn.doubleTapToGo = function( params )
	{
		if( !( 'ontouchstart' in window ) &&
			!navigator.msMaxTouchPoints &&
			!navigator.userAgent.toLowerCase().match( /windows phone os 7/i ) ) return false;

		this.each( function()
		{
			var curItem = false;

			$( this ).on( 'click', function( e )
			{
				var item = $( this );
				if( item[ 0 ] != curItem[ 0 ] )
				{
					e.preventDefault();
					curItem = item;
				}
			});

			$( document ).on( 'click touchstart MSPointerDown', function( e )
			{
				var resetItem = true,
					parents	  = $( e.target ).parents();

				for( var i = 0; i < parents.length; i++ )
					if( parents[ i ] == curItem[ 0 ] )
						resetItem = false;

				if( resetItem )
					curItem = false;
			});
		});
		return this;
	};
})( jQuery, window, document );

jQuery( '#nav-wrap li:has(ul)' ).doubleTapToGo();

jQuery(document).ready(function ($) {
	$(".toggle").click(function () {
	  page = $(this).attr('href');
		url = window.location.href.split('#')[0];
		text = url + page;
		history.replaceState({}, "", text);
	});
});