$(function(){
	/* $('#nav > li > a').click(function(e){
		$('#nav > li a').removeClass("active"); //.eq($(this).index()).addClass("active");
		$(this).addClass("active");
	}); */
	
	var contentHeight = $('.content').outerHeight(true);
	var menuHeight = $('.menu').outerHeight(true);	
	$('.content').css({'min-height': menuHeight});
	console.log(menuHeight);
	
	 if( $('html').width() < 752){
			$('.menu').addClass('red');
		 }else{
			$('.menu').removeClass('red');
		 }
	 $(window).resize(function(){
		 if( $('html').width() < 752){
			$('.menu').addClass('red');
		 }else{
			$('.menu').removeClass('red');
		 }
	 });
 
	//console.log( $('html').width() );
	
		var w = $('.menu').outerWidth(true);
	$('.ik img').click(function() {
		if( $('.red').css('left') == '0px'){
			$('.red').animate({'left':  '-'+w}, 1000);
		}else{
			$('.red').animate({'left': '0px'}, 1000);
		}	
	});
	 $(window).resize(function(){
		 if( $('html').width() > 752){
			$('.menu').animate({'left':  0});
		 }	
	 }); 
	
	
	//console.log( $('.menu').css('left') );
	/*
	  $('#nav li').click(function(e){ 
		$("#nav a").removeClass("active");
		e = e || event;
		$(e.target).addClass("active");
		//console.log( $(e.target) );
	}); */
});