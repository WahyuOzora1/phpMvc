<?php 



class Mahasiswa_model{
    // private $mhs = 
    // [
    //     [
    //         "nama"=>"Wahyu Restu Pamuji",
    //         "nrp"=>"201951257",
    //         "email"=>"wahyu@gmail.com",
    //         "jurusan"=>"Teknik Informatika",
    //     ],
    //     [
    //         "nama"=>"Tisa Ayu Novianti",
    //         "nrp"=>"201951258",
    //         "email"=>"tisa.sasa@gmail.com",
    //         "jurusan"=>"Teknik Telekomunikasi",
    //     ],
    //     [
    //         "nama"=>"Nida Amira",
    //         "nrp"=>"201951259",
    //         "email"=>"amiranida@gmail.com",
    //         "jurusan"=>"Ilmu Matematika",
    //     ],
    // ];

   private $table = 'tb_mahasiswa';
   private $db;

   public function __construct()
   {
       //Langsung bisa memakai semua method di dalamnya
       $this->db = new Database;
   }

    public function getAllMahasiswa(){
        // $this->stmt = $this->dbh->prepare('SELECT * FROM tb_mahasiswa');
        // $this->stmt->execute();
        // //Kembalikan dan tangkap semua dalam bentuk array assosiatif
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->db->query("SELECT * FROM ". $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }


}
