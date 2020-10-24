<?php
	class allsongs {
		private $con;

		public function __construct($con) {
			$this->con = $con;
		}
		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT id FROM songs ORDER BY RAND() LIMIT 30");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}
	}
?>