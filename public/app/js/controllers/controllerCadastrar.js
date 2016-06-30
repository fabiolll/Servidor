$(document).ready(function() {
  
		var baseUrl = "http://localhost:8000/";

			jQuery(function($){
   
				$("#cnpjCadastrar").mask("99.999.999/9999-99");
				$("#contatoCadastrar").mask("(99) 9999-9999");

			});


			$("#btnNavegarInicio").click(function() {

    				window.location = baseUrl ;

			});


   $('#formCadastrarEmpresa').submit(function(event){
    event.preventDefault();
    		var cnpjComMascara = $('#cnpjCadastrar').val();
    		var telefoneComMascara = $('#contatoCadastrar').val();
    		var cnpj = cnpjComMascara.replace(/[^\d]+/g,''); 
    		var telefone = telefoneComMascara.replace(/[^\d]+/g,'');
    	
           $.ajax({ 
               url : baseUrl + "cadastrarEmpresa",  
                type : 'POST', 
                data: 'nome_fantasia='+$('#nomeFantasia').val() + '&cnpj='+cnpj+ 
                      '&nome_real='+$('#razaoSocial').val()+ 
                      '&contato='+telefone+
                      '&senha='+$('#senha').val() ,
                dataType: 'json', 
                success: function(data){
                    if(data.success){

                      alert(data.msg);
                      location.reload();
                    }else {

                    	 alert(data.msg);
                    	location.reload();


                    }
                }
           });   
   	})

			

			
});