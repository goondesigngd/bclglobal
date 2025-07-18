@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    
    <section>
        @for($i = 0; $i < count($arr_colabore); $i++)
            <div class="center">
                <div class="col2 left txt">
                <div class="tit_color">
                    <h1>{{ Util::getPropFromArray($arr_colabore, $i, 'titulo') }}</h1>
                </div>

                @if(Util::getPropFromArray($arr_colabore, $i, 'link'))
                <a href="{{ Util::checkExternalLink(Util::getPropFromArray($arr_colabore, $i, 'link')) }}" target="_blank">
                    <button class="button button_isi button_margin transition">
                        <span class="icon-right-arrow_line"></span>
                        {{ Util::getPropFromArray($arr_colabore, $i, 'titulolink') }}
                    </button>
                </a>
                @endif

                <p>{!! nl2br(Util::getPropFromArray($arr_colabore, $i, 'texto')) !!}</p>

                <!-- <div class="tit_color">
                <h1>@lang('content.colabore.formas')</h1>
                </div> 

                    @for($i2 = 0; $i2 < count($arr_formas); $i2++)
                        <b>{!! nl2br(Util::getPropFromArray($arr_formas, $i2, 'titulo')) !!}</b>
                        <p>{!! nl2br(Util::getPropFromArray($arr_formas, $i2, 'texto')) !!}</p>
                    @endfor

                -->

                <!-- <a href="#gallery">
                    <button class="button button_isi transition">
                        <span class="icon-right-arrow_line"></span>
                        {{ Util::getPropFromArray($arr_colabore, $i, 'titulolink') }}
                    </button>
                </a> -->
                </div>
                <div class="col2 right">
                    <div class="company_video_txt">
						@if($arr_colabore[$i]->countimgs)
                            @for($i2 = 0; $i2 < $arr_colabore[$i]->countimgs; $i2++)
                                <img src="{{ Util::getLinkImg($arr_colabore[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_colabore[$i]->imgs[$i2], $arr_colabore[$i]->titulo)) }}">
                            @endfor
                        @else
                            <img src="{{ asset('img/colabore.jpg') }}{{ Util::getQueryStringVersion() }}">
						@endif
                    </div>
                </div>
            </div>
        @endfor
        <div style="clear: both;"></div>
    </section>


    <section class="gallery" id="gallery">

        @for($i = 0; $i < count($arr_texto); $i++)
            <div class="center">
                <div class="col2 left txt">
                <div class="tit_color">
                    <h1>{{ Util::getPropFromArray($arr_texto, $i, 'titulo') }}</h1>
                </div>
                <p>{!! nl2br(Util::getPropFromArray($arr_texto, $i, 'texto')) !!}</p>

                @for($j = 0; $j < count($arr_bancos); $j++)
                    <strong>{{ Util::getPropFromArray($arr_bancos, $j, 'titulo') }}</strong>

                    <p>{!! nl2br(Util::getPropFromArray($arr_bancos, $j, 'texto')) !!}</p>
                @endfor

                @for($j = 0; $j < count($arr_botoes); $j++)
                    <a href="{{ Util::getPropFromArray($arr_botoes, $j, 'link') }}" target="blank">
                        <button class="button button_isi transition">
                            <span class="icon-right-arrow_line"></span>
                            {{ Util::getPropFromArray($arr_botoes, $j, 'titulo') }}
                        </button>
                    </a>
                @endfor
                </div>
                <div class="col2 right">
                    <div class="company_video_txt">
						@if($arr_texto[$i]->countimgs)
                            @for($i2 = 0; $i2 < $arr_texto[$i]->countimgs; $i2++)
                                <img src="{{ Util::getLinkImg($arr_texto[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_texto[$i]->imgs[$i2], $arr_texto[$i]->titulo)) }} ">
                            @endfor
                        @else
                            <img src="{{ asset('img/colabore.jpg') }}{{ Util::getQueryStringVersion() }}">
						@endif
                    </div>
                </div>
            </div>
        @endfor
        <div style="clear: both;"></div>
    </section>


    <!-- include('includes.formas-contribuicao') -->
    @include('includes.colaboradores')
@endsection
