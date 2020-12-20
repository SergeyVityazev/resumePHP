<?php
$json=file_get_contents(__DIR__ . '/countries.json');
$data=json_decode($json,true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lesson2.1</title>
</head>
<body>
<table  cellpadding="7">
    <tr><h2>Контактные данные</h2></tr>

    <?php foreach ($data as $item){ ?>
        <tr>
            <td>firstname</td>
            <td><?=$item['FirstName']?></td>
        </tr>
        <tr>
            <td>lastname</td>
            <td><?=$item['LastName']?></td>
        </tr>
        <tr>
            <td>adress</td>
            <td><?=$item['Adress']?></td>
        </tr>

        <tr>
            <td>phonenumber</td>
            <td><?=$item['PhoneNumber']?></td>
        </tr>

    <?php } ?>

</table>
</body>
</html>