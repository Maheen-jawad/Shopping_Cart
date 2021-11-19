<!DOCTYPE html>
<html>
<head>
    <title>Shopping List Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header>
        <h1>Shopping List Manager</h1>
    </header>
	<main>
	
        <!--error message--!>
	<?php if(count($errors) > 0):?>
	<h2> errors: </h2>
	<ul>
	<?php foreach($errors as $error):?>
	<li><?php echo $error;?></li>
	<?php endforeach;?>
	</ul>
	<?php endif; ?>
	
        <!-- Items list--!>
	<h2> Items: </h2>
	<?php if($item_list == NULL):?>
	<p>Shopping list is empty.</p>
	<?php else:?>
	<ul>
	<?php foreach($item_list as $item => $name):?>
	<li> <?php echo $item+1 . ' . ' .$name;?></li>
	<?php endforeach;?>
	</ul>
	<?php endif;?>
	<br>
	
        <!-- Adding items --!>
	<h2>Add Item:</h2>
	<form action="." method="post">
	<?php foreach ($item_list as $name):?>
	<input type="hidden" name="item_list[]" value="<?php echo $name;?>">
	<?php endforeach;?>
	<label>Items:</label>
	<input type="text" name="new" id="new"><br>
	<label>&nbsp;</label>
	<input type="submit" name="action" value="Add item">
	</form>
	<br>
	
         <!--Select Form--!>
	 <?php if (count($item_list) > 0 && empty($item_to_modify)) : ?>
        <h2>Select Item:</h2>
        <form action="." method="post">
            <?php foreach( $item_list as $name ) : ?>
              <input type="hidden" name="item_list[]" value="<?php echo $name; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <select name="itemid">
                <?php foreach( $item_list as $id => $name ) : ?>
                    <option value="<?php echo $id; ?>">
                        <?php echo $name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>      
            <input type="submit" name="action" value="Delete item">
			<input type="submit" name="action" value="Modify item">
 <br><br>
 
            <label>&nbsp;</label>
            <input type="submit" name="action" value="sort items">
        </form>
        <?php endif; ?>

<!--Modify Form--!>
<?php if (!empty($item_to_modify)) : ?>
        <h2>Item to Modify:</h2>
        <form action="." method="post">
            <?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="item_list[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <input type="hidden" name="item_to_modify" value="<?php echo $item_to_modify; ?>">
            <input type="text" name="itemid" value="<?php echo $modify_item; ?>">
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Save Changes">
            <input type="submit" name="action" value="Cancel Changes">
        </form>
        <?php endif; ?>
		
		    </main>
</body>
</html>
	</main>
	</body>
	</html>
