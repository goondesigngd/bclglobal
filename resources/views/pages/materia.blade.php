@extends("main")
@section("content")
    <section class="pag pag_btn" id="top">
        <div class="center">
            <a href="{{ route('capacitacao') }}">
                <button class="button button_isi transition">
                    <span class="icon-left-arrow-line"></span>
                    @lang('content.materia.voltar')
                </button>
            </a>
        </div>
    </section>
    @for($i = 0; $i < count($arr_materia); $i++)
        <section>
            <div class="center">
                <div class="tit">
                    <div class="tit_left_pag tit_color">
                        <h1>{{ Util::getPropFromArray($arr_materia, $i, 'titulo') }}</h1>
                    </div>
                </div>
                <div class="col2 txt_left txt">
                    <p>{!! Util::getPropFromArray($arr_materia, $i, 'subtitulo') !!}</p>
                </div>
                <div class="col2 txt_right txt">
                    <p>{!! Util::getPropFromArray($arr_materia, $i, 'texto') !!}</p> 
                </div>
            </div>
            <div style="clear: both;"></div>
        </section>
        @for($i2 = 0; $i2 < $arr_materia[$i]->countimgs; $i2++)
            <section class="pag_video" style="background: #70534A url({{ Util::getLinkImg($arr_materia[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_materia[$i]->imgs[$i2], $arr_materia[$i]->titulo)) }}) no-repeat top center;"></section>
        @endfor
    @endfor
    @include('includes.materias')
@endsection