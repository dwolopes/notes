$(document).ready(function(){
    $('.btn-info').click(function(){
    	var id = $(this).val();
    	//var id = $(this).data();
    	$.get('requisicao/atualizacao/'+id, function(data){
    		if(data.success ===	 false) {
    			$("."+id+">tbody").append('<tr id='+id+'><td>'+data.error_message+'</td></tr>');
    			$('.'+id).fadeIn(600);

    		}else {
    			$("."+id+">tbody").append('<tr id='+id+'><td>'+data.id+'</td><td>'+data.titulo_atualizacao+'</td><td>'
    			+data.atualizacao+'</td><td>'+data.usuario+'</td></tr>');
    			$('.'+id).fadeIn(600);
    		}
    	});
    });

    $('.panel-info').mouseleave(function(){
    	//var id = $(this).val();
    	$("td").remove();
    	//var id = $(this).data();
    	$('.panel-info').fadeOut(800);
    });
});