$(document).ready(function(){
    $('.btn-info').click(function(){
    	var id = $(this).val();
    	//var id = $(this).data();
    	$.get('requisicao/atualizacao/'+id, function(data){
    		$("."+id+">tbody").append('<tr id='+id+'><td>'+data.id+'</td><td>'+data.titulo_atualizacao+'</td><td>'
    			+data.atualizacao+'</td><td>'+data.usuario+'</td></tr>');
    		$('.'+id).fadeIn(600);
    	});
    });

    $('.btn-info').mouseout(function(){
    	var id = $(this).val();
    	$("td").remove();
    	//var id = $(this).data();
    	$('.'+id).fadeOut(800);
    });
});