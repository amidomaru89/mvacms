<?
define(admdin, $_SERVER['DOCUMENT_ROOT'].'/admin/');
 
function conn(){
include_once admdin.'../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
return $conn;
}

function MVAauth($login, $pass) {
    $login = stripslashes(htmlspecialchars(trim($login)));
 	$pass = md5(md5(stripslashes(htmlspecialchars(trim($pass)))));
 	
	$sql = "SELECT * FROM `users` WHERE `user_login`='{$login}' AND `user_password`='{$pass}'";
	//$sql = "SELECT * FROM `users`";
	$result = conn()->query($sql);

	if ($result->num_rows > 0) {
	  $_SESSION['login'] = $login;
	  $_SESSION['id'] = md5($login);
	} else {
	    echo "<div>Не верный логин или пароль, повторите снова</div>";
	}
}


/*
MVASelect  принимает 3 параметра в виде масивов и отдает результат в виде объекта
$select = array('value' , 'value'...); или $select = array('*'); поля которые нам необходимы
$from = array('value', 'value'...); из какой таблицы
$where = array(
	'имя поля' => 'его значение', 
	'имя поля' => 'его значение' ...); фильтр по его значениям
так же $where умеет принимать null в случае если фильтр ненужен
*/
function MVASelect($select, $from, $where){
$sql.="SELECT ";
$arrayLength = count($select);
$counter = 0;
if ($select[0] != '*') {
	foreach($select as $k => $v){
	  	$counter++;
	    if($counter == $arrayLength){
	    	$sql.="`".$v."`";
	    } else {
	    	$sql.="`".$v."`".", ";
	    }
	}
} else {
	$sql.="* ";
}
$sql.=" FROM ";
$arrayLength = count($from);
$counter = 0;
	foreach($from as $k => $v){
	    $counter++;
	    if($counter == $arrayLength){
	    	$sql.="`".$v."`";
	    } else {
	    	$sql.="`".$v."`".", ";
	    }
	}
	if (!is_null($where)) {
		$sql.=" WHERE ";
		$arrayLength = count($where);
		$counter = 0;
		foreach($where as $k => $v){
		    $counter++;
		    if($counter == $arrayLength){
		    	$sql.= "`".$k."` = '{$v}'";
		    } else {
		    	$sql.= "`".$k."` = '{$v}' AND ";
		    }
		}
	}
$result = conn()->query($sql);
if ($result->num_rows > 0) 
	{ while($row = $result->fetch_assoc()) {$i++; foreach ($row as $key => $value) {$return[$i][$key].=$value;}}
	return $return; 
} else {
	return 'Ничего не найдено!';}
}

/* MVAinsert() принимает 2 параметра $table - название таблицы в которую нужно сделать запись
$params - массив где ключ название столбца а его свойство значение.
	'id' => 1,  свойство может принимать число
	'name' => 'Цветы', свойство может принимать текст
*/ 
function MVAinsert($table, $params, $go = 'none') {
$sql.='INSERT INTO `'.$table.'` (';
$arrayLength = count($params);
$counter = 0;
	foreach($params as $k => $v){
	  	$counter++;
	    if($counter == $arrayLength){
	    	$sql.="`".$k."`";
	    } else {
	    	$sql.="`".$k."`, ";
	    }
	}
$sql.=') VALUES (';
$counter = 0;
	foreach($params as $k => $v){
	  	$counter++;
	    if($counter == $arrayLength){
	    	if(is_numeric($v)) {$sql.=$v;} else {$sql.="'".$v."'";}
	    } else {
	    	if(is_numeric($v)) {$sql.=addslashes($v).", ";} else {$sql.="'".addslashes($v)."', ";}
	    }
	}
$sql.=')';

	if (conn()->query($sql) === TRUE) {
	    $mess = '<div class="system_ok"><i class="fa fa-check" aria-hidden="true"></i> Категория добавлена.</div>';
	} else {
		$mess = '<div class="system_false"><i class="fa fa-bug" aria-hidden="true"></i> Возникли проблемы с добавлением при ' . $sql . ' <br />'.conn()->error.'</div>';
	}
if ($go != 'none') {
	return "<script>Mredir('{$go}' ,'{$mess}');</script>";
}

}

function MVApost($post){

if ($post['data-go'] == 'create') {
	switch ($post['data-type']) {
		case 'folder':
			$params = array(
						'parent_id' => $post['parent_id'],
						'name' => $post['name']			
					  );
			if ($post['description'] !='') { $params += ['description'=>$post['description']]; }
			if ($post['keywords'] !='') { $params += ['keywords'=>$post['keywords']]; }

			if ($post['pretext'] !='') { $params += ['pretext'=>$post['pretext']]; }
			if ($post['text'] !='') { $params += ['text'=>$post['text']]; }
			return MVAinsert('categories', $params, 'categories');
	break;
		
		
	}
}
}

?>