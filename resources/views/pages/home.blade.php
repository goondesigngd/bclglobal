@extends("main")
@section("content")
	<script>
		/* API YOUTUBE */
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		var player1;
		var player2;

		function onYouTubeIframeAPIReady() {
		player1 = new YT.Player('player1', {
			height: $(window).height(),
			width: $(window).width(),
			@for($i = 0; $i < count($arr_video); $i++)
				videoId: '{{ Util::getPropFromArray($arr_video, $i, "embedyoutube") }}'
        	@endfor
		});
		player2 = new YT.Player('player2', {
			height: $(window).height(),
			width: $(window).width(),
			videoId: '{{ Util::getPropFromArray($arr_video, $i, "embedyoutube") }}'
		});
		}

		function onPlayerReady(event) {
		event.target.playVideo();
		}
		var done = false;
		function onPlayerStateChange(event) {
		if (event.data == YT.PlayerState.PLAYING && !done) {
			done = true;
		}
		}
		function playVideo(player) {
		player.playVideo();
		}
		function stopVideo(player) {
		player.stopVideo();
		}

	</script>
	@for($i = 0; $i < count($arr_banners); $i++)
			<section class="top" id="top">
				<video autoplay loop muted playsinline class="back_video" id="back_video">
					<source src="{{ asset('video/BCCL-intro.mp4') }}{{ Util::getQueryStringVersion() }}" type='video/mp4'>
				</video>
				<div class="top_gradient">
					<div class="center video_txt">
						<div class="top_txt" id="rev-4">
							<h1>{{ Util::getPropFromArray($arr_banners, $i, 'titulo') }}</h1>
							<p>{!! nl2br(Util::getPropFromArray($arr_banners, $i, 'texto')) !!}</p>
							<a href="#bccl" class="scroll"><button class="button button_line transition"><span class="icon-download1"></span></button></a>
						</div>
					</div>
				</div>
			</section>
	@endfor
	@for($i = 0; $i < count($arr_video); $i++)
		@for($i2 = 0; $i2 < $arr_video[$i]->countimgs; $i2++)
			<section class="top_video shadow">
				@if($arr_video[$i]->countimgs)
					<div class="top_video_pop" style="background: url('{{ Util::getLinkImg($arr_video[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_video[$i]->imgs[$i2], $arr_video[$i]->titulo)) }}') no-repeat top center">
						<div class="top_video_gradient transition" id="popupopenhome">
							<span class="icon-play-button"></span>
						</div>
					</div>
				@else
					<div class="top_video_pop">
						<div class="top_video_gradient transition" id="popupopenhome">
							<span class="icon-play-button"></span>
						</div>
					</div>
				@endif
				<div class="arrowr"></div>
				<div class="popup_video popup_home" id="popuvideohome">
					<div class="popup_back"></div>
					<div class="popup_txt" id="popuptxthome" onclick="stopVideo(player1);">
						<div class="popup_close icon-cancel" id="popupclosehome" onclick="stopVideo(player1);"></div>
						<div class="center">
							<div id="player1"></div>
						</div>
					</div>
				</div>
			</section>
        @endfor
	@endfor
	<section class="bccl"  id="bccl">
		@for($i = 0; $i < count($arr_sobre); $i++)
			<div class="center">
				<div class="col2 right tit_color txt fly">
					<h1>{{ Util::getPropFromArray($arr_sobre, $i, 'titulo') }}</h1>
					<p>{!! nl2br(Util::getPropFromArray($arr_sobre, $i, 'subtitulo')) !!}</p>
					<p>{!! nl2br(Util::getPropFromArray($arr_sobre, $i, 'texto')) !!}</p>
					<a href="{{ route(Util::getPropFromArray($arr_sobre, $i, 'link')) }}">
						<button class="button button_isi transition">
							<span class="icon-right-arrow_line"></span>
							{{ Util::getPropFromArray($arr_sobre, $i, 'titulolink') }}
						</button>
					</a>
				</div>
			</div>
		@endfor
		<div style="clear: both;"></div>
	</section>
	<section class="projeto">
		<div class="col1 col1_color">
			@for($i = 0; $i < count($arr_contribuir); $i++)
				@for($i2 = 0; $i2 < $arr_contribuir[$i]->countimgs; $i2++)
					<div class="center">
						<div class="col1_left fly">
							<h1>{{ Util::getPropFromArray($arr_contribuir, $i, 'titulo') }}</h1>
							<p>{!! nl2br(Util::getPropFromArray($arr_contribuir, $i, 'texto')) !!}</p>
							<div class="arrowl"></div>
							<br><br><br>
							<a href="{{ Util::checkExternalLink(Util::getPropFromArray($arr_contribuir, $i, 'link')) }}" target="_blank">
								<span class="icon-right-arrow_line"></span>
								{{ Util::getPropFromArray($arr_contribuir, $i, 'titulolink') }}
							</a>
						</div>
						<div class="col1_right">
							@if($arr_video[$i]->countimgs)
							<img src="{{ Util::getLinkImg($arr_contribuir[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_contribuir[$i]->imgs[$i2], $arr_contribuir[$i]->titulo)) }}">
							@else
							<img src="{{ asset('img/home_projeto.jpg') }}{{ Util::getQueryStringVersion() }}">
							@endif
						</div>
					</div>
				@endfor
			@endfor
		</div>
	</section>
	<section class="gallery">
		<!-- <div class="center">
			<div class="tit">
				<div class="tit_left">
					<div class="tit_color">
						<h1>@lang('content.home.galeria-titulo')</h1>
					</div>
					<p>@lang('content.home.galeria-texto')</p>
				</div>
				<div class="tit_right">
					<a href="{{ route('trabalhos') }}">
						<button class="button button_isi transition">
							<span class="icon-right-arrow_line"></span>
							@lang('content.home.galeria-botao')
						</button>
					</a>
				</div>
			</div>
			<div class="row1">
                @include('includes.galerias')
			</div>
		</div> -->
	</section>
	<section class="social">
		<div class="center">
			<div class="tit tit_color txt_center fly">
				<h1>@lang('content.home.social-titulo')</h1>
				<p>@lang('content.home.social-texto')</p>
				<br><br>
				<!-- <a href="{{ Util::getPropSimpleFromArray($arr_loja, 'facebook') }}" target="_blank"><span class="icon-facebook-logo-2"></span></a> -->
				<a href="{{ Util::getPropSimpleFromArray($arr_loja, 'instagram') }}" target="_blank"><span class="icon-instagram-logo"></span></a>
				<a href="{{ Util::getPropSimpleFromArray($arr_loja, 'canalyoutube') }}" target="_blank"><span class="icon-youtube-symbol"></span></a>
			</div>
		</div>
	</section>
@endsection
