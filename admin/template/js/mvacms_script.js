$(document).ready(function() {
	$('.cssload-loader').fadeOut();
	var cnt = $(".content");
	$('.wrap > .left > ul > li > a').click(function(){
		var hrf = $(this).attr('href').slice(1) + '.php';
     	cnt.removeClass('flipInY').addClass('flipOutY');
    	setTimeout(function(){
	    	$.ajax({
				url: "/admin/src/"+hrf, 
			 	success: function(result){
	        		cnt.html(result);
	        		$('table').DataTable();
	   		 	},
	   		 	statusCode:{
				    404:function(){
				    cnt.html('404 Страница не существует!');
				  }
				}
	   		 })
	   		 .done(function(){cnt.removeClass('flipOutY').addClass('flipInY');});  
   		 }, 600);

	});


// событие на клик кнопки
	$(cnt).on("click", ".button", function() {
		var params = $(this).data();
		cnt.removeClass('flipInY').addClass('flipOutY');
		$.post("/admin/src/"+params.go+".php",{params}, onAjaxSuccess).error(onAjaxSuccess('404 страница или раздел не существуют!'));
		function onAjaxSuccess(data)
		{setTimeout(function(){cnt.html(data);cnt.removeClass('flipOutY').addClass('flipInY');}, 600);}
	 } );
	

});
