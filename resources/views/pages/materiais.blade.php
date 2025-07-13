@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <section>
        @for($i = 0; $i < count($arr_materiais); $i++)
            <div class="center">
                <div class="col2 left txt">
                <div class="tit_color">
                    <h1 style="margin-bottom: 10px;">{{ Util::getPropFromArray($arr_materiais, $i, 'titulo') }}</h1>
                </div>
                <p>{!! nl2br(Util::getPropFromArray($arr_materiais, $i, 'texto')) !!}</p>
                </div>
            </div>
        @endfor
        <div style="clear: both;"></div>
    </section>
    <section class="links" style="margin-top: 0px;">
        <div class="links_interno center">
            <div class="links_col">
                @for($i = 0; $i < count($arr_arquivos); $i++)
                    <div class="links_lin">
                        <a href="{{ route('file-id',['id'=>Util::setBase64Encode(Util::getPropFromArray($arr_arquivos,$i)->files[0]->codfile),'forcedown'=>'s']) }}">{{Util::getPropFromArray($arr_arquivos,$i,'titulo') }}</a>
                    </div>
                @endfor
            </div>
            <div style="clear: both;"></div>
        </div>
    </section>
@endsection