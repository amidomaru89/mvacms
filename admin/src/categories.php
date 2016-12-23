<?
define(admdin, $_SERVER['DOCUMENT_ROOT'].'/admin/');
include admdin.'system/system_base.php';
?>
<h1>Разделы и страницы</h1>
<div class="task_bar">
	<button class="button_green button" data-go="create" data-type="folder"><span>Создать раздел</span></button>
</div>
<?
$select = array('*');
$from = array('categories');
$where = null;
?> 


<table class="display table table-hover table-striped" cellspacing="0" width="100%" >
 <thead >
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Краткое описание</th>
                <th>Подкатегоря</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Краткое описание</th>
                <th>Подкатегоря</th>
                <th>Действия</th>
            </tr>
        </tfoot>
         <tbody>
        <? foreach (MVASelect($select, $from, $where) as $k => $v) {
        	echo '<tr><td>'.$v['id'].'</td><td>'.$v['name'].'</td><td>'.$v['pretext'].'</td><td>'.$v['parent_id'].'</td><td><button class="button_red button" data-go="delite" data-type="folder" data-del="'.$v['id'].'"><span>Удалить</span></button></td></tr>';
         	} ?>
        </tbody>
</table>