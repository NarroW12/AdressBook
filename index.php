<html lang= "pl">
    <head>
    <meta charset ="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title> Książka adresowa</title>
</head>
<body>
    <h1> Książka adresowa</h1>

<form action="adres.php" method="POST">
    
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
<form action="ZapisaneDane.php" method= "POST">
<input type = "submit" value="Wyświetl Edytuj dane">
</form>

</form>


</body>
</html>