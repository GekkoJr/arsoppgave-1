<div class="userInfo-Container">
    <label><input type="text" placeholder=""></label>
    <label><input type="text" placeholder=""></label>
    <label><input type="email" placeholder=""></label>
    <?php

    if ($_SESSION['admin'] === true) {
        ?>
        <p>Admin</p><p>Ordre Person</p>
        <label><input type="checkbox"></label>
        <label><input type="checkbox"></label>
        <?php
    }
    ?>
</div>