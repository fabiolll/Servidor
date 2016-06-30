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
        <button style="width: 100px; " onclick="logout({{$cod_empresa}})"  class="btn btn-lg  btn-block">Sair</button>
       </div>
             
           
         </div>

<div class="container">

    <div class="list-group">
    <a class="list-group-item list-group-item-success" id="mensagem" style="display: none; margin-left: 380px" ></a>
    </div>

     <div class="list-group">
     <a class="list-group-item list-group-item-danger" id="mensagemErro" style="display: none; margin-left: 450px"></a>
      </div>

      
      <form class="form-signin" id="formAlterarUnidade" style="margin-top: 50px">
        <h2 class="form-signin-heading">Alterar Unidade - Código {{$unidade->cod_unidade}}</h2>


              <input type="hidden" id="cod_empresa" value=" {{$unidade->cod_empresa}}">
              <input type="hidden" id="cod_unidade" value=" {{$unidade->cod_unidade}}">



  <div class="row">



             <div class="col-md-3"> 
                <label>Endereço: </label>
             </div>
            <div class="col-md-9"> 
                <input  value="{{$unidade->endereco}}" style ="width: 300px; margin-left: 30px" id="endereco" maxlength="45" class="form-control" placeholder="Endereço"  autofocus required>
            </div>
             
           
         </div>
      
         
    
          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label  >Contato: </label>
             </div>
            <div class="col-md-10"> 
                <input  value="{{$unidade->contato}}" style ="width: 300px; margin-left: 60px" id="contato" style="margin-bottom: 10px" class="form-control" placeholder="Contato. Ex.: (99) 9999-9999" required >
            </div>
             
          </div>

        

          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label style ="width: 70px;">Hora de abertura : </label>
             </div>
            <div class="col-md-10"> 
             <input value="{{$unidade->hora_abertura}}" style ="width: 200px;  margin-left: 60px" maxlength="10" id="hora_abertura" style="margin-bottom: 10px" class="form-control" placeholder="Hora de abertura. Ex.: 12:00 hs"" required >
            </div>
             
          </div>


          <div class="row"  style="margin-top: 5px">

             <div class="col-md-3" > 
               <label >Hora de fechamento: </label>
             </div>
            <div class="col-md-9"> 
                 <input value="{{$unidade->hora_fechamento}}" style ="width: 200px; ; margin-left: 30px" id="hora_fechamento" style="margin-bottom: 10px" class="form-control" placeholder="Hora de fechamento. Ex.: 12:00 hs" required>
            </div>
             
          </div>

    
        
 <div class="row"  style="margin-top: 15px">

        <div class="col-md-6" > 
              <button type="submit" id="btnAlteraUnidade"  class="btn btn-lg  btn-block">Salvar</button>
             </div>

             <div class="col-md-6" > 
              <button type="button" onclick="voltar({{$unidade->cod_empresa}})" id="btnVoltar" class="btn btn-lg  btn-block">Voltar</button>
             </div>

             
          </div>

     

      </form>
            

     

  
    </div>

     </body>
</html>
