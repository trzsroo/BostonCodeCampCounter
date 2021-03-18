<html>
    <?php 
        include('roomFunctions.php');
    ?>
    <head>
        <meta charset="utf-8">
        <title>Boston Code Camp Counter | Room</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="">
    </head>

    <nav id="navbar">
        <ul style="width:100%">
            <li style="float: left;" id="programName">Boston Code Camp</li>
            <li><a href="">Home</a></li>
            <li><a href="">Add Counts</a></li>
            <li>
                <div class="dropdown">
                    <button class="dropdownbtn">Add/Edit Information</button>
                    <div class="dropdown-content">
                        <a href="room-screen.html">&nbsp;&nbsp;Room</a>
                        <a href="speaker-screen.html">&nbsp;&nbsp;Speaker</a>
                        <a href="timeslot-screen.html">&nbsp;&nbsp;Time Slot</a>
                        <a href="session-screen.html">&nbsp;&nbsp;Session</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <body>
        <br /><br /><br /><br /><br /><br />
        <form id="roomInformation" method="POST">
            <table class="center">
                <tr>
                    <th class="tabHeader" id="selected" ><a href="room-screen.html">Room</a></th>
                    <th class="tabHeader"><a href="speaker-screen.html">Speaker</a></th>
                    <th class="tabHeader"><a href="timeslot-screen.html">Time Slot</a></th>
                    <th class="tabHeader"><a href="session-screen.html">Session</a></th>
                </tr>
                <tr>
                    <td colspan="4" style="width: 100%;">
                        <table id="speakerInfoBody">
                            <tr>
                                <td colspan="4" style="text-align: center;">
                                    <?php 
                                        if (isAdd()) {echo "<b>Enter</b>";}
                                        else {echo "<b>Edit</b>";}
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: center;"><b>Room Information</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Room Name: </td>
                                <td colspan="2" >
                                    <select name="roomNamedd" id="ddRoomName" onchange="addOrEditFunc();" style='<?php if (isAdd() || $name != "") {echo "display: none;";} ?>' >
                                        <option value="0">&lt;Add New Room&gt;</option>
                                        <?php getRoomNamesDd(); ?>
                                        <option value="-1"></option>
                                    </select>
                                    <input type="text" id="boxRoomName" name="roomNametxtBox" value="<?php getRoomName(); ?>" style='<?php if (isAdd()) {echo "display: none;";} ?>'/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">Room Capacity: </td>
                                <td>
                                    <input type="text" id="boxRoomCapacity" name="roomCapacity" value="<?php getCapacity(); ?>" />
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr id="addNewRoom" style='<?php if (isAdd() || $name == "") { echo "display: none;";}?>'>
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnAdd" name="addRoom" value="Add" onclick="<?php addNewRoom(); ?>" />
                                    &nbsp;
                                    <input type="button" id="btnClear" name="clearRoom" value="Clear" onclick="clearBoxes(true);" />
                                    &nbsp;
                                    <input type="button" id="btnExit" name="exitRoom" value="Exit" />
                                </td>
                            </tr>
                            <tr id="editRoom" style='<?php if (isAdd() == false) { echo "display: none;";}?>'>
                                <td colspan="4" style="text-align: center;">
                                    <input type="submit" id="btnSave" name="saveRoom" value="Save" />
                                    &nbsp;
                                    <input type="button" id="btnClear" name="clearRoom" value="Clear" onclick="clearBoxes(true);"/>
                                    &nbsp;
                                    <input type="button" id="btnDelete" name="deleteRoom" value="Delete" onclick="<?php deleteRoom(); ?>" />
                                    &nbsp;
                                    <input type="button" id="btnExit" name="exitRoom" value="Exit" />
                                </td>
                            </tr>
                            <tr><td><br /> </td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
    <script>
        // var addOrEdit = document.getElementById("addOrEdit");
        var addNewRoomBtns = document.getElementById("addNewRoom");
        var editRoomBtns = document.getElementById("editRoom");
        var roomNameDd = document.getElementById("ddRoomName");
        var roomName = document.getElementById("boxRoomName");
        var roomCapacity = document.getElementById("boxRoomCapacity");
        
        function addOrEditFunc() {
            if ((roomNameDd.value == 0) || (roomNameDd.value == -1) ) {
                <?php $add = true;?>
                editRoomBtns.style.display = "none";
                addNewRoomBtns.style.display = "";
                clearBoxes(false);
                if (roomNameDd.value == 0) {
                    roomNameDd.style.display = "none";
                    roomName.style.display = "";
                }
            } else {
                <?php $add = false;?>
                document.getElementById('roomInformation').submit();
                editRoomBtns.style.display = "";
                addNewRoomBtns.style.display = "none";
                roomNameDd.style.display = "none";
                roomName.style.display = "";
                roomName.value = '<?php getRoomName(); ?>';
                roomCapacity.value = '<?php getCapacity(); ?>';
            }
        };

        function clearBoxes(dd) {
            <?php $add = true;?>
            editRoomBtns.style.display = "none";
            addNewRoomBtns.style.display = "";
            if (dd == true) {
                roomNameDd.style.display = "";
                roomName.style.display = "none";
                roomNameDd.value = -1;
            }
            roomName.value = "";
            roomCapacity.value = "";
            <?php nameAndCapReset(); ?>
        };

        // window.onload = clearBoxes(true);
        // window.onload = addOrEditFunc();
    </script>
    <?php 

    ?> 
</html>
