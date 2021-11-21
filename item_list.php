<!DOCTYPE html>
<html>
         <!--Head Section-->
<head>
    <title>SHOPPING LIST MANAGER</title>
    <link rel="stylesheet" type="text/css" href="main2.css">
</head>

<!--Body Section-->
<body>
    <header>
        <h1>SHOPPING LIST MANAGER</h1>
    </header>
	
	<main>
	
	<!--Error Message-->
	<?php if (count($errors) > 0) : ?>
        <h2>Errors:</h2>
        <ul>
            <?php foreach($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
	
	<!--Item Display List-->
	<h2> Items: </h2>
	<?php if(count($item_list) == 0):?>
	<p>Shopping list is empty.</p>
	<?php else:?>
	<ul>
	<?php foreach($item_list as $item => $name):?>
	<li> <?php echo $item+1 . ' . ' .$name;?></li>
	<?php endforeach;?>
	</ul>
	<?php endif;?>
	<br>
	
	<!-- Add items form -->
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
	
	<!-- Delete, Modify, Sort items form -->
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
<?php if (!empty($item_to_modify)) : ?>
        <h2>Item to Modify:</h2>
        <form action="." method="post">
            <?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="item_list[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <input type="hidden" name="item_to_modify" value="<?php echo $item_to_modify; ?>">
            <input type="text" name="modifieditem" value="<?php echo $item_to_modify; ?>">
			
			<!-- Modified items Save/cancel button-->
           <label>&nbsp;</label>
            <input type="submit" name="action"  value="Save Changes">
            <input type="submit" name="action" value="Cancel Changes">
			
        </form>
        <?php endif; ?>
		    </main>
			
			<!--Footer Section-->
			<footer>
    <p>&copy; <?php echo date("Y"); ?> Shopping List Manager</p>
</footer>

</body>
</html>
	
