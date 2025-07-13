<section class="gallery_pag">
    <div class="center">
        <div class="tit">
            <div class="tit_left">
                <div class="tit_color">
                    <h1>@lang('content.colabore.colaboradores')</h1>
                </div>
            </div>
        </div>
        <div class="row4">
            @for($i = 0; $i < count($arr_colaboradores); $i++)
                @for($i2 = 0; $i2 < $arr_colaboradores[$i]->countimgs; $i2++)
                    <div class="col4 fly" style="background: url({{ Util::getLinkImg($arr_colaboradores[$i]->imgs[$i2]->codfotocadastro, 'gd', Util::seoImgLink($arr_colaboradores[$i]->imgs[$i2], $arr_colaboradores[$i]->titulo)) }}) no-repeat center center; background-size: cover;">
                        <a href="{{ empty(Util::getPropFromArray($arr_colaboradores, $i, 'link')) ? '#' : url(Util::getPropFromArray($arr_colaboradores, $i, 'link').'') }}" target="blank">
                            <div class="col4_shadow">
                                <p>
                                    {{ Util::getPropFromArray($arr_colaboradores, $i, 'titulo') }} 
                                </p>
                            </div>
                        </a>
                    </div>
                @endfor
            @endfor
        </div>
    </div>
    <div style="clear: both;"></div>
</section>
