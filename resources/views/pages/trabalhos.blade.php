@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <section class="gallery_pag">
        <div class="center">
            <div class="tit">
                <div class="tit_left">
                    <div class="tit_color">
                        <h1>@lang('content.trabalhos.titulo')</h1>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="row2">
                @include('includes.galerias')
                <div style="clear: both;"></div>
            </div>
            <div class="pagination">
                @for($i=0; $i < count($paginations->pages); $i++)
                    <a href="{{ route('trabalhos', ['offset'=> $paginations->pages[$i] ]) }}">
                        <div class="pg">{{ $paginations->pages[$i] }}</div>
                    </a>
                @endfor
            </div>
        </div>
    </section>
@endsection