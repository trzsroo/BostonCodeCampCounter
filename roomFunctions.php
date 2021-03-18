<?php
    include('dbconnect.php');

    if(array_key_exists('btnAdd', $_POST)) { 
        addNewRoom(); 
    } 
    // if(array_key_exists('btnDelete', $_POST)) {
    //     deleteRoom();
    // }

    // $add = true;
    // $name = "";
    // $capacity = "";

    // function isAdd() {
    //     if ($GLOBALS['add'] == true) {
    //         echo true;
    //     } else { echo false;}
    // }

    // function nameAndCapReset() {
    //     $GLOBALS['name'] = "";
    //     $GLOBALS['capacity'] = "";
    // }

    function addNewRoom() {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $db_table = "bostoncodedb.room";

        $sql = "INSERT INTO ".$db_table." (room_name, capacity) VALUES ('".$_POST['roomName']."','".$_POST['roomCapacity']."');";
        
        mysqli_query($link, $sql);

        mysqli_close($link);
    }

    function getRoomNamesDd() {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $db_table = "room";
                                
        $sql = "SELECT room_name FROM ".$db_table.";";
                                            
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result) ) {
            echo "<option value='".$row['room_name']."'>".$row['room_name']."</option>";
        }

        mysqli_close($link);             
    }

    // function setRoomName($rname) {
    //     if ($_REQUEST['roomNamedd'] != "0" || $_REQUEST['roomNamedd'] != "-1") {setRoomName($_REQUEST['roomNamedd']);}
    //     $GLOBALS['name'] = $rname;
    // }

    // function getRoomName() {
    //     echo $GLOBALS['name'];
    // }

    // function getCapacity() {
    //     $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    //     $db_table = "room";

    //     $GLOBALS['name'] = $_POST['roomNamedd'];

    //     $sql = "SELECT capacity FROM ".$db_table." WHERE room_name='".$GLOBALS['name']."';";
    //     $result = mysqli_query($link, $sql);
    //     $row = mysqli_fetch_array($result);

    //     if ($row == null) {
    //         $GLOBALS['capacity'] = "";
    //     } else {
    //         $GLOBALS['capacity'] = $row['capacity'];
    //     }

    //     echo $GLOBALS['capacity'];

    //     mysqli_close($link);
    // }

    // function deleteRoom() {
    //     $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    //     $db_table = "room";
                                
    //     $sql = "DELETE FROM ".$db_table."WHERE room_name='".$_POST['roomName']."';";
                                            
    //     mysqli_query($link, $sql);

    //     mysqli_close($link);   
    // } 
?>