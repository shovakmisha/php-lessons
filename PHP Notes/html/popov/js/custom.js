/* ����� ������Ҳ� */
 function checkForm(){
	var x = /^[ �����-��-߸�a-zA-Z0-9]+$/; 
	var formsElements = document.c_form.elements; 
	var proverka = 'dobre';
	for(i in formsElements){
		if(formsElements[i].type==='text'){
			if( x.test(formsElements[i].value) == false ){
				formsElements[i].style.borderColor = 'red';
				proverka = 'nedobre';
			}
			else{
				formsElements[i].style.borderColor = 'blue';
			}
		}
	}

	if(proverka == 'nedobre'){
		$('.btn.btn-info.btn-lg').click();
		$('.modal-title').text('');
		$('.modal-body').html('<p> ��������� ��� ���� </p>');
		return false;
	}
	else{
		c_form.submit();
	} 
}
	
/* ����� ��������� */	
  function checkComments(){
	var x = /^[ �����-��-߸�a-zA-Z0-9]+$/; 
	var formsElements = document.form_com.elements; 
	var proverka = 'dobre';
	for(i in formsElements){
		if(formsElements[i].type==='text' || formsElements[i].name == 'text'){
			if( x.test(formsElements[i].value) == false ){
				formsElements[i].style.borderColor = 'red';
				proverka = 'nedobre';
			}
			else{
				formsElements[i].style.borderColor = 'blue';
			}
		}
	}

	if(proverka == 'nedobre'){
		$('.btn.btn-info.btn-lg').click();
		$('.modal-title').text('');
		$('.modal-body').html('<p> ��������� ��� ���� </p>');
		return false;
	}
	else{
		form_com.submit();
	}
}	 
	
	
	
	
	
	
jQuery(function($){

/* ����� ������Ҳ� */
	var z2 = $('.chel');
	
	if( $('.chel').length > 0 ){
		$('.btn.btn-info.btn-lg').click();
		$('.modal-title').text('');
		$('.modal-body').html('<p> ����� ���������� </p>');
	}
	
	/* ����� ��������� */
	var z3 = $('.comm');
	
	if( $('.comm').length > 0 ){
		$('.btn.btn-info.btn-lg').click();
		$('.modal-title').text('');
		$('.modal-body').html('<p> ���������� �������� </p>');
	}
	
	
	
	$('#nav > .nav > .glavnaya a').click(function(e){
		if( $(e.target).parent().parent().has('ul').length > 0 ){
			$(e.target).parent().next('.small').slideToggle(); 
		}
	});
	
	

 	
	
	var contentHeight = $('.content').outerHeight(true);
	
	 if( $('html').width() < 752){
		$('.menu').addClass('red');
		
		$('#nav ul').addClass('small');
		$('#nav ul').removeClass('big');
	 }else{
		$('.menu').removeClass('red');
		
		$('#nav ul').removeClass('small');
		$('#nav ul').addClass('big');
		
	 }
	 $(window).resize(function(){
		 if( $('html').width() < 752){
			$('.menu').addClass('red');
			 
			$('#nav ul').addClass('small');
			$('#nav ul').removeClass('big');
		 }else{
			$('.menu').removeClass('red');
			
			$('#nav ul').removeClass('small');
			$('#nav ul').addClass('big');
		 }
	 });
	
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
	
});

$('.switch').click(function(){
		if( $(this).parent().next('.program__wraper_m').css('display') == 'block' ){
			//$('.program__wraper_m').css({display: 'none'});
			$(this).parent().next('.program__wraper_m').css("display", "none");
			//console.log(3);
		}else{
			$(this).parent().next('.program__wraper_m').css("display", "block");
		}
			
		
	}); 




/* ������ ��������� ������ */

  var top_show = 150; 
  var delay = 1000;
  $(document).ready(function() {
    $(window).scroll(function () { 

      if ($(this).scrollTop() > top_show) $('#top').fadeIn();
      else $('#top').fadeOut();
    });
    $('#top').click(function () { 
      
      $('body, html').animate({
        scrollTop: 0
      }, delay);
    });
  });