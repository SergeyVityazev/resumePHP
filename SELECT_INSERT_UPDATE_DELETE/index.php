<?php
require ("config.php");
$sql_select="select * from Listbisiness";

if (!empty($_POST['description'])){
    /*$rows = $connect->exec("INSERT INTO `Listbisiness` VALUES
    (null,$_POST[description],null)
    ");
    $error_array=$connect->errorInfo();
    echo "Ошибка ". $error_array[2];*/
    $stmt = $connect->prepare("INSERT INTO `Listbisiness` (id,name, date, status) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $date);
    $stmt->bindParam(4, $status);
    $name=(string)$_POST['description'];
    $status='Не начинал';
    $stmt->execute();
}

foreach($connect->query($sql_select) as $row) {
    if($_GET['action']=='edit.'.$row['id']) {
        $stmt = $connect->prepare("UPDATE `Listbisiness` SET status='Правится' WHERE id=$row[id]");
        $stmt->execute();
    }
    if($_GET['action']=='done.'.$row['id']) {
        $stmt = $connect->prepare("UPDATE `Listbisiness` SET status='В процессе' WHERE id=$row[id]");
        $stmt->execute();
    }
    if($_GET['action']=='end.'.$row['id']) {
        $stmt = $connect->prepare("UPDATE `Listbisiness` SET status='Завершено' WHERE id=$row[id]");
        $stmt->execute();
    }
    if($_GET['action']=='delete.'.$row['id']) {
        $stmt = $connect->prepare("DELETE FROM `Listbisiness`  WHERE id=$row[id]");
        $stmt->execute();
    }
}
?>

<h1>Список дел на сегодня</h1>
<table>
    <tr>
        <td>Номер задачи</td>
        <td>Описание задачи</td>
        <td>Время создания задачи</td>
        <td>Статус</td>
        <td>Действие</td>

    </tr>
    <?php foreach($connect->query($sql_select) as $row){
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['date']?></td>
            <td><?=$row['status']?></td>
            <td>
                <a href="index.php?action=edit.<?= $row['id']?>">Править</a>
                <a href="index.php?action=done.<?= $row['id']?>">Начать</a>
                <a href="index.php?action=end.<?= $row['id']?>">Завершено</a>
                <a href="index.php?action=delete.<?= $row['id']?>">Удалить</a>
            </td>
        </tr>
    <?php } ?>
</table>


<div style="float: left">
    <form method="POST">
        <input type="text" name="description" placeholder="Описание задачи" value="" />
        <input type="submit" name="save" value="Добавить" />
    </form>
</div>


<style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
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
