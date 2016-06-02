$(document).ready(function(){
	$('.slide').click(function(){
		$(this).parent().next().css({'display':'block'});
	})
	


	//------Set images as home image-----///


	$('.set').click(function(){
		var id = $(this).attr('id');
		var name = $(this).attr('name');
		$.ajax({
			type:'post',
			url:'/setHomeImage',
			data:{ids:id,names:name},
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


	//------Delete Images-----///


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


	//------Search With Ajax-----///

	$('.search_type').keyup(function(){
		var searchText = $('.search_type').val();
		var userId = $('.search_type').attr('id');
		if(searchText == ''){
			return false;
		}
		var uri = location.pathname;
		$('.search_data').html('');
		$.ajax({
			dataType:'JSON',
			type:'post',
			url:'/user-search',
			data:{name:searchText,id:userId},
			success:function(result){
				result.forEach(function(newresult){
					var name = newresult.name;
					var lastname = newresult.lastname;
					var homeImg = newresult.home_img;
					if(homeImg == ''){
						homeImg = 'default.jpg'
					}
					$('.search_data').append("<a href='#'><div class='image_area_search'><img class='small_images img-thumbnail' src='/assets/images1/"+homeImg+"'><span class='name'>"+name+"</span><span class='lastname'>"+lastname+"</span></div></a>")
				})
			}
		})
	})


})