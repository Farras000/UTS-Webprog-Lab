<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['alogin']) || (trim($_SESSION['alogin']) == '')) { ?>
<script>
window.location = "home.php";
</script>
<?php
}
$session_id=$_SESSION['alogin'];
$session_depart = $_SESSION['arole'];
?>