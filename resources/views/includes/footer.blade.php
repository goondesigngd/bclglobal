<footer>
	@for($i = 0; $i < count($arr_boxes_rodape); $i++)
		@for($i2 = 0; $i2 < $arr_boxes_rodape[$i]->countimgs; $i2++)
			<a href="{{ Util::checkExternalLink(Util::getPropFromArray($arr_boxes_rodape, $i, 'link')) }}" target="_blank">
				<div class="news">
					<img src="{{ Util::getLinkImg($arr_boxes_rodape[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_boxes_rodape[$i]->imgs[$i2], $arr_boxes_rodape[$i]->titulo)) }}">
					<div class="news_txt">
						<h2>{{ Util::getPropFromArray($arr_boxes_rodape, $i, 'titulo') }}</h2>
						<span class="icon-right-arrow_line"></span>{{ Util::getPropFromArray($arr_boxes_rodape, $i, 'titulolink') }}
					</div>
				</div>
			</a>
		@endfor
	@endfor
	<div class="foo">
		@if(Util::visitorIsAdmin())
		<div>
			<div class="msg success" style="margin-bottom: 20px;">
				Você é o moderador do site
			</div>
			<div style="clear: both"></div>
		</div>
		@endif
		<div class="center">
			<div class="foo_col1">
				<a href="{{ route('home') }}" class="foo_logo"><img src="{{ asset('img/logo-dark.svg') }}" alt="{{ Util::getPropSimpleFromArray($arr_meta, 'title') }}"></a>
			</div>
			<div class="foo_col3">
				<h2>@lang('content.geral.menu-contatos')</h2>
				@for($i = 0; $i < count($arr_enderecos); $i++)
					<p><strong>{{ Util::getPropFromArray($arr_enderecos, $i, 'titulo') }}</strong></p>
					<p>{{ Util::getPropFromArray($arr_enderecos, $i, 'subtitulo') }}</p>
					<a href="tel:{{ Util::getPropFromArray($arr_enderecos, $i, 'texto') }}"><p>{{ Util::getPropFromArray($arr_enderecos, $i, 'texto') }}</p></a>
					<br>
				@endfor
				<br>
				<!-- <a href="{{ Util::getPropSimpleFromArray($arr_loja, 'facebook') }}" target="_blank"><span class="icon-facebook-logo-2"></span></a> -->
				<a href="{{ Util::getPropSimpleFromArray($arr_loja, 'instagram') }}" target="_blank"><span class="icon-instagram-logo"></span></a>
				<a href="{{ Util::getPropSimpleFromArray($arr_loja, 'canalyoutube') }}" target="_blank"><span class="icon-youtube-symbol"></span></a>
			</div>
			<div class="foo_col2">
				<h2>@lang('content.geral.menu-navegue')</h2>
				<a href="{{ route('home') }}"><p>@lang('content.geral.menu-home')</p></a>
				<a href="{{ route('empresa') }}"><p>@lang('content.geral.menu-empresa')</p></a>
				<a href="{{ route('capacitacao') }}"><p>@lang('content.geral.menu-capacitacao')</p></a>
				<!-- <a href="{{ route('trabalhos') }}"><p>@lang('content.geral.menu-trabalhos')</p></a> -->
				<a href="{{ route('colaborar') }}"><p>@lang('content.geral.menu-colaborar')</p></a>
				<!-- <a href="{{ route('materiais') }}"><p>@lang('content.geral.menu-materiais')</p></a> -->
				<a href="{{ route('contato') }}"><p>@lang('content.geral.menu-contatos')</p></a>
				<br/>
				<br/>
				<!-- <h2>@lang('content.geral.menu-footer-idioma')</h2>
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
				@endif -->
			</div>
			<div class="foo_bottom">
				<h4>@lang('content.geral.copyright')</h4>
				<div class="grid__item">
					<div class="tooltip tooltip--cora" data-type="cora">
						<div class="tooltip__trigger" role="tooltip" aria-describedby="info-cora">
							<a href="http://www.goondt.com/pt/home" target="_blank"  class="goonc"><span class="tooltip__trigger-text"><div class="goon"></div></span></a>
						</div>
						<div class="tooltip__base">
							<svg class="tooltip__shape" width="100%" height="100%" viewBox="0 0 400 300">
								<path d="M 199,21.9 C 152,22.2 109,35.7 78.8,57.4 48,79.1 29,109 29,142 29,172 45.9,201 73.6,222 101,243 140,258 183,260 189,270 200,282 200,282 200,282 211,270 217,260 261,258 299,243 327,222 354,201 371,172 371,142 371,109 352,78.7 321,57 290,35.3 247,21.9 199,21.9 Z"/>
							</svg>
							<div class="tooltip__content" id="info-cora">@lang('content.geral.tooltip')</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		document.getElementById('back_video').play();

	</script>

	<script type="text/javascript">
		var path_absolute = '{{asset("")}}';
	</script>
	<script type='text/javascript' src='{{ asset("js/jquery-2.1.3.min.js") }}{{ Util::getQueryStringVersion() }}'></script>
	<!-- Icons -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/icomoon/style.css') }}{{ Util::getQueryStringVersion() }}" />
	<!-- Scroll parallax -->
	<script src="{{ asset('js/jquery.parallax-scroll.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Lightbox ---->
	<link rel="stylesheet" type="text/css" media="all" href="{{ asset('lightbox/css/jquery.lightbox-0.5_original.css') }}{{ Util::getQueryStringVersion() }}">
	<script type="text/javascript" src="{{ asset('lightbox/js/jquery.lightbox-0.5_original.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Banner
	<link rel="stylesheet" type="text/css" href="{{ asset('banner/style.css') }}{{ Util::getQueryStringVersion() }}" />
	<script type="text/javascript" src="{{ asset('banner/effect.js') }}{{ Util::getQueryStringVersion() }}"></script>
	-->
	<!-- Other -->
	<script src="{{ asset('js/other_effects.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Menu -->
	<script src="{{ asset('js/modernizr.custom.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Scrool Fly -->
	<script src="{{ asset('js/efeitofly.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Tooltip Goon -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/tooltip_demo.css') }}{{ Util::getQueryStringVersion() }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/tooltip_component.css') }}{{ Util::getQueryStringVersion() }}" />
	<script src="{{ asset('js/tooltip_anime.min.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<script src="{{ asset('js/tooltip_charming.min.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<script src="{{ asset('js/tooltip_main.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Mask -->
	<script src="{{ asset('js/jquery.mask.min.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Effects text -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/effecttxt_animate.css') }}{{ Util::getQueryStringVersion() }}" />
	<script>document.documentElement.className = 'js';</script>
	<script src="{{ asset('js/effecttxt_anime.min.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<script src="{{ asset('js/effecttxt_scroll.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<script src="{{ asset('js/effecttxt_main.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<script src="{{ asset('js/effecttxt_effects.js') }}{{ Util::getQueryStringVersion() }}"></script>
	<!-- Recaptcha -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- Webpush Notification -->
	<script type="text/javascript" >
		var pub_key = "{{ Util::getPropSimpleFromArray($arr_loja,'publickey') }}";
		var action_sub = "{{ route('api-push') }}";
	</script>
	<script type="text/javascript" src="{{asset('js/register-service-worker.js')}}{{Util::getQueryStringVersion()}}"></script>

	<!-- AJAX Form Contato e Newsletter -->
	<script>
		var route_sendemail = '{{ route("contatosend") }}';

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(document).ready(function(){
			$("#formContato").on("submit", function(event) {
				event.preventDefault();

				$("#buttonContato").attr("disabled", true);
				$("#alertContato").show();
				$("#alertContato").html("Enviando...");

				$.ajax({
					type: "POST",
					url: route_sendemail,
					data: {
						nome: $("#nome").val(),
						email: $("#email").val(),
						telefone: $("#telefone").val(),
						mensagem: $("#mensagem").val(),
						acceptnews: $("#acceptnews").val(),
						'g-recaptcha-response': $("[name=g-recaptcha-response]").val(),
						_token: document.getElementsByName("_token")[0].value
					},
					success: function(data) {
						$("#nome").removeClass("input_error");
						$("#email").removeClass("input_error");
						$("#telefone").removeClass("input_error");
						$("#mensagem").removeClass("input_error");
						$("#nome").val("@lang('content.contato.input-nome')");
						$("#email").val("@lang('content.contato.input-email')");
						$("#telefone").val("@lang('content.contato.input-telefone')");
						$("#mensagem").val("@lang('content.contato.input-mensagem')");
						$("#alertContato").removeClass("error");
						$("#alertContato").addClass("success");
						$("#alertContato").html("@lang('content.contato.mensagem-sucesso')");
						$("#buttonContato").removeAttr("disabled");
					},
					error: function(error) {
						$("#" + error.responseJSON.campo).addClass("input_error");
						$("#alertContato").removeClass("success");
						$("#alertContato").addClass("error");
						$("#alertContato").html(error.responseJSON.mensagem);
						$("#buttonContato").removeAttr("disabled");
					}
				});
			});
		});
	</script>
	</footer>
