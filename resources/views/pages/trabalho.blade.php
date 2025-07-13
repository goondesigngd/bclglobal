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
            @for($i = 0; $i < count($arr_trabalho); $i++)
                videoId: '{{ Util::getPropFromArray($arr_trabalho, $i, "embedyoutube") }}'
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
    <section class="pag pag_btn" id="top">
        <div class="center">
            <a href="{{ route('trabalhos') }}">
                <button class="button button_isi transition">
                    <span class="icon-left-arrow-line"></span>
                    @lang('content.trabalho.voltar')
                </button>
            </a>
        </div>
    </section>
    @for($i = 0; $i < count($arr_trabalho); $i++)
        <section>
            <div class="center">
                <div class="tit">
                    <div class="tit_left_pag tit_color">
                        <h1>{{ Util::getPropFromArray($arr_trabalho, $i, 'titulo') }}</h1>
                    </div>

                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_instagram"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_linkedin"></a>
                        <a class="a2a_button_email"></a>
                    </div>
                    <script>
                        var a2a_config = a2a_config || {};
                        a2a_config.locale = "pt-BR";
                    </script>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                </div>
                <div class="col2 txt_left txt">
                    <p>{!! nl2br(Util::pegaLink(Util::getPropFromArray($arr_trabalho, $i, 'subtitulo'))) !!}</p>
                </div>
                <div class="col2 txt_right txt">
                    <p>{!! nl2br(Util::pegaLink(Util::getPropFromArray($arr_trabalho, $i, 'texto'))) !!}</p> 
                </div>
            </div>
            <div style="clear: both;"></div>
        </section>

        @if(Util::getPropFromArray($arr_trabalho, $i, "embedyoutube"))
            @if($arr_trabalho[$i]->countimgs > 1)
                <section class="pag_video" style="background: #70534A url({{ Util::getLinkImg($arr_trabalho[$i]->imgs[1]->codfotocadastro, 'gd', Util::seoImgLink($arr_trabalho[$i]->imgs[1], $arr_trabalho[$i]->titulo)) }}) no-repeat top center;" id="popupopen" class="company_video_txt" onclick="playVideo(player3);">
                    <span class="icon-play-button"></span>
                </section>
            @else
                <section class="pag_video" style="background: #70534A url({{ asset('img/video_galeria.jpg') }}) no-repeat top center;" id="popupopen" class="company_video_txt" onclick="playVideo(player3);">
                    <span class="icon-play-button"></span>
                </section>
            @endif
        @endif

        <div class="popup_video" id="popuvideo">
                <div class="popup_back"></div>
                <div class="popup_txt" id="popuptxt" onclick="stopVideo(player3);">
                    <div class="popup_close icon-cancel" id="popupclose" onclick="stopVideo(player3);"></div>
                    <div class="center">
                        <div id="player3"></div>
                    </div>
                </div>
        </div>

        @if($arr_trabalho[$i]->countimgs > 2)
        
            <section class="gallery_pag">
                <div class="center">
                    <div class="tit">
                        <div class="tit_left">
                            <div class="tit_color">
                                <h1>@lang('content.trabalho.fotos')</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row4">
                        <div id="content">
                            <div id="thumbnails">
                                <ul class="clearfix">
                                    @for($i2 = 2; $i2 < $arr_trabalho[$i]->countimgs; $i2++)
                                        <li>
                                            <a href="{{ Util::getLinkImg($arr_trabalho[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_trabalho[$i]->imgs[$i2], $arr_trabalho[$i]->imgs[$i2]->title), 's') }}" title="{{ Util::getPropFromArray($arr_trabalho, $i, 'titulo') }}">
                                                <div class="col4 fly" style="background: url({{Util::getLinkImg($arr_trabalho[$i]->imgs[$i2]->codfotocadastro,'pq',Util::seoImgLink($arr_trabalho[$i]->imgs[$i2], $arr_trabalho[$i]->imgs[$i2]->title))}}) no-repeat center center;">
                                                        <div class="col4_shadow">
                                                            <span class="icon-magnifier-tool"></span>
                                                        </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </section>

        @endif

    @endfor
@endsection
