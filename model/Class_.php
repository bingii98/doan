<?php

include_once "config/connection.php";
if (!isset($_SESSION))
    session_start();

class Class_
{
    /**
     * @desc Insert nre class
     */
    function insert($name, $image, $room, $subject, $author)
    {
        global $conn;
        $name = mysqli_real_escape_string($conn, $name);
        $image = mysqli_real_escape_string($conn, $image);
        $room = mysqli_real_escape_string($conn, $room);
        $subject = mysqli_real_escape_string($conn, $subject);
        if ($name != "" && $image != "" && $room != "" && $subject != "") {
            $sql = "insert into class(name,image,room,subject,author) values ('" . $name . "','" . $image . "','" . $room . "','" . $subject . "', " . $author . ")";
            if (mysqli_query($conn, $sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @desc Get all class
     */
    function getAll()
    {
        global $conn;
        $sql_query = "select * from class";
        $result = mysqli_query($conn, $sql_query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return ($array);
    }

    /**
     * @desc Get all class
     */
    function getByAuthor($id)
    {
        global $conn;
        $sql_query = "select * from class where author = " . $id;
        $result = mysqli_query($conn, $sql_query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return ($array);
    }

    /**
     * @desc Delete a class
     */
    function leaveStudent($idUser, $idClass)
    {
        global $conn;
        $sql_query = "delete from join_history where idUser = " . $idUser . " and idClass = " . $idClass;
        if ($conn->query($sql_query) === TRUE)
            return true;
        else
            return false;
    }

    /**
     * @desc Delete a class
     */
    function delete($id)
    {
        global $conn;
        $sql_query = "delete from class where id = " . $id;
        if ($conn->query($sql_query) === TRUE)
            return true;
        else
            return false;
    }

    /** @desc Get a class */
    function get($id)
    {
        global $conn;
        if ($id != "") {
            $sql_query = "select * from class where id = " . $id . " limit 1";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }


    /** @desc Get a class */
    function getByStudent($id)
    {
        global $conn;
        if ($id != "") {
            $sql_query = "select * from join_history where idUser = " . $id;
            $result = mysqli_query($conn, $sql_query);
            $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return ($array);
        }
    }


    /**
     * @desc edit nre class
     */
    function edit($id, $name, $room, $subject)
    {
        global $conn;
        $name = mysqli_real_escape_string($conn, $name);
        $room = mysqli_real_escape_string($conn, $room);
        $subject = mysqli_real_escape_string($conn, $subject);
        $arr_query = [];
        if ($id != "") {
            $sql = "update class set ";
            if (!empty($name)) $arr_query[] = "name = '" . $name . "'";
            if (!empty($room)) $arr_query[] = "room = '" . $room . "'";
            if (!empty($subject)) $arr_query[] = "subject = '" . $subject . "'";
            $sql .= implode(", ", $arr_query);
            $sql .= " where id = " . $id;
            if (count($arr_query) == 0) {
                return false;
            } else if (mysqli_query($conn, $sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

    /** @desc Get a class */
    function getListStudent($id)
    {
        global $conn;
        if ($id != "") {
            $sql_query = "select * from join_history where idClass = " . $id;
            $result = mysqli_query($conn, $sql_query);
            $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return ($array);
        }
    }

    /** @desc Get a student from class */
    function getStudentInClass($idStudent, $idClass)
    {
        global $conn;
        if ($idClass != "" && $idStudent != "") {
            $sql_query = "select * from join_history where idClass = " . $idClass . " and idUser = " . $idStudent . " limit 1";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }

    /**
     * @desc Insert nre class
     */
    function insertStudenttoClass($idStudent, $idClass)
    {
        global $conn;
        $idStudent = mysqli_real_escape_string($conn, $idStudent);
        $idClass = mysqli_real_escape_string($conn, $idClass);
        if ($idClass != "" && $idStudent != "") {
            $now = new DateTime();
            $sql = "insert into join_history(idUser,idClass,time) values (" . $idStudent . "," . $idClass . ",'" . $now->format('Y-m-d H:i:s') . "')";
            if (mysqli_query($conn, $sql)) {
                return true;
            } else {
                return false;
            }
        }
    }
}