<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 16/7/15
 * Time: 3:46 PM
 */

include_once 'functions.php';
include_once 'access.php';
//Check whether logged in or not
sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
//Connect to the DB
$mysqli = connect_db();
if(!$mysqli){
    header('Location: '.'error.php');
    return;
}

$name = mysql_real_escape_string( $_POST['name']);
$email = mysql_real_escape_string( $_POST['email']);
$phone = mysql_real_escape_string( $_POST['phone']);
$dob = mysql_real_escape_string( $_POST['dob'] );
$school = mysql_real_escape_string( $_POST['school'] );
$city = mysql_real_escape_string( $_POST['city'] );
$address= mysql_real_escape_string( $_POST['address'] );
$paddress = mysql_real_escape_string( $_POST['paddress'] );
$standard = mysql_real_escape_string( $_POST['standard'] );

$resultset = searchrec($name,$email,$phone,$dob,$school,$city,$address,$paddress,$standard);

//Store the result

// Display it in the html page
?>

<form>
    <table width="600" border="1" cellspacing="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>Date of Birth</th>
            <th>Phone No</th>
            <th>School</th>
            <th>Citi/District</th>
            <th>Home Address</th>
            <th>Standard</th>
        </tr>
        <?php
        while($records=mysql_fetch_assoc($resultset)){

            echo "<tr>";
                echo"<td>".$records['reg_id']."</td>";
                echo"<td>".$records['reg_name']."</td>";
                echo"<td>".$records['reg_email']."</td>";
                echo"<td>".$records['reg_phone']."</td>";
                echo"<td>".$records['reg_dob']."</td>";
                echo"<td>".$records['reg_city']."</td>";
                echo"<td>".$records['reg_school']."</td>";
                echo"<td>".$records['reg_paddress']."</td>";
                echo"<td>".$records['reg_standard']."</td>";
                echo "</tr>";

        }//End while

        ?>

    </table>
   <li> <input type="button" value="Back"  onclick="protected_page.php"/> </li>
    <?php mysql_close( $mysqli);?>
</form>