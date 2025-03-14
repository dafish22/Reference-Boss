<?php
spl_autoload_register(function($className) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/' . $className . '.php';
});

use classes\Connector;

// db connector
$connector = new Connector();


if(isset($_POST["action"])){
    // check for save request
    if($_POST["action"] == "addNew"){
        //$data = array(
        //    'refnum' => $_POST["refnum"],
        //    'authors' => $_POST["author"],
        //    'title' => $_POST["title"],
        //    'publisher' => $_POST["publisher"],
        //    'publication_date' => $_POST["publication_date"],
        //    'place_of_publication' => $_POST["place_of_publication"],
        //    'isbn' => $_POST["isbn"]
        //);
        //$client = curl_init('http://referenceboss.boss/apiHandler.php?action=addNew');
        //curl_setopt($client, CURLOPT_POST, true);
        //curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        //curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        //$response = curl_exec($client);
        //curl_close($client);


        $sql = 'INSERT into tblbooks (refnum,authors,title,publicationDate,publisher,publicationPlace,isbn) VALUES (' . $_POST["refnum"] . ',"' . $_POST["author"] . '","' . $_POST["title"] . '","' .  $_POST["publisher"] . '","' . $_POST["publication_date"] . '","' . $_POST["place_of_publication"] . '","' . $_POST["isbn"] . '")';


        echo($sql);


        // fuff this
        $connector->open();

        // run query - test response
        if ($connector->query($sql)) {
            // success


        }
        else {
            // error


        }

        $connector->close();


    }
}
?>