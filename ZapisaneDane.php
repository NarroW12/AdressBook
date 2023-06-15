<html lang= "pl">
    <head>
    <meta charset ="UTF-8">
    <title> Książka adresowa</title>
    <link rel="stylesheet" type="text/css" href="style.css">

<style>
body {
    background-color: rgb(252, 227, 194);

}
/* Styl dla sekcji podziału */
.split-section {
    display: flex;
    justify-content: space-between;
}

/* Styl dla lewej części podziału */
.left-section {
    float: left;
    width: 20%;
    padding: 20px;
}

/* Styl dla prawej części podziału */
.right-section {
    float: right;
    width: 50%;
    padding: 20px;
}
</style>
</head>
<body>
<div class="title-section">
  <h1>Książka adresowa (Wyświetl, Edytuj dane)</h1>
</div>


  <div class="left-section"> 
    <h2>Dane</h2>
    <?php // Wyświetl tabelę z bazy danych
    include 'DataClass.php';
    $user= new DataClass('','','','','');
    $user->Select_All_Data();
    echo "<a href= 'index.php'> Wróć do strony głównej</a>"

?>

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

    <form action="DeleteData.php" method="POST">
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