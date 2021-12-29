<?php
include('index.php');
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
        $post_login = htmlspecialchars(trim($_POST['login']));
        $this->read = mysqli_query($register, "SELECT * FROM `utilisateurs` WHERE `login`= '$post_login'");
        $read_fetch = mysqli_fetch_all($this->read, MYSQLI_ASSOC);

        foreach($read_fetch as $read){
            echo "<pre>";
            echo $read["login"] . " " . $read["password"] ;
            echo "</pre>";
        }
   

    return($read_fetch);

    }

    public function connect(){
       
       
        $checking = $this->read();

        // $arr_login = array_column($checking, "login");
        // $arr_pwd = array_column($checking, "password" );
        echo "<pre>";
        var_dump($checking);
        echo "</pre>";
       
        

        if(isset($_POST["submit"]))
        {
        //   
            
            if(count($checking) != 0)
            {
                if($post_login  == $checking["login"]){
                echo "user connected";
                session_start();
                    
                }
                
            }else
                {
                    echo "the id is wrong ";
                }
            
    
        }
        

    }


    public function disconnect(){
        $session_to_deco = $this->connect();

        if(isset($_POST["logout"]))
        {
            session_destroy();
           
        }

    }

    public function delete(){

        $delete = mysqli_query($register,);
        $session_to_delete = $this->disconnect();

    }
}
    



$user = new User();
// $user->register("ioia","aa","aa","aa","aa");
// $user->read();
$user->connect();


