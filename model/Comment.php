<?php
include_once "config/connection.php";
if (!isset($_SESSION))
    session_start();


class Comment
{

    /**
     * @desc Insert nre class
     */
    function insert($id, $parent, $content)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        $parent = mysqli_real_escape_string($conn, $parent);
        $content = mysqli_real_escape_string($conn, $content);
        if ($id != "" && $parent != "" && $content) {
            $now = new DateTime();
            $sql = "insert into comment(idUser,idClass,parent,content,time) values (" . $_SESSION['isLogin']['id'] . "," . $id . "," . $parent . ",'" . $content . "', '" . $now->format('Y-m-d H:i:s') . "')";
            echo $sql;
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
    function getByClass($id)
    {
        global $conn;
        $sql_query = "select * from comment where idClass = " . $id . " and parent = 0";
        $result = mysqli_query($conn, $sql_query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return ($array);
    }

    /**
     * @desc Get all class
     */
    function getByClassParent($id, $idParent)
    {
        global $conn;
        $sql_query = "select * from comment where idClass = " . $id . " and parent = " . $idParent;
        $result = mysqli_query($conn, $sql_query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return ($array);
    }
}