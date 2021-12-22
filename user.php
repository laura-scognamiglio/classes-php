<?php

//création d'une classe user avec ses attributs privés ou publiques
class User{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;
   

//constructeur
    public function __construct(){
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->bdd = $bdd;
    }

    public function con(){

//connexion à la database et lecture des caractères spéciaux
        $server = "localhost";
        $log = "root";
        $mdp = "root";
        $db = "classes";
        $bdd = mysqli_connect($server,$log,$mdp,$db);
        mysqli_set_charset($bdd, 'utf8');
        // echo "<pre>";
        // var_dump($bdd);
        // echo "</pre>";

        return($bdd);
  
    }
//creation d'une methode d'enregistrement de l'utilisateur
    public function register($login, $password, $email, $firstname, $lastname){
            
        // $this->login = $login;
        // $this->email = $email;
        // $this->firstname = $firstname;
        // $this->lastname = $lastname;
        // $this->bdd = $bdd;

            $register = $this->con();
            // echo "<pre>";
            // var_dump($register);
            // echo "</pre>";
           
            $register2 = mysqli_query($register,"INSERT INTO `utilisateurs` (login, password, email, firstname, lastname) VALUES ('$login', '$password', '$email', '$firstname', '$lastname')");

            
            // return($bdd);
            // return($register);

           
        
    }

    public function read(){

        $register = $this->con();

        $this->read = mysqli_query($register, "SELECT * FROM `utilisateurs`");
        $read_fetch = mysqli_fetch_all($this->read, MYSQLI_ASSOC);

        foreach($read_fetch as $read){
            echo $read["firstname"];
            echo $read["lastname"];
            echo $read["login"];
        }
    //    echo "<pre>";
    //    var_dump($read_fetch);
    //    echo "</pre>";


    }

    public function connect($login, $password){
        $this->login = $login;
        $this->password = $password;


    }
    
}


$user = new User();
$user->register("ioia","aa","aa","aa","aa");
// $user->read();
// $user2 = new User();
// $user2->register("lili","kk","bb","bb","ii");

