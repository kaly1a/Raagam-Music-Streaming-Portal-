<?php
	class userid {
		private $con;

		public function __construct($con) {
			$this->con = $con;
		}

		public function getID() {
			$query = mysqli_query($this->con, "SELECT id FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			return $row['id'];
		}

	}
?>