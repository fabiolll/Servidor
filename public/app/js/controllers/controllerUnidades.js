
    function logout(codigoEmpresa){

       var baseUrl = "http://localhost:8000/";

       window.location.href = baseUrl + "logout/"+codigoEmpresa;
    }

   function adicionaProduto(codigoUnidade, codigoEmpresa){
    
    
      var baseUrl = "http://localhost:8000/"+codigoUnidade+"/" +codigoEmpresa+ "/adicionaProdutoEstoque";

      window.location.href = baseUrl;


    }   


  

	 function adicionaUnidade(codigoEmpresa){
		
		
			var baseUrl = "http://localhost:8000/"+codigoEmpresa+"/adicionaUnidade";

			window.location.href = baseUrl;


		}		

      function gerenciarEstoque(codigoUnidade, codigoEmpresa){
    
    
      var baseUrl = "http://localhost:8000/listarProdutos/"+codigoUnidade+"/"+codigoEmpresa;

      window.location.href = baseUrl;


    }   


	function removerUnidade(codigoUnidade, codigoEmpresa){
		
		var escolha = confirm ("Tem certeza de que deseja excluir essa unidade?")
			var baseUrl = "http://localhost:8000/";

		if (escolha){


			    $.ajax({ 
                url : baseUrl + codigoUnidade + "/"+codigoEmpresa+ "/removerUnidade",  
                type : 'PUT', 
                dataType: 'json',
                success: function(data){
            
            if (data.success){

             alert(data.msg);     

             location.reload();     	
           }else{

           	 alert(data.msg);     
           }

       		 
            }

		})

		}
}


  function removerEstoqueProduto(codigo, codEmpresa){
    
    var escolha = confirm ("Tem certeza de que deseja excluir o produto do estoque?")
      var baseUrl = "http://localhost:8000/";

    if (escolha){


          $.ajax({ 
                url : baseUrl + codigo + "/"+codEmpresa+"/removerEstoqueProduto",  
                type : 'DELETE', 
                dataType: 'json',
                success: function(data){
            
            if (data.success){

             alert(data.msg);     

             location.reload();       
           }else{

             alert(data.msg);     
           }

           
            }

    })

    }
}



