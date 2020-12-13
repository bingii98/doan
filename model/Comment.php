<?php
include_once "config/connection.php";
if (!isset($_SESSION))
    session_start();


class Comment
{

    /**
     * @desc Insert nre class
     */
    function insert($id, $parent, $content, $image, $document)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        $parent = mysqli_real_escape_string($conn, $parent);
        $content = mysqli_real_escape_string($conn, $content);
        if ($id != "" && $parent != "" && $content) {
            $now = new DateTime();
            $sql = "insert into comment(idUser,idClass,parent,content,time, image, document) values (" . $_SESSION['isLogin']['id'] . "," . $id . "," . $parent . ",'" . $content . "', '" . $now->format('Y-m-d H:i:s') . "', '" . $image . "', '" . $document . "')";
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
        $sql_query = "select * from comment where idClass = " . $id . " and parent = 0 ORDER BY id DESC";
        $result = mysqli_query($conn, $sql_query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return ($array);
    }

    /**
     * @desc Get all class
     */
    function getByClassParent($idParent)
    {
        global $conn;
        $sql_query = "select * from comment where parent = " . $idParent . "  ORDER BY id DESC";
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
        $sql_query = "delete from comment where id = " . $id;
        if ($conn->query($sql_query) === TRUE)
            return true;
        else
            return false;
    }


    /**
     * @desc edit
     */
    function edit($id, $content)
    {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id);
        $content = mysqli_real_escape_string($conn, $content);
        if ($id != "" && $content != "") {
            $sql = "update comment set content = '" . $content . "' where  id = " . $id;
            if (mysqli_query($conn, $sql)) {
                return true;
            } else {
                return false;
            }
        }
    }
}