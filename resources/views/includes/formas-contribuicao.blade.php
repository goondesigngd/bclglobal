<section class="gallery">
    <div class="center">
        <div class="tit">
            <div class="tit_left">
                <div class="tit_color">
                    <h1>@lang('content.colabore.formas')</h1>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="row1 row5">
            @for($i = 0; $i < count($arr_formas); $i++)
                @for($i2 = 0; $i2 < $arr_formas[$i]->countimgs; $i2++)
                    <a href="{{ route('forma-contribuicao', ['cod' => Util::getPropFromArray($arr_formas, $i, 'codpublicacao'), 'forma' => str_slug(Util::getPropFromArray($arr_formas, $i, 'titulo'))]) }}">
                        <div class="col3 fly" style="background: url({{ Util::getLinkImg($arr_formas[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_formas[$i]->imgs[$i2], $arr_formas[$i]->titulo)) }}) no-repeat top center;">
                            <div class="col3_shadow">
                                <h2>{{ Util::getPropFromArray($arr_formas, $i, 'titulo') }}</h2>
                            </div>
                        </div>
                    </a>
                @endfor
            @endfor
            <div style="clear: both;"></div>
        </div>
    </div>
</section>