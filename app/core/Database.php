<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private  $db_name = DB_NAME;


    //Menggunakan pdo, php drifter object
    private $dbh; //menampung koneksi ke database pdonya
    private $stmt; //nyimpan query


    public function __construct()
    {
        //dsn = data source name
        //dbh = database handler
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;


        //option untuk optimasi
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function query($query)
    {

        //disiapkan dulu querynya
        $this->stmt = $this->dbh->prepare($query);
    }

    //bind untuk mengecek terlebih dadhulu datanya sebelum di querykan jadi terhindar dari sql injection 
    public function bind($param, $value, $type = null)
    {

        //Jika type null lakukan sesuatu,  jika switch true maka jalan
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value);
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value);
                    $type = PDO::PARAM_NULL;
                    break;
                    default : $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    
    
    
    
    public function execute(){
        $this->stmt->execute();
    }

    // tampil Data banyak
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //tampil data satu
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }



}
