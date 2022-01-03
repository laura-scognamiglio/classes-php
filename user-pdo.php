<?php
session_start();
include("index.php");

class Userpdo{
    // private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
   

    public function __construct(){
        // @$this->id = $id;
        @$this->login = $login;
        @$this->email = $email;
        @$this->firstname = $firstname;
        @$this->lastname = $lastname;
       
    }

    public function con(){

//DEFINE makes a constant, and constants are global and can be used anywhere. 
//They also cannot be redefined, which variables can be.
//I normally use DEFINE for Configs because no one can mess with it.
        
       

        
        $dns = 'mysql:host=localhost;dbname=classes';

        try{
            $pdo = new PDO($dns, 'root', 'root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
            // echo "connexion opérationnelle !";

        } catch(PDOException $e){
            echo "error : " . $e->getMessage();
        }
        
       
        return($pdo);

    }


    public function register($con, $login, $password, $email, $firstname, $lastname){
        $con = $this->con();
        // $get = $this->form();

        @$login = $_POST['login'];
        @$password = $_POST['password'];
        @$email = $_POST['email'];
        @$firstname = $_POST['firstname'];
        @$lastname = $_POST['lastname'];

        if(isset($_POST['submit'])){
        $ins = ("INSERT INTO `utilisateurs` (login, password, email, firstname, lastname) VALUES (:login, :password, :email, :firstname, :lastname)");

        $insert = $con->prepare($ins);

        $insert->execute(array(
            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":login" => $login,
            ":password" => $password,
            ":email" => $email
        ));
        
        }

        $read = ("SELECT * FROM `utilisateurs` WHERE `login`= '$login'");

        $read_user = $con->prepare($read);

        $read_user->execute();

        $users = $read_user->fetchAll();

        foreach ($users as $user){
            echo "<pre>";
            echo $user["login"] . " " . $user["password"] ;
            echo "</pre>";
        }
        return $users;
        
    }

    public function connect($con,$login, $password){
        $con = $this->con();
        
        $checking = $this->register(@$con, @$login, @$password, @$email, @$firstname, @$lastname);
        @$login = $_POST['login'];
        @$password = $_POST['password'];
       

        if(isset($_POST["valider"]))
        {  
            
            if(count($checking) != 0)
            {
                if($login  == $checking[0]["login"]){
                    echo "user connected " . "<br>";
                }
                
            }
            else{
                    echo "the id is wrong ";
                }
            
    
        }

    }

    public function disconnect(){
        $session_to_deco = $this->connect(@$con,@$login, @$password);

        if(isset($_POST["logout"]))
        {
            session_destroy();
           
        }
        
    }

    public function delete(){
        $con = $this->con();
        // $count_to_delete = $this->disconnect();
        $session_to_deco = $this->connect(@$con,@$login, @$password);

        @$login_session = $_SESSION['login'];
            echo "<pre>";
            var_dump($_SESSION);
            echo "</pre>";

        if(isset($_POST['delete'])){
            $del = ("DELETE FROM `utilisateurs` WHERE `login`= '$login_session'");

            $del_user = $con->prepare($del);
            $del_user->execute();
            echo "<pre>";
            echo "user has been deleted";
            echo "</pre>";
        }
        
        


    }


}

$user = new Userpdo();

$user->con();
// $user->register($con,$login, $password, $email, $firstname, $lastname);
$user->connect(@$con,@$login,@$password);
// $user->disconnect();
$user->delete();




