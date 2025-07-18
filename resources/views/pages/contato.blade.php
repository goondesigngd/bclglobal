@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <section>
        @for($i = 0; $i < count($arr_contato); $i++)
            <div class="center">
                <div class="tit">
                    <div class="tit_left_pag tit_color">
                        <h1>{{ Util::getPropFromArray($arr_contato, $i, 'titulo') }}</h1>
                    </div>
                </div>
                <div class="col2 txt_left txt">

                    <p>{!! Util::getPropFromArray($arr_contato, $i, 'texto') !!}</p>
                </div>
                <div class="col2 txt_right">
                    @for($i = 0; $i < count($arr_enderecos); $i++)
                    <p><strong>{{ Util::getPropFromArray($arr_enderecos, $i, 'titulo') }}</strong></p>
                    <p>{{ Util::getPropFromArray($arr_enderecos, $i, 'subtitulo') }}</p>
                        <a href="tel:{{ Util::getPropFromArray($arr_enderecos, $i, 'texto') }}"><p>{{ Util::getPropFromArray($arr_enderecos, $i, 'texto') }}</p></a>
                        <br>
                    @endfor
                </div>
            </div>
        @endfor
        <div style="clear: both; margin-bottom: 100px;"></div>
    </section>
    <section class="projeto contacts">
        <div class="col1 col1_color">
            <div class="center">
                <div class="col1_left" style="padding-top: 70px;">
                    <div class="col_form">
                        <form id="formContato">
                            {{ csrf_field() }}
                            <input id="nome" name="nome" type="text" value="@lang('content.contato.input-nome')" data-value="@lang('content.contato.input-nome')" class="inputTxt" />
                            <input id="email" name="email" type="text" value="@lang('content.contato.input-email')" data-value="@lang('content.contato.input-email')" class="inputTxt" />
                            <input id="telefone" name="telefone" type="text" value="@lang('content.contato.input-telefone')" data-value="@lang('content.contato.input-telefone')" class="inputCEL" />
                            <input id="mensagem" name="mensagem" type="text" value="@lang('content.contato.input-mensagem')" data-value="@lang('content.contato.input-mensagem')" class="inputTxt" />
                            {!! Util::getPropSimpleFromArray($arr_meta, 'coderecaptcha') !!}
                            <div class="checkbox">
                                <input type="checkbox" name="acceptnews" id="acceptnews" />
                                @lang('content.contato.inscricao')
                            </div>
                            <div>
                                <div class="msg success" id="alertContato" style="display: none;"></div>
                                <div style="clear: both"></div>
                            </div>
                            <button class="button button_line transition">
                                <span class="icon-right-arrow_line"></span>
                                @lang('content.contato.botao')
                            </button>
                        </form>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                <!-- <div class="col1_right map">{!! Util::getPropSimpleFromArray($arr_loja, 'iframemap') !!}</div> -->
                 <img class="globe" src="{{ asset('img/globe.svg') }}{{ Util::getQueryStringVersion() }}" alt="" aria-hidden="true">
            </div>
        </div>
    </section>
@endsection
