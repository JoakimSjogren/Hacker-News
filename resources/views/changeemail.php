<?php
session_start();

if (isset($_SESSION['user'])) {
?>
    <form action="/app/user/changeemail.php" method="post">
        <div class="form-group">
            <label for="newemail">New Email</label>
            <input type="text" name="newemail" id="newemail" required>
        </div>
        <div class="form-group">
            <label for="password">Enter Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Set new email</button>
    </form>
<?php
}
?>