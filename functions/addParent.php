<!-- addParent.php -->
<?php
?>
<form action="functions/processObject.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="title">
    <input type="text" name="description" placeholder="description">
    <!-- send parent_id to POST  -->
    <input type="hidden" name="parent_id" value="null">
    <button>Add parent</button>
</form>