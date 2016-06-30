<?php

namespace App\Http\Controllers\ControllerRoutes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Auth;
use App\Empresa;

class DataBaseController extends Controller
{
    public function __construct()
    {
     // $this->middleware('check4r');
      
    }

    /**
     * Default action for all Angular 2 routes
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function adicionarCompra (Request $request){

       date_default_timezone_set('America/Sao_Paulo');
     
        $input = $request->all();

          $cod_cliente = $input['cod_cliente'];
        $cod_unidade = $input['cod_unidade'];
       $data_compra = date("y/m/d");
        $hora_compra = date("H:i:s");
         $valor_total = $input['valor_total'];

       
       $produtos = $input['produtos'];

    $compra =  DB::insert('insert into compra (cod_cliente, cod_unidade, data_compra, hora_compra, valor_total) values (?, ?, ?, ?, ?)', [$cod_cliente, $cod_unidade, $data_compra,  $hora_compra, $valor_total]);



    if ($compra == 1){

       $retorno = array('success' => true);


  $idCompra = DB::table('compra')->select('cod_compra')->where('data_compra','=', $data_compra)->where('hora_compra', '=', $hora_compra )->get();

    $array = json_decode(json_encode($idCompra), true);



if(count($array) == 1){
  

   $codigoCompra= $array[0]['cod_compra'];


   foreach ($produtos as $p) {


    //fazer select para verificar se tem a quantidade 

      $compra =  DB::insert('insert into produto_compra (cod_estoque_produto, cod_compra, quantidade) values (?, ?, ?)', [$p['cod_estoque_produto'], $codigoCompra, $p['quantidade']]);


   }

   $retorno = array('success' => true );
}


    }else{

       $retorno = array('success' => false );
    }

    return $retorno;
    }
 

    public function cadastrarProduto(Request $request) {

        $input = $request->all();
      DB::table('produto')->insert($input);
    }


    public function verificaProdutoEstoque($codigoEmpresa, $codigoUnidade, $codigoProduto){

       $verificaProdutoEstoque = DB::table('estoque_produto')->where('cod_produto','=', $codigoProduto)->where('cod_unidade', '=', $codigoUnidade)->get();

        if (count($verificaProdutoEstoque)){

           $retorno = array('jaTemNoEstoque' => true, 'msg' => 'Produto já contém no estoque, você deve RETORNAR A PÁGINA ANTERIOR e alterar apenas a quantidade do produto.' );

        }else{


          $retorno = array('jaTemNoEstoque' => false );
        }

        return $retorno;

   }
    
     public function cadastrarProdutos(Request $request) {

        $input = $request->all();
      DB::table('estoque_produto')->insert($input);
    }

     public function cadastrarUnidades(Request $request) {

        $input = $request->all();
  
           foreach ($input as $value) {

        DB::table('unidade')->insert($value);
         }

    }

public function loginCliente(Request $request) {
      

      $input = $request->all();
      //$input = json_encode($input);
     


      $email = $input['email'];
      $senha = $input['senha'];
     // $user = new Empresa;

      $dadosCliente =  DB::table('cliente')->whereEmailAndSenha($email, $senha)->select('cod_cliente', 'email' , 'senha')->get();


      if(count($dadosCliente) > 0 && count($dadosCliente) < 2){

        $arrayDadosCliente= json_decode(json_encode($dadosCliente[0]), true);

     // $user = \App\User:: find($arrayDadosEmpresa['cod_empresa']);

       // $user = \App\Empresa:: find($arrayDadosEmpresa['cod_empresa']);
      $retorno = array('success' => true, 'dados' => $dadosCliente[0] );
    
     
    // $user->cnpj = $cnpj;
    // $user->cod_empresa = $arrayDadosEmpresa['cod_empresa'];

//    if (auth()->guard('empresa')){
  //   Auth::login($user);
    //}


    }else{
       $retorno = array('success' => false, 'msg' => 'Email ou senha inválido(s)!' );

    }

 return $retorno;
  }
    
        public function cadastrarCliente(Request $request) {

      $retorno = array();
      $input = $request->all();


      
     $success = DB::table('cliente')->insert($input) == 1 ? true : false;

          if ($success){
 
         $retorno = array('success' => true, 'msg' => 'Cadastro efetuado com sucesso!' );
      }else{

         $retorno = array('success' => false, 'msg' => 'Erro interno de servidor! Por favor, tente novamente.' );
      }

      return $retorno;

    }


       public function adicionarUnidade(Request $request) {


         $retorno = array();


        $input = $request->all();
       
    $unidade =   DB::table('unidade')->insert($input);

          if ($unidade == 1){

           $retorno = array('success' => true, 'msg' => 'Unidade adicionada com sucesso! Redirecionando para a lista de unidades ...' );
      }else{

         $retorno = array('success' => false, 'msg' => 'Erro! Unidade não adicionada, tente novamente!' );
      }

      return $retorno;

    }

    public static function moeda($get_valor) {

        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }

    public function buscarProdutosPorCategoriasUnidade($categoria, $unidade){


       //$produtos = DB::table('estoque_produto')->select('')->where('')->get();



       $produtos = DB::table('estoque_produto')       
         ->join('produto', 'estoque_produto.cod_produto', '=', 'produto.cod_produto')
         ->join('unidade', 'estoque_produto.cod_unidade', '=', 'unidade.cod_unidade')
         ->select('estoque_produto.cod_estoque_produto', 'estoque_produto.cod_unidade', 'estoque_produto.cod_produto', 'estoque_produto.quantidade', 'estoque_produto.preco_produto',
           'produto.cod_produto', 'produto.cod_categoria', 'produto.nome', 'produto.volume')
         ->where('produto.cod_categoria', '=', $categoria)->where('estoque_produto.cod_unidade', '=', $unidade)->get();

         return $produtos;


    }


    public function buscarProdutosPorCategoria($empresa, $unidade, $categoria){


    
       $produtos = DB::table('produto')->where('cod_categoria', '=', $categoria)->get();

         return $produtos;


    }

    public function adicionarEstoqueProduto(Request $request) {


         $retorno = array();


        $input = $request->all();
       
        $cod_unidade = $input['cod_unidade'];
        $cod_produto = $input['cod_produto'];
        $quantidade = $input['quantidade'];
        $preco_produto = $this->moeda($input['preco_produto']);

    $produto =  DB::insert('insert into estoque_produto (cod_unidade, cod_produto, quantidade, preco_produto) values (?, ?, ?, ?)', [$cod_unidade, $cod_produto, $quantidade,  $preco_produto]);



          if ($produto == 1){

           $retorno = array('success' => true, 'msg' => 'Produto cadastrado em estoque com sucesso! Redirecionando para a lista de produtos ...' );
      }else{

         $retorno = array('success' => false, 'msg' => 'Erro! Produto não adicionado em estoque, tente novamente!' );
      }

      return $retorno;

    }


       public function alterarEstoqueProduto(Request $request) {


         $retorno = array();

         $input = $request->all();
        $cod_unidade = $input['cod_unidade'];
        $cod_produto = $input['cod_produto'];
        $quantidade = $input['quantidade'];
        $preco_produto = $this->moeda($input['preco_produto']);
         $id = $input['cod_estoque_produto'];  


    $update = "update estoque_produto set cod_unidade = '$cod_unidade', cod_produto = '$cod_produto', quantidade = '$quantidade', preco_produto = '$preco_produto' where cod_estoque_produto = ?";



   $produto = DB::update($update, [$id]);

        
       

    // = DB::table('estoque_produto')
   //        ->where('cod_estoque_produto', $id)
    //        ->update($input);

          if ($produto == 1){

           $retorno = array('success' => true, 'msg' => 'Alterações efetuadas com sucesso! Redirecionando para a lista de produtos ...' );
      }else{

         $retorno = array('success' => false, 'msg' => 'Nenhum dado foi alterado. Tente novamente!' );
      }

      return $retorno;

    }





       public function alterarUnidade(Request $request) {


         $retorno = array();


        $input = $request->all();
        $id = $input['cod_unidade'];  

    $unidade = DB::table('unidade')
            ->where('cod_unidade', $id)
            ->update($input);

          if ($unidade == 1){

           $retorno = array('success' => true, 'msg' => 'Alterações efetuadas com sucesso! Redirecionando para a lista de unidades ...' );
      }else{

         $retorno = array('success' => false, 'msg' => 'Nenhum dado foi alterado. Tente novamente!' );
      }

      return $retorno;

    }

     public function alteraUnidade($id, $codigoEmpresa) {


       $unidade =  DB::table('unidade')
            ->select('unidade.cod_unidade', 'unidade.cod_empresa', 'unidade.endereco', 'unidade.contato', 
              'unidade.hora_abertura', 'unidade.hora_fechamento')->where('unidade.cod_unidade', '=', $id)
            ->first();

      
             return view('alteraUnidade', ['unidade' => $unidade, 'cod_empresa'=> $codigoEmpresa]);
    }


     public function alteraProduto($id, $codigoEmpresa) {


     

       $estoque_produto = DB::table('estoque_produto')       
         ->join('produto', 'estoque_produto.cod_produto', '=', 'produto.cod_produto')
         ->select('estoque_produto.cod_estoque_produto', 'estoque_produto.cod_unidade', 'estoque_produto.cod_produto', 'estoque_produto.quantidade', 'estoque_produto.preco_produto',
           'produto.cod_produto', 'produto.cod_categoria', 'produto.nome', 'produto.volume')
         ->where('cod_estoque_produto', '=', $id)->first();


         $produtos = DB::table('produto')->get();

          $categorias = DB::table('categoria')->get();

      

         return view('editaProduto',['estoque_produto'=>$estoque_produto, 'cod_estoque_produto' => $id, 'cod_empresa' => $codigoEmpresa, 'categorias' => $categorias]);


      
      //return view('editaProduto', compact('estoque_produto'));
    }


    public function  alteraEmpresa($id, $codigoAdministrador) {


     

       $empresa = DB::table('empresa')->where('cod_empresa', '=', $id)->first();

         return view('alteraEmpresa',['empresa'=>$empresa,'cod_empresa' => $id, 'cod_administrador' => $codigoAdministrador]);


    }





      public function adicionaUnidade($codigoEmpresa) {
      
             return view('adicionaUnidade', ['cod_empresa' => $codigoEmpresa]);

    }

     public function adicionaProdutoEstoque($id, $codigoEmpresa) {



         $produtos = DB::table('produto')->get();
        $categorias = DB::table('categoria')->get();

        
     return view('adicionaProdutoEstoque',['produtos' => $produtos,  'cod_unidade' => $id, 'cod_empresa' => $codigoEmpresa, 'categorias' => $categorias]);
    }


    public function loginEmpresa(Request $request) {
      

      $input = $request->all();
      $cnpj = $input['cnpj'];
      $senha = $input['senha'];
     // $user = new Empresa;
 

      $dadosEmpresa =  DB::table('empresa')->whereSenhaAndCnpj($senha, $cnpj)->select('cod_empresa', 'cnpj' , 'senha')->get();


      if(count($dadosEmpresa) > 0 && count($dadosEmpresa) < 2){

        $arrayDadosEmpresa = json_decode(json_encode($dadosEmpresa[0]), true);

     // $user = \App\User:: find($arrayDadosEmpresa['cod_empresa']);

        $user = \App\Empresa:: find($arrayDadosEmpresa['cod_empresa']);
      $retorno = array('success' => true, 'dados' => $dadosEmpresa[0] );
    
     
     $user->cnpj = $cnpj;
     $user->cod_empresa = $arrayDadosEmpresa['cod_empresa'];

    if (auth()->guard('empresa')->login($user)){
    
 return $retorno;;
    }

  
       // print_r(auth()->guard('empresa')->user()->cod_empresa);

       //die();

    }else{
       $retorno = array('success' => false, 'msg' => 'CNPJ ou senha inválido(s)!' );

    }

 return $retorno;
  }
    

  public function loginAdministrador(Request $request) {
      

      $input = $request->all();
      $login = $input['login'];
      $senha = $input['senha'];
     // $user = new Empresa;
 

      $dadosAdministrador =  DB::table('administrador')->where('login', '=', $login)->where('senha', '=', $senha)->select('cod_administrador', 'login' , 'senha')->get();


      if(count($dadosAdministrador) > 0 && count($dadosAdministrador) < 2){

        $arrayDadosAdministrador = json_decode(json_encode($dadosAdministrador[0]), true);

     // $user = \App\User:: find($arrayDadosEmpresa['cod_empresa']);

        $user = \App\Administrador:: find($arrayDadosAdministrador['cod_administrador']);
      $retorno = array('success' => true, 'dados' => $dadosAdministrador[0] );
    
     
     $user->login = $login;
     $user->cod_administrador = $arrayDadosAdministrador['cod_administrador'];

    if (auth()->guard('administrador')->login($user)){
    
 return $retorno;;
    }

  
       // print_r(auth()->guard('empresa')->user()->cod_empresa);

       //die();

    }else{
       $retorno = array('success' => false, 'msg' => 'Login ou senha inválido(s)!' );

    }

 return $retorno;
  }
    
























    public function cadastrarEmpresa(Request $request) {

      $retorno = array();
      $input = $request->all();
      $cnpj = $input['cnpj'];
      $senha = $input['senha'];



      
     $success = DB::table('empresa')->insert($input) == 1 ? true : false;

          if ($success){
   $dadosEmpresa =  DB::table('empresa')->whereSenhaAndCnpj($senha, $cnpj)->select('cod_empresa as id', 'cnpj' , 'senha')->get();

    $arrayDadosEmpresa = json_decode(json_encode($dadosEmpresa[0]), true);

   DB::table('users')->insert( $arrayDadosEmpresa);

         $retorno = array('success' => true, 'msg' => 'Cadastro efetuado com sucesso!' );
      }else{

         $retorno = array('success' => false, 'msg' => 'Erro interno de servidor! Por favor, tente novamente.' );
      }

    //  return $retorno;

    }

    public function listarProdutos() {

      
          $produtos =  DB::table('produto')
            ->join('categoria', 'produto.cod_categoria', '=', 'categoria.cod_categoria')
            ->select('produto.cod_produto', 'produto.cod_categoria' , 'categoria.descricao', 'produto.nome', 'produto.volume' )
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

      public function listarUnidadesPorEmpresa($codigoEmpresa) {
       
       $unidades =  DB::table('unidade')
            ->join('empresa', 'unidade.cod_empresa', '=', 'empresa.cod_empresa')
            ->select('unidade.cod_unidade', 'unidade.cod_empresa', 'empresa.nome_fantasia', 'unidade.endereco', 'unidade.contato', 
              'unidade.hora_abertura', 'unidade.hora_fechamento')->where('unidade.cod_empresa', '=', $codigoEmpresa)->where('exclusao', 0)
            ->get();
           
           return view('unidades',['unidades'=>$unidades, 'cod_empresa' => $codigoEmpresa]);

    }


         public function listarEmpresas($codigoAdministrador) {
       
       $empresas =  DB::table('empresa')->where('exclusao', 0)->get();


           return view('empresas',['empresas'=>$empresas, 'cod_administrador' => $codigoAdministrador]);

    }


        public function buscarCategorias() {

        $categorias = DB::table('categoria')->get();
        return $categorias;


    }

    public function buscarProdutoPorCategoria($categoria){

    //  $input = $categoria->all();
      
         $produtos = DB::table('produto')->where('cod_categoria', '=', $categoria)->get();
        return $produtos;

    }

      public function listarProdutosPorUnidade($codigoUnidade){

        
      

//      $produtos =  DB::select('select * from unidade where cod_unidade = :id', ['id'=>$codigoUnidade]);


      $produtos =  DB::select("select e.cod_estoque_produto, e.cod_unidade, e.cod_produto, e.quantidade, Concat(   
               Replace  
                 (Replace  
                   (Replace  
                     (Format(e.preco_produto, 2), '.', '|'), ',', '.'), '|', ',')) 
  as preco_produto, p.cod_produto, p.nome from estoque_produto e inner join produto p 
where e.cod_unidade = :id and e.cod_produto = p.cod_produto", ['id'=> $codigoUnidade]);

     // return $produtos;
      
       //  $produtos = DB::table('estoque_produto')
        
   //      ->join('produto', 'estoque_produto.cod_produto', '=', 'produto.cod_produto')
   //      ->select('estoque_produto.cod_estoque_produto', 'estoque_produto.cod_unidade', 'estoque_produto.cod_produto', 'estoque_produto.quantidade', 'estoque_produto.preco_produto',
   //        'produto.nome')->where('cod_unidade', '=', $codigoUnidade)->get();

          //$array = (array) $produtos[0];
          //$cod_unidade = $array['cod_unidade'];

      //   return $produtos;



         $cod_empresa = DB::table('unidade')
         ->select('cod_empresa')->where('cod_unidade', '=', $codigoUnidade)->first();

            $array = (array) $cod_empresa;
            $cod_empresa = $array['cod_empresa'];

        return view('produtosEstoque',['produtos'=>$produtos, 'cod_unidade' => $codigoUnidade, 'cod_empresa' => $cod_empresa]);

    }

     public function removerUnidade($id) {


     

         $retorno = array();
    
        $resultado =  DB::table('unidade')
            ->where('cod_unidade', $id)
               ->update(['exclusao' => 1]);


     
        if ($resultado == 1){

          $retorno = array('success' => true, 'msg' => 'Exclusão efetuada com sucesso!' );

        }else{

          $retorno = array('success' => false, 'msg' => 'Erro interno de servidor! Por favor, tente novamente.' );

        }

        return $retorno;
    }



     public function removerEstoqueProduto($id) {


         $retorno = array();
    
        $resultado =  DB::table('estoque_produto')->where('cod_estoque_produto', '=', $id)->delete();
     
        if ($resultado == 1){

          $retorno = array('success' => true, 'msg' => 'Exclusão efetuada com sucesso!' );

        }else{

          $retorno = array('success' => false, 'msg' => 'Erro interno de servidor! Por favor, tente novamente.' );

        }

        return $retorno;
    }




      public function excluirUnidades(Request $request) {

         $input = $request->all();

         foreach ($input as $value) {

            DB::table('unidade')->where('cod_unidade', '=', $value)->delete();
         }

    }

    public function logoutSistemaWeb() {

       
        auth()->guard('empresa')->logout();

              return view('logout');

        
     
    }
}

