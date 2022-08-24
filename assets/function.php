<?php 
function setBalance($amount,$process,$accno)
{
	$con = new mysqli('localhost','root','','mybank');
	$array = $con->query("select * from account where accno='$accno'");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$balance = $row['balance'] + $amount;
		return $con->query("update account set balance = '$balance' where accno = '$accno'");
	}else
	{
		$balance = $row['balance'] - $amount;
		return $con->query("update account set balance = '$balance' where accno = '$accno'");
	}
}
