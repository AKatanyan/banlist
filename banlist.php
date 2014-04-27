<link rel="stylesheet" type="text/css" href="/modules/banlist/style.css"> 
<?php

// Подключение config.php
include 'config.php';

// Кодировка исходного текста
mysql_query("SET NAMES 'cp1251' COLLATE 'cp1251_general_ci'"); 
mysql_query("SET CHARACTER SET 'cp1251'");

// Вывод информации из БД
$result = mysql_query("SELECT * FROM banlist ORDER BY id DESC LIMIT 51");

// Замена текста в поле reason (причина)
// $qury ='UPDATE tab SET `reason` = REPLACE(`reason` , `Unbanned: `, `Разбанен: `);';
// $res = mysql_query($qury);

// Переменные значения
$nickname = $member_id['name'];

// Удаление из БД информации
$qury ='DELETE FROM banlist WHERE `type` = 2;';
$res = mysql_query($qury);
$qury ='DELETE FROM banlist WHERE `type` = 3;';
$res = mysql_query($qury);
$qury ='DELETE FROM banlist WHERE `type` = 4;';
$res = mysql_query($qury);
$qury ='DELETE FROM banlist WHERE `type` = 6;';
$res = mysql_query($qury);

// Информация
                    {
		$getname = mysql_query("SELECT * FROM banlist WHERE name='$nickname' AND type=0");
		if(mysql_num_rows($getname) >= 1)
		{
			echo "<div class='warningbad'>Вы находитесь в бане!<br/>
			Чтобы разблокировать свой аккаунт, заполните заявление на <a href='forum'>Форуме проекта</a>.</div>";
		}
		else
		{
			echo "<div class='warninggood'>Вы не находитесь в бане.<br/>
			Соблюдайте <a href='rules.html'>правила проекта</a> и никогда сюда не попадете.</div>";
		}

// Таблица вывода
echo "<table class='table' width='100%' cellpadding=5 cellspacing='0'>
<thead>
<tr>
<th>Тип</th>
<th>Игрок</th>
<th>Заблокировал</th>
<th>Причина</th>
<th>Дата наказания</th>
<th>Дата истечения</th>
</tr>
</thead>
<tfoot>
<tr>
<td>&nbsp;</td>        
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</tfoot>";

// Результат вывода из БД
while($row = mysql_fetch_assoc($result)){

if($col == "#ffffff"){
$col = "#eeeeee";
}else{
$col = "#ffffff";
}

echo "<tr bgcolor=$col>";
if($row['type'] == "5"){
echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/unban.png'></td>";
}else{
    if($row['type'] == "3"){
    echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/kick.png'></td>";
    }else{
        if($row['type'] == "2"){
        echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/warn.png'></td>";
        }else{
            if($row['type'] == "0"){
            echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/ban.png'></td>";
            }else{
                if($row['type'] == "1"){
                echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/ban.png'></td>";
                }else{
                    if($row['type'] == "4"){
                    echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/warn.png'></td>";
                    }else{
                        if($row['type'] == "6"){
                        echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/warn.png'></td>";
                        }else{
                            if($row['type'] == "9"){
                            echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/ban.png'></td>";
                            }else{
                            echo "<td><img src='http://herocraft.besaba.com/modules/banlist/img/warn.png'></td>";
                            }
                        }
                    }
                }
            }
        }
    }
}
echo "<td>".$row['name']."</td>";
echo "<td>".$row['admin']."</td>";
echo "<td>".$row['reason']."</td>";

// Настройка Даты/Времени
date_default_timezone_set('Europe/Kaliningrad');
$datetime = date("H:i d.m.Y", $row['time']);
echo "<td>$datetime</td>";
$datemptime = date("H:i d.m.Y", $row['temptime']);
if($row['temptime'] == "0"){
echo '<td><font color="#FF0000">Перманентно</font></td>';
}else{
echo "<td>$datemptime</td>";
}
echo "</tr>";

}
                    }
echo"</table>";

// Количество нарушителей
$i=0;
$sql='select name from `banlist`';
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res)){
        $users_name[]=$row['name'];
        $i++;
}

echo 'Количество найденных нарушителей: '.$i.'';

?>
