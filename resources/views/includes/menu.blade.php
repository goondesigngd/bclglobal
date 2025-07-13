<div id="loader"></div>
<header class="transition">
	<div class="header transition">
		<a href="{{ asset('/') }}" class="logo">
			<img class="transition logo_white" src="{{ asset('img/logo.svg') }}{{ Util::getQueryStringVersion() }}" alt="{{ Util::getPropSimpleFromArray($arr_meta, 'title') }}">
			<img class="transition logo_color" src="{{ asset('img/logo.svg') }}{{ Util::getQueryStringVersion() }}" alt="{{ Util::getPropSimpleFromArray($arr_meta, 'title') }}">
		</a>
		<div class="header_menu transition">
			<div class="hamburger" id="hamburger-1">
	          <span class="line"></span>
	          <span class="line"></span>
	          <span class="line"></span>
	        </div>
	    </div>
    </div>
	<div class="menu transition">
		<nav>
			<!-- <div class="language">
				@if(Config::get('app.locale') == 'en')
					<a href="{{ asset('en/home') }}" class="language_active">EN  </a>
				@else
					<a href="{{ asset('en/home') }}">EN  </a>
				@endif
				@if(Config::get('app.locale') == 'pt')
					<a href="{{ asset('pt/home') }}" class="language_active">PT  </a>
				@else
					<a href="{{ asset('pt/home') }}">PT  </a>
				@endif
				@if(Config::get('app.locale') == 'es')
					<a href="{{ asset('es/home') }}" class="language_active">ES</a>
				@else
					<a href="{{ asset('es/home') }}">ES</a>
				@endif
			</div> -->
			<a href="{{ route('home') }}"><h1>@lang('content.geral.menu-home')</h1></a><br>
			<a href="{{ route('empresa') }}"><h1>@lang('content.geral.menu-empresa')</h1></a><br>
			<a href="{{ route('capacitacao') }}"><h1>@lang('content.geral.menu-capacitacao')</h1></a><br>
			<!-- <a href="{{ route('trabalhos') }}"><h1>@lang('content.geral.menu-trabalhos')</h1></a><br> -->
			<a href="{{ route('colaborar') }}"><h1>@lang('content.geral.menu-colaborar')</h1></a><br>
			<!-- <a href="{{ route('materiais') }}"><h1>@lang('content.geral.menu-materiais')</h1></a><br> -->
			<a href="{{ route('contato') }}"><h1>@lang('content.geral.menu-contatos')</h1></a><br>
			<br><br>
			<!-- <a href="{{ Util::getPropSimpleFromArray($arr_loja, 'facebook') }}" target="_blank"><span class="icon-facebook-logo-2"></span></a> -->
			<a href="{{ Util::getPropSimpleFromArray($arr_loja, 'instagram') }}" target="_blank"><span class="icon-instagram-logo"></span></a>
			<a href="{{ Util::getPropSimpleFromArray($arr_loja, 'canalyoutube') }}" target="_blank"><span class="icon-youtube-symbol"></span></a>
			<br><br>
			<a href="mailto:{{ Util::getPropSimpleFromArray($arr_loja, 'email') }}"><p>{{ Util::getPropSimpleFromArray($arr_loja, 'email') }}</p></a>
			@if(!empty(Util::getPropSimpleFromArray($arr_loja, 'fone')))
			<a href="tel:{{ Util::getPropSimpleFromArray($arr_loja, 'fone') }}"><p>{{ Util::getPropSimpleFromArray($arr_loja, 'fone') }}</p></a>
			@endif

		</nav>
	</div>
</header>
