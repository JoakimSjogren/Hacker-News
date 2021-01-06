<?php
require __DIR__ . "/../app/autoload.php";
require __DIR__ . "/header.php";

?>
<!-- Submit form -->
<form action="/app/user/post.php" method="post">
    <span>Submit a post</span>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div class="form-group">
        <label for="password">Url</label>
        <input type="url" name="url" id="url" required>
    </div>

    <div class="form-group">
        <label for="description">Text</label>
        <input type="text" name="description" id="description" required>
    </div>
    <button type="submit">Submit</button>
</form>