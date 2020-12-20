<?php
function login($login, $password,$connect) {

    $sql="select `login`, `password` from `users`where `login`=:LOG";
    $userFind=$connect->prepare($sql);
    $userFind->execute(array(':LOG'=>$login));
    $result=$userFind->fetch(PDO::FETCH_ASSOC);
    if ($login== $result['login']){
        if ($password==$result['password'])
            return true;
    }
    echo "Неверное имя пользователя или пароль";
return false;
}

function chekin($login, $password,$connect){

    $sql="SELECT `login` FROM `users` where `login`=:LOG";
    $userFind=$connect->prepare($sql);
    $userFind->execute(array(':LOG'=>$login));

    if($result=$userFind->fetch(PDO::FETCH_ASSOC)!=false){
        echo "Такой пользоватеь уже существует";
        return false;
    }

    $stmt = $connect->prepare("INSERT INTO `users` (login, password) VALUES ( ?, ?)");
    $stmt->bindParam(1, $login);
    $stmt->bindParam(2, $password);
    if ($stmt->execute())
        return true;

    /*
$login=(string)$login;

  $sql=  "CREATE TABLE IF NOT EXISTS `$login` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(30) NOT NULL,
                `param` int(11) NOT NULL,
                PRIMARY KEY (`id`)
                ) Engine=InnoDB DEFAULT CHARSET=utf8;";
    echo '<br>';
  var_dump($connect->exec($sql));

    return true;*/
}