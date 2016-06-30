<?php

namespace App\Http\Controllers\ControllerRoutes;

use App\Relatorio\Teste;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;
use App\Unidade;
use DB;
use App\Quotation;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AngularRoutesController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Default action for all Angular 2 routes
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('boot');
    }

    public function cadastrarProduto(Request $request) {

        $input = $request->all();
      DB::table('produto')->insert($input);
    }
    

     public function cadastrarUnidade(Request $request) {

        $input = $request->all();
        print_r( $input);
      DB::table('unidade')->insert($input);
    }

       public function alterarUnidade(Request $request) {

        $input = $request->all();
        $id = $input['cod_unidade'];  

    $unidade = DB::table('unidade')
            ->where('cod_unidade', $id)
            ->update($input);
    }

    public function cadastrarEmpresa(Request $request) {

        $input = $request->all();
      

      DB::table('empresa')->insert($input);
    }

    public function listarProdutos() {

      
          $produtos =  DB::table('produto')
            ->join('categoria', 'produto.cod_categoria', '=', 'categoria.cod_categoria')
            ->select('produto.cod_produto', 'produto.cod_categoria' , 'categoria.descricao', 'produto.nome', 'produto.volume', 
              'produto.preco_unitario')
            ->get();


        return $produtos;

    }

     public function gerarNotaFiscal() {

          $unidades =  DB::table('unidade')
            ->join('empresa', 'unidade.cod_empresa', '=', 'empresa.cod_empresa')
            ->select('unidade.cod_unidade', 'empresa.nome_fantasia', 'unidade.endereco', 'unidade.contato', 
              'unidade.hora_abertura', 'unidade.hora_fechamento')
            ->get();

            $relatorio = new Teste();
            $relatorio->gerarRelatorio($unidades);

      //  return $unidades;

    }

      public function listarUnidades() {

        $unidades =  DB::table('unidade')
            ->join('empresa', 'unidade.cod_empresa', '=', 'empresa.cod_empresa')
            ->select('unidade.cod_unidade', 'empresa.nome_fantasia', 'unidade.endereco', 'unidade.contato', 
              'unidade.hora_abertura', 'unidade.hora_fechamento')
            ->get();

        return $unidades;

    }


        public function buscarCategorias() {

        $categorias = DB::table('categoria')->get();
        return $categorias;


    }
}

