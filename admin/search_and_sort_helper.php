<?php

	extract($_POST);
	extract($_GET);

	$datas = $database->select("registration", "*");

	// clear search history session
	if(isset($clear)){
		$_SESSION['isSearch'] = false;
		$_SESSION['searchType'] = "";
		$_SESSION['searchValue'] = "";
	}
	
	
	// filter by search. search all data which is not sort
	if(isset($searchValue)&&isset($searchType)){
		$datas = $database->select("registration", "*",[$searchType."[~]" => $searchValue]);
		$_SESSION['isSearch'] = true;
		$_SESSION['searchType'] = "$searchType";
		$_SESSION['searchValue'] = "$searchValue";
	}

	//sort by student id and search
	if(isset($sortByStudentID)&&$_SESSION['isSearch']){
		//order by grater value
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "studentID DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		//order by less value
		else{
			$datas = $database->select("registration", "*",[
						$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
						"ORDER" => "studentID "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}
	else if(isset($sortByfirstname)&&$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "firstname DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "firstname "]);
			$_SESSION['greatOrderFirst'] = true;
		}

	}
	else if(isset($sortBylastname)&&$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "lastname DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "lastname "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}
	else if(isset($sortByDepartment)&&$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "department DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "department "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}
	else if(isset($sortByGPA)&&$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "GPA DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "GPA "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}
	else if(isset($sortByAcademicyear)&&$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "academicYear DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "academicYear"]);
			$_SESSION['greatOrderFirst'] = true;
		}
	}

	else if(isset($sortByYear)&&$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "year DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",[
				$_SESSION['searchType']."[~]" => $_SESSION['searchValue'],
				"ORDER" => "year"]);
			$_SESSION['greatOrderFirst'] = true;
		}
	}

	//###########################################################################################
	//###########################################################################################

	if(isset($sortByStudentID)&&!$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",["ORDER" => "studentID DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",["ORDER" => "studentID"]);
			$_SESSION['greatOrderFirst'] = true;
		}		
	}
	else if(isset($sortByfirstname)&&!$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",["ORDER" => "firstname DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",["ORDER" => "firstname "]);
			$_SESSION['greatOrderFirst'] = true;
		}

	}
	else if(isset($sortBylastname)&&!$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",["ORDER" => "lastname DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",["ORDER" => "lastname "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}
	else if(isset($sortByDepartment)&&!$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",["ORDER" => "department DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",["ORDER" => "department "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}
	else if(isset($sortByGPA)&&!$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",["ORDER" => "GPA DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",["ORDER" => "GPA "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}
	else if(isset($sortByAcademicyear)&&!$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",["ORDER" => "academicYear DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",["ORDER" => "academicYear "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}

	else if(isset($sortByYear)&&!$_SESSION['isSearch']){
		if($_SESSION['greatOrderFirst']){
			$datas = $database->select("registration", "*",["ORDER" => "year DESC"]);
			$_SESSION['greatOrderFirst'] = false;
		}
		else{
			$datas = $database->select("registration", "*",["ORDER" => "year "]);
			$_SESSION['greatOrderFirst'] = true;
		}
		
	}


    function url(){
	  return sprintf(
	    "%s://%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME']
	  );
	}
?>