$(document).ready(function(){
	$('.slide').click(function(){
		$(this).parent().next().css({'display':'block'});
	})
	


	//------Set images as home image-----///


	$('.set').click(function(){
		var id = $(this).attr('id');
		$.ajax({
			type:'post',
			url:'/setHomeImage',
			data:{ids:id},
			success:function(result){
				if(result == 1){
					alert('sucesfuly changed');
				}
				else{
					alert('error cant change')
				}
			}
		})
	})

	$('.delete').click(function(){
		var id = $(this).attr('id');
		var name = $(this).attr('name');
		$.ajax({
			type:'post',
			url:'/deleteImage',
			data:{ids:id,names:name},
			success:function(res){
				if(res == 1){
					location.reload();
				}
			}
		})
	})
})