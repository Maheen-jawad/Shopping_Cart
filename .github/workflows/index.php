<?php
$item_list= filter_input(INPUT_POST, 'item_list', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

if($item_list === NULL || $item_list === FALSE) {
$item_list[] = array(); }

//get action variable from POST.
$action = filter_input(INPUT_POST, 'action');

//initializing error message array
$errors = array();

//Process
Switch($action) {
case 'Add item':
$new_item = filter_input(INPUT_POST, 'newitem');
if(empty($new_item)) {
$errors[] = 'Shopping list is empty'; }
else {
$item_list[]=$new_item; 
}
break;
case 'Delete item':
$item_index = filter_input(INPUT_POST, 'itemno', FILTER_VALIDATE_INT);
if($item_index === NULL ||$item_index === FALSE) {
$errors[] = 'Shopping list is empty'; }
else {
	unset($item_list[$item_index]);
	$item_list = array_values($item_list);
}
break;
case 'Modify item': 
$modify_list = filter_input(INPUT_POST, 'modifylist', FILTER_VALIDATE_BOOLEAN);
if($item_index === NULL || $item_index === FALSE) {
$errors[] = 'Shopping list is empty'; }
else {
	$item_list[]=$modify_list; 
}
break;
}

include("item_list.php");
?>

      
