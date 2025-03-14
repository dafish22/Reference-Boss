<?PHP

namespace classes;

class Connector { 
    // DB account data
    private $servername = "localhost";
    private $username = "rfbadmin";
    private $password = "password";
    private $dbname = "referenceboss";
    private $hostname = "localhost";
    
    // Error string
    private $errorText = null;
    private $connectionRef = null;

    public function open(){
        $this->connectionRef = new \mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            
        if ($this->connectionRef->connect_error) {
            $this->errorText = $this->connectionRef->connect_error;
            return false;
        }
        return true;
    }
    public function close(){
        $this->connectionRef->close();
    }

    public function query($sql) {
        // TODO - input sanitisation here
        // remove any ; chrs 
        // remove "drop database"

        // test query, set error text and fail if it does not complete
        if(!$this->connectionRef->query($sql)) {
            $this->errorText = $this->connectionRef->error;
            return false;
        }
        return true;
    }

    public function update($sql) {
        return $this->query($sql);
    }

    public function insert($sql) {
        return $this->query($sql);
    }

    public function select($sql) {
        // TODO - input sanitisation here

        return $this->connectionRef->query($sql);
    }

    public function errorMessage() {
        return $this->errorText;
    }
}
?>