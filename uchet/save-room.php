<?php
require_once 'secure.php';
    if (isset($_POST['room_id'])) {
        $room = new Room();
        $room->name= Helper::clearString($_POST['ame']);
        $room->ploshad= Helper::clearString($_POST['ploshad']);
        $room->otdel_id= Helper::clearInt($_POST['otdel_id']);
		if ((new RoomConnect())->save($room)) {
			header('Location: list-room.php');
		}
    }
?>