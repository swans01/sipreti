<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataHamaPeriode;

class PrediksiControllerPeriode extends Controller{

private $dataLatih=array();

private $dataUji=array();


//Cari min max dan Range
private $dataGabung;
private $maxData;
private $minData;
private $rangeData;
private $DELTA;
private $LAMBDA;
// $dataGabung=array_merge($dataLatih,$dataUji);
// $maxData= hitungMaxArray($this->dataGabung);
// $minData= hitungMinArray($this->dataGabung);
// $rangeData=$this->maxData-$this->minData;

public function coba(Request $request){
	$DataHama = DataHamaPeriode::all();
	$hama = $request['hama'];
	$suhu = "Suhu Rata Rata";
	$inputSuhu = $request['inputSuhu'];
	$inputCuaca = $request['inputCurah'];
	$inputKelembapan = $request['inputKelembapan'];
	array_push($this->dataUji, array($inputSuhu,$inputCuaca ,$inputKelembapan ));

	print_r($this->dataUji);

}

public function hitung(Request $request){
	$DataHama = DataHamaPeriode::all();
	$hama = $request['hama'];
	$suhu = "Suhu Rata Rata";
	$kelembapan = "Kelembapan";
	$curahHujan = "Curah Hujan";
	foreach ($DataHama as $data){
		array_push($this->dataLatih, array((float)$data->$suhu, (float)$data->$kelembapan, (float)$data->$curahHujan, (float)$data->$hama));
	}

	array_push($this->dataUji, array((float)$request['inputSuhu'],(float)$request['inputCurah'] ,(float)$request['inputKelembapan'] ));
//PROSES TRAINING
//Inisialisasi Parameter data
//Cari min max dan Range
$this->dataGabung=array_merge($this->dataLatih,$this->dataUji);
$this->maxData= $this->hitungMaxArray($this->dataGabung);
$this->minData= $this->hitungMinArray($this->dataGabung);
$this->rangeData=$this->maxData-$this->minData;
$this->LAMBDA=0.1;
$C= 100;
$EPSILON= 0.00001;
$CLR = 0.01;
$this->DELTA= 0.1;
$dataGabungNorm=$this->normalisasi($this->dataGabung);
$dataDistance=$this->distance($dataGabungNorm);
$dataKernelRBF=$this->kernelRBF($dataDistance);
$dataMatriksHessian=$this->matriksHessian($dataKernelRBF);
$GAMMA=$CLR/$this->hitungMaxArray($dataMatriksHessian);

//Inisialisasi nilai lagrange multiplier dan nilai lagrange
$ALPHAiMult=array();
$ALPHAi=array();
$AMminA=array(); // nilai lagrange multiplier dikurang nilai lagrange
$Ei=array();
$DELTA_ALPHAiMult=array();
$DELTA_ALPHAi=array();
for ($i=0; $i <count($this->dataLatih) ; $i++) { 
	$ALPHAiMult[]=0;
	$ALPHAi[]=0;
	$AMminA[]=$ALPHAiMult[$i]-$ALPHAi[$i];
}

//Sequensial learning
$iterasiMax=20;
$iterasi=0;
$Temp=array();
do{
	$Temp=$AMminA;
	
	$Ei=array();
	$DELTA_ALPHAiMult=array();
	$DELTA_ALPHAi=array();
	for ($i=0; $i < count($this->dataLatih); $i++) { 
		$Ei[]=$dataGabungNorm[$i][3]-$this->sumProduct($AMminA,$dataMatriksHessian[$i]);
		$DELTA_ALPHAiMult[]=min(max($GAMMA*($Ei[$i]-$EPSILON),-$ALPHAiMult[$i]),($C-$ALPHAiMult[$i]));
		$DELTA_ALPHAi[]=min(max($GAMMA*(-$Ei[$i]-$EPSILON),-$ALPHAi[$i]),($C-$ALPHAi[$i]));
	}

	for ($i=0; $i < count($this->dataLatih); $i++) { 
	 	$ALPHAiMult[$i]=$ALPHAiMult[$i]+$DELTA_ALPHAiMult[$i];
		$ALPHAi[$i]=$ALPHAi[$i]+$DELTA_ALPHAi[$i];
		$AMminA[$i]=$ALPHAiMult[$i]-$ALPHAi[$i];
	} 

	//Situasi berhenti
	if ((max($this->nilaiMutlak($DELTA_ALPHAiMult))<$EPSILON) && (max(nilaiMutlak($DELTA_ALPHAi))<$EPSILON) ) {
		echo "berhenti";
		break;
	}
	$iterasi++;
}while($iterasi<$iterasiMax);


//Hitung Fungsi Regresi Data Latih
$fxDataLatih=array();
$fxDataLatihDeNorm=array();
for ($i=0; $i <count($this->dataLatih) ; $i++) { 
	$fxDataLatih[]=$this->sumProduct($AMminA,$dataMatriksHessian[$i]);	
}
$fxDataLatihDeNorm=$this->deNormalisasi($fxDataLatih);

// echo $iterasi."</br>";
// echo $fxDataLatihDeNorm[0]."</br>";

//Hitung Regresi Data Uji
$fxDataUji=array();
$fxDataUjiDeNorm=array();
for ($i=count($this->dataLatih); $i <count($dataGabungNorm) ; $i++) { 
	$fxDataUji[]=$this->sumProduct($AMminA,$dataMatriksHessian[$i]);	
}
$fxDataUjiDeNorm=$this->deNormalisasi($fxDataUji);
return redirect()->back()->with(['hasil' => round($fxDataUjiDeNorm[0]), 'hama' => $hama, 'suhu' => $request['inputSuhu'], 'curah' => $request['inputCurah'], 'kelembapan' => $request['inputKelembapan']]);
// echo $iterasi."</br>";
// echo $fxDataUjiDeNorm[0]."</br>";

}


//FUNGSI
//Hitung Nilai Maksimum dari array multidimensi
function hitungMaxArray($dataArray){
	$maxData= max($dataArray[0]);
	foreach ($dataArray as $data) {
		if (max($data)>= $maxData) {
			$maxData=max($data);
		}
	}
	return $maxData;
}

//Hitung NIlai Minimun dari array multidimensi
function hitungMinArray($dataArray){
	$minData= min($dataArray[0]);
	foreach ($dataArray as $data) {
		if (min($data)<= $minData) {
			$minData=min($data);
		}
	}
	return $minData;
}


//hitung hasil penjumlahan dari perkalian elemen di array
function sumProduct($array1, $array2){
	$sumProduct=0;
	for ($i=0; $i <count($array1) ; $i++) { 
		$sumProduct=$sumProduct+($array1[$i]*$array2[$i]);
	}
	return $sumProduct;
}

//nilai mutlak untuk array
function nilaiMutlak($dataArray){
	$nilaiMutlak=array();
	foreach ($dataArray as $nilai) {
		$nilaiMutlak[]=abs($nilai);
	}
	return $nilaiMutlak;
}


//Fungsi normalisasi data
function normalisasi ($dataArray){
	//global $minData, $rangeData;
	$dataNorm=array();
	foreach ($dataArray as $baris) {
		$norm=array();
		foreach ($baris as $kolom) {
			$norm[]=($kolom-$this->minData)/$this->rangeData;
		}
		$dataNorm[]=$norm;
	}
	return $dataNorm;
}    

//Fungsi De Normalisa Data
function deNormalisasi ($dataArray){
	//global $minData, $rangeData;
	$dataDeNorm=array();
	foreach ($dataArray as $kolom) {
		$dataDeNorm[]=($kolom*$this->rangeData)+$this->minData;
	}
	return $dataDeNorm;
}

//Menghitung Jarak Antar Data
function distance($dataArray){
	//global $dataLatih;
	$dataDistance=array();
	for ($i=0; $i <count($dataArray) ; $i++) {
		$kolom=array(); 
		for ($j=0; $j <count($this->dataLatih) ; $j++) { 
			$distance=0;
			for ($k=0; $k <3 ; $k++) { 
				$distance=$distance+pow(($dataArray[$i][$k]-$dataArray[$j][$k]), 2);
			}
			$kolom[]=$distance;
		}
		$dataDistance[]=$kolom;
	}
	return $dataDistance;
}


//Menghitung KERNEL RBF
function kernelRBF($dataArray){
	//global $DELTA;
	$dataKernelRBF=array();
	foreach ($dataArray as $baris) {
		$kernelRBF = array();
		foreach ($baris as $kolom) {
			$kernelRBF[]=exp(-($kolom/(2*($this->DELTA*$this->DELTA))));
		}
		$dataKernelRBF[]=$kernelRBF;
	}
	return $dataKernelRBF;
}


//Menghitung Matriks Hessian
function matriksHessian($dataArray){
	//global $LAMBDA;
	$dataMatriksHessian=array();
	foreach ($dataArray as $baris) {
		$matriksHessian = array();
		foreach ($baris as $kolom) {
			$matriksHessian[]=$kolom+pow($this->LAMBDA, 2);
		}
		$dataMatriksHessian[]=$matriksHessian;
	}
	return $dataMatriksHessian;
}
}

//$test = new prediksi();
//$test->hitung();

?>