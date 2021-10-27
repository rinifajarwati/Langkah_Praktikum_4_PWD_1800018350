<?php
include_once("koneksi.php");
$result = mysqli_query($con, "SELECT * FROM mahasiswa");
?>

<!doctype html>
<html>
 <head>
 <style>
 .error {color: #FF0000;}
 .table {
    border : 1pt solid black;
    border-spacing: 0px;
 }
 .row td{
    border : 0.8pt solid black;
    padding: 4px;
 }
 
</style>
 </head>
 
 <body>
 <?php
 // define variables and set to empty values
 $namaErr = $emailErr = $genderErr = $websiteErr = "";
 $nama = $email = $gender = $komen = $website = "";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["nama"])) {
 $namaErr = "Nama harus diisi";
 }else {
 $nama = test_input($_POST["nama"]);
 }
 
 if (empty($_POST["email"])) {
 $emailErr = "Email harus diisi";
 }else {
 $email = test_input($_POST["email"]);
 
 // check if e-mail address is well-formed
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Email tidak sesuai format"; 
 }
 }
 
 if (empty($_POST["website"])) {
 $website = "";
 }else {
 $website = test_input($_POST["website"]);
 }
 
 if (empty($_POST["komen"])) {
 $komen = "";
 }else {
 $komen = test_input($_POST["komen"]);
 }
 
 if (empty($_POST["gender"])) {
 $genderErr = "Gender harus dipilih";
 }else {
 $gender = test_input($_POST["gender"]);
 }
 }
 
 function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
 }
 ?>
<h2>Posting Komentar </h2>

 
 <p><span class = "error">* Harus Diisi.</span></p>
 
 <form method = "post" action = "<?php 
 echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <table>
 <tr>
 <td>Nama:</td>
 <td><input type = "text" name = "nama">
 <span class = "error">* <?php echo $namaErr;?></span>
 </td>
 </tr>
 
 <tr>
 <td>E-mail: </td>
 <td><input type = "text" name = "email">
 <span class = "error">* <?php echo $emailErr;?></span>
 </td>
 </tr>
 
 <tr>
 <td>Website:</td>
 <td> <input type = "text" name = "website">
 <span class = "error"><?php echo $websiteErr;?></span>
 </td>
 </tr>
 
 <tr>
 <td>Komentar:</td>
 <td> <textarea name = "komen" rows = "5" cols = "40"></textarea></td>
 </tr>
 
 <tr>
 <td>Gender:</td>
 <td>
 <input type = "radio" name = "gender" value = "L">Laki-Laki
 <input type = "radio" name = "gender" value = "P">Perempuan
 <span class = "error">* <?php echo $genderErr;?></span>
 </td>
 </tr>
 <td>
 <input type = "Submit" name = "Submit" value = "Submit"> 
 </td>
 </table>
 </form>

 <?php
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['Submit'])) {
 $nama = $_POST['nama'];
 $email = $_POST['email'];
 $website = $_POST['website'];
 $gender = $_POST['gender'];
 $komen = $_POST['komen'];
 
 // include database connection file
 include_once("koneksi.php");
 // Insert user data into table
$result = mysqli_query($con, "INSERT INTO mahasiswa (nama,website,email,komen,gender) 
VALUES('$nama','$website','$email','$komen','$gender')");
// Show message when user added

}
?>
<table class="table">
    <tr class="row">
        <td>Nama</td>
        <td> <?php echo $nama;?> </td>
    </tr>
    <tr class="row">
        <td>Email</td>
        <td> <?php echo $email;?></td>
    </tr>
    <tr class="row">
        <td>Website</td>
        <td><?php echo $website;?></td>
    </tr>
    <tr class="row">
        <td>Gender</td>
        <td><?php echo $gender;?></td>
    </tr>
    <tr class="row">
        <td>Komentar</td>
        <td><?php echo $komen;?></td>
    </tr>
</table>
            <a href="lihat.php" class="btn btn-success btn-sm m-2">lihat</a>
</body>
</html>
