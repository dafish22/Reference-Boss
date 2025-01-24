<?PHP
    // DB account data
    $servername = "localhost";
    $username = "rfbadmin";
    $password = "password";
    $dbname = "referenceboss";

    // Error string
    $errorText = null;

    //DB connection object to MySQL
    $connection = new mysqli($servername,$username,$password.$dbname);

    // DB connection test
    if ($connection->connect_error) {
        $errorText = $connection->connect_error;
    }

    // Check form submission
    if(isset($_POST['description']) === true) {
        // SQL statment for 'create new task'
        $sql = "INSERT INTO tasks (description, who) VALUES ('" . $_POST['description'] . "', '" . $_POST['who'] . "'";

        // Run SQL Form Submit
        if (!$connection->query($sql)) {
            $errorText = "Failed to Create Record.";
        }
    }

    // Toggle completed
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $completed = ($_GET['completed'])? 0 : 1;

        $sql = "UPDATE tasks SET completed=" . $completed . " WHERE id=" . $id;

        // Run SQL Complete
        if (!$connection->query($sql)) {
            $errorText = "Failed to Update Record ID:" . $id;
        }
    }

    // Get all recorded tasks (Newest -> Oldest)
    $alltasks = $connection->query("SELECT * from tasks ORDER BY created DESC");

    // Destroy connection object
    $connection->close();
?> 


<!DOCTYPE>
<html lang="en">
    <head>
        <title><a href="Index.html">Home</a></title>
    </head>

    <body>
        <h1>Welcome!</h1>

        <?PHP if ($errorText != null) { ?> 
            <div><?= $errorText; ?></div>
        <?PHP } ?>

        <h3>Test</h3>
        <form action="index.php" method="post">
            <input type="text" name="description" id="description" required placeholder="Task description"/>
            <input type="text" name="who" required placeholder="Who is the task assigned to"/>

            <input type="submit" value="Add Task"/>
        </form>
    </body>

    <footer>
        <p>&copy;2025</p>
    </footer>
</html>
