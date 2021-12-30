<?php
include('index.php');
//création d'une classe user avec ses attributs privés ou publiques. Les functions login et register doivent être flottantes qui doivent être ds aucunes classes . Elles feront une redirection 
//les post de form ds une session 
class User{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;
   

//constructeur regarder pourquoi il ne prends pas de paramètres ou si oui il en prends. S'il en prds il faut enlever le id->this  et le private id de la classe
    public function __construct(){
//rajouter les paramètres ds le construct en disans que login = postdelogin etc.. 
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
//rajouter les paramètres ds le register afin que $this->login etc..  
            
      

            $register = $this->con();
            // echo "<pre>";
            // var_dump($register);
            // echo "</pre>";
           
            $register2 = mysqli_query($register,"INSERT INTO `utilisateurs` (login, password, email, firstname, lastname) VALUES ('$login', '$password', '$email', '$firstname', '$lastname')");

            
    }
//connexion à la database et selectionne les utilisateurs, et les for each ds un tableaux
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
            
            if(count($checking) != 0)
            {
                if($post_login  == $checking["login"]){
                echo "user connected " . "<br>";
                //session start devrait etre au début le page et même mieuc il devrait être dans un autre fichiers qui contient ma méthode. Chaque méthode son fichier 
                session_start();
                    
                }
                
            }else
                {
                    echo "the id is wrong ";
                }
            
    
        }
        
        return($checking);

    }


    public function disconnect(){
        $session_to_deco = $this->connect();

        if(isset($_POST["logout"]))
        {
            session_destroy();
           
        }
        
    }

    public function delete(){

        $register = $this->con();

        $delete = mysqli_query($register,"DELETE FROM `utilisateurs` WHERE `login`= '$post_login'");
        $session_to_delete = $this->disconnect();

    }

    public function update($login, $password, $email, $firstname, $lastname ){

        $register = $this->con();
        $connect = $this->connect();
        session_start();
        $post_login = htmlspecialchars(trim($_POST['login']));


        $update = mysqli_query($register,"UPDATE `utilisateurs` SET `login`='$login',`password`='$password',`email`='$email',`firstname`='$firstname',`lastname`='$lastname' WHERE `login`= '$post_login' ");
    }

    public function isConnected(){

        $checking = $this->read();
        $register = $this->con();
        $connect = $this->connect();
        

        if(isset($checking[0]["login"])){
            echo $checking[0]["login"] . " " . "is connected";
        }
    
    }

    public function getAllInfos(){

        $register = $this->con();
        $query_infos = mysqli_query($register, "SELECT * FROM `utilisateurs`");
        $get_all = mysqli_fetch_assoc($query_infos);

        foreach($get_all as $user){
            echo "<pre>";
            echo $user;
            echo "</pre>";
        }

    }

    public function getLogin(){
        return $this->login;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getFirstname(){
        return $this->firstname;
    }
    public function getLastname(){
        return $this->lastname;
    }
}
    



$user = new User();
// $user->register("ioia","aa","aa","aa","aa");
// $user->read();
// $user->connect();
// $user->disconnect();
// $user->delete();
// $user->update("lolo","lolo","email.com","frstname","lstname");
// $user->isConnected();
$user->getAllInfos();


