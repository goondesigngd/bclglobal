@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <section>
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
                    <a href="{{ Util::getPropFromArray($arr_botoes, $j, 'link') }}">
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
    @include('includes.formas-contribuicao')
    @include('includes.colaboradores')
@endsection