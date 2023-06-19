<?php

 include 'connection.php';
class AdressDataMenager{
    private  $conn;
   
    public int $id ;

    private string $imie  ;

    private  string $nazwisko;

    private string $nrTel;
   
    private string $miasto;
    
    private string $ulica;

        public function __construct($imie='',  $nazwisko='',$nrTel='',$miasto='',$ulica='') {
            $this->imie = $imie;
            $this->nazwisko= $nazwisko;
            $this->nrTel= $nrTel;
            $this->miasto= $miasto;
            $this->ulica= $ulica;
            
            }
        
            

        public function SaveToDatabase($conn){

           
            try{
             
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
                return "Błąd podczas zapisywania danych: <br/>". $e->getMessage();
            }
            $conn = null;
        }

        

        public function SelectAllData($conn){
           // include 'connection.php';
            try{
        
                $stmt = $conn-> prepare("SELECT * FROM daneadresowe; ");
                $stmt-> execute();
        
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                if($stmt->rowCount() > 0){
                    return $result;
                } else {
                    return array(); // Zwraca pustą tablicę, jeśli brak danych
                }
            } catch(PDOException $e){
                return "Błąd podczas wyświetlania danych: <br/>". $e->getMessage();
            }
        
            $conn = null;
        }

        
        public function EditData($userId, $columnsToUpdate, $conn) {
           // include 'connection.php';
        
            try {
                
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
        
                return "Dane zostały zapisane";
            } catch(PDOException $e) {
                return "Błąd podczas aktualizacji w bazie danych: </br>" . $e->getMessage();
            }
        }
        
        
         public function DeleteData($id, $conn) { 
            try{
                
                $stmt = $conn->prepare("DELETE FROM daneadresowe WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();

        
            }
            catch(PDOException $e) {
                return "Błąd podczas usuwania komórki z bazy danych: " . $e->getMessage();
            }

             $conn = null;
         }


}
?>