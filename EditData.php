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
        $imie = $_POST['imie'];
        $nazwisko= $_POST['nazwisko'];
        $nrTel= $_POST['numerTel'];
        $miasto =$_POST['miasto'];
        $ulica =$_POST['ulica'];
        
        $patern= '/^[0-9]{9}$/'; //regex sprawdza czy jest od 0-9 i czy jest 9 cyfr

        if(!empty($id)){ 
            
            $columnsToUpdate = ['imie', 'nazwisko', 'numer_telefornu','miasto','ulica']; // Lista kolumn do aktualizacji

               $user= new DataClass($imie,$nazwisko,$nrTel,$miasto, $ulica);
                echo '<table border="1" cellpadding="10" cellspacing="0">';
                echo "<tr><th>Imię</th><th>Nazwisko</th><th>Numer telefonu</th><th>Miasto</th><th>Ulica</th></tr>";
                echo "<tr><td>$imie</td><td>$nazwisko</td><td>$nrTel</td><td>$miasto</td><td>$ulica</td></tr>";
                echo "</table>";

               $user ->Edit_Data($id,$columnsToUpdate);
            
            
        }
        else{
            echo "You did't complete the a data. Return and try again.</br>";
        }

    

    }
    
    echo "<br/><a href= 'index.php'> Strona główna</a><br/>";
    echo "<br/><a href= 'ZapisaneDane.php'> Wyświetl, Edytuj dane</a>";

?>

</body>
</html>