<?php

    session_start();

    class Client{

        private $conn;

        public function __construct(PDO $pdo){

            $this->conn = $pdo;
            
        }

        public function createUser($user, $email, $pass){

            $aux = TRUE;

            if($this->readUser($user)){
                $aux = FALSE;
                $errUser = "El nombre de usuario no está disponible";
            }

            if($this->readUser($email)){
                $aux = FALSE;
                $errEmail = "El correo electrónico ya está en uso";
            }

            if($aux){
                try{
                    $sql = "INSERT INTO user (username, email, pass) VALUES (:username,:email,:pass)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([':username'=>$user,
                                    ':email'=>$email,
                                    ':pass'=>$pass]);
                    return TRUE;
                }catch(PDOException $e){
                    $err = $e->getMessage();
                    return $err;
                }
            };

            if(!$aux){
                $err = [
                    "user" => $errUser,
                    "email" => $errEmail
                ];
                return $err;
            }

        }

        public function readUser($var){

            if(filter_var($var, FILTER_VALIDATE_EMAIL)){
                try{
                    $sql = "SELECT * FROM user WHERE email =:email";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([':email'=>$var]);
                    $data = $stmt->fetchObject();
                    return $data;
                }catch(PDOException $e){
                    $err = $e->getMessage();
                    return $err;
                }
            }else{
                try{
                    $sql = "SELECT * FROM user WHERE username =:username";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([':username'=>$var]);
                    $data = $stmt->fetchObject();
                    return $data;
                }catch(PDOException $e){
                    $err = $e->getMessage();
                    return $err;
                }
            }

        }

        // LOG IN

        public function logInUser($var, $pass){

            $data = $this->readUser($var);

            if($data){
                if($data->pass === $pass){
                    $_SESSION['username'] = $data->username;
                }else{
                    $err = "Contraseña no válida";
                    return $err;
                }
            }else{
                $err = "Usuario no encontrado";
                return $err;
            }

        }
        
    } 

?>