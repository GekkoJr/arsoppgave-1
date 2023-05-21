<?php

$userToEdit = mysqli_real_escape_string($connect, $userToEdit);
$query = "SELECT * from brukere where ID='$userToEdit'";
$result = mysqli_fetch_array(mysqli_query($connect, $query), MYSQLI_ASSOC);
$_SESSION['toEdit'] = $userToEdit;

?>
<form method="post" action="/komponenter/updateUserInfo.php">
    <div class="userInfo-Container">
        <p>Fornavn</p>
        <label><input type="text" value="<?php echo $result['navn'] ?>"></label>
        <p>Etternavn</p>
        <label><input type="text" value="<?php echo $result['etternavn'] ?>"></label>
        <p>Epost</p>
        <label><input type="email" value="<?php echo $result['mail'] ?>"></label>
        <?php

        if ($_SESSION['admin'] === true) {
            ?>
            <div class="userCheck">
                <p>Admin</p>
                <p>Ordre Person</p>
                <label><input type="checkbox" name="admin"
                        <?php
                        if ($result['admin']) {
                            echo "checked";
                        }
                        ?>
                    ></label>
                <label><input type="checkbox" name="ordre"
                        <?php
                        if ($result['ordePerson']) {
                            echo "checked";
                        }
                        ?>
                    ></label>
            </div>

            <?php
        }
        ?>
        <button style="margin-top: 10px; " type="submit" class="generic-button">Save</button>
    </div>
</form>