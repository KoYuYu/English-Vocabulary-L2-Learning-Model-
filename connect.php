<?PHP
session_start(); 
include("mysql_connect.inc.php");
?>
<?PHP

$id = $_POST['id'];
$pw = $_POST['pw'];

//setcookie("user", "peter", time()+3600);

//log_cookie begin
//setcookie("user", "$id", time()+3600);
//$log_time=$id;
//setcookie("log_time", $log_time, time() + 24 * 60 *60, "/");
//$sql = "INSERT INTO lynn.login_record(name, log_time) VALUES ('$id','$log_time' )";       
//$result = $conn -> query($sql) ;
//log_cookie end

$sql = mysqli_query ($conn, "SELECT * FROM lynn.member WHERE email = '$id' ");
$row = mysqli_fetch_array ($sql);

if($row[4] == 0)
{
    echo "<script>alert('帳號未驗證，登入失敗！'); location.href = 'index.php';</script>";
}

	if($id != null && $pw != null && $row[2] == $id && $row[3] == $pw && $row[4] == 1) {
		$_SESSION['email'] = $id;
		echo "<script>alert('登入成功！'); location.href = 'member_index.php';</script>";
		}
	else {
		echo "<script>alert('登入失敗！'); location.href = 'index.php';</script>";
	}


?>