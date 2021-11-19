
<?php
// Getting item_list array.

$item_list = filter_input(INPUT_POST, 'item_list', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($item_list === NULL) {
$item_list = array();}

// initializing error messages array.
$errors = array();

//action variable
$action = filter_input(INPUT_POST, 'action');

//Process
Switch($action) {
case 'Add item':
$new_item = filter_input(INPUT_POST, 'new');
if ($new_item === NULL || $new_item === FALSE) {
$errors = 'Shopping list is empty'; }
else { 
$item_list[] = $new_item;
array_push($item_list);
}
    break;
	case 'Delete item':
        $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
        if ($item_index === NULL || $item_index === FALSE) {
            $errors[] = 'Shopping list is empty';
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
$item_to_modify = $item_list[$modify_item]; }
	break;
	case 'Save Changes' :
	$save_item = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
	if($save_item === TRUE) {
	$new_list[] = $item_list[$save_item]; }
		break;
	
      case 'sort items':
if($item_list < 2) {
$errors[] = 'List cannot be sorted'; }
else {
rsort($item_list);
}
}
	include("item_list.php");
	
	
	?>
