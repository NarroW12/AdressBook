<html lang= "pl">
    <head>
    <meta charset ="UTF-8">
    <title> Książka adresowa</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    include 'DataClass.php';
    if($_SERVER["REQUEST_METHOD"]=== "POST"){

        $id = $_POST['ID'];
        
        

        if(!empty($id)){ 
            
               $user= new DataClass('','','','','');
                
               $user ->Delete_Data($id);
            
            
        }
        else{
            echo "Empty form. Try again</br>";
        }

    

    }
    
    echo "<br/><a href= 'index.php'> Strona główna</a><br/>";
    echo "<br/><a href= 'ZapisaneDane.php'> Wyświetl, Edytuj dane</a>";

?>

</body>
</html>