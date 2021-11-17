<!DOCTYPE html>
<html>

<head>
    <title>Shopping List Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main class="center border">
        <h1>Shopping List Manager</h1>
        
        <div>
           <h2>Items:</h2>
        <?php if (count($item_list) == 0) : ?>
            <p>There are no items in the shopping list.</p>
        <?php else: ?>
            <ul>
            <?php foreach( $item_list as $id => $item ) : ?>
                <li><?php print_r($id + 1 . '. ' . $item); ?></li>
            <?php endforeach; ?>
            </ul>           
        <?php endif; ?>
        <br>
        </div>
        <div>
            <h6>Add item: </h6>
            <div>
                <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                   <?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="item_list[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <input type="text" name="new_item" id="new_item"> <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Add Item">
                </form>
            </div>
        </div>
        <?php if(!$modify_list) : ?>
        <div class="" id="selectItem">
            <h6>Select item</h6>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <span>Item: </span>
                <select name="item" id="itemSelector">
                    <?php foreach($items as $key=>$value):?>
                  
                    <option value="<?php echo $value['_id'] . '_' . $value['name'] ?>"><?php echo $value['name'] ?>
                    </option>
                    <?php endforeach; ?>
                </select><br>
                <input type="submit" name="remove_item" value="Delete item" style="text-align: center;">
                <input type="submit" name="modify_item" value="Modify item" style="text-align: center;">
                <input type="hidden" name="modifyitem" value="true">
            </form>
        </div>
        <?php endif; ?>
        <?php if($modify_list) : ?>
        <div id="modifyItem">
            <h6>Modify item</h6>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <span>Product: </span>
                <input type="text" id="modifyText" name="name" value="<?php echo $selected[1]?>">
                <input type="hidden" id="modifyId" name="id" value="<?php echo $selected[0]?>">
                <input type="hidden" name="modifyitem" value="false"><br>
                <input type="submit" name="save_changes" value="Save Changes" style="text-align: center;">
                <input type="submit" name="modify_item" value="Cancel Changes" style="text-align: center;">
            </form>
        </div>
        <?php endif; ?>
        <a href="?sort=true"><button type="button">Sort List</button></a>

    </main>
</body>

</html>
