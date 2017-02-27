<?php
include 'header.php';

include 'database.php';

include 'Dinosaur.php';

$dinosaur = new Dinosaur(Database::dbConnect());

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $id = $_POST["id"];
        $dinosaur->deleteDinosaur($id);
        header("location: " . $listPage);
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $d = $db->getDinosaur($id);
?>

<div class="">
    <p>Name: <?=$d["name"]?></p>
    <p>Color: <?=$d["color"]?></p>
</div>


<?php
} else {
    $dinosaurs = $dinosaur->getDinosaurs();
?>


<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th>Color</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dinosaurs as $d) {?>
        <tr>
            <td class="mdl-data-table__cell--non-numeric"><a href="<?=$listPage?>?id=<?=$d["id"]?>"><?=$d["name"]?></a></td>
            <td><?=$d["color"]?></td>
            <td>
                <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="/http5202/lab5/form.php?action=edit&id=<?=$d["id"]?>">Edit</a>
                <form action="/http5202/lab5/list.php?action=delete" method="POST">
                    <input type="hidden" name="id" value=<?=$d["id"]?>>
                    <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>



<?php
}

?>



<?php
include 'footer.php'
?>