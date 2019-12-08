<?php

    session_start();

    class Client{

        private $conn;

        public function __construct(PDO $pdo){

            $this->conn = $pdo;
            
        }

        /* USER TABLE */

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
                    header("Location: http://newa.test/public/index.php");
                }catch(PDOException $e){
                    $err = $e->getMessage();
                    return $err;
                }
            };

            if(!$aux){
                $err = [
                    "user" => @$errUser,
                    "email" => @$errEmail
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

        public function updateUser($id, $name, $email, $pass){

            try{
                $sql = "UPDATE user SET username=:name, email=:email, pass=:pass WHERE userID=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['id'=>$id,
                                'name'=>$name,
                                'email'=>$email,
                                'pass'=>$pass]);
                $data = $this->readUser($name);
                $_SESSION['user'] = $data;
                return "¡Los cambios han sido efectuados correctamente!";
            }catch(PDOException $e){
                $err = $e->getMessage();
                echo $err;
            }

        }

        public function deleteUser($id){

            try{
                $sql = "DELETE FROM user WHERE userID =:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['id'=>$id]);
                session_destroy();
                header("Location: http://newa.test/public/index.php");
            }catch(PDOException $e){
                $err = $e->getMessage();
            }

        }

        public function logInUser($var, $pass){

            $data = $this->readUser($var);

            if($data){
                if($data->pass === $pass){
                    $_SESSION['user'] = $data;
                    header("Location: /../../../public/desktop.php");
                }else{
                    $err = "Contraseña no válida";
                    return $err;
                }
            }else{
                $err = "Usuario no encontrado";
                return $err;
            }

        }

        /* RSS TABLE */

        public function createRSS($name, $url, $country, $category, $user){

            try{
                $RSS_PHP = new rss_php;
                $RSS_PHP->load($url);
                $rss = $RSS_PHP->getItems();

                if($rss){
                    $sql = "INSERT INTO rss (name, country, url, category, user_ID) VALUES (:name, :country, :url, :category, :user)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([':name'=>$name,
                                    ':country'=>$country,
                                    ':url'=>$url,
                                    'category'=>$category,
                                    ':user'=>$user]);
                    header("Location: http://newa.test/public/desktop.php?nav=2");
                }else{
                    $err = "URL no válida. Comprueba los datos introducidos";
                    return $err;
                }
            }catch(PDOException $e){
                $err = $e->getMessage();
            }

        }

        public function readRSS($user){

            try{
                $sql = "SELECT * FROM rss WHERE user_ID =:user";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['user'=>$user]);
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                $err = $e->getMessage();
                return FALSE;
            }

        }

        public function updateRSS($id, $name, $url, $country, $category){

            try{
                $sql = "UPDATE rss SET name=:name, url=:url, country=:country, category=:category WHERE rssID=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['id'=>$id,
                                'name'=>$name,
                                'url'=>$url,
                                'country'=>$country,
                                'category'=>$category]);
            }catch(PDOException $e){
                $err = $e->getMessage();
            }

        }

        public function deleteRSS($id){

            try{
                $sql = "DELETE FROM rss WHERE rssID =:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['id'=>$id]);
            }catch(PDOException $e){
                $err = $e->getMessage();
            }

        }

        public function fetchRSS($id){

            try{
                $sql = "SELECT * FROM rss WHERE rssID =:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $data = $stmt->fetchObject();
                return $data;
            }catch(PDOException $e){
                $err = $e->getMessage();
            }

        }
        
        /* CATEGORIES TABLE */

        public function createCat($name){

            $var = $this->readCat($name);
            if(!$var){
                try{
                    $sql = "INSERT INTO categories (name) VALUES (:name)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([':name'=>$name]);
                }catch(PDOException $e){
                    $err = $e->getMessage();
                }
            }

        }

        public function readCat($name){

            try{
                $sql = "SELECT * FROM categories WHERE name =:name";
                $stmt =  $this->conn->prepare($sql);
                $stmt->execute([':name'=>$name]);
                $data = $stmt->fetchObject();
                return $data;
            }catch(PDOException $e){
                $err = $e->getMessage();
            }

        }

    } 

?>