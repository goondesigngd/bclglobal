@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <section>
        @for($i = 0; $i < count($arr_forma); $i++)
            <div class="center">
                <div class="col2 left txt">
                <div class="tit_color">
                    <h1>{{ Util::getPropFromArray($arr_forma, $i, 'titulo') }}</h1>
                </div>
                <p>{!! nl2br(Util::getPropFromArray($arr_forma, $i, 'texto')) !!}</p>
                <a href="{{ route('canais-doacoes') }}">
                    <button class="button button_isi transition">
                        <span class="icon-right-arrow_line"></span>
                        @lang('content.colabore.botao')
                    </button>
                </a>
                </div>
                <div class="col2 right">
                    <div class="company_video_txt">
						@if($arr_forma[$i]->countimgs)
                            @for($i2 = 0; $i2 < $arr_forma[$i]->countimgs; $i2++)
                                <img src="{{ Util::getLinkImg($arr_forma[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_forma[$i]->imgs[$i2], $arr_forma[$i]->titulo)) }}">
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
