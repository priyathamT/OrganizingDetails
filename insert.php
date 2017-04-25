<?php

$connect = mysqli_connect("127.0.0.1", "root", "", "test");
$data = json_decode(file_get_contents("php://input"));
if(count($data)>0)
{
	$Name = mysqli_real_escape_string($connect, $data->name);
	$Email = mysqli_real_escape_string($connect, $data->email);
	$Tel = mysqli_real_escape_string($connect, $data->telephone);
	$Company = mysqli_real_escape_string($connect, $data->company);
	$Date = mysqli_real_escape_string($connect, $data->date);
	$Year = mysqli_real_escape_string($connect, $data->year);
	$btn_name = $data->btnName;
	if($btn_name == "Add Data")
	{
		$query = "INSERT INTO contact(Name, Email, Tel, Company, Date, Year) VALUES ('$Name', '$Email', '$Tel', '$Company', '$Date', '$Year')";
		if(mysqli_query($connect, $query))
		{
			echo "Data Inserted Successfully";
		}
		else
		{
			echo "Something Went Wrong!!!";
		}
	}
	if($btn_name == 'Update Data')
	{
		$ID = $data->ID;
		$query = "UPDATE contact SET Name = '$Name', Email = '$Email', Tel = '$Tel', Company = '$Company', Date = '$Date', Year = '$Year' WHERE ID = '$ID'";
		if(mysqli_query($connect, $query))
		{
			echo "Data Updated Successfully";
		}
		else
		{
			echo "Something Went Wrong!!!";
		}
	}
}
?>