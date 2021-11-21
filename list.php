<?php
include "db.php";

  function addItem($item){
            /* Prepare an insert statement */
	 $statement = $this->con->prepare('INSERT INTO shopping_list (item_name) VALUES (?)');
            $statement->bind_param('s',$item);
            $statement->execute();
            }
        // Removes an item from the database.
        function removeItem($id){
            $statement = $this->con->prepare('DELETE FROM shopping_list WHERE item_no = (?)');
            $statement->bind_param('s', $id);
            $statement->execute();
        }
        // Modify item in db
        function modifyItem($id, $item){
            $statement = $this->con->prepare('UPDATE items SET item_name = ? WHERE item_no = ?');
            $statement->bind_param('si', $item, $id);
            $statement->execute();
        }
        // View items.
       function getItems($id, $item){
            $results = mysqli_query($this->con, 'SELECT * from shopping_list');
            $list = array();
            while($row = mysqli_fetch_assoc($results)) {
                array_push($list, array("item_no"=>$row['item_no'],"item_name"=>$row['item_name']));
            }
	   }


			?>