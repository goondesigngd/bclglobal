<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ Util::getPropSimpleFromArray($arr_meta, 'title') }}</title>

	<meta name="description" content="{{ Util::getPropSimpleFromArray($arr_meta, 'description') }}" />
	<meta name="keywords" content="{{ Util::getPropSimpleFromArray($arr_meta, 'keywordtitle') }}" />
	<meta name="author" content="Goon Design" />
	<meta name="revisit-after" content="1 Days" />
	<meta name="robots" content="all" />
	<meta name="language" content="pt-br" />
	<meta name="classification" content="Internet" />
	<meta name="theme-color" content="#{{ Util::getPropSimpleFromArray($arr_meta, 'colortheme') }}">
	<meta name="copyright" content="© {{ date('Y') }} {{ Util::getPropSimpleFromArray($arr_loja, 'title') }}" />

	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<meta property="og:title" content="{{ Util::getPropSimpleFromArray($arr_meta, 'title') }} " />
	<meta property="og:description" content="{{ Util::getPropSimpleFromArray($arr_meta, 'description') }}" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="{{ Util::getPropSimpleFromArray($arr_loja, 'title') }}" />
	<meta property="fbs:app_id" content=""/>

	@foreach($arr_meta[0]->imgs as $key=>$value)
	<meta property="og:image" content="{{ $value }}{{ Util::getQueryStringVersion() }}" />
	@endforeach

	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" content="{{ url()->current() }}">
	<meta name="twitter:title" content="{{ Util::getPropSimpleFromArray($arr_meta, 'title') }} ">
	<meta name="twitter:description" content="{{ Util::getPropSimpleFromArray($arr_meta, 'description') }}">

	@foreach($arr_meta[0]->imgs as $key=>$value)
	<meta name="twitter:image" content="{{ $value }}{{ Util::getQueryStringVersion() }}" />
	@endforeach

	<link rel="canonical" href="{{ url()->current() }}" />

	@if(count($arr_meta[0]->imgs) > 0)
	<link rel="image_src" href="{{ $arr_meta[0]->imgs[0] }}{{ Util::getQueryStringVersion() }}">
	@endif

	<meta name="apple-mobile-web-app-title" content="{{ Util::getPropSimpleFromArray($arr_meta, 'title') }}" />
	<link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}{{ Util::getQueryStringVersion() }}" />
	<link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}{{ Util::getQueryStringVersion() }}" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}{{ Util::getQueryStringVersion() }}" />
	<link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}{{ Util::getQueryStringVersion() }}" />
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}{{ Util::getQueryStringVersion() }}" />

	<link rel="stylesheet" type="text/css" href="{{ asset('css/tooltip_demo.css') }}{{ Util::getQueryStringVersion() }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/tooltip_component.css') }}{{ Util::getQueryStringVersion() }}" />

	<!--[if lt IE 9]>
	<div class="veryold">
	<h1>Ops! Seu navegador é muito antigo.</h1>
	<h2>Para você obter uma experiência melhor na internet atualize seu navegador.</h2>
	<a href="https://www.google.com.br/chrome/browser/desktop/">Atualizar agora</a>
	</div>
	<![endif] -->

	<!--[if IE]>
	<link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}{{ Util::getQueryStringVersion() }}" >
	<link rel="icon" type="image/gif" href="{{ asset('img/favicon/favicon.gif') }}{{ Util::getQueryStringVersion() }}" >
	<![endif]-->
	<link rel="icon" href="{{ asset('img/favicon/favicon.png') }}{{ Util::getQueryStringVersion() }}">

	<!--[if lt IE 10]>
	<script type="text/javascript">
	document.createElement("article");
	document.createElement("nav");
	document.createElement("section");
	document.createElement("header");
	document.createElement("figure");
	document.createElement("figcaption");
	document.createElement("footer");
	</script>
	<![endif] -->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}{{ Util::getQueryStringVersion() }}" />

	<!--[if lt IE 10]>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styleIE.css') }}{{ Util::getQueryStringVersion() }}" />
	<![endif]-->

</head>