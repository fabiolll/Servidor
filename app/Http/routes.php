<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when tha(t URI is requested.
|
*/

Route::get('/', function () {

    return view('index');
});

Route::get('/administrador', function () {

    return view('administrador');
});


Route::get('/acessoNegado', function () {

    return view('acessoNegado');
});

Route::get('cadastraEmpresa', function () {
   return view('cadastrarEmpresa');
});


Route::get('{id}/{codigoEmpresa}/alteraUnidade',[ 'middleware' => 'auth.checkAuth:empresa', 'as'=>'unidades.editar', 'uses'=>'ControllerRoutes\DataBaseController@alteraUnidade']);

Route::get('{codigoEmpresa}/adicionaUnidade',[ 'middleware' => 'auth.checkAuth:empresa', 'uses'=>'ControllerRoutes\DataBaseController@adicionaUnidade']);


Route::get('{id}/{codigoEmpresa}/alteraEstoqueProduto',[ 'middleware' => 'auth.checkAuth:empresa', 'as'=>'produtos.editar', 'uses'=>'ControllerRoutes\DataBaseController@alteraProduto']);

Route::get('{id}/{codigoAdministrador}/alteraEmpresa',[ 'middleware' => 'auth.checkAuthAdministrador:administrador', 'as'=>'empresas.editar', 'uses'=>'ControllerRoutes\DataBaseController@alteraEmpresa']);

Route::get('{id}/{codigoEmpresa}/adicionaProdutoEstoque',[ 'middleware' => 'auth.checkAuth:empresa', 'uses'=>'ControllerRoutes\DataBaseController@adicionaProdutoEstoque']);



Route::get('logout/{codigoEmpresa}', ['middleware' => 'auth.checkAuth:empresa', 
  'uses'=>'ControllerRoutes\DataBaseController@logoutSistemaWeb']);



Route::get('listarUnidades/{codigoEmpresa}', [
    'middleware' => 'auth.checkAuth:empresa',
    'uses' => 'ControllerRoutes\DataBaseController@listarUnidadesPorEmpresa'
]);

Route::get('listarEmpresas/{codigoAdministrador}', [
    'middleware' => 'auth.checkAuthAdministrador:administrador',
    'uses' => 'ControllerRoutes\DataBaseController@listarEmpresas'
]);

Route::get('listarProdutos/{codigoUnidade}/{codigoEmpresa}', [
    'middleware' => 'auth.checkAuth:empresa',
    'uses' => 'ControllerRoutes\DataBaseController@listarProdutosPorUnidade'
]);

Route::get('verificaProdutoEstoque/{codigoEmpresa}/{codigoUnidade}/{codigoProduto}', [
    'middleware' => 'auth.checkAuth:empresa',
    'uses' => 'ControllerRoutes\DataBaseController@verificaProdutoEstoque'
]);

Route::get('buscaProdutosPorCategoria/{codigoEmpresa}/{codigoUnidade}/{codigoCategoria}', [
    'middleware' => 'auth.checkAuth:empresa',
    'uses' => 'ControllerRoutes\DataBaseController@buscarProdutosPorCategoria'
]);


  
  Route::get('/test', function () {
    
     date_default_timezone_set('America/Sao_Paulo');

        $data_compra = date("y/m/d");
        $hora_compra = date("H:i:s");

        print_r($data_compra. " ");
        print_r($hora_compra);
}); 

Route::get('/supermercados', 'ControllerRoutes\DataBaseController@listarUnidades');

Route::get('/buscarCategorias', 'ControllerRoutes\DataBaseController@buscarCategorias');
Route::get('/produtos/{categoria}/{unidade}', 'ControllerRoutes\DataBaseController@buscarProdutosPorCategoriasUnidade');


// get/supermercados unidades do supermercado

//get/categorias

//get/supermercados/{categoria}/produtos/



// post

Route::post('/compra', 'ControllerRoutes\DataBaseController@adicionarCompra'
);


Route::post('/user/login', 'ControllerRoutes\DataBaseController@loginCliente');

Route::post('/user/cadastrar', 'ControllerRoutes\DataBaseController@cadastrarCliente');

Route::post('/login', 'ControllerRoutes\DataBaseController@loginEmpresa');

Route::post('/loginAdministrador', 'ControllerRoutes\DataBaseController@loginAdministrador');


Route::post('/adicionarUnidade/{codigoEmpresa}', [
   'middleware' => 'auth.checkAuth:empresa',
   'uses' => 'ControllerRoutes\DataBaseController@adicionarUnidade'
]);

Route::post('/adicionarEstoqueProduto/{codigoEmpresa}', [
   'middleware' => 'auth.checkAuth:empresa',
   'uses' => 'ControllerRoutes\DataBaseController@adicionarEstoqueProduto'
]);


Route::post('/cadastrarEmpresa', 'ControllerRoutes\DataBaseController@cadastrarEmpresa');

//post/compra (recebe um array de produtos)
//post/cadastrarCliente
//post/user (login)


// put
Route::put('/alterarUnidade/{codigoEmpresa}', [
   'middleware' => 'auth.checkAuth:empresa',
   'uses' => 'ControllerRoutes\DataBaseController@alterarUnidade'
]);

Route::put('/alterarEstoqueProduto/{codigoEmpresa}', [
   'middleware' => 'auth.checkAuth:empresa',
   'uses' => 'ControllerRoutes\DataBaseController@alterarEstoqueProduto'
]);

Route::put('{id}/{codigoEmpresa}/removerUnidade',[ 'middleware' => 'auth.checkAuth:empresa', 'as'=>'unidades.remover', 'uses'=>'ControllerRoutes\DataBaseController@removerUnidade']);


// delete


Route::delete('{id}/{codigoEmpresa}/removerEstoqueProduto',[ 'middleware' => 'auth.checkAuth:empresa', 'uses'=>'ControllerRoutes\DataBaseController@removerEstoqueProduto']);



// ----------- não utilizadas por enquanto


// -- post





//Route::post('/cadastrarProduto', 'ControllerRoutes\DataBaseController@cadastrarProduto');
//Route::post('/cadastrarUnidades', 'ControllerRoutes\DataBaseController@cadastrarUnidades');
//Route::post('/cadastrarProdutos', 'ControllerRoutes\DataBaseController@cadastrarProdutos');




// -- get


//Route::get('/gerarNotaFiscal', 'ControllerRoutes\DataBaseController@gerarNotaFiscal');
//Route::get('/listarProdutos', 'ControllerRoutes\DataBaseController@listarProdutos');
//Route::get('/listarUnidades', 'ControllerRoutes\DataBaseController@listarUnidades');
Route::get('/buscarCategorias', 'ControllerRoutes\DataBaseController@buscarCategorias');
//Route::get('/buscarProdutoPorCategoria/{categoria}', 'ControllerRoutes\DataBaseController@buscarProdutoPorCategoria');
//Route::get('/listarProdutosPorUnidade/{codigoUnidade}', 'ControllerRoutes\DataBaseController@listarProdutosPorUnidade');




// -- delete


//Route::delete('/excluirUnidades', 'ControllerRoutes\DataBaseController@excluirUnidades');

