( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */ 
	var WidgetHelloWorldHandler = function( $scope, $ ) {
		console.log( $scope );
		Console.log( "$scope" );
	};
	
	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/hello-world.default', WidgetHelloWorldHandler );
	} );
} )( jQuery );
