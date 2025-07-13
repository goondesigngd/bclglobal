
$(document).ready(function(){

	var $window = $(window).width();

  	/* WINDOW */
	if ($window >= 1024) { 
	
		/* Constroi menu topo */
		$(window).scroll(function(){
			var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
			if (top > 150) {
				$("header").addClass('menufixo');
				$('.menu').removeClass("menu_active");
				$('.hamburger').removeClass("is-active");
				//$('.logo_white').fadeTo(10, 0);
				//$('.logo_color').fadeTo(10, 1);
				$('.logo_white').hide();
				$('.logo_color').show();
			}else {
				$("header").removeClass('menufixo');
				//$('.logo_white').fadeTo(10, 1);
				//$('.logo_color').fadeTo(10, 0);
				$('.logo_white').show();
				$('.logo_color').hide();
			}
		});

	}else{ /* mobile */

		

	}
	
	/* Menu */
  	$('.header_menu').click(function(){
    	$('.hamburger').toggleClass("is-active");
    	$('.menu').toggleClass("menu_active");
  	});
			
	/* Ativa lightbox da imagem */
	$(function(){
        $('#thumbnails a').lightBox();
    });
	
	/* Loader Mobile */
	jQuery("#loader").delay(500).fadeOut("slow");
	
	/* Desabilita scrool Google Maps */
    $('.maps').click(function () {
        $('.maps iframe').css("pointer-events", "auto");
    });
    $( ".maps" ).mouseleave(function() {
      $('.maps iframe').css("pointer-events", "none"); 
    });

	/* Popup video */
  	$("#popupopen").click(function(){
  		$('#popuvideo').fadeIn("slow");
  	});
  	$("#popupclose").click(function(){
    	$('#popuvideo').fadeOut("slow");
  	});
  	$("#popuptxt").click(function(){
    	$('#popuvideo').fadeOut("slow");
  	});

  	/* Popup video home*/
  	$("#popupopenhome").click(function(){
  		$('#popuvideohome').fadeIn("slow");
  		$('header').css("z-index", "1010");
  	});
  	$("#popupclosehome").click(function(){
    	$('#popuvideohome').fadeOut("slow");
    	$('header').css("z-index", "1012");
  	});
  	$("#popuptxthome").click(function(){
    	$('#popuvideohome').fadeOut("slow");
    	$('header').css("z-index", "1012");
  	});

  	/* Modal */
  	$(".open_modall").click(function(){
  		var idm  = $(this).attr('data-modal');
  		$('#'+idm).fadeIn("slow");
  		$('body').css("overflow", "hidden"); 
  	});
  	$(".modall_close").click(function(){
  		var idm  = $(this).attr('data-modal');
    	$('#'+idm).fadeOut("slow");
    	$('body').css("overflow", "unset"); 
  	});

  	/* Scroll Suave */
  	$.easing.easeInOutExpo = function (x, t, b, c, d) { // definição do efeito que será posteriormente usado no animate
	      if (t==0) return b;
	      if (t==d) return b+c;
	      if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
	      return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	}
	$(".scroll").click(function(event){
	      event.preventDefault();
	      $('html,body').animate({
	         scrollTop:$(this.hash).offset().top
	      }, {
	         duration: 900,
	         easing: 'easeInOutExpo' // basta usar o mesmo nome que você definiu acima ;)
	      });
	});

	/* Mask, placeholder and label -------------------------*/
	$('.inputTxt').focus(function(){
		var txt = $(this).attr('data-value');
		if($(this).val()==txt){
			$(this).val("");
			$(this).before('<p style="font-size:10px;color:#FFF;margin-bottom:-30px;">'+txt+'</p>');
		}else{
			$(this).val(val);
			$(this).prev().remove();
		}
  	});
  	$(".inputTxt").blur(function(){
        var txt = $(this).attr('data-value');
		if($(this).val()==""){
			$(this).val(txt);
			$(this).prev().remove();
		}
    });
	$('.inputData').focus(function(){
		var txt = $(this).attr('data-value');
		if($(this).val()==txt){
			$(this).mask('00/00/0000', {placeholder: "__/__/____"});
			$(this).before('<p style="font-size:10px;color:#FFF;margin-bottom:-30px;">'+txt+'</p>');
		}else{
			$(this).val(val);
		}
  	});
  	$(".inputData").blur(function(){
        var txt = $(this).attr('data-value');
		if($(this).val()==""){
			$(this).unmask();
			$(this).val(txt);
		}
    });
    $('.inputCPF').focus(function(){
		var txt = $(this).attr('data-value');
		if($(this).val()==txt){
			$(this).mask('000.000.000-00', {placeholder: "000.000.000-00"});
			$(this).before('<p style="font-size:10px;color:#FFF;margin-bottom:-30px;">'+txt+'</p>');
		}else{
			$(this).val(val);
		}
  	});
  	$(".inputCPF").blur(function(){
        var txt = $(this).attr('data-value');
		if($(this).val()==""){
			$(this).unmask();
			$(this).val(txt);
		}
    });
    $('.inputRG').focus(function(){
		var txt = $(this).attr('data-value');
		if($(this).val()==txt){
			$(this).mask('00.000.000-0', {placeholder: "00.000.000-0"});
			$(this).before('<p style="font-size:10px;color:#FFF;margin-bottom:-30px;">'+txt+'</p>');
		}else{
			$(this).val(val);
		}
  	});
  	$(".inputRG").blur(function(){
        var txt = $(this).attr('data-value');
		if($(this).val()==""){
			$(this).unmask();
			$(this).val(txt);
		}
    });
    $('.inputCEP').focus(function(){
		var txt = $(this).attr('data-value');
		if($(this).val()==txt){
			$(this).mask('00000-000', {placeholder: "00000-000"});
			$(this).before('<p style="font-size:10px;color:#FFF;margin-bottom:-30px;">'+txt+'</p>');
		}else{
			$(this).val(val);
		}
  	});
  	$(".inputCEP").blur(function(){
        var txt = $(this).attr('data-value');
		if($(this).val()==""){
			$(this).unmask();
			$(this).val(txt);
		}
    });
    $('.inputCEL').focus(function(){
		var txt = $(this).attr('data-value');
		if($(this).val()==txt){
			$(this).mask('(00) 00000-0000', {placeholder: "(00) 00000-0000"});
			$(this).before('<p style="font-size:10px;color:#FFF;margin-bottom:-30px;">'+txt+'</p>');
		}else{
			$(this).val(val);
		}
  	});
  	$(".inputCEL").blur(function(){
        var txt = $(this).attr('data-value');
		if($(this).val()=="" || $(this).val()=="("){
			$(this).unmask();
			$(this).val(txt);
			$(this).prev().remove();
		}
    });


    /* Scroll left right ---------------------------------------*/
    var $roll = 0;
	var $rollSub = 0;
	var $totalMargin = 300;/* inicia com 1 box*/
  	var $totalWidth = 0;
  	var $clickLR = 0; 

  	var rcolwth = 0;
	if ($(window).width() >= 800) { 
  		rcolwth = $('.roll').width();
    	$('.roll_col').css("width", (rcolwth/4)-2);
    }

	if ($window >= 1280) { 
		$roll = 290;
	}else if ($window >= 1024) { 
		$roll = 252;
	}else if ($window >= 800) { 
		$roll = 205;
	}else{ /* mobile */
		$roll = 255;
		rcolwth += $roll;
	}

  	$('.rollLeft').click(function(){

  		var $roll_contained = $(this).siblings('.roll_contained'); /*irmao*/
  		var $roll_col = $roll_contained.find('.roll_col'); /*filho do irmao*/
  		$clickLR = parseInt($roll_contained.attr('data-clicklr'));

  		if($roll_contained.attr('data-clicklr') > 0){ 
  			$roll_contained.animate({marginLeft: '+='+$roll+'px'}, 400);
  			$clickLR-=$roll;
  			$roll_contained.attr('data-clicklr',$clickLR.toString());
  		}
	});
	$('.rollRight').click(function(){
  		
		var $roll_contained = $(this).siblings('.roll_contained'); /*irmao*/
  		var $roll_col = $roll_contained.find('.roll_col'); /*filho do irmao*/
  		$clickLR = parseInt($roll_contained.attr('data-clicklr'));
  		$totalWidth = 0;

  		/*Saber quando termina o total de divs da grid*/
		$roll_col.each(function(index) {
		    $totalWidth += parseInt($roll_col.width(), 10); 
		});

		/*Se ja nao for total da grid, faz scroll horizontal*/
  		if($roll_contained.attr('data-clicklr')  < ($totalWidth-rcolwth)){ /* total - 1 pagina */
  			$roll_contained.animate( { marginLeft: '-='+$roll+'px' }, 400);
  			$clickLR+=$roll;
  			$roll_contained.attr('data-clicklr',$clickLR.toString());
  		}
	});
	
});

