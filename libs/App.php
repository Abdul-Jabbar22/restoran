
<?php

class App
{
    public $host = HOST;
    public $dbname = DBNAME;
    public $user = USER;
    public $pass = PASS;
    public $link;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->link = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);


        // if ($this->link) {
        //     echo "DB connection is working";
        // }
    }

    // Select all records
    public function selectAll($query)
    {
        $rows = $this->link->query($query);
        $rows->execute();
        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

        return $allRows ?: false;
    }

    // Select one record
    // App.php
    public function selectOne($query)
    {
        $statement = $this->link->prepare($query);
        $statement->execute();
        $singleRow = $statement->fetch(PDO::FETCH_OBJ);

        return $singleRow ?: false;
    }
    // validate cart

    public function validateCart($q)
    {

        $row = $this->link->query($q);
        $row->execute();
        $count = $row->rowCount();
        return $count;
    }

    // Insert query
    public function insert($query, $arr, $path)
    {
        if ($this->validate($arr) == "empty") {
            echo "<script>alert('One or more inputs are empty')</script>";
        } else {
            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);
            // Redirect to the specified path
            echo "<script>window.location.href = '" . $path . "';</script>";
        }
    }


    // Update query
    public function update($query, $arr, $path)
    {
        if ($this->validate($arr) == "empty") {
            echo "<script>alert('One or more inputs are empty')</script>";
        } else {
            $update_record = $this->link->prepare($query);
            $update_record->execute($arr);

            header("Location: $path");
        }
    }

    // Delete query
    public function delete($query, $path)
    {
        $delete_record = $this->link->prepare($query);
        $delete_record->execute();

        echo "<script>window.location.href = '" . $path . "';</script>";
    }



    public function validate($arr)
    {
        if (in_array("", $arr)) {
            return "empty";
        }
    }
    // register query
    public function register($query, $arr, $path)
    {
        if ($this->validate($arr) == "empty") {
            echo "<script>alert('One or more inputs are empty')</script>";
        } else {
            $register_user = $this->link->prepare($query);
            $register_user->execute($arr);

            header("location: " . $path . "");
        }
    }

    // login query
    public function login($query, $arr, $path)
    {
        //email vlidation

        $login_user = $this->link->query($query);
        $login_user->execute();


        $fetch = $login_user->fetch(PDO::FETCH_ASSOC);


        if ($login_user->rowCount() > 0) {
            //password
            if ($_POST['password'] == $fetch['password']) {

                // start session vars

                $_SESSION['email'] = $fetch['email'];
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['user_id'] = $fetch['id'];

                header("location: " . $path . "");
            }
        }
    }

    // starting session

    public function startSession()
    {
        session_start();
    }

    // Validate Session
    public function validateSession()
    {
        if (isset($_SESSION['user_id'])) {

            echo "<script>window.location.href' = " . APPURL . "' </script>";
        }
    }
    public function validateSessionAdmin()
    {
        if (isset($_SESSION['user_id'])) {

            echo "<script>window.location.href' = " . ADMINURL . "/index.php' </script>";
        }
    }
    public function validateSessionAdminInside()
    {
        if (!isset($_SESSION['user_id'])) {

            echo "<script>window.location.href' = " . ADMINURL . "/login-admins.php' </script>";
        }
    }
}


?>
