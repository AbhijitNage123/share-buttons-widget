( function( $ ) {


	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */ 
	 

	uaellinks = {
		twitter: 'https://twitter.com/intent/tweet?url=',
		pinterest: 'https://www.pinterest.com/pin/create/button/?url=',
		facebook: 'https://www.facebook.com/sharer.php?u=',
		vk: 'https://vkontakte.ru/share.php?url=',
		linkedin: 'https://www.linkedin.com/shareArticle?mini=true&url=',
		odnoklassniki: 'https://connect.ok.ru/offer?url=',
		tumblr: 'https://tumblr.com/share/link?url=',
		delicious: 'https://del.icio.us/save?url=',
		google: 'https://plus.google.com/share?url=',
		digg: 'https://digg.com/submit?url=',
		reddit: 'https://reddit.com/submit?url=',
		stumbleupon: 'https://www.stumbleupon.com/submit?url=',
		pocket: 'https://getpocket.com/edit?url=',
		whatsapp: 'whatsapp://send?text=*{title}*\n{text}\n{url}',
		xing: 'https://www.xing.com/app/user?op=share&url=',
		print: 'javascript:print()',
		email: 'mailto:?subject={title}&body={text}\n{url}',
		telegram: 'https://telegram.me/share/url?url=',
		skype: 'https://web.skype.com/share?url=',
	};

    _.each( uaellinks , function(links) {
						    	// console.log( uaellinks['twitter'] );
						    	if ( '' != uaellinks['twitter'] ){
						    		console.log( uaellinks['twitter'] );
						    			$( document ).on('click','.uael-share-btn-twitter', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['twitter'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	} 
						    	if ( '' != uaellinks['facebook'] ){
						    		console.log( uaellinks['facebook'] );
						    			$( document ).on('click','.uael-share-btn-facebook', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['facebook'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	} 
						    	if ( '' != uaellinks['linkedin'] ){
						    		console.log( uaellinks['linkedin'] );
						    			$( document ).on('click','.uael-share-btn-linkedin', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['linkedin'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	} 
						    	if ( '' != uaellinks['pinterest'] ){
						    		console.log( uaellinks['pinterest'] );
						    			$( document ).on('click','.uael-share-btn-pinterest', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['pinterest'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	} 
						    	if ( '' != uaellinks['vk'] ){
						    		console.log( uaellinks['vk'] );
						    			$( document ).on('click','.uael-share-btn-vk', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['vk'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	} 
						    	if ( '' != uaellinks['google'] ){
						    		console.log( uaellinks['google'] );
						    			$( document ).on('click','.uael-share-btn-google', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['google'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	} 
						    	if ( '' != uaellinks['odnoklassniki'] ){
						    		console.log( uaellinks['odnoklassniki'] );
						    			$( document ).on('click','.uael-share-btn-odnoklassniki', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['odnoklassniki'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	} 
						    	if ( '' != uaellinks['tumblr'] ){
						    		console.log( uaellinks['tumblr'] );
						    			$( document ).on('click','.uael-share-btn-tumblr', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['tumblr'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['delicious'] ){
						    		console.log( uaellinks['delicious'] );
						    			$( document ).on('click','.uael-share-btn-delicious', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['delicious'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['digg'] ){
						    		console.log( uaellinks['digg'] );
						    			$( document ).on('click','.uael-share-btn-digg', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['digg'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['reddit'] ){
						    		console.log( uaellinks['reddit'] );
						    			$( document ).on('click','.uael-share-btn-reddit', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['reddit'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['stumbleupon'] ){
						    		console.log( uaellinks['stumbleupon'] );
						    			$( document ).on('click','.uael-share-btn-stumbleupon', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['stumbleupon'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['pocket'] ){
						    		console.log( uaellinks['pocket'] );
						    			$( document ).on('click','.uael-share-btn-pocket', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['pocket'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['whatsapp'] ){
						    		console.log( uaellinks['whatsapp'] );
						    			$( document ).on('click','.uael-share-btn-whatsapp', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['whatsapp'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['xing'] ){
						    		console.log( uaellinks['xing'] );
						    			$( document ).on('click','.uael-share-btn-xing', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['xing'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['print'] ){
						    		console.log( uaellinks['print'] );
						    			$( document ).on('click','.uael-share-btn-print', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['print'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['email'] ){
						    		console.log( uaellinks['email'] );
						    			$( document ).on('click','.uael-share-btn-email', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['email'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['telegram'] ){
						    		console.log( uaellinks['telegram'] );
						    			$( document ).on('click','.uael-share-btn-telegram', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['telegram'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}
						    	if ( '' != uaellinks['skype'] ){
						    		console.log( uaellinks['skype'] );
						    			$( document ).on('click','.uael-share-btn-skype', function(){
				 							var top = window.screen.height - 400;
									    	top = top > 0 ? top/2 : 0;
									            
										var left = window.screen.width - 600;
									    left = left > 0 ? left/2 : 0;
									    	// console.log(links);
									    		popupWindow = window.open(uaellinks['skype'],"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes");
									    });
						    	}

						    	
	 });

	var WidgetHelloWorldHandler = function( $scope, $ ) {

		if ( 'undefined' == typeof $scope )
			return;

		var scope_id = $scope.data( 'id' );
		console.log('f');
		console.log( scope_id );
		$( document ).trigger( 'uael_basicpopup_init', scope_id );
			
	};
	
	// Make sure you run this code under Elementor.
	
	$( window ).on( 'elementor/frontend/init', function () {

		elementorFrontend.hooks.addAction( 'frontend/element_ready/hello-world.default', WidgetHelloWorldHandler );

	});
} )( jQuery );
