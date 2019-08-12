<?php
//you can print text and image by sending request from your website
$a = array();
//sending text entry	
$obj1->type = 0;//text
$obj1->content = 'My Title';//any string	
$obj1->bold = 1;//0 if no, 1 if yes
$obj1->align =2;//0 if left, 1 if center, 2 if right
$obj1->format = 3;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width
array_push($a,$obj1);
//sending image entry			
$obj2->type = 1;//image
$obj2->path = '';//complete filepath on your web server; make sure that it is not big size
$obj2->align = 2;//0 if left, 1 if center, 2 if right; set left align for big size images
array_push($a,$obj2);
//sending barcode entry			
$obj3->type = 2;//barcode
$obj3->value = '';//valid barcode value
$obj3->width = 100;//valid barcode width
$obj3->height = 50;//valid barcode height
$obj3->align = 0;//0 if left, 1 if center, 2 if right
array_push($a,$obj3);
//sending QR entry			
$obj4->type = 3;//QR code
$obj4->value = '';//valid QR code value
$obj4->size = 40;//valid QR code size in mm
$obj4->align = 2;//0 if left, 1 if center, 2 if right
array_push($a,$obj4);

header("Content-type: application/json; charset=UTF-8");

echo json_encode($a,JSON_FORCE_OBJECT);
//Note that same sequence will be used for printing data
?>