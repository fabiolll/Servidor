<!DOCTYPE html>
<html>

    <head>
   
        <title>DriveThru</title>

        
        

     <link href="../../app/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
     <link href="../../app/css/app.css" rel="stylesheet">
     <link href="../../app/css/fontLato.css" rel="stylesheet">
     <link rel="stylesheet" href="../../app/css/tether.min.css">
     <script src="../../app/js/tether.min.js"></script>
     <script src="../../app/js/jquery-1.12.3.js"></script>
     <script src="../../app/bootstrap/dist/js/bootstrap.js"></script>
     <script src="../../app/js/controllers/controllerUnidades.js"></script>
     <script src="../../app/js/jquery.maskedinput.js"></script>
     <script src="../../app/js/jquery.maskMoney.js"></script>

   

     <script>
         

     function voltar (codUnidade, codEmpresa){

        window.location.href = "http://localhost:8000/listarProdutos/"+codUnidade+"/"+codEmpresa;

     }


     </script>


        <style>
            html, body {
                height: 100%;
            }

            body {
             
                }

            .container {
             
                   
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 50px;
            }
        </style>
    </head>
    
    <body> 

    <div class="row" style="margin-top: 10px; margin-right: 106px">

    <div class="col-md-11" > 
         
             </div>
              <div class="col-md-1"> 
        <button style="width: 100px; " onclick="logout({{$cod_empresa}})" class="btn btn-lg  btn-block">Sair</button>
       </div>
             
           
         </div>


              <div class="list-group" >
    <a class="list-group-item list-group-item-success" id="mensagem" style="display: none; margin-left: 380px;" ></a>
    </div>

    <div class="container" style="width: 2000px; margin-top:100px"  >
     <div class="list-group" style="margin-top:200px;margin: 0;
                padding: 0;
                display: table;
                font-weight: 50;
                font-family: 'Lato';" >
     <a class="list-group-item list-group-item-success" id="mensagemAlerta" style="display: none; margin-left: 200px; width: 1000px"></a>
      </div>

      </div>
   

    <div class="container" style="margin-left: 5px">


       <div class="list-group">
    <a class="list-group-item list-group-item-success" id="mensagem" style="display: none; margin-left: 380px;" ></a>
    </div>

     <div class="list-group" >
     <a class="list-group-item list-group-item-danger" id="mensagemErro" style="display: none; margin-left: 450px; "></a>
      </div>

      <form class="form-signin" id="formAlterarProduto" style="margin-top: 50px">



             <h2 style="width: 700px; margin-bottom: 30px;" class="form-signin-heading">Alterar Produto em Estoque - Código {{$cod_estoque_produto}}</h2>

       
             <input type="hidden" id="cod_estoque_produto" value=" {{$cod_estoque_produto}}">
             <input type="hidden" id="cod_unidade" value=" {{$estoque_produto->cod_unidade}}">
             <input type="hidden" id="cod_empresa" value=" {{$cod_empresa}}">


                 <div class="row" >

    <div class="col-md-2" > 
               <label  >Categoria: </label>
             </div>
              <div class="col-md-10"> 
      <select id="categoriasProduto" style="width: 400px; margin-left: 60px" class = "form-control" style="margin-bottom: 10px" >
  

   <option value="">Selecione uma categoria</option>
        @foreach($categorias as $categoria)
        <option  id="cod_categoria" value="{{$categoria->cod_categoria}}">{{ $categoria->descricao}} </option>
            @endforeach
      </select>
       </div>
             
           
         </div>
          
              



  <div class="row" style="margin-top: 5px">

    <div class="col-md-2" > 
               <label  >Produto: </label>
             </div>
              <div class="col-md-10"> 
      <select  id="produtosEstoque" style="width: 400px; margin-left: 60px" class = "form-control" style="margin-bottom: 10px" >
       
        <option id="cod_produto" value="{{$estoque_produto->cod_produto}}">{{$estoque_produto->nome}} </option>
            
      </select>
       </div>
             
           
         </div>
      
         
    
          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label  >Quantidade: </label>
             </div>
            <div class="col-md-10"> 
                <input  value="{{$estoque_produto->quantidade}}" style ="width: 300px; margin-left: 60px" id="quantidade" maxlength="10" style="margin-bottom: 10px" class="form-control" placeholder="Quantidade" required >
            </div>
             
          </div>

        

          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label style ="width: 70px; margin-right: 90px">Preço : </label>
             </div>
            <div class="col-md-10"> 
             <input value="{{$estoque_produto->preco_produto}}" style ="width: 200px;  margin-left: 60px" maxlength="10" id="preco" style="margin-bottom: 10px" class="form-control" placeholder="Preço. Ex.: R$ 99,99" required >
            </div>
             
          </div>


    
        
    <div class="row"  style="margin-top: 45px;">

        <div class="col-md-6" > 
              <button type="submit" id="btnAlterarProdutoEstoque"  class="btn btn-lg  btn-block">Salvar</button>
             </div>

             <div class="col-md-6" > 
              <button type="button" onclick="voltar({{$estoque_produto->cod_unidade}}, {{$cod_empresa}})" id="btnVoltar" class="btn btn-lg  btn-block">Voltar</button>
             </div>

             
          </div>


   </form>
 
    </div>

     </body>
</html>
