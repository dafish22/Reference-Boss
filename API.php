<?php
class API {
    private $connect = '';

    function constructor() {
        $this->dbConnection();
    }

    function dbConnection(){
        $this->connect=new PDO("mysql:host=localhost;dbname=referenceboss", "rfbadmin", "password");
    }

    function outputData(){
        $select = $this->connect->prepare("SELECT * FROM tblbooks ORDER BY id");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }

    function addNewEntry(){
        if(isset($_POST["tblbooks"])){
            $data = array(
                ':refnum' => $_POST["refnum"],
                ':author' => $_POST["author"],
                ':title' => $_POST["title"],
                ':publisher' => $_POST["publisher"],
                ':publication_date' => $_POST["publication_date"],
                ':place_of_publication' => $_POST["place_of_publication"],
                ':isbn' => $_POST["isbn"]
            );
            $insert = $this->connect->prepare("INSERT INTO tblbooks (refnum, author, title, publisher, publication_date, place_of_publication, isbn) VALUES (:refnum, :author, :title, :publisher, :publication_date, :place_of_publication, :isbn)");
            $insert->execute($data);
        }
    }
}
?>