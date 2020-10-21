<!DOCTYPE html>
<html>
<head>
<style>
table, td, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'qqq';

$link = mysqli_connect($servername, $username,$password,$dbname);

echo"Организовать редактирование строки таблицы  <br><br> ";


if (isset($_GET[upd1]) ){

 	
 	$sql = "UPDATE zakazy SET FIO_zakazchika_brezgin = '$_GET[text2]',
 		Nprod_brezgin = '$_GET[text3]',
 		data_brezgin  = '$_GET[text4]',
 		kolvo_brezgin = '$_GET[text5]'  WHERE N_zakaza_brezgin = '$_GET[text1]'"; 	
	
	mysqli_query($link, $sql) or die(	mysql_error($link));
}
?>
<table>
        <tr><td>N_zakaza_brezgin</td><td>FIO_zakazchika_brezgin</td><td>Nprod_brezgin</td><td>data_brezgin</td><td>kolvo_brezgin</td> <td>редактировать</td>      
        </tr>
        <?php
$zakazy = mysqli_query($link, "SELECT * FROM zakazy");
$zakazy = mysqli_fetch_all($zakazy);   
//var_dump($data);
?>

 <?php foreach ($zakazy as $zakaz ) { ?>
 <tr>
	<td><?= $zakaz[0] ?></td><td><?= $zakaz[1] ?> </td><td><?= $zakaz[2] ?> </td><td><?= $zakaz[3] ?> </td><td><?= $zakaz[4] ?> </td>
	<td><a href="?upd=<?= $zakaz[0] ?>">update</a></td>
 <tr>
 <?php } ?>
 </table>
<?php
if (isset($_GET[upd]) ){
	 $zakaz_id = $_GET['upd'];
	 $zakazy = mysqli_query($link, "SELECT * FROM zakazy WHERE N_zakaza_brezgin = '$zakaz_id'");
	 $zakazy = mysqli_fetch_assoc($zakazy);
	?>
	Изменение строки: <br>
		<form>
		<INPUT TYPE=hidden NAME=text1 VALUE="<?= $zakazy['N_zakaza_brezgin'] ?>"><BR>
		фио:<INPUT TYPE=TEXT NAME=text2 VALUE="<?= $zakazy['FIO_zakazchika_brezgin'] ?>"><BR>
		номер продавца:<INPUT TYPE=TEXT NAME=text3 VALUE="<?= $zakazy['Nprod_brezgin'] ?>"><BR>
		дата: <INPUT TYPE=date NAME=text4 VALUE="<?= $zakazy['data_brezgin'] ?>"><BR>
		количетсво: <INPUT TYPE=TEXT NAME=text5 VALUE="<?= $zakazy['kolvo_brezgin'] ?>"><BR>
		<INPUT TYPE=SUBMIT VALUE="изменить" NAME=upd1><BR>  
		</form>
		<?php	
}

echo 'Текущая версия PHP: ' . phpversion();

// Выводит строку типа '2.0' или ничего, если расширение не включено
echo phpversion('tidy');
?>
</body>
</html> 