//*******************************************CATEGORIAS DE PRODUTOS
function Div_Categorias(div)
{
	$("#div_edit").css("display", "none");
	
	
	$("#nome_categoria").val("");
	$("#div_loading_cad").html("");
	$("#aviso_nome_categoria").css("visibility", "hidden");
	
	
	if(div == "cad_categoria")
	{
		$("#div_cad").css("display", "block");
		$("#div_lista").css("display", "none");
		
		$( "#btn_cad").removeClass( "btn-primary" ).addClass( "btn-light" );
		
		$("#div_btn_list").css("display", "block");
	}
	
	if(div == "list_categoria")
	{
		$("#div_cad").css("display", "none");
		$("#div_lista").css("display", "block");
		
		$( "#btn_cad").removeClass( "btn-light" ).addClass( "btn-primary" );
		
		$("#div_btn_list").css("display", "none");
	}
}

function Acao_Cad_Categoria()
{
	if($("#nome_categoria").val() == "")
	{
		$("#aviso_nome_categoria").css("visibility", "visible");
		
	}else{
		
		$("#div_loading_cad").html('<p class="text-gray-500 p-3 m-0 text-center">Por favor, aguarde.....<br/><img src="imagens/carregando.gif" width="80px" /></p>');
		
		
		//AJAX PARA CADASTRAR UMA NOVA Categoria ******
			$.ajax({
			
		         url: 'classes/Class_Admin.php',
				 type: 'POST',
				 cache: false,
				 dataType: "html",
				 timeout: 40000,
				 data: {acao: "cad_categoria", nome: $("#nome_categoria").val()},
				 success: function(data, textStatus){
					 	//console.log(data);
					 	if(data == "ok"){
						 	$("#div_loading_cad").html('<p class="text-primary_2 p-3 m-0 text-center">Cadastro realizado!<br />Aguarde atualização da página......<br/><img src="imagens/carregando.gif" width="80px" /></p>');
						 	location.reload();
					 	}else{
							$("#div_loading_cad").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
					 	}
						
		               
		               },
				 error: function(xhr,err){
				 		
				 		$("#div_loading_cad").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
				 		
					  		console.log(xhr);
				       }
		    });
		//**********
		
	}
}
function Acao_Del_Categoria(cod,id){
						
	var r = confirm("Deseja realmente deletar?");
	if (r == true) {
		
		$("#btn_del"+cod).html("aguarde.......");
		//AJAX PARA CADASTRAR UM NOVO categoria ******
			$.ajax({
			
		         url: 'classes/Class_Admin.php',
				 type: 'POST',
				 cache: false,
				 dataType: "html",
				 timeout: 40000,
				 data: {acao: "del_categoria", id: id},
				 success: function(data, textStatus){
					 	console.log(data);
					 	if(data == "ok"){
						 	$( "#btn_del"+cod).removeClass( "btn-danger" ).addClass( "btn-primary_2" );
						 	$("#btn_del"+cod).html("Categoria deletado!... aguarde!");
						 	location.reload();
					 	}else{
							$("#btn_del"+cod).html("Ocorreu um problema, por favor tente mais tarde!");
							
							setTimeout(function(){ 
								$("#btn_del"+cod).html('<i class="fa fa-fw fa-times-circle"></i> deletar'); 
							}, 
							3000);
					 	}
						
		               
		               },
				 error: function(xhr,err){
				 		
				 		$("#btn_del"+cod).html("Ocorreu um problema, por favor tente mais tarde!");
				 		
					  		console.log(xhr);
				       }
		    });
		//**********
		
	} else {
		//NAO FAZ NADA
	}		
			
}


