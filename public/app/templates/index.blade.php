<!DOCTYPE html>
<html>

    <head>
   
        <title>DriveThru</title>

        
        

     <link href="app/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
     <link href="app/css/app.css" rel="stylesheet">
     <link href="app/css/fontLato.css" rel="stylesheet">
     <link rel="stylesheet" href="app/css/tether.min.css">
     <script src="app/js/jquery-1.12.3.js"></script>
     <script src="app/js/tether.min.js"></script>
     <script src="app/bootstrap/dist/js/bootstrap.js"></script>
     <script src="app/js/controllers/controllerIndex.js"></script>
     <script src="app/js/controllers/controllerCadastrar.js"></script>
     <script src="app/js/jquery.maskedinput.js"></script>

     
    

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
                text-align: center;
                display: table-cell;
                vertical-align: middle;
                font-weight: 400;

            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    
    <body>
         
<div class="container">


      <form class="form-signin" id="formLogin">
        <h2 class="form-signin-heading" style="margin-bottom: 25px">Faça seu login</h2>
        
         <div class="container">
            <div class="row">

             <div class="col-md-2"> 
                <label style="margin-top: 12px">CNPJ: </label>
             </div>
            <div class="col-md-10"> 
                <input id="cnpj" class="form-control" placeholder="Por favor, digite o CNPJ" required autofocus>
            </div>
             
           
            </div>
      
         
    
            <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label style="margin-top: 11px">Senha: </label>
             </div>
            <div class="col-md-10"> 
                <input type="password" maxlength="45" id="senha" required class="form-control" placeholder="Por favor, digite sua senha" >
            </div>
             
           
            </div>

          </div>
     


     
       
        <button style="margin-top: 25px" type="submit" class="btn btn-lg  btn-block" id="btnEntrar" >Entrar</button>
         
    
      </form>

     

    
    </div>
    </body>
</html>
