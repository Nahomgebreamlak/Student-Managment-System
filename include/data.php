<?php 
	require 'DbConnect.php';

	if(isset($_POST['aid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM department WHERE  facultyname= '" . $_POST['aid'] ."'");
		$stmt->execute();
		$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($books);
	}


if(isset($_POST['dep'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM course WHERE  Department= '" . $_POST['dep'] ."'");
		$stmt->execute();
		$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($books);
	}








	function loadAuthors() {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM faculty");
		$stmt->execute();
		$authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $authors;
	}

 ?>