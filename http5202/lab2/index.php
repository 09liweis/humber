
<?php
include 'header.php';
?>

<form id="form">
    <div class="group">
        <label class="group_label" for="name">Name</label>
        <input type="text" name="name" id="name" />
    </div>
    <div class="group">
        <label class="group_label" for="email">Email</label>
        <input type="text" name="email" id="email" />
    </div>
    <div class="group">
        <label class="group_label" for="program">Program</label>
        <select name="program" id="program">
            <option value="">Select your program</option>
            <option value="Web Development">Web Development</option>
            <option value="App Development">App Development</option>
            <option value="Database Development">Database Development</option>
        </select>
    </div>
    <div class="group">
        <label class="group_label">Gender</label>
        <div class="group">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="male" value="male" />
            <label for="female">Femal</label>
            <input type="radio" name="gender" id="femal" value="female" />
            <span id="gender-msg">Gender can not be empty</span>
        </div>
    </div>
    <div class="group">
        <label for="adult">Adult</label>
        <input type="checkbox" name="adult" id="adult" />
    </div>
    <div class="group">
        <input type="submit" value="validate" />
    </div>
</form>
<script src="script.js" type="text/javascript"></script>

<?php
include 'footer.php'
?>
