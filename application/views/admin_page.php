
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>

<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "Welcome to Admin Page";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $username;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
?>

<style>
.menu_link {
	margin-top: 20px;
	float: right;
}
.menu_link a{ 
    padding: 10px;
    background-color: burlywood;
    border-radius: 3px;
    margin: 5px;
    color: #000;	
    text-decoration: none;
}
.form_details{width:50%;}
.form_details .left{width:20%; float:left;}
.clear{clear:both;}
.table_div{margin-top:40px;}
</style>
</div>
