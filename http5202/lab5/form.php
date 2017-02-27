<?php
include 'header.php';

include "database.php";

include 'Dinosaur.php';

$dinosaur = new Dinosaur(Database::dbConnect());

if (isset($_POST["name"])) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $dinosaur->updateDinosaur($id, $_POST["name"], $_POST["color"]);
    } else {
        $dinosaur->addDinosaur($_POST["name"], $_POST["color"]);
    }
    header("Location: /http5202/lab5/list.php"); /* Redirect browser */
    exit();
}

if ($_GET["action"] == "add") {
    $title = "Add new Dino";
    $name = "";
    $color = "";
} else {
    $title = "Edit Dino";
    $id = $_GET["id"];
    $d = $dinosaur->getDinosaur($id);
    $name = $d["name"];
    $color = $d["color"];
}

?>



<h1><?=$title?></h1>

<form action="" method="POST">
    <?php if (isset($id)) {?>
    <input type="hidden" value="<?=$id?>" name="id" />
    <?php }?>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="name" name="name" value="<?=$name?>">
        <label class="mdl-textfield__label" for="name">Name</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="color" name="color" value="<?=$color?>">
        <label class="mdl-textfield__label" for="color">Color</label>
    </div>
    <input type="submit" name="submit" value="<?=$_GET["action"]?>" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" />
</form>

<?php
include 'footer.php'
?>