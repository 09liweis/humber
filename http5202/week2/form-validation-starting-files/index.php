<?php
//var_dump($_POST);
$email = "";
$password = "";
if (isset($_POST['send'])) {
    
    define("GST", 13);
    
    $tax = 200 * GST;
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email)) {
        $emailerror = "Please enter email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter valid email format";
    } else {
        echo "Email is valid";
    }
    
    $pattern = "/[0-9a-z]{8,12}/";
    if (strlen($password) < 8) {
        echo "Please enter password with at least 8 character";
    } else if (!preg_match($pattern, $password)) {
        echo "Please enter correct format for password";
    } else {
        echo "Corrrect password";
    }
} else {
    echo "Please submit the form";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>Account Sign Up</h1>
    <form action="" method="post">

    <fieldset>
    <legend>Account Information</legend>
        <label>E-Mail:</label>
        <input type="text" name="email" value="<?=$email?>" class="textbox"/>
        <span style="color: red">
            <?php
            if (isset($emailerror)) {
                echo $emailerror;
            }
            ?>
        </span>
        <br />

        <label>Password:</label>
        <input type="password" name="password" value="" class="textbox"/>
        <br />

        <label>Phone Number:</label>
        <input type="text" name="phone" value="" class="textbox"/>
    </fieldset>

    <fieldset>
    <legend>Settings</legend>

        <p>How did you hear about us?</p>
        <input type="radio" name="heard_from" value="Search Engine" />
        Search engine<br />
        <input type="radio" name="heard_from" value="Friend" />
        Word of mouth<br />
        <input type=radio name="heard_from" value="Other" />
        Other<br />

        <p>Would you like to receive announcements about new products
           and special offers?</p>
        <input type="checkbox" name="wants_updates"/>YES, I'd like to receive
        information about new products and special offers.<br />

        <p>Contact via:</p>
        <select name="contact_via">
                <option value="email">Email</option>
                <option value="text">Text Message</option>
                <option value="phone">Phone</option>
        </select>

        <p>Comments:</p>
        <textarea name="comments" rows="4" cols="50"></textarea>
    </fieldset>

    <input type="submit" name="send" value="Submit" />

    </form>
    <br />
    </div>
</body>
</html>