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
      <script src="../../app/js/controllers/controllerAdministrador.js"></script>
     <script src="../../app/js/jquery.maskedinput.js"></script>
     <script src="../../app/js/jquery.maskMoney.js"></script>
     
     <script>
         

     function voltar (codAdministrador){

        window.location.href = "http://localhost:8000/listarEmpresa/"+codAdministrador;

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

            .container {
             
               margin-top: 100px; 

                  
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
        <button style="width: 100px; " onclick="logout({{$cod_administrador}})"  class="btn btn-lg  btn-block">Sair</button>
       </div>
             
           
         </div>

<div class="container">

    <div class="list-group">
    <a class="list-group-item list-group-item-success" id="mensagem" style="display: none; margin-left: 380px" ></a>
    </div>

     <div class="list-group">
     <a class="list-group-item list-group-item-danger" id="mensagemErro" style="display: none; margin-left: 450px"></a>
      </div>

      
      <form class="form-signin" id="formAlterarEmpresa" style="margin-top: 50px">
        <h2 class="form-signin-heading">Alterar Empresa - Código {{$empresa->cod_empresa}}</h2>


              <input type="hidden" id="cod_empresa" value=" {{$empresa->cod_empresa}}">

          <div class="row">

             <div class="col-md-3"> 
                <label>Nome fantasia: </label>
             </div>
            <div class="col-md-9"> 
                <input  value="{{$empresa->nome_fantasia}}" style ="width: 300px" id="nomeFantasia" maxlength="45" class="form-control" placeholder="Nome fantasia"  autofocus required>
            </div>
             
           
         </div>



          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label  >CNPJ: </label>
             </div>
            <div class="col-md-10"> 
                <input  value="{{$empresa->cnpj}}" style ="width: 300px; margin-left: 30px" id="cnpjCadastrar" style="margin-bottom: 10px" class="form-control" placeholder="CNPJ" required >
            </div>
             
          </div>

              <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label>Razão Social: </label>
             </div>
            <div class="col-md-10"> 
                <input value="{{$empresa->nome_real}}" style ="width: 300px; margin-left: 30px" maxlength="45" id="razaoSocial" style="margin-bottom: 10px" class="form-control" placeholder="Razão Social" required >
            </div>
             
          </div>

         
    
          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label  >Contato: </label>
             </div>
            <div class="col-md-10"> 
                <input  value="{{$empresa->contato}}" style ="width: 300px; margin-left: 30px" id="contato" style="margin-bottom: 10px" class="form-control" placeholder="Contato. Ex.: (99) 9999-9999" required >
            </div>
             
          </div>  


    
        
 <div class="row"  style="margin-top: 15px">

        <div class="col-md-6" > 
              <button type="submit" id="btnAlteraEmpresa"  class="btn btn-lg  btn-block">Salvar</button>
             </div>

             <div class="col-md-6" > 
              <button type="button" onclick="voltar({{$cod_administrador}})" id="btnVoltar" class="btn btn-lg  btn-block">Voltar</button>
             </div>

             
          </div>

     

      </form>
            

     

  
    </div>

     </body>
</html>
