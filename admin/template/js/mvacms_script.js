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

//редирект после действия с базы
function Mredir(go , mess){
  $(".content").removeClass('flipInY').addClass('flipOutY');
    $.post("/admin/src/"+go+".php",{mess}, onAjaxSuccess).error(onAjaxSuccess('404 страница или раздел не существуют!'));
    function onAjaxSuccess(data)
    {setTimeout(function(){$(".content").html(data);$(".content").removeClass('flipOutY').addClass('flipInY');}, 600);}
}



// Инициализация TinyMCE
function initTMCE(){
	tinymce.init({
  selector: "textarea",
  height: 500,
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],

  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

  menubar: false,
  toolbar_items_size: 'small',

  style_formats: [{
    title: 'Bold text',
    inline: 'b'
  }, {
    title: 'Red text',
    inline: 'span',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Red header',
    block: 'h1',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Example 1',
    inline: 'span',
    classes: 'example1'
  }, {
    title: 'Example 2',
    inline: 'span',
    classes: 'example2'
  }, {
    title: 'Table styles'
  }, {
    title: 'Table row 1',
    selector: 'tr',
    classes: 'tablerow1'
  }],

  templates: [{
    title: 'Test template 1',
    content: 'Test 1'
  }, {
    title: 'Test template 2',
    content: 'Test 2'
  }],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
}


