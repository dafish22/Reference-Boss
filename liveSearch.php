<?php

include("Connector.php");
if(isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM searchPerson WHERE id LIKE '{$input}%' OR refnum LIKE '{$input}%' OR authors LIKE '{$input}%' OR title LIKE '{$input}%' OR publicationDate LIKE '{$input}%' OR publisher LIKE '{$input}%' OR publicationPLACE LIKE '{$input}%' OR isbn LIKE '{$input}%'";

    $result = mysqli_query($connection,$query);

    if(mysqli_num_rows($result) > 0){?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>authors</th>
                    <th>title</th>
                    <th>publicationDate</th>
                    <th>publisher</th>
                    <th>publicationPlace</th>
                    <th>isbn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $authors = $row['authors'];
                    $title = $row['title'];
                    $publicationDate = $row['publicationDate'];
                    $publisher = $row['publisher'];
                    $publicationPlace = $row['publicationPlace'];
                    $isbn = $row['isbn']; 
                }?>

                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $authors;?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $publicationDate;?></td>
                    <td><?php echo $publisher;?></td>
                    <td><?php echo $publicationPlace;?></td>
                    <td><?php echo $isbn;?></td>
                </tr>

                <?php
                ?>
            </tbody>
        </table>

        <?php 

    }else{
        echo "<h6 class='text-danger text-center mt-3'>NO DATA</6>";
    }
}
?>