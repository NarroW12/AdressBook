<html lang= "pl">
    <head>
    <meta charset ="UTF-8">
    <title> Książka adresowa</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    include 'AdressDataMenager.php';

    if($_SERVER["REQUEST_METHOD"]=== "GET"){

        $id = $_GET['ID'];

        $user= new AdressDataMenager();
        

        if(!empty($id)){ 
               $user ->DeleteData($id, $conn);  
               echo "Komórka została usunięta";
            
        }
        else{
            echo "Empty form. Try again</br>";
        }

    }
    
?>

<br/>
<a href= 'index.php'> Strona główna</a>
<br/><br/>
<a href= 'ZapisaneDane.php'> Wyświetl, Edytuj dane</a>

</body>
</html>