<?php
class DataClass{
    
    /**
     * @var int The article ID from the database
    */
    public $id = null;

    /** 
    *@var string your first name
    */

    private $imie = null ;

    /** 
    *@var string Your surname
    */

    private $nazwisko= null;

    /** 
    *@var string Phone number
    */

    private $nrTel= null;
    /**
    *@var string Full city
    */

    private $miasto= null;
    /** 
    *@var string Full street
    */
    private $ulica =null;

        public function __construct($imie,  $nazwisko,$nrTel,$miasto,$ulica) {
            $this->imie = $imie;
            $this->nazwisko= $nazwisko;
            $this->nrTel= $nrTel;
            $this->miasto= $miasto;
            $this->ulica= $ulica;
            }
        
            

        public function save_to_database(){
            include 'connection.php';
           
            try{
                // Create connection
             $conn= new PDO("mysql:: host= $servername; dbname=$dbname",$username,$password);
             $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
             

             $stmt = $conn-> prepare("INSERT INTO daneadresowe ( imie, nazwisko, numer_telefornu, miasto, ulica) VALUES (:imie,:nazwisko,:nrTel,:miasto,:ulica);");
             $stmt -> bindParam(':imie', $this->imie);
             $stmt -> bindParam(':nazwisko', $this->nazwisko);
             $stmt -> bindParam(':nrTel', $this->nrTel);
             $stmt -> bindParam(':miasto', $this->miasto);
             $stmt -> bindParam(':ulica', $this->ulica);
             $stmt -> execute();

             echo "Dane zostały zapisane";
            }
            catch(PDOException $e){
                echo "Błąd podczas zapisywania danych: <br/>". $e->getMessage();
            }
            $conn = null;
        }

        public function Select_All_Data(){
            include 'connection.php';
            try{
                $conn= new PDO("mysql:: host= $servername; dbname=$dbname",$username,$password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            

            $stmt = $conn-> prepare("SELECT * FROM daneadresowe; ");
            $stmt-> execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount()> 0){
                echo '<table border="1" cellpadding="10" cellspacing="0">';
                echo "<tr><th>Id użytkownika</th><th>Imię</th><th>Nazwisko</th><th>Numer telefonu</th><th>Miasto</th><th>Ulica</th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td>".$row ['id']."</td>";
                    echo "<td>".$row ['imie']."</td>";
                    echo "<td>".$row ['nazwisko']."</td>";
                    echo "<td>".$row ['numer_telefornu']."</td>";
                    echo "<td>".$row ['miasto']."</td>";
                    echo "<td>".$row ['ulica']."</td>";
                    echo "</tr>";
                    }
                echo '</table>';
                }
                else
                {
                 echo "Brak danych";
                }

            }
            catch(PDOException $e){
                echo "Błąd podczas wyświetlania danych: <br/>". $e->getMessage();
            }

            $conn = null;


        }


        public function Edit_Data($userId, $columnsToUpdate) {
            include 'connection.php';
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $updateQuery = "UPDATE daneadresowe SET";
                $updateData = array();
        
                if (in_array('imie', $columnsToUpdate) && !empty($this->imie)) {
                    $updateQuery .= " imie = :imie,";
                    $updateData[':imie'] = $this->imie;
                }
        
                if (in_array('nazwisko', $columnsToUpdate) && !empty($this->nazwisko)) {
                    $updateQuery .= " nazwisko = :nazwisko,";
                    $updateData[':nazwisko'] = $this->nazwisko;
                }
        
                if (in_array('numer_telefornu', $columnsToUpdate) && !empty($this->nrTel)) {
                    $updateQuery .= " numer_telefornu = :nrTel,";
                    $updateData[':nrTel'] = $this->nrTel;
                }
        
                if (in_array('miasto', $columnsToUpdate) && !empty($this->miasto)) {
                    $updateQuery .= " miasto = :miasto,";
                    $updateData[':miasto'] = $this->miasto;
                }
        
                if (in_array('ulica', $columnsToUpdate) && !empty($this->ulica)) {
                    $updateQuery .= " ulica = :ulica,";
                    $updateData[':ulica'] = $this->ulica;
                }
        
                $updateQuery = rtrim($updateQuery, ","); // Usunięcie ostatniego przecinka
                $updateQuery .= " WHERE id = :userId";
                $updateData[':userId'] = $userId;
        
                $stmt = $conn->prepare($updateQuery);
                $stmt->execute($updateData);
        
                echo "Dane zostały zapisane";
            } catch(PDOException $e) {
                echo "Błąd podczas aktualizacji w bazie danych: </br>" . $e->getMessage();
            }
        }
        
        
         public function Delete_Data($id) { //dodać nowa stronę edycja aby móc edytować oraz usuwać dane z bazy danych
            
        include 'connection.php';

            try{
                $conn = new PDO( "mysql:: host= $servername; dbname=$dbname",$username,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt = $conn->prepare("DELETE FROM daneadresowe WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();

        echo "Komórka została usunięta";
        
            }
            catch(PDOException $e) {
                echo "Błąd podczas usuwania komórki z bazy danych: " . $e->getMessage();
            }

             $conn = null;
         }


}
?>