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
            $this->setPassword($password); //hashing
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
                        'password' => password_hash($this->password, PASSWORD_BCRYPT) // MAI salvare in chiaro!
                    ]);
                echo $signedUp;
            } catch(PDOException $e) {
                echo "$alreadySignedUp";
            }
        }



        //PASSWORD section
        public function setPassword(string $password): void {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
        public function verifyPassword(string $password): bool {
            return password_verify($password, $this->password);
        }

    }