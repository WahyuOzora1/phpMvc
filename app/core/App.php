<?php
//Core itu kelas utama yang nanti di extends dari controllernya

class App
{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {


        $url = $this->parse_url(); //memanggil method

        //Controller

        // (..) karena keluar dari index.php yang ada di public karena semua akses dari sana
        if (file_exists('../app/controllers/' . $url[0] . '.php') ) { //Ngecek ada gak cntroller di folder app/controllers index 1.php
            $this->controller = $url[0]; //panggil si controller yang dimasukkan
            unset($url[0]);
            //hilangkan namanya supaya bisa ambil paramnya
            // var_dump($url);

        }  //Jika tidak ada maka yang ditampilkan adalah defaultnya yaitu controller home
        require_once '../app/controllers/' . $this->controller . '.php'; //memanggil controller yang diinput
        $this->controller = new $this->controller;



        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //params
        if (!empty($url)) {
            $this->params = array_values($url); //ngasih nilai ke param nya
        }

        //Jalankan controller, method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parse_url()
    {


        // if (isset($_GET['url'])) {
        //     $url = $_GET['url'];
        //     return $url;
        // }

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //fungsi menghapus / di url paling belakang
            // 27. Jalankan browser kembali maka tanda “/” akan hilang

            //28. Kemudian untuk menghalangi agar user tidak bisa memasukkan karakter ke url, caranya :
            $url = filter_var($url, FILTER_SANITIZE_URL); //menghalangi agar user tidak bisa memasukkan karakter ke url
            $url = explode('/', $url); //pecah url jadi / string jadi elemen array
            return $url;
        }
    }
}
