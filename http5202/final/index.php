<?php

require "Database.php";
require "Staff.php";

$db = Database::dbConnect();
$staff = new Staff($db);

$departments = $staff->getDepartments();

$department = "";

if (isset($_GET["department"])) {
    $department = $_GET["department"];
    $staffs = $staff->getStaffsByDepartment($department);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Final</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php" method="GET">
                <div class="form-group">
                    <label for="department">Please select a department</label>
                    <select name="department">
                        <option value="">Select a department</option>
                        <?php foreach($departments as $d) {?>
                        <option value="<?=$d["department"]?>" <?=($d["department"] == $department) ? "selected" : ""?> ><?=$d["department"]?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="Search" />
                </div>
            </form>
            <?php if (count($staffs) > 0) { ?>
            <div id="staffs">
                <hr />
                <h2>Staff Directory for <?=$department?> Department</h2>
                <ul>
                    <?php foreach($staffs as $s) {
                        $staffLink = 'index.php?department=' . $department . '&staffid=' . $s['id'];
                    ?>
                    <li><a href="<?=$staffLink?>"><?=($s["fname"] . ',' . $s["lname"])?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            
            <?php if (isset($_GET['staffid'])) {
                $id = $_GET['staffid'];
                $staffDetail = $staff->getStaff($id);
            ?>
            <div id="staff">
                <hr />
                <h2>Staff Details</h2>
                <p>Name: <?=($staffDetail["fname"] . ',' . $staffDetail["lname"])?></p>
                <p>Email: <?=$staffDetail["email"]?></p>
                <p>Department: <?=$staffDetail["department"]?></p>
                <p>Profile: <?=$staffDetail["profile"]?></p>
            </div>
            <?php } ?>
        </div>
    </body>
</html>