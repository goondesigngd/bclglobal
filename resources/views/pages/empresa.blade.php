@extends("main")
@section("content")
    <script>
        /* API YOUTUBE */
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player3;

        function onYouTubeIframeAPIReady() {
            player3 = new YT.Player('player3', {
            height: '360',
            width: '640',
            @for($i = 0; $i < count($arr_sobre); $i++)
                videoId: '{{ Util::getPropFromArray($arr_sobre, $i, "embedyoutube") }}'
            @endfor
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
    <section class="pag" id="top"></section>
    <section class="company">
        @for($i = 0; $i < count($arr_sobre); $i++)
            <div class="center">
                <div class="col2 left txt">
                <div class="tit_color">
                    <h1>{{ Util::getPropFromArray($arr_sobre, $i, 'titulo') }}</h1>
                </div>
                <p>{!! nl2br(Util::getPropFromArray($arr_sobre, $i, 'texto')) !!}</p>
                </div>
                <div class="col2 right">
                    <div style="cursor: pointer;" id="popupopen" class="txt_video" onclick="playVideo(player3);">
						@if($arr_sobre[$i]->countimgs)
                            @for($i2 = 0; $i2 < $arr_sobre[$i]->countimgs; $i2++)
                                <img src="{{ Util::getLinkImg($arr_sobre[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_sobre[$i]->imgs[$i2], $arr_sobre[$i]->titulo)) }}">
                            @endfor
                        @else
                            <img src="{{ asset('img/cebipam1.jpg') }}{{ Util::getQueryStringVersion() }}">
						@endif
                        <span class="icon-play-button"></span>
                    </div>
                    <div class="popup_video" id="popuvideo">
                            <div class="popup_back"></div>
                            <div class="popup_txt" id="popuptxt" onclick="stopVideo(player3);">
                                <div class="popup_close icon-cancel" id="popupclose" onclick="stopVideo(player3);"></div>
                                <div class="center">
                                    <div id="player3"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endfor
        <div style="clear: both;"></div>
    </section>
    <section class="gallery">
        <!-- <div class="center">
            <div class="tit">
                <div class="tit_left">
                    <div class="tit_color">
                        <h1>@lang('content.empresa.galeria-titulo')</h1>
                    </div>
                    <p>@lang('content.empresa.galeria-texto')</p>
                </div>
                <div class="tit_right">
                    <a href="{{ route('trabalhos') }}">
                        <button class="button button_isi transition">
                            <span class="icon-right-arrow_line"></span>
                            @lang('content.empresa.galeria-botao')
                        </button>
                    </a>
                </div>
            </div>
            <div class="row1">
                @include('includes.galerias')
            </div>
        </div> -->
    </section>
@endsection