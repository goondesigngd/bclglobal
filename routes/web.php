<?php

if (in_array(Request::segment(1), Config::get('app.locales'))) {
    App::setLocale(Request::segment(1));
    Session::put('locale', Request::segment(1));
} else {
    App::setLocale("en");
    Session::put('locale', "en");
}

Route::get('/', function () {
    return redirect(App::getLocale());
});

Route::group(array('prefix' => Session::get('locale')), function () {
    Route::get('/', "HomeController@content");

    Route::get('/' . Lang::get('routes.home'), "HomeController@content")->name("home");
    Route::get('/' . Lang::get('routes.sobre-o-bccl'), "EmpresaController@content")->name("empresa");
    Route::get('/' . Lang::get('routes.capacitacao'), "CapacitacaoController@content")->name("capacitacao");
    Route::get('/' . Lang::get('routes.materia') . '/{cod}/{materia}', "CapacitacaoController@detail")->where('cod', '[0-9]+')->name("materia");
    Route::get('/' . Lang::get('routes.materiais'), "MateriaisController@content")->name("materiais");

    Route::group(['prefix' => '/' . Lang::get('routes.colaborar')], function () {
        Route::get('/', "ColaboreController@content")->name("colaborar");
        Route::get('{cod}/{forma}', "ColaboreController@detail")->where('cod', '[0-9]+')->name("forma-contribuicao");
        Route::get(Lang::get('routes.canais-doacoes'), "ColaboreController@channels")->name("canais-doacoes");
    });

    Route::group(['prefix' => '/' . Lang::get('routes.trabalhos')], function () {
        Route::get('{offset?}', "TrabalhosController@content")->where('offset', '[0-9]+')->name("trabalhos");
        Route::get('{cod}/{trabalho}', "TrabalhosController@detail")->where('cod', '[0-9]+')->name("trabalho");
    });

    Route::group(['prefix' => '/' . Lang::get('routes.contato')], function () {
        Route::get('/', "ContatoController@content")->name("contato");
        Route::post('/', "GoonSendMailController@sendform")->name("contatosend");
    });
});

//************************************************
// ROTAS GOON, FIXAS PARA TODOS OS SITES
//************************************************
Route::get('/webmail', function () {
    return Redirect::to('https://' . Config::get('app.client_domain') . ':2096');
});
//
Route::get('/gerenciador', function () {
    return Redirect::to('https://' . "sequence." . Config::get('app.client_domain') . '?gerenciador');
});

/* ROTA DE TRATAMENTO DE IMAGENS */
Route::group(['prefix' => '/img'], function () {

    Route::get('/seo/{id}/{tm}/{mon}/{dm}/{name}', "GoonFilesController@getImgLink")->name('imgLink');
    // pagina com mais que uma funcionalidade pode exta dentro de um prefixo.
    Route::get('/{id}/{tm}/{name}/{mon?}/{dimenssion?}/{pars?}', "GoonFilesController@getimg")->name('img');

    Route::get('/notify/{id}', "GoonFilesController@getImgToNotify")->name('imgNotify');

});

/* ROTA DE TRATAMENTO DE FILES */
Route::get('/file/{id}/{forcedown}/{nm?}', "GoonFilesController@getfile")->name('file-id');
Route::get('/file-full/{filename}/{nm}/{force?}', "GoonFilesController@getfilefull")->where('force', '[0-9]+')->name('file-full');

/* ROTA DE TRATAMENTO DE ANALISE DE ACESSOS */
Route::get('/analyser/{redirect}/{lastpage}', "GoonAnalyserController@redirect");
Route::get('/errors', "GoonErrorsController@error404")->name('notfound');

/* ROTA DE TRATAMENTO DE ENVIO DE FORMULARIOS */
Route::post('/subscribe-mail', "GoonSendMailController@subscribeMail")->name("subscribemail");
