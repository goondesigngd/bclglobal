<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Global Site Tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107496473-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments)
			};
			gtag('js', new Date());

			gtag('config', 'UA-107496473-1');
		</script>

		<meta charset="utf-8">
		<title>BCCL</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- CSS -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:400,700'>
		<link rel="stylesheet" href="{{asset('emconstrucao/bootstrap/css/bootstrap.min.css')}}{{ Util::getQueryStringVersion() }}">
		<link rel="stylesheet" href="{{asset('emconstrucao/css/style.css')}}{{ Util::getQueryStringVersion() }}">
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="{{asset('emconstrucao/img/favicon/favicon.ico')}}{{ Util::getQueryStringVersion() }} ">

		<!--[if IE]> <link rel="shortcut icon" href="{{asset('emconstrucao/img/favicon/favicon.ico')}}{{ Util::getQueryStringVersion() }} " />
		<link rel="icon" type="image/gif" href="{{asset('emconstrucao/img/favicon/animated_favicon1.gif')}}{{ Util::getQueryStringVersion() }}" />
		<![endif]-->
		<link rel="icon" href="{{asset('emconstrucao/img/favicon/favicon.ico')}}{{ Util::getQueryStringVersion() }} " />
<!-- 
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('emconstrucao/ico/apple-touch-icon-144-precomposed.png')}}{{ Util::getQueryStringVersion() }}  ">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('emconstrucao/ico/apple-touch-icon-114-precomposed.png')}}{{ Util::getQueryStringVersion() }} ">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href=" {{asset('emconstrucao/ico/apple-touch-icon-72-precomposed.png')}}{{ Util::getQueryStringVersion() }} ">
		<link rel="apple-touch-icon-precomposed" href="{{asset('emconstrucao/ico/apple-touch-icon-57-precomposed.png')}}{{ Util::getQueryStringVersion() }} "> -->
	</head>
	<body>
		<!-- Header -->
		<div class="header row">
			<div class="logo span4">
				<h1>
					<a href="https://goondesign.com.br/" target="_blank">
						<img src="{{asset('emconstrucao/img/logo-goon.svg')}}{{ Util::getQueryStringVersion() }}">
					</a>
				</h1>
			</div>
		</div>
		<!-- Coming Soon -->
		<div class="coming-soon">
			<div class="inner-bg">
				<div class="container">
					<div class="row">
						<div class="span12">
							<h2>Project under development</h2>
							<p>
								Soon you will be able to count on another great project from Goon Design, just wait a little longer...
							</p>
							<div class="timer">
								<div class="days-wrapper">
									<span class="days"></span>
									<br>
									Days
								</div>
								<div class="hours-wrapper">
									<span class="hours"></span>
									<br>
									Hours
								</div>
								<div class="minutes-wrapper">
									<span class="minutes"></span>
									<br>
									Minutes
								</div>
								<div class="seconds-wrapper">
									<span class="seconds"></span>
									<br>
									Seconds
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Content -->
		<div class="container">
			<div class="row">
				<div class="span12 subscribe">
					<h3>bccltraining.org</h3>
				</div>
			</div>
			<div class="row">
			<div class="span12 social">
				<img src="{{ asset('emconstrucao/img/logo-customer.png' )}}{{ Util::getQueryStringVersion() }}" width="200" />
				<br />
				<br />
				<!-- <b>Contato</b>
				<br />
				<br />
				<b> Base Administrativa</b>
				<br />
				Responsável: Dr. Cid Aimbiré<br />
				Rua Comendador Araújo, 343<br />
				CEP: 80420­000 ­ Curitiba, PR<br />
				Tel: (41) 3224­0302 ­ E­mail: info@bccl.org
				<br />
				<br />
				<b> Base Logística</b>
				<br />				
				Responsável: Mis. Claubler Quadros
				<br />
				Rua da Mangueira s/n <br />
				­ Comunidade Santo Antônio 
				<br />CEP: 69630­000 ­ Benjamin Constant, AM
				<br />
				Tel: (97) 991530454
				<br /> -->
				<a href="mailto:bccltraining@gmail.com" target="_blank" class="email" rel="tooltip" data-placement="top" data-original-title="E-mail"></a>
				<a href="https://www.instagram.com/bccltraining/" target="_blank" class="instagram" rel="tooltip" data-placement="top" data-original-title="Instagram"></a>
				<!-- <a href="" class="facebook" rel="tooltip" data-placement="top" data-original-title="Facebook"></a>
				<a href="" class="twitter" rel="tooltip" data-placement="top" data-original-title="Twitter"></a>
				<a href="" class="dribbble" rel="tooltip" data-placement="top" data-original-title="Dribbble"></a>
				<a href="" class="googleplus" rel="tooltip" data-placement="top" data-original-title="Google Plus"></a>
				<a href="" class="pinterest" rel="tooltip" data-placement="top" data-original-title="Pinterest"></a>
				<a href="" class="flickr" rel="tooltip" data-placement="top" data-original-title="Flickr"></a> -->
				</div>
			</div>
		</div>
		<!-- Javascript -->
		<script src="{{asset('emconstrucao/js/jquery-1.8.2.min.js')}}{{ Util::getQueryStringVersion() }} "></script>
		<script src="{{asset('emconstrucao/bootstrap/js/bootstrap.min.js')}}{{ Util::getQueryStringVersion() }} "></script>
		<script src="{{asset('emconstrucao/js/jquery.backstretch.min.js')}}{{ Util::getQueryStringVersion() }}"></script>
		<script src="{{asset('emconstrucao/js/jquery.countdown.js')}}{{ Util::getQueryStringVersion() }}"></script>

		<script>
			function asset($file_path) {
				return "{{asset('')}}emconstrucao/" + $file_path;
			}

			//alert(asset("img/teste.pg"));

			/*
			 Countdown initializer
			 */
			var now = new Date();

			@php($data_entrega = '10-05-2019')
			@php($dt = explode('-', $data_entrega))

			var countTo = 24 * 1 * 60 * 60 * 1000 + {{ str_pad(mktime(0, 0, 0, $dt[1], $dt[0], $dt[2]), 13, 0) }};

			$('.timer').countdown(countTo, function(event) {
			var $this = $(this);
			switch(event.type) {
			case "seconds":
			case "minutes":
			case "hours":
			case "days":
			case "weeks":
			case "daysLeft":
			$this.find('span.' + event.type).html(event.value);
			break;
			case "finished":
			$this.hide();
			break;
			}
			});

		</script>

		<script src="{{asset('emconstrucao/js/scripts.js')}}{{ Util::getQueryStringVersion() }}"></script>
	</body>

</html>
