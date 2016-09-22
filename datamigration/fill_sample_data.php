<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');

$generate_rooms = 100;
$generate_users = 400;


/*
rm ./web/xstorage/userbilder/*.*
rm ./web/xstorage/userbilder/cropped/*.*
rm ./web/xstorage/userbilderSample/*.*
rm ./web/xstorage/roombilderSample/*.*
rm ./web/xstorage/_cache/*.*
rm ./web/xstorage/_deleted/*.*
*/



sampledata::getUsers("suche", $generate_users);
echo "\n\r $generate_users users suche";

/*
sampledata::getUsers("suche");
echo "\n\r 1000 users suche";
sampledata::getUsers("suche");
echo "\n\r 1000 users suche";

*/
sampledata::getUsers("biete", $generate_rooms);
echo "\n\r $generate_rooms users biete";

//sampledata::getUsers("biete");


sampledata::fillRooms($generate_rooms);

sampledata::fillRoomsPictures(1, "room", intval($generate_rooms/2));
sampledata::fillRoomsPictures(2, "room", intval($generate_rooms/2));
sampledata::fillRoomsPictures(3, "house", intval($generate_rooms/2));
sampledata::fillRoomsPictures(4, "house", intval($generate_rooms/2));


sampledata::assignAdmin2Rooms();

sampledata::assignUser2Rooms($generate_rooms+1);


//rooms profile pics not needed anymore => last uploaded "normal" pic is profile picture
//sampledata::fillRoomsProfilesPictures(1, "room");
//sampledata::fillRoomsProfilesPictures(2, "room");


echo "\n\r\n\r DONE";