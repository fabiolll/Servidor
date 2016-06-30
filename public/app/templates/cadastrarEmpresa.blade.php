@extends('templateBase')


@section('cadastrar')
<div class="container">


      
      <form class="form-signin" id="formCadastrarEmpresa">

        <h2  style="margin-left: 25px; margin-bottom: 35px;" class="form-signin-heading">Cadastrar Empresa</h2>
      

         <div class="container"  style= "">
            <div class="row">

             <div class="col-md-3"> 
                <label>Nome fantasia: </label>
             </div>
            <div class="col-md-9"> 
                <input style ="width: 300px" id="nomeFantasia" maxlength="45" class="form-control" placeholder="Nome fantasia"  autofocus required>
            </div>
             
           
         </div>
      
         
    
          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label  >CNPJ: </label>
             </div>
            <div class="col-md-10"> 
                <input style ="width: 300px; margin-left: 30px" id="cnpjCadastrar" style="margin-bottom: 10px" class="form-control" placeholder="CNPJ" required >
            </div>
             
          </div>

        

          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label>Razão Social: </label>
             </div>
            <div class="col-md-10"> 
                <input style ="width: 300px; margin-left: 30px" maxlength="45" id="razaoSocial" style="margin-bottom: 10px" class="form-control" placeholder="Razão Social" required >
            </div>
             
          </div>


          <div class="row"  style="margin-top: 5px">

             <div class="col-md-3" > 
               <label>Contato: </label>
             </div>
            <div class="col-md-9"> 
                <input style ="width: 300px"  id="contatoCadastrar" style="margin-bottom: 10px" class="form-control" placeholder="Telefone para contato" required>
            </div>
             
          </div>

          <div class="row"  style="margin-top: 5px">

             <div class="col-md-2" > 
               <label">Senha: </label>
             </div>
            <div class="col-md-10"> 
                <input  style ="width: 200px; ; margin-left: 30px" maxlength="45" type="password" id="senha" style="margin-bottom: 10px" class="form-control" placeholder="Senha" required="">
            </div>
             
          </div>

      



        <div class="row"  style="margin-top: 15px">

        <div class="col-md-6" > 
              <button type="submit" id="btnSalvarEmpresa"  class="btn btn-lg  btn-block">Cadastrar</button>
             </div>

             <div class="col-md-6" > 
              <button type="button" id="btnNavegarInicio" class="btn btn-lg  btn-block">Voltar</button>
             </div>

             
          </div>
             
      </div>

</div>

          
      </form>
           

     
    </div>
@endsection
