<html>
<head>

    <title>NewTable</title>

</head>
<body>

<?php
require ("config.php");
$sql_select="select * from NewTable";

?>

<table>
    <?php foreach($connect->query($sql_select) as $row){?>
        <tr>

            <td><?=$row['name']?></td>
            <td><?=$row['autor']?></td>
            <td><?=$row['year']?></td>
            <td><?=$row['genre']?></td>
            <td><?=$row['ISBN']?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
