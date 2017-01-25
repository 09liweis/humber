
<?php
include 'header.php';

$name = '';
$email = '';
$program = '';
$gender = '';

$programs = array('Web Development', 'App Development', 'Database Development');
$genders = array('Male', 'Female');


function validate() {
    if (isset($_POST['send'])) {
        
        global $name, $email, $program, $gender, $adult;
        global $nameerror, $emailerror, $programerror, $gendererror, $success;
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $program = $_POST['program'];
        $gender = $_POST['gender'];
        $adult = $_POST['adult'];
        
        if ($name == "") {
            $nameerror = "Please enter name";
        } else {
            $nameerror = "";
        }
        
        if (empty($email)) {
            $emailerror = "Please enter email";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "Please enter valid email format";
        } else {
            $emailerror = "";
        }
        
        if ($program == "") {
            $programerror = "Please select program";
        } else {
            $programerror = "";
        }
        
        if ($gender == "") {
            $gendererror = "Please select gender";
        } else {
            $gendererror = "";
        }
        
        if ($nameerror == "" && $emailerror == "" && $programerror == "" && $gendererror == "") {
            $success = "Thanks for submit your info";
        }
        
    }
}

validate();

?>

<form id="form" action="" method="POST">
    <div class="group">
        <label class="group_label" for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" />
        <span class="error">
            <?php
            echo (isset($nameerror)) ? $nameerror : '';
            ?>
        </span>
    </div>
    <div class="group">
        <label class="group_label" for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>" />
        <span class="error">
            <?php
            echo (isset($emailerror)) ? $emailerror : '';
            ?>
        </span>
    </div>
    <div class="group">
        <label class="group_label" for="program">Program</label>
        <select name="program" id="program">
            <option value="">Select your program</option>
            <?php foreach($programs as $p) {?>
            <option value="<?php echo $p;?>" <?php echo ($program == $p) ? "selected" : "" ?> ><?php echo $p;?></option>
            <?php } ?>
        </select>
        <span class="error">
            <?php
            echo (isset($programerror)) ? $programerror : '';
            ?>
        </span>
    </div>
    <div class="group">
        <label class="group_label">Gender</label>
        <div class="group">
            <?php foreach($genders as $g) {?>
            <label for="<?php echo $g;?>"><?php echo $g; ?></label>
            <input type="radio" name="gender" id="<?php echo $g;?>" value="<?php echo $g;?>" <?php echo ($gender == $g) ? "checked" : ""?> />
            <?php } ?>
        </div>
        <span class="error">
            <?php
            echo (isset($gendererror)) ? $gendererror : '';
            ?>
        </span>
    </div>
    <div class="group">
        <label for="adult">Adult</label>
        <input type="checkbox" name="adult" id="adult" <?php echo ($adult == "on") ? "checked" : "" ?> />
    </div>
    <div class="group">
        <input type="submit" value="validate" name="send" />
    </div>
    
    <div class="group">
        <h2><?php echo (isset($success)) ? $success : "" ?></h2>
    </div>
</form>

<?php
include 'footer.php'
?>
