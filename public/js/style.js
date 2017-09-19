$(document).ready(function(){
    $(".btn-info").click(function(){
    	var id = $(this).val();
    	//var id = $(this).data();
    	$.get('requisicao/atualizacao/'+id, function(data){
    		console.log(id);	
    	});
    });
});