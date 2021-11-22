<?php
include("list.php");
//get item_list array.
$item_list = filter_input(INPUT_POST, 'item_list', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

//initializing item_list.
if ($item_list === NULL) {
$item_list = array();}

//initializing error array.
$errors = array();

//Get action variable from Post.
$action = filter_input(INPUT_POST, 'action');

//Process.
Switch($action) {
	
//Using stack data structure.
case 'Add item':
$new_item = filter_input(INPUT_POST, 'new');
if (empty($new_item)) {
$errors[] = 'Item was not added'; }
else { 
$item_list[] = $new_item;
array_push($item_list); }
    break;
	
//using array_value() to fill gap of deleted item in array.
	case 'Delete item':
        $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
        if ($item_index === NULL || $item_index === FALSE) {
            $errors[] = 'Nothing in the list to delete';
        } else {
            unset($item_list[$item_index]);
            $item_list = array_values($item_list);
        }
        break;
		
		case 'Modify item':
     $modify_item = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
         if($modify_item === NULL || $modify_item === FALSE) {
      $errors[] = 'Shopping List is empty'; }
         else { 
		 $item_to_modify = $item_list[$modify_item]; 
 }
	break;
	
	case 'Save Changes':
	$save_item = filter_input(INPUT_POST, 'itemid');
	if(empty($save_item)) {
	$errors[] = "Item cannot be modified"; }
	else {
	$item_list[] = $save_item; }
	break;

// Sorting items alphabetically + case insensitively. 
     case 'sort items':
if($item_list < 2) {
$errors[] = 'List cannot be sorted'; }
else {
sort($item_list, SORT_NATURAL | SORT_FLAG_CASE);
}
}

	include("item_list.php");
	
	
?>