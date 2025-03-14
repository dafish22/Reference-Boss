<?php
class API {
    private $connect = '';

    function constructor() {
        $this->dbConnection();
    }

    function dbConnection(){
        $this->connect=new PDO("mysql:host=localhost;dbname=dbreferenceboss", "referenceboss", "referenceboss");
    }

    function outputData(){
        $select = $this->connect->prepare("SELECT * FROM author ORDER BY id");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }

    function addNewEntry(){
        if(isset($_POST["author"])){
            $data = array(
                ':author' => $_POST["author"],
                ':title' => $_POST["title"],
                ':publisher' => $_POST["publisher"],
                ':publication_date' => $_POST["publication_date"],
                ':place_of_publication' => $_POST["place_of_publication"]
            );
            $insert = $this->connect->prepare("INSERT INTO author (author, title, publisher, publication_date, place_of_publication) VALUES (:author, :title, :publisher, :publication_date, :place_of_publication)");
            $insert->execute($data);
        }
    }
}
?>