<?
define(admdin, $_SERVER['DOCUMENT_ROOT'].'/admin/');
include admdin.'system/system_base.php';
?>
<?
if (isset($_POST['params'])&& $_POST['params'] !='') {	$params = $_POST['params'];}

if ($params['type'] == 'folder') {?>
 <script>tinymce.init({
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
});</script>
	<h1>Добавление раздела</h1>
<div class="task_bar">
	<button class="button_green button" data-go="create" data-type="folder"><span>Сохранить</span></button>
	<button class="button_red button" data-go="categories"><span>Отменить</span></button>
</div>
<div class="form_create_folder">
<form action="" method="POST">
<label for="name"><i class="fa fa-eye" aria-hidden="true"></i><input type="text" id="name" name="name" placeholder="Название раздела"></label>
<label for="pretext"><i class="fa fa-pencil" aria-hidden="true"></i><input type="text" id="pretext" name="pretext" placeholder="Краткое описание"></label>
<div class="tinymce_textarea">
<textarea name="text" placeholder="Полное описание"></textarea>
</div>
<label for="parent_id"><i class="fa fa-sitemap" aria-hidden="true"></i><input type="text" id="parent_id" name="parent_id" placeholder="Принадлежит категории"></label>
<label for="keywords"><i class="fa fa-key" aria-hidden="true"></i><input type="text" id="keywords" name="keywords" placeholder="Ключевые слова"></label>
<label for="description"><i class="fa fa-cog" aria-hidden="true"></i><input type="text" id="description" name="description" placeholder="Мета описание"></label>
<button class="button_green button" data-go="create" data-type="folder" type="submit"><span>Сохранить</span></button>
</form>
</div>





<?}

?>