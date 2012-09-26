<?php
class Database extends PDO
{

    private $dsn = 'mysql:host=localhost;dbname=mvc';
    private $dbusername = 'root';
    private $dbpasswd = '';

    function __construct()
    {
        parent::__construct($this->dsn, $this->dbusername, $this->dbpasswd);
    }

    public function setDbConnecetionParams($dsn, $dbusername, $dbpasswd)
    {
        $this->dsn = $dsn;
        $this->dbusername = $dbusername;
        $this->dbpasswd = $dbpasswd;
    }

}
