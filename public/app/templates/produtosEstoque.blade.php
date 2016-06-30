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
     <script src="../../app/js/controllers/controllerCadastrar.js"></script>
     <script src="../../app/js/controllers/controllerIndex.js"></script>
      <script src="../../app/js/controllers/controllerUnidades.js"></script>
     <script src="../../app/js/jquery.maskedinput.js"></script>
        <script src="../../app/js/jquery.maskMoney.js"></script>

        <script>
         

     function voltar (codEmpresa){

        window.location.href = "http://localhost:8000/listarUnidades/"+codEmpresa;

     }


     </script>


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 50;
                font-family: 'Lato';

                }


            .title {
                font-size: 96px;
            }
        </style>
    </head>
    
    <body>	 	

     <div class="row" style="margin-top: 10px; margin-right: 106px">

    <div class="col-md-11" > 
         
             </div>
              <div class="col-md-1"> 
        <button style="width: 100px; " onclick="logout({{$cod_empresa}})"  class="btn btn-lg  btn-block">Sair</button>
       </div>
             
           
         </div>



		<div class="container" style="margin-top: 50px">
		

		<h1>Produtos em estoque - Unidade {{$cod_unidade}}</h1>
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Quantidade</th>
							<th>Preço</th>
							
						</tr>
					</thead>
						@foreach($produtos as $produto)
							<tr>
							
						<td>{{  $produto->cod_estoque_produto }}</td> 
						<td>{{  $produto->nome }}</td> 
							<td>{{  $produto->quantidade }}</td>
							<td>{{  $produto->preco_produto}}</td>
							
							<td>
							<a href="{{ route('produtos.editar',['id'=>$produto->cod_estoque_produto, 'codigoEmpresa' => $cod_empresa]) }}" class="btn-sm btn-success">Editar</a>
				
							<a  class="btn-sm btn-danger" id="removerProduto" onclick="removerEstoqueProduto({{$produto->cod_estoque_produto}}, {{$cod_empresa}})" > Remover</a> 

							</td>
							</tr>
							@endforeach

				</table>

				
				<div class="container">
				     <div class="row" style="float: right; margin-right: 15px">	
					
				      <button  onclick="adicionaProduto({{$cod_unidade}}, {{$cod_empresa}})" class="btn btn-sm  btn-block col-sm-4" style="width: 180px; margin: 5px" >Adicionar Produto</button>

				       <button  onclick="voltar({{$cod_empresa}})" class="btn btn-sm  btn-block col-sm-4" style="width: 180px; margin: 5px" >Listar Unidade(s)</button>
			
					 </div>
				 </div>
				
					
		    </div>
  </body>
</html>
