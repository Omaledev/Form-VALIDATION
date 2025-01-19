<?php
$name = $email = $website = $comment = $gender = "";
$nameErr = $emailErr = $genderErr = "";


function sanitize($string):string

{
  $string = htmlspecialchars(string:$string);
  $string = trim(string: $string);
  $string = stripcslashes(string: $string);

  return $string;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

if (empty($_POST['name'])) {
      $nameErr = "This field is required!";
    } else {
      $name = sanitize(string: $_POST['name']);
    }

    if (empty($_POST['email'])) {
      $emailErr = "This field is required!";
    } else {
      $email = sanitize(string: $_POST['email']);
    }

    if (empty($_POST['gender'])) {
      $genderErr = "Please select one option";
    } else {
      $gender = sanitize(string: $_POST['gender']);
    }

    $website = sanitize(string: $_POST['website']);
    $comment = sanitize(string: $_POST['comment']);

  
}
?>
    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="main-container">
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <h1>Form Validation</h1>
          <div>
            <label for="fname">Name:</label>
            <input class="space" name="name" type="text" value="<?php echo $name ?>"><br>
            <span style="color:red;"><?php if (!empty($nameErr)) echo('*'.$nameErr)?></span>
          </div>
          <div class="div">
            <label for="email">E-mail:</label>
            <input class="space" name="email" type="text" value="<?php echo $email ?>"> <br>
            <span style="color:red;"><?php if (!empty($emailErr)) echo('*'.$emailErr)?></span>
          </div>
          <div class="div">
            <label for="Wsite">Website:</label>
            <input class="space" name="website" type="text" value="<?php echo $website ?>">
          </div>
          <div class="div">
            <label for="comm">Comment:</label><br>
            <textarea name="comment" id="" rows="5" cols="50%" cols="40" value="<?php echo $comment ?>"></textarea>
          </div>
          <div class="div">
            <label for="Gender">Gender:</label>
            <input type="radio" name="gender" value="female" <?php if ($gender ==='female') echo'checked' ?>>Female 
            <input type="radio" name="gender" value="male" <?php if ($gender ==='male') echo'checked' ?>>Male
            <input type="radio" name="gender" value="other" <?php if ($gender ==='other') echo'checked' ?>>Other <br>
            <span style="color:red;"><?php if (!empty($genderErr)) echo('*'.$genderErr)?></span>
          </div>
          <div class=div>
            <button>Submit</button>
          </div>
        </form>
        <section>
          <h1>Your Input:</h1>
          <h3>Name:</h3>
          <h3>Email:</h3>

        </section>
    </div>
  </div>
</body>
</html>