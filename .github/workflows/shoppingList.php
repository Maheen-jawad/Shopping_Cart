<?php
// get itemlist array from POST. 
// Use of FILTER_REQUIRE_ARRAY parameter to return an array.
$item_list = filter_input(INPUT_POST, 'item_list', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

// intializing item_list with empty array.
if($item_list === NULL) {
  $item_list = array(); }

// initializing action variable from POST.
$action = filter_input(INPUT_POST, 'action'); 

//initialize error message array.
$error = array();

//process
switch ($action) {
  case 'add item':
  $new_item = filter_input(INPUT_POST, 'new_item');
    if(empty($new_item) {
      $error[] = "The shopping list is empty"; }
       else {
         $item_list[] = $new_item; 
         array_push($item_list, $new_item); }
       break;
       case 'delete item';
       $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
       if($item_index === NULL || $item_index === FALSE) { 
         $error[] = "The Shopping list is empty"; }
       else {
         unset($item_list[$item_index]);
         $item_list = array_value($item_list); }
       break;
       
      
