<?php

include_once "config/connection.php";
if(!isset($_SESSION))
    session_start();

class User
{
   private $per;

    function checkLogin($username, $password)
    {
        global $conn;
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        if ($username != "" && $password != "") {

            $sql_query = "select * from users where username='" . $username . "' and password='" . md5($password) . "'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);

            if ($row) {
                $_SESSION['isLogin']['id'] = $row['id'];
                $_SESSION['isLogin']['username'] = $username;
                $_SESSION['isLogin']['fullname'] = $row['fullname'];
                $_SESSION['isLogin']['role'] = $row['role'];
                return true;
            } else {
                return false;
            }
        }
    }

    function signUp($username, $password, $name, $email, $tel, $dateofbirth)
    {
        global $conn;
        $username = mysqli_real_escape_string($conn, $username);
        $u = $this->getUserByUserName($username);
        if (!$u) {
            $password = mysqli_real_escape_string($conn, $password);
            $password = mysqli_real_escape_string($conn, $password);
            $email = mysqli_real_escape_string($conn, $email);
            $tel = mysqli_real_escape_string($conn, $tel);
            $dateofbirth = mysqli_real_escape_string($conn, $dateofbirth);
            if ($username != "" && $password != "" && $name != "" && $email != "") {
                $sql = "insert into users(username,password,fullname,email,role,tel,dateofbirth) values ('" . $username . "','" . md5($password) . "','" . $name . "','" . $email . "','user','" . $tel . "','" . $dateofbirth . "')";
                if (mysqli_query($conn, $sql)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return 2;
        }
    }

    function changeRole($id, $role)
    {
        global $conn;
        if($_SESSION['isLogin']['role'] != 'admin')
            return false;
        $role = mysqli_real_escape_string($conn, $role);
        $id = mysqli_real_escape_string($conn, $id);
        if ($id != "" && $role != "") {
            $sql = "update users set role = '" . $role . "' where id = " . $id;
            if (mysqli_query($conn, $sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function getUserById($id)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        if ($id != "") {
            $sql_query = "select * from users where id=" . $id . " limit 1";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }

    function getUserByUserName($username)
    {
        global $conn;
        $username = mysqli_real_escape_string($conn, $username);
        if ($username != "") {
            $sql_query = "select * from users where username='" . $username . "'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }

    /**
     * @desc Get all user
     */
    function getAll()
    {
        global $conn;
        $sql_query = "select * from users";
        $result = mysqli_query($conn, $sql_query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return ($array);
    }

    /**
     * @desc Delete a user
     */
    function delete($id)
    {
        global $conn;
        $sql_query = "delete from users where id = " . $id;
        if ($conn->query($sql_query) === TRUE)
            return true;
        else
            return false;
    }
}