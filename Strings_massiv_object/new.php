<!--
<HTML>
<HEAD>
    <title>Strings_Massiv_Object</title>
</HEAD>
  <body>
  <? /*php
    foreach ($RandomAnimals as $key=>$randomAnimal){
        ?>
  <h2><?= $key?> </h2>
  <br>
     <?php
           foreach ($randomAnimal as $key_innit=>$value) {
               if ($key_innit != count($randomAnimal)-1) {
                   echo $value;
                   echo ", ";
               }else {
                   echo $value;
                   continue 2;
               }
       }
    }
     ?>
  </body>
</HTML>
