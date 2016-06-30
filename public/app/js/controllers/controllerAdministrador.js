$(document).ready(function() {



  $("#formAlterarEmpresa").submit(function(){    
        
    
         event.preventDefault();

        
        var endereco = $('#endereco').val();
        var contatoMascara = $('#contato').val();
        var hora_aberturaMascara = $('#hora_abertura').val();
        var hora_fechamentoMascara = $('#hora_fechamento').val();
        var contato = contatoMascara.replace(/[^\d]+/g,''); 
        var hora_abertura = hora_aberturaMascara.replace(/[^\d]+/g,''); 
        var hora_fechamento = hora_fechamentoMascara.replace(/[^\d]+/g,''); 
        var cod_empresa = $('#cod_empresa').val();
        var cod_unidade = $('#cod_unidade').val();  
        var cod = cod_empresa.replace(/[^\d]+/g,''); 
      
      
           $.ajax({ 
                url : baseUrl + "alterarUnidade/"+cod,  
                type : 'PUT', 
                data: 'cod_unidade='+cod_unidade+'&cod_empresa='+cod_empresa+'&endereco='+endereco+ '&contato='+contato+ 
                      '&hora_abertura='+hora_abertura+ 
                      '&hora_fechamento='+hora_fechamento,
                dataType: 'json', 
                success: function(data){
                    if(data.success){

                    
                    $("#mensagem").css( "display", "inline" );
                     $("#mensagemErro").css( "display", "none" );
                    $("#mensagem").html(data.msg);

                    var codigo = cod_empresa.replace(/[^\d]+/g,''); 

                    setTimeout(function() {
           window.location.href = baseUrl + "listarUnidades/"+codigo;
          }, 900);
        
                }else{

                  $("#mensagem").css( "display", "none" );
                    $("#mensagemErro").css( "display", "inline" );
                    $("#mensagemErro").html(data.msg);
                }
           }
       }); 

    });

































   
   		var baseUrl = "http://localhost:8000/";


			$('#formLoginAdministrador').submit(function(event){
   			 event.preventDefault();

   			
    		var login = $('#login').val();
    		var senha = $('#senha').val();
    	
    	
           $.ajax({ 
               url : baseUrl + "loginAdministrador",  
                type : 'POST', 
                data: 'login='+login+ 
                      '&senha='+senha,
                dataType: 'json', 
                success: function(data){
                    if(data.success){
       	var codigoAdministrador = data.dados.cod_administrador;
       //	window.sessionStorage.setItem('cod_empresa', codigoEmpresa);

       	window.location = baseUrl + "listarEmpresas/"+codigoAdministrador ;
    
//var usuario = window.sessionStorage.getItem('usuario');

// Remove o item
//window.sessionStorage.removeItem('usuario');

                    }else {




                    }
                }
           });   
   	})

});