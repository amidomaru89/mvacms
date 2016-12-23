<?
define(admdin, $_SERVER['DOCUMENT_ROOT'].'/admin/');
include admdin.'system/system_base.php';
?>
<?

if (isset($_POST['params'])&& $_POST['params'] !='') {	$params = $_POST['params'];}

if ($params['type'] == 'folder') {?>
 <script>initTMCE();</script>
	<h1>Добавление раздела</h1>
<div class="task_bar">
	<button class="button_green" onclick="$('#go_create').click();"><span>Сохранить</span></button>
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
<input type="hidden" name="data-go" value="create">
<input type="hidden" name="data-type" value="folder">
<button class="button_green" id="go_create" type="submit"><span>Сохранить</span></button>
</form>
</div>





<?}

?>