<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contacts</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.woff">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/angular.js"></script>
</head>
<body>
	<div class="container">

		<!-- Header -->
		<div class="row">
			<div class="col-sm-6">
			<h3>Employeer Contact Details</h3>
			</div>
			<div class="col-sm-6">
				<ul class="list-inline pull-right">
	                <li>
	                    <a href="http://www.dice.com/"><img class="icon" src="icons/dice.png"></a>
	                </li>
	                <li>
	                    <a href="https://www.indeed.com/"><img class="icon" src="icons/indeed.png"></a>
	                </li>
	                <li>
	                    <a href="https://login20.monster.com/Login/SignIn?ch=MONS&redirect=http%3a%2f%2fhomepage.monster.com%2f"><img class="icon" src="icons/monster.png"></a>
	                </li>
	            </ul>
			</div>
		</div>
		<!-- /Header -->
		<!-- Form -->
		<div class="row">
		<div ng-app="myApp" ng-controller="UserController" ng-init="displayData()">
			<form name="details" class="well form-horizontal col-sm-8" novalidate>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-3">Name</label>
					<div class="col-sm-6 has-feedback">
					<input type="text" name="Name" ng-model="name" class="form-control" placeholder="Employeer Name" ng-required="true">
					<span ng-show="details.Name.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-3">Email</label>
					<div class="col-sm-6 has-feedback">
					<input type="email" name="Email" ng-model="email" class="form-control" placeholder="example@emial.com" ng-required="true">
					<span ng-show="details.Email.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-3">Telephone</label>
					<div class="col-sm-6 has-feedback">
					<input type="text" name="Tel" ng-model="telephone" class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd" placeholder="xxx-xxx-xxxx" ng-required="true">
					<span ng-show="details.Tel.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-3">Company</label>
					<div class="col-sm-6 has-feedback">
					<input type="text" name="Company" ng-model="company" class="form-control" placeholder="Company Name" ng-required="true">
					<span ng-show="details.Company.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-3">Date Applied</label>
					<div class="col-sm-6 has-feedback">
					<input type="text" name="Date" ng-model="date" class="form-control" placeholder="YYYY-MM-DD" ng-required="true">
					<span ng-show="details.Date.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-3">Experience</label>
					<div class="col-sm-6 has-feedback">
					<input type="number" name="Year" ng-model="year" class="form-control" placeholder="Experience" ng-required="true">
					<span ng-show="details.Year.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group">
					<input type="hidden" ng-model="ID">
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Submit Data</label>
					<div class="col-sm-4">
					<input type="submit" name="btnInsert" ng-model="date" class="btn btn-info" ng-click="insertData()" value="{{btnName}}" ng-disabled="details.$invalid">
					</div>
				</div>
			</form>
			<div class="well col-sm-3 col-sm-offset-1 news content">
				<?php
					echo '<div class="row">';
					$xml=simplexml_load_file("http://www.indiaglitz.com/channels/telugu/rss/news-rss.xml");
					echo '<ul class="list-group">';
					echo '<h2>'.'Latest News'.'</h2>';
					foreach ($xml->channel->item as $itm) {
						$title = $itm->title;
						$description= $itm->description;
						$date = $itm->pubDate;
						echo '<li class="list-group-item">'.$title.'</li>';
						echo '<p>'.$description.'</p>';
						echo '<p>'.$date.'</p>';
						echo '<hr>';
					}
					echo '</ul>';
					echo '</div>';
				?>
			</div>
			<!-- /form -->
			<!-- Search Fields -->
			<div class="row content">
				<div class="col-sm-4">
					<label>Employeer Name</label>
					<p><input type="text" class="form-control" ng-model="employeename"></p>
				</div>
				<div class="col-sm-4">
					<label>Date Added</label>
					<p><input type="text" class="form-control" ng-model="dateadded"></p>
				</div>
			</div>
		
			<div class="row col-sm-12">
				<table class="table table-responsive">	    
				      <tr>
				        <th>Employeer Name</th>
				        <th>Email</th>
				        <th>Telephone</th>
				        <th>Company</th>
				        <th>Date Applied</th>
				        <th>Experience</th>
				        <th>Update</th>
				        <th>Delete</th>
				      </tr>
				    
				    
				      <tr ng-repeat="x in names | filter:{Name:employeename, Date:dateadded}">
				        <td>{{x.Name}}</td>
				        <td>{{x.Email}}</td>
				        <td>{{x.Tel}}</td>
				        <td>{{x.Company}}</td>
				        <td>{{x.Date}}</td>
				        <td>{{x.Year}}</td>
				        <td><button ng-click="updateData(x.ID, x.Name, x.Emial, x.Tel, x.Company, x.Date, x.Year)" class="glyphicon glyphicon-pencil btn btn-success btn-xs"></button></td>
						<td><button ng-click="deleteData(x.ID)" class="glyphicon glyphicon-remove btn btn-danger btn-xs"></button></td>
				      </tr>
				</table>
			</div>
		</div>
	</div>
<script src="js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/bootstrap-formhelpers.js"></script>
<script>
var app = angular.module('myApp',[]);

app.controller('UserController', function($scope, $http){
	$scope.btnName = "Add Data";
	$scope.insertData = function(){
		$http.post(
				"insert.php",
				{
					'name':$scope.name,
					'email':$scope.email,
					'telephone':$scope.telephone,
					'company':$scope.company,
					'date':$scope.date,
					// 'year':$scope.year,
					'btnName':$scope.btnName,
					'ID':$scope.ID
				}
			).success(function(data){
				$scope.name = null;
				$scope.email = null;
				$scope.telephone = null;
				$scope.company = null;
				$scope.date = null;
				$scope.year = null;
				$scope.displayData();
			});
	}
	$scope.displayData = function(){
		$http.get("select.php")
		.success(function(data){
			$scope.names = data;
			// $scope.names = (JSON.stringify(data));
		});
	}
	$scope.updateData = function(ID, Name, Email, Tel, Company, Date, Year){
				$scope.ID = ID;
				$scope.name = Name;
				$scope.email = Email;
				$scope.telephone = Tel;
				$scope.company = Company;
				$scope.date = Date;
				$scope.year = Year;
				$scope.btnName = "Update Data";
	}
	$scope.deleteData = function(ID){
		if(confirm("Are you sure you want to delete data?"))
		{
			$http.post("delete.php", {'ID':ID})
			.success(function(data){
				alert(data);
				$scope.displayData();
			});
		}
		else
		{
			return false;
		}
	}
});
</script>
</body>
</html>