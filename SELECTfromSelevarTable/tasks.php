<?php
require ("config.php");
session_start();
$author=(string)$_SESSION['login'] ;

$sql_select="select * from `Tasks`";
$sql_appoint="select `login` from `users`";

$sql_my="SELECT * FROM `Tasks` where `responsible`='$author'";
/*
$sql_my=$connect->prepare("SELECT * FROM `Tasks` where `responsible`=:LOG");
$sql_my->execute(array(':LOG'=>$author));
*/


if (!empty($_POST['description'])){

    $stmt = $connect->prepare("INSERT INTO `Tasks` (id,content,responsible,author,status,appoint) VALUES (?, ?, ?,?,?,?)");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $content);
    $stmt->bindParam(3, $responsible);
    $stmt->bindParam(4, $author);
    $stmt->bindParam(5, $status);
    $stmt->bindParam(6, $appoint);

    $content=(string)$_POST['description'];
    $responsible="";
    $author=(string)$_SESSION['login'] ;
    $status="Не начинал";
    $appoint="";

    $stmt->execute();

}

if (!empty($_POST['responsible']) and $_POST['responsible']!='none'){
    $id=substr($_POST['responsible'],strpos($_POST['responsible'],".")+1);
    $login=substr($_POST['responsible'],0,strpos($_POST['responsible'],"."));
    $id=(int)$id;
    $sql=$connect->prepare("UPDATE `Tasks` SET `responsible`=:LOG WHERE `id`=:ID");
var_dump($sql->execute(array(':LOG'=>$login,':ID'=>$id)));

}


foreach($connect->query($sql_my) as $row) {
    if ($_GET['action'] == 'edit.' . $row['id']) {
        $stmt = $connect->prepare("UPDATE `Tasks` SET status='Правится' WHERE id=$row[id]");
        $stmt->execute();
    }
    if ($_GET['action'] == 'done.' . $row['id']) {
        $stmt = $connect->prepare("UPDATE `Tasks` SET status='В процессе' WHERE id=$row[id]");
        $stmt->execute();
    }
    if ($_GET['action'] == 'end.' . $row['id']) {
        $stmt = $connect->prepare("UPDATE `Tasks` SET status='Завершено' WHERE id=$row[id]");
        $stmt->execute();
    }
}
?>

<h1>Список всех дел</h1>
<style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
        margin-top:-10px;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }

    table th {
        background: #eee;
    }
</style>

<div style="clear: both"></div>


<div style="float: left">
    <form method="POST">
        <input type="text" name="description" placeholder="Описание задачи" value="" />
        <input type="submit" name="save" value="Добавить" />
    </form>
</div>
<br/>
<br/>
<br/>

<table>
    <tr>
        <td>ID</td>
        <td>Осодержание задачи</td>
        <td>Ответственный</td>
        <td>Автор</td>
        <td>Статус</td>
        <td>Назначить ответственного</td>

    </tr>
    <?php foreach($connect->query($sql_select) as $row){
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['content']?></td>
            <td><?=$row['responsible']?></td>
            <td><?=$row['author']?></td>
            <td><?=$row['status']?></td>
            <td>
                  <form action="" method="post">
                      <select name="responsible" >
                          <option>none</option>
                          <?php foreach ($connect->query($sql_appoint) as $user){?>
                        <option name="selectUser" value=<?=$user['login'].".".$row['id']?>> <?= $user['login']?></option>
                          <?php } ?>
                          <input type="submit" value="Назначить">
                      </select>
                  </form>
            </td>

    <?php } ?>
</table>

<h2>Дела, порученные Вам </h2>
<table>
    <tr>
        <td>ID</td>
        <td>Содержание задачи</td>
        <td>Действие</td>
        <td>Статус</td>
        <td>Автор</td>
        <td>Назначить другого ответственного</td>
    </tr>
    <?php foreach($connect->query($sql_my) as $row){
    ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['content']?></td>
        <td>
            <a href="tasks.php?action=edit.<?= $row['id']?>">Править</a>
            <a href="tasks.php?action=done.<?= $row['id']?>">Начать</a>
            <a href="tasks.php?action=end.<?= $row['id']?>">Завершено</a>
        </td>
        <td><?=$row['status']?></td>
        <td><?=$row['author']?></td>

        <td>
            <form action="" method="post">
                <select name="responsible" >
                    <option>none</option>
                    <?php foreach ($connect->query($sql_appoint) as $user){?>
                        <option name="selectUser" value=<?=$user['login'].".".$row['id']?>> <?= $user['login']?></option>
                    <?php } ?>
                    <input type="submit" value="Назначить">
                </select>
            </form>
        </td>
    </tr>
        <?php } ?>
</table>





