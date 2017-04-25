<?php
$connect = mysqli_connect("127.0.0.1", "root", "", "test");
$data = json_decode(file_get_contents("php://input"));
if(count($data)>0)
{
	$ID = $data->ID;
	$query = "DELETE FROM contact WHERE ID='$ID'";
	if(mysqli_query($connect, $query))
	{
		echo 'Data Deleted';
	}
	else
	{
		echo 'Error';
	}
}
?>