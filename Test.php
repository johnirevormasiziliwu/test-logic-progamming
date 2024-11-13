<?php

/*
# Test PHP - Programmer [Qhomemart] #

Task :
1. Isikan proses di dalam fungsi mergeSortArray() untuk menyatukan array int a dan array int b. Lalu setelah itu di sort secara ascending.
2. Isikan proses di dalam fungsi getMissingData() untuk mencari integer yang hilang berdasarkan pola angka dari hasil fungsi mergeSortArray().
3. Isikan proses di dalam fungsi insertMissingData() untuk memasukkan integer yang hilang dari hasil fungsi getMissingData() ke dalam array hasil fungsi mergeSortArray().
4. Hasil yang diharapkan adalah pola angka yang tersusun tanpa ada integer yang hilang.

Syarat :
1. Tidak menggunakan fungsi bawaan PHP seperti 
	a. array_merge()
	b. array_push()
	c. asort()
	d. dsb.
2. Kerjakan menggunakan logic pemograman anda sendiri

Selamat Mengerjakan
*/

class Test {
	function mergeSortArray($a, $b) {
		
			$mergedArray = [];
			for ($i = 0; $i < count($a); $i++) {
					$mergedArray[] = $a[$i];
			}
			for ($j = 0; $j < count($b); $j++) {
					$mergedArray[] = $b[$j];
			}

		
			for ($i = 0; $i < count($mergedArray) - 1; $i++) {
					for ($j = $i + 1; $j < count($mergedArray); $j++) {
							if ($mergedArray[$i] > $mergedArray[$j]) {
									$temp = $mergedArray[$i];
									$mergedArray[$i] = $mergedArray[$j];
									$mergedArray[$j] = $temp;
							}
					}
			}
			
			return $mergedArray;
	}

	function getMissingData($array) {
			$missingData = [];
			for ($i = 0; $i < count($array) - 1; $i++) {
					$diff = $array[$i + 1] - $array[$i];
					if ($diff > 1) {
							for ($j = 1; $j < $diff; $j++) {
									$missingData[] = $array[$i] + $j;
							}
					}
			}
			return $missingData;
	}

	function insertMissingData($array, $missingData) {
			$result = [];
			$missingIndex = 0;
			$arrayIndex = 0;

			
			while ($arrayIndex < count($array) || $missingIndex < count($missingData)) {
					if ($missingIndex < count($missingData) && ($arrayIndex == count($array) || $missingData[$missingIndex] < $array[$arrayIndex])) {
							$result[] = $missingData[$missingIndex];
							$missingIndex++;
					} else {
							$result[] = $array[$arrayIndex];
							$arrayIndex++;
					}
			}

			return $result;
	}

	public function main() {
			$a = array(11, 36, 65, 135, 98);
			$b = array();
			$b[0] = 81;
			$b[1] = 23;
			$b[2] = 50;
			$b[3] = 155;

			$c = $this->mergeSortArray($a, $b);
			$i = $this->getMissingData($c);
			$d = $this->insertMissingData($c, $i);

			for ($x = 0; $x < count($d); $x++) {
					echo $d[$x] . " ";
			}
	}
}

$t = new Test();
$t->main();
?>
