<?php
//get itemlist array from POST
$item_list = filter_input(INPUT_POST, 'itemlist', 
        FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($item_list === NULL) {
    $item_list = array();
    

//    $task_list[] = 'Write chapter';
//    $task_list[] = 'Edit chapter';
//    $task_list[] = 'Proofread chapter';
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch( $action ) {
    case 'Add item':
        $new_item = filter_input(INPUT_POST, 'newitem');
        if (empty($new_item)) {
            $errors[] = 'Item was not added.';
        } else {
            $item_list[] = $new_item;
        }
        break;
    case 'Delete item':
        $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
        if ($item_index === NULL || $item_index === FALSE) {
            $errors[] = 'The item cannot be deleted.';
        } else {
            unset($item_list[$item_index]);
            $item_list = array_values($item_list);
        }
        break;
    case 'Modify item':
    	$modify_item = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);	
    	if ($modify_item === NULL || $modify_item === FALSE) {
    		$erros[] = "No item was selected.";
    	} else {
    		// $item_index = array_search($modify_item, $item_list);
    		$item_to_modify = $item_list[$modify_item];
    	}
    	break;
/*
    
    case 'Save Changes':    
    
    case 'Cancel Changes':
        
    case 'Sort Tasks':
    
*/
}

include('task_list.php');
?>