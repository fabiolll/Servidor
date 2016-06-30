<!DOCTYPE html>
<html>

    <head>
   
        <title>DriveThru</title>

        
        

     <link href="../app/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
     <link href="../app/css/app.css" rel="stylesheet">
     <link href="../app/css/fontLato.css" rel="stylesheet">
     <link rel="stylesheet" href="../app/css/tether.min.css">
     <script src="../app/js/tether.min.js"></script>
     <script src="../app/js/jquery-1.12.3.js"></script>
     <script src="../app/bootstrap/dist/js/bootstrap.js"></script>
     <script src="../app/js/controllers/controllerCadastrar.js"></script>
     <script src="../app/js/controllers/controllerIndex.js"></script>
     <script src="../app/js/controllers/controllerUnidades.js"></script>
     <script src="../app/js/jquery.maskedinput.js"></script>
     <script src="../app/js/jquery.maskMoney.js"></script>


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
		

		<h1>Unidades</h1>
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							
							<th>ID</th>
							<th>Empresa (Nome fantasia)</th>
							<th>Endereço</th>
							<th>Contato</th>
							<th>Hora de abertura</th>
							<th>Hora de fechamento</th>
							<th>Ação</th>
						
						
						</tr>
					</thead>

						@foreach($unidades as $unidade)
							<tr>
							
						<td>{{  $unidade->cod_unidade }}</td> 
						<td>{{  $unidade->nome_fantasia }}</td> 
							<td>{{  $unidade->endereco }}</td>
							<td>{{  $unidade->contato }}</td>
							<td>{{  $unidade->hora_abertura }}</td>
							<td>{{  $unidade->hora_fechamento }}</td>
							<td>
							<a href="{{ route('unidades.editar',['id'=>$unidade->cod_unidade, 'codigoEmpresa'=>$unidade->cod_empresa]) }}" class="btn-sm btn-success">Editar</a>
							<a  class="btn-sm btn-success" id="gerenciarEstoque" onclick="gerenciarEstoque({{$unidade->cod_unidade}}, {{$unidade->cod_empresa}})" > Gerenciar</a>	
							<a  class="btn-sm btn-danger" id="removerUnidade" onclick="removerUnidade({{$unidade->cod_unidade}}, {{$unidade->cod_empresa}})" > Remover</a> 

							</td>
							</tr>
							@endforeach

				</table>

				
				<div class="container">
				     <div class="row" style="float: right; margin-right: 15px">	
					
				      <button  onclick="adicionaUnidade({{$cod_empresa}})" class="btn btn-sm  btn-block col-sm-4" style="width: 180px; margin: 5px" >Adicionar Unidade</button>
			
					 </div>
				 </div>
				
					
		    </div>
  </body>
</html>
