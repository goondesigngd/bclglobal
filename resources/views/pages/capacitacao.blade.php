@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <section>
        @for($i = 0; $i < count($arr_capacitacao); $i++)
            <div class="center">
                <div class="col2 left txt">
                    <div class="tit_color">
                        <h1>{{ Util::getPropFromArray($arr_capacitacao, $i, 'titulo') }}</h1>
                    </div>
                    <p>{!! nl2br(Util::getPropFromArray($arr_capacitacao, $i, 'texto')) !!}</p>
                </div>
                <div class="col2 right">
                    <div class="company_video_txt">
						@if($arr_capacitacao[$i]->countimgs)
                            @for($i2 = 0; $i2 < $arr_capacitacao[$i]->countimgs; $i2++)
                                <img src="{{ Util::getLinkImg($arr_capacitacao[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_capacitacao[$i]->imgs[$i2], $arr_capacitacao[$i]->titulo)) }}">
                            @endfor
                        @else
                            <img src="{{ asset('img/capacitacao.jpg') }}{{ Util::getQueryStringVersion() }}">
						@endif
                    </div>
                </div>
            </div>
        @endfor
        <div style="clear: both;"></div>
    </section>
    @include('includes.materias')
@endsection