$(document).ready(function() {
  
	var baseUrl = "http://localhost:8000/";

		jQuery(function($){
   				
   			$("#hora_fechamento").mask("99:99:99");
				$("#hora_abertura").mask("99:99:99");
				$("#contato").mask("(99) 9999-9999");
        $("#preco").maskMoney({symbol:'R$ ', 
showSymbol:false, thousands:'.', decimal:',', symbolStay: true});


			});

     $( "#categorias" ).change(function() {

        var codigoCategoria = $(this).val();

        var codigoEmpresa =  $('#cod_empresa').val();
        var codigoUnidade =  $('#cod_unidade').val();

        var codigoE = codigoEmpresa.replace(/[^\d]+/g,'');
        var codigoU = codigoUnidade.replace(/[^\d]+/g,'');
        var codigoC = codigoCategoria.replace(/[^\d]+/g,''); 


$('#verificaProdutoEstoque').empty();

$('#verificaProdutoEstoque').append('<option  value= "" >Selecione um produto</option>');
    
           $.ajax({ 
                url : baseUrl + "buscaProdutosPorCategoria/"+codigoE+"/"+codigoU+"/"+codigoC,  
                type : 'GET', 
                dataType: 'json', 
                success: function(data){

                  data.forEach(function(item){

                    var option = `<option id="cod_produto" value="` +item.cod_produto+ `">` + item.nome + '</option>';
$('#verificaProdutoEstoque').append(option);
});

                  
                 
           }
       }); 


      });


 $( "#categoriasProduto" ).change(function() {

        var codigoCategoria = $(this).val();

        var codigoEmpresa =  $('#cod_empresa').val();
        var codigoUnidade =  $('#cod_unidade').val();

        var codigoE = codigoEmpresa.replace(/[^\d]+/g,'');
        var codigoU = codigoUnidade.replace(/[^\d]+/g,'');
        var codigoC = codigoCategoria.replace(/[^\d]+/g,''); 


$('#produtosEstoque').empty();

$('#produtosEstoque').append('<option  value= "" >Selecione um produto</option>');
    
           $.ajax({ 
                url : baseUrl + "buscaProdutosPorCategoria/"+codigoE+"/"+codigoU+"/"+codigoC,  
                type : 'GET', 
                dataType: 'json', 
                success: function(data){

                  data.forEach(function(item){

                    var option = `<option id="cod_produto" value="` +item.cod_produto+ `">` + item.nome + '</option>';
$('#produtosEstoque').append(option);
});

                  
                 
           }
       }); 


      });

     



    $( "#verificaProdutoEstoque" ).change(function() {

        var codProduto = $(this).val();

        var codigoEmpresa =  $('#cod_empresa').val();
        var codigoUnidade =  $('#cod_unidade').val();

        var codigoE = codigoEmpresa.replace(/[^\d]+/g,'');
        var codigoU = codigoUnidade.replace(/[^\d]+/g,'');
        var codigoP = codProduto.replace(/[^\d]+/g,''); 

      
           $.ajax({ 
                url : baseUrl + "verificaProdutoEstoque/"+codigoE+"/"+codigoU+"/"+codigoP,  
                type : 'GET', 
                dataType: 'json', 
                success: function(data){

                    if(data.jaTemNoEstoque){

                     $("#mensagemErro").html(data.msg);
      
                    $("#mensagemErro").css( "display", "inline" );
                    $("#btnAdicionaProdutoEstoque").prop("disabled",true);

                }else{

                  $("#mensagemErro").css( "display", "none" );
                             
                  $("#btnAdicionaProdutoEstoque").prop("disabled",false);
                }
           }
       }); 


      });
     

      $( "#produtosEstoque" ).change(function() {

        var codProduto = $(this).val();

        var codigoEmpresa =  $('#cod_empresa').val();
        var codigoUnidade =  $('#cod_unidade').val();

        var codigoE = codigoEmpresa.replace(/[^\d]+/g,'');
        var codigoU = codigoUnidade.replace(/[^\d]+/g,'');
        var codigoP = codProduto.replace(/[^\d]+/g,''); 

      
           $.ajax({ 
                url : baseUrl + "verificaProdutoEstoque/"+codigoE+"/"+codigoU+"/"+codigoP,  
                type : 'GET', 
                dataType: 'json', 
                success: function(data){

                    if(data.jaTemNoEstoque){

                     $("#mensagemAlerta").html("Produto já contém no estoque, você deve alterar apenas a quantidade do produto.");
      
                    $("#mensagemAlerta").css( "display", "inline" );
                    $("#btnAdicionaProdutoEstoque").prop("disabled",true);

                }else{

                  $("#mensagemAlerta").css( "display", "none" );
                             
                  $("#btnAdicionaProdutoEstoque").prop("disabled",false);
                }
           }
       }); 


      });


       $("#irParaIndex").click(function(){    

          window.location.href = baseUrl;

       });


     $("#formAlterarUnidade").submit(function(){    
        
    
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


     $("#formAdicionaUnidade").submit(function(){    
        
    
     		 event.preventDefault();

   			
    		var endereco = $('#endereco').val();
    		var contatoMascara = $('#contato').val();
    		var hora_aberturaMascara = $('#hora_abertura').val();
    		var hora_fechamentoMascara = $('#hora_fechamento').val();

    		var contato = contatoMascara.replace(/[^\d]+/g,''); 
    		var hora_abertura = hora_aberturaMascara.replace(/[^\d]+/g,''); 
    		var hora_fechamento = hora_fechamentoMascara.replace(/[^\d]+/g,''); 
    		var cod_empresa = $('#cod_empresa').val();
    	
    	
           $.ajax({ 
                url : baseUrl + "adicionarUnidade/"+cod_empresa,  
                type : 'POST', 
                data: 'cod_empresa='+cod_empresa+'&endereco='+endereco+ '&contato='+contato+ 
                      '&hora_abertura='+hora_abertura+ 
                      '&hora_fechamento='+hora_fechamento,
                dataType: 'json', 
                success: function(data){
                    if(data.success){

                    
                    $("#mensagem").css( "display", "inline" );
                     $("#mensagemErro").css( "display", "none" );
                    $("#mensagem").html(data.msg);

                    var cod = cod_empresa.replace(/[^\d]+/g,''); 

                    setTimeout(function() {
 					 window.location.href = baseUrl + "listarUnidades/"+cod;
					}, 900);
      	
                }else{

                	$("#mensagem").css( "display", "none" );
                    $("#mensagemErro").css( "display", "inline" );
                    $("#mensagemErro").html(data.msg);
                }
           }
       }); 

    });



      $("#formAdicionaProduto").submit(function(){   


         event.preventDefault();


        var cod_unidade = $('#cod_unidade').val();
        var cod_produto = $('#cod_produto').val();
        var quantidade = $('#quantidade').val();
        var preco = $('#preco').val();
       // var preco = precoComMascara.replace(/[^\d]+/g,''); 
        var cod_empresa = $('#cod_empresa').val();


        var codE = cod_empresa.replace(/[^\d]+/g,'');
     
      
      
           $.ajax({ 
                url : baseUrl + "adicionarEstoqueProduto/"+codE, 
                type : 'POST', 
                data: 'cod_unidade='+cod_unidade+'&cod_produto='+cod_produto+ '&quantidade='+quantidade+ 
                      '&preco_produto='+preco,
                dataType: 'json', 
                success: function(data){
                    if(data.success){

                    
                    $("#mensagem").css( "display", "inline" );
                     $("#mensagemErro").css( "display", "none" );
                    $("#mensagem").html(data.msg);

                    var cod = cod_unidade.replace(/[^\d]+/g,''); 
                    var codEmpresa = cod_empresa.replace(/[^\d]+/g,''); 

                 setTimeout(function() {
         
            window.location.href = baseUrl + "listarProdutos/"+cod+"/"+codEmpresa;
         }, 1200);
        
                }else{

                  $("#mensagem").css( "display", "none" );
                    $("#mensagemErro").css( "display", "inline" );
                    $("#mensagemErro").html(data.msg);
                }
           }
       }); 

    });


      

      $("#formAlterarProduto").submit(function(){    
        
    
         event.preventDefault();

        var cod_estoque_produto = $('#cod_estoque_produto').val();
        var cod_unidade = $('#cod_unidade').val();
         var cod_empresa = $('#cod_empresa').val();
        var cod_produto = $('#cod_produto').val();
        var quantidade = $('#quantidade').val();
        var preco = $('#preco').val();
                 
    
      
      
           $.ajax({ 
                url : baseUrl + "alterarEstoqueProduto/"+cod_empresa,  
                type : 'PUT', 
                data:  'cod_estoque_produto='+cod_estoque_produto+
                      '&cod_unidade='+cod_unidade+'&cod_produto='+
                       cod_produto+ '&quantidade='+quantidade+ 
                      '&preco_produto='+preco,
                dataType: 'json', 
                success: function(data){
                    if(data.success){

                    
                    $("#mensagem").css( "display", "inline" );
                     $("#mensagemErro").css( "display", "none" );
                    $("#mensagem").html(data.msg);

                    var codUnidade = cod_unidade.replace(/[^\d]+/g,''); 
                    var codEmpresa = cod_empresa.replace(/[^\d]+/g,''); 

                    setTimeout(function() {
           window.location.href = baseUrl + "listarProdutos/"+codUnidade+"/"+codEmpresa;
          }, 1200);
        
                }else{

                  $("#mensagem").css( "display", "none" );
                    $("#mensagemErro").css( "display", "inline" );
                    $("#mensagemErro").html(data.msg);
                }
           }
       }); 

    });


});