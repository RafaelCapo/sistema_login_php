<?php

    use Rafael\Database\Connection;

    class User
    {
        private $id;
        private $name;
        private $email;
        private $password;

        public function validateLogin()
        {
            $conn = Connection::getConn();
            //selecionar o usuario que tenha o mesmo email do informado
            $sql = 'SELECT * FROM users WHERE email = :email';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $result = $stmt->fetch();

                if ($result['pass'] === $this->password) {
                    $_SESSION['usr'] = array(
                        'id_user' => $result['id'], 
                        'name_user' => $result['name']
                    );

                    return true;
                }
            }

            throw new \Exception('Login Inválido');
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getPassword()
        {
            return $this->password;
        }
    }
