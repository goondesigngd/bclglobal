@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <main class="center">
        <section class="members">
            <div class="tit tit_color">
                <h1>@lang('content.membros.titulo')</h1>
            </div>
            <ul class="members__list">
                
                @for($i = 0; $i < count($arr_membros); $i++)
                <li class="members__item">
                    
                    @for($i2 = 0; $i2 < $arr_membros[$i]->countimgs; $i2++)
                        <img class="members__img" src="{{ Util::getLinkImg($arr_membros[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_membros[$i]->imgs[$i2], $arr_membros[$i]->titulo))}} " alt="{{ Util::getPropFromArray($arr_membros, $i, 'titulo') }}">
                    @endfor

                    <h2 class="members__name">{{ Util::getPropFromArray($arr_membros, $i, 'titulo') }}</h2>
                    <p>{{ Util::getPropFromArray($arr_membros, $i, 'subtitulo') }}</p>
                    <details class="members__details">
                        <summary class="members__details__title">@lang('content.membros.botao-detalhes')</summary>
                        <p class="members__details__content">{{ Util::getPropFromArray($arr_membros, $i, 'texto') }}</p>
                    </details>
                </li>
                @endfor

            </ul>
        </section>
    </main>
@endsection