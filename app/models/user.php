<?php
    require_once("connectionDB.php");
    require_once("../components/warnings.php");

    class User {
        private string $name;
        private string $surname;
        private string $email;
        private string $gender;
        private string $usage;
        private string $password;

        public function __construct(string $name, string $surname, string $email, string $gender, string $usage, string $password) {
            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
            $this->gender = $gender;
            $this->usage = $usage;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }

        // --- GETTER (Per recuperare i dati) ---
        public function getName(): string {
            return $this->name;
        }
        public function getSurname(): string {
            return $this->surname;
        }
        public function getFullName(): string {
            return $this->name . " " . $this->surname;
        }
        public function getEmail(): string {
            return $this->email;
        }



        //ACCOUNT and LOGS
        public function signUp(){
            global $conn, $signedUp, $alreadySignedUp;
            try {
                $sql = "INSERT INTO users (`name`, `surname`, `email`, `gender`, `usage`, `password`) 
                            VALUES (:name, :surname, :email, :gender, :usage, :password)";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        'name'     => $this->name,
                        'surname'  => $this->surname,
                        'email'    => $this->email,
                        'gender'   => $this->gender,
                        'usage'    => $this->usage,
                        'password' => $this->password // MAI salvare in chiaro!
                    ]);
                echo $signedUp;
            } catch(PDOException $e) {
                echo "$alreadySignedUp";
            }
        }
        public static function logIn($email, $password) {
            global $conn; // L'oggetto PDO
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([trim($email)]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION["userID"]=$user["id"];
                return true;
            }
            return false;
        }
        public static function logout() {
            session_start(); // Assicura che la sessione sia attiva
            $_SESSION = array(); // Svuota le variabili
            session_destroy(); // Distrugge la sessione
            header("Location: ../index.php"); // Torna alla home
            $_SESSION["logged"]=false;
            exit;
        }

    }