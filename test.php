<select name="<?php echo $as->my_name(); ?>">
    <option value="test">test</option>
     <option value="test">test1</option>
</select>

<?php
    $selected = $_POST[$as->my_name()];
    echo $selected;
?>