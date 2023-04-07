<?php
session_start();
// nok en gang kan koden gi feilmeldinger så vi skrur de av
//

$index = 0;

// sjekker om en eller flere skal fjernes
if($_POST['id']) {
    $item = $_POST['id'];
    foreach ($_SESSION['handlekurv'] as $element) {
        if($element = $item); {
        array_splice($_SESSION['handlekurv'],$index ,1);
        array_splice($_SESSION['mengde'], $index,1);
        echo "yay";
        header("Location: /kundesider/handlekurv.php");
}
$index++;
    }

} elseif ($_POST['all']) {
    //TODO add en mulighet for å fjerne alt
}

?>
<img src="https://http.cat/102">
