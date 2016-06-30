$(document).ready(function() {
   
   		var baseUrl = "http://localhost:8000/";

			$("#btnNavegaCadastrarEmpresa").click(function() {

    				window.location = baseUrl + "cadastraEmpresa";

			});

			jQuery(function($){
   
				$("#cnpj").mask("99.999.999/9999-99");

			});


			$('#formLogin').submit(function(event){
   			 event.preventDefault();

   			
    		var cnpjComMascara = $('#cnpj').val();
    		var senha = $('#senha').val();
    		var cnpj = cnpjComMascara.replace(/[^\d]+/g,''); 
    	
    	
           $.ajax({ 
               url : baseUrl + "login",  
                type : 'POST', 
                data: 'cnpj='+cnpj+ 
                      '&senha='+senha,
                dataType: 'json', 
                success: function(data){
                    if(data.success){
       	var codigoEmpresa = data.dados.cod_empresa;
       	window.sessionStorage.setItem('cod_empresa', codigoEmpresa);

       	window.location = baseUrl + "listarUnidades/"+codigoEmpresa ;
    
//var usuario = window.sessionStorage.getItem('usuario');

// Remove o item
//window.sessionStorage.removeItem('usuario');

                    }else {




                    }
                }
           });   
   	})

});