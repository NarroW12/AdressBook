<html lang= "pl">
    <head>
    <meta charset ="UTF-8">
    <title> Książka adresowa</title>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>
<div class="title-section">
  <h1>Książka adresowa (Wyświetl, Edytuj dane)</h1>
</div>


  <div class="left-section"> 
    <h2>Dane</h2>
    <?php // Wyświetl tabelę z bazy danych
    include 'AdressDataMenager.php';
    
    $data= new AdressDataMenager();
    $tableData= $data -> SelectAllData($conn);

    if(!empty($tableData)){
        echo '<table border="1" cellpadding="10" cellspacing="0">';
        echo "<tr><th>Id użytkownika</th><th>Imię</th><th>Nazwisko</th><th>Numer telefonu</th><th>Miasto</th><th>Ulica</th></tr>";
     
        foreach($tableData as $row){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['imie']."</td>";
            echo "<td>".$row['nazwisko']."</td>";
            echo "<td>".$row['numer_telefornu']."</td>";
            echo "<td>".$row['miasto']."</td>";
            echo "<td>".$row['ulica']."</td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "Brak danych";
    }

    

?>
<a href= 'index.php'> Wróć do strony głównej</a>

  </div>

  <div class="right-section">
    <h2>Edytuj/ Usuń dane</h2>

    <form action="EditData.php" method="POST">
    
    <div class="form-row">
    <label for="ID">ID:</label>
    <input type="text" name="ID"id = "ID"/>
    </div>

    <div class="form-row">
    <label for="imie">Imię:</label>
    <input type="text" name="imie"id = "imie"/>
    </div>

    <div class="form-row">
    <label for="imie">Nazwisko:</label>
    <input type="text" name="nazwisko" id ="nazwisko"/>
    </div>
  
    <div class="form-row">
    <label for="imie">Numer telefonu:</label>
    <td><input type="text" name="numerTel" id ="numerTel"/>
     </div>

    <div class="form-row">
    <label for="imie">Miasto:</label>
    <input type="text" name="miasto"id = "miasto"/>
    </div>

  
  <div class="form-row">
    <label for="imie">Ulica:</label>
    <input type="text" name="ulica"id ="ulica" />
  </div>


<input type = "submit" value="Zapisz">

</form>

        <form action="DeleteData.php" method="GET">
        <h2> Usuń dane:</h2>
        <div class="form-row">
        <label for="ID">ID:</label>
        <input type="text" name="ID"id = "ID"/>
        </div>
        <input type = "submit" value="Usuń komórkę">
        </form>


  </div>



</body>
</html>