function Editar_Categoria(cod,id)
{
	$("#nome_categoria_edit_id").val(id);
	$("#nome_categoria_edit").val($("#categoria_"+cod).val());
	$("#div_loading_edit").html("");
	$("#aviso_nome_categoria_edit").css("visibility", "hidden");
	
	$("#div_cad").css("display", "none");
	$("#div_lista").css("display", "none");
	$("#div_edit").css("display", "block");
	
	$("#div_btn_list").css("display", "block");
	
}
function Acao_Edit_Categoria()
{
	if($("#nome_categoria_edit").val() == "")
	{
		$("#aviso_nome_categoria_edit").css("visibility", "visible");
		
	}else{
		
		$("#div_loading_edit").html('<p class="text-gray-500 p-3 m-0 text-center">Por favor, aguarde.....<br/><img src="imagens/carregando.gif" width="80px" /></p>');
		
		
		//AJAX PARA EDITAR UMA NOVA categoria ******
			$.ajax({
			
		         url: 'classes/Class_Admin.php',
				 type: 'POST',
				 cache: false,
				 dataType: "html",
				 timeout: 40000,
				 data: {acao: "edit_categoria", nome: $("#nome_categoria_edit").val(), id: $("#nome_categoria_edit_id").val()},
				 success: function(data, textStatus){
					 	console.log(data);
					 	if(data == "ok"){
						 	$("#div_loading_edit").html('<p class="text-primary_2 p-3 m-0 text-center">Edição realizada!<br />Aguarde atualização da página......<br/><img src="imagens/carregando.gif" width="80px" /></p>');
						 	location.reload();
					 	}else{
							$("#div_loading_edit").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
					 	}
						
		               
		               },
				 error: function(xhr,err){
				 		
				 		$("#div_loading_edit").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
				 		
					  		console.log(xhr);
				       }
		    });
		//**********
		
	}
}
//*******************************************PRODUTOS
function Div_Produtos(div)
{
	$('#categorias_produto').selectpicker('val', "");
	$('#categorias_produto').selectpicker('refresh');
	$("#div_edit").css("display", "none");
	
	
	$("#nome_produto").val("");
	$("#div_loading_cad").html("");
	$("#aviso_nome_produto").css("visibility", "hidden");
	
	
	if(div == "cad_produto")
	{
		$("#div_cad").css("display", "block");
		$("#div_lista").css("display", "none");
		
		$( "#btn_cad").removeClass( "btn-primary" ).addClass( "btn-light" );
		
		$("#div_btn_list").css("display", "block");
	}
	
	if(div == "list_produto")
	{
		$("#div_cad").css("display", "none");
		$("#div_lista").css("display", "block");
		
		$( "#btn_cad").removeClass( "btn-light" ).addClass( "btn-primary" );
		
		$("#div_btn_list").css("display", "none");
	}
}
function Acao_Cad_Produto()
{
	var validar_form = "true";
	$("#aviso_nome_produto").css("visibility", "hidden");
	$("#nome_produto").removeClass('border border-danger');
	$("#aviso_categorias_produto").css("visibility", "hidden");
	//$("#categorias_produto").removeClass('border border-danger');
	
	if($("#nome_produto").val() == "")
	{
		$("#aviso_nome_produto").css("visibility", "visible");
		$("#nome_produto").focus();
		$("#nome_produto").addClass('border border-danger');
		validar_form = "false";
	}
	if($("#categorias_produto").val() == "")
	{
		$("#aviso_categorias_produto").css("visibility", "visible");
		$("#categorias_produto").focus();
		//$("#categorias_produto").addClass('border border-danger');
		validar_form = "false";
	}
	
	
	
	if(validar_form == "true")
	{
		
		$("#div_loading_cad").html('<p class="text-gray-500 p-3 m-0 text-center">Por favor, aguarde.....<br/><img src="imagens/carregando.gif" width="80px" /></p>');
		
		
		//AJAX PARA CADASTRAR ******
		var form = document.getElementById('form_cad');
			var formData = new FormData(form);
			formData.append('descricao_produto', CKEDITOR.instances['descricao_produto'].getData());
			$.ajax({
			
		        url: 'classes/Class_Admin.php',
				type: 'POST',
				cache: false,
				processData: false,
				contentType: false,
				dataType: "html",
				timeout: 40000,
				data: formData,
				success: function(data, textStatus){
					 	console.log(data);
					 	if(data == "ok"){
						 	$("#div_loading_cad").html('<p class="text-primary_2 p-3 m-0 text-center">Cadastro realizado!<br />Aguarde atualização da página......<br/><img src="imagens/carregando.gif" width="80px" /></p>');
						 	location.reload();
					 	}else{
							$("#div_loading_cad").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
					 	}
						
		               
		               },
				 error: function(xhr,err){
				 		
				 		$("#div_loading_cad").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
				 		
					  		console.log(xhr);
				       }
		    });
		//**********
		
	}
}
function Acao_Del_Produto(cod,id){
						
	var r = confirm("Deseja realmente deletar?");
	if (r == true) {
		
		$("#btn_del"+cod).html("aguarde.......");
		//AJAX PARA CADASTRAR UM NOVO categoria ******
			$.ajax({
			
		         url: 'classes/Class_Admin.php',
				 type: 'POST',
				 cache: false,
				 dataType: "html",
				 timeout: 40000,
				 data: {acao: "del_produto", id: id},
				 success: function(data, textStatus){
					 	console.log(data);
					 	if(data == "ok"){
						 	$( "#btn_del"+cod).removeClass( "btn-danger" ).addClass( "btn-primary_2" );
						 	$("#btn_del"+cod).html("Produto deletado!... aguarde!");
						 	location.reload();
					 	}else{
							$("#btn_del"+cod).html("Ocorreu um problema, por favor tente mais tarde!");
							
							setTimeout(function(){ 
								$("#btn_del"+cod).html('<i class="fa fa-fw fa-times-circle"></i> deletar'); 
							}, 
							3000);
					 	}
						
		               
		               },
				 error: function(xhr,err){
				 		
				 		$("#btn_del"+cod).html("Ocorreu um problema, por favor tente mais tarde!");
				 		
					  		console.log(xhr);
				       }
		    });
		//**********
		
	} else {
		//NAO FAZ NADA
	}		
			
}
function Editar_Produto(cod,id)
{
	$("#nome_produto_edit_id").val(id);
	$("#nome_produto_edit").val($("#produto_"+cod).val());
	$("#div_loading_edit").html("");
	$("#aviso_nome_produto_edit").css("visibility", "hidden");
	
	$("#div_cad").css("display", "none");
	$("#div_lista").css("display", "none");
	$("#div_edit").css("display", "block");
	
	$("#div_btn_list").css("display", "block");
	
}
function Acao_Edit_Produto()
{
	if($("#nome_produto_edit").val() == "")
	{
		$("#aviso_nome_produto_edit").css("visibility", "visible");
		
	}else{
		
		$("#div_loading_edit").html('<p class="text-gray-500 p-3 m-0 text-center">Por favor, aguarde.....<br/><img src="imagens/carregando.gif" width="80px" /></p>');
		
		
		//AJAX PARA EDITAR UMA NOVA categoria ******
			$.ajax({
			
		         url: 'classes/Class_Admin.php',
				 type: 'POST',
				 cache: false,
				 dataType: "html",
				 timeout: 40000,
				 data: {acao: "edit_produto", nome: $("#nome_produto_edit").val(), id: $("#nome_produto_edit_id").val()},
				 success: function(data, textStatus){
					 	console.log(data);
					 	if(data == "ok"){
						 	$("#div_loading_edit").html('<p class="text-primary_2 p-3 m-0 text-center">Edição realizada!<br />Aguarde atualização da página......<br/><img src="imagens/carregando.gif" width="80px" /></p>');
						 	location.reload();
					 	}else{
							$("#div_loading_edit").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
					 	}
						
		               
		               },
				 error: function(xhr,err){
				 		
				 		$("#div_loading_edit").html('<h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">Ocorreu um problema, por favor tente mais tarde!</h6>');
				 		
					  		console.log(xhr);
				       }
		    });
		//**********
		
	}
}
//*******************************************
function Login()
{
	
	var inputLogin = $("#inputLogin").val();
	var inputPassword = $("#inputPassword").val();
	
	if(inputLogin == "" || inputPassword == "")
	{
		$("#response_login").html("<span class='help-block text-danger'>Digite o Login e Senha!</span>");
		$("#response_login").css("display", "block");
	}else{
		
		$("#response_login").html("<p class='text-gray-500 p-3 m-0'>Por favor, aguarde.....<br/><img src='imagens/carregando.gif' width='80px'></p>");
		$("#response_login").css("display", "block");
		
		
			$.ajax({
			
		         url: 'classes/Class_Admin.php',
				 type: 'POST',
				 cache: false,
				 dataType: "html",
				 timeout: 40000,
				 data: {acao: "login", inputLogin: inputLogin, inputPassword: inputPassword},
				 success: function(data, textStatus){
					var obj = JSON.parse(data);
					console.log(data);
						$("#response_login").html(obj.msg);
						$("#response_login").css("display", "block");
						
						
						if(obj.status == "ok")window.location.href = obj.url;
						
						
		               
		               },
				 error: function(xhr,err){
					 console.log(xhr);
					  		$("#response_login").html("<span class='help-block text-danger'>Não foi possível efetuar o login!</span>");
					  		$("#response_login").css("display", "block");
				       }
		    });
	}
	
}