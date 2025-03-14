<?php
if(isset($_POST["action"])){
    if($_POST["action"] == "addNew"){
        $data = array(
            'author' => $_POST["author"],
            'title' => $_POST["title"],
            'publisher' => $_POST["publisher"],
            'publication_date' => $_POST["publication_date"],
            'place_of_publication' => $_POST["place_of_publication"]
        );
        $client = curl_init('https://www.googleapis.com/books/v1/volumes?q=');
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
    }
}
?>