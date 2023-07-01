<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Alternative;
use Illuminate\Pagination\Paginator;

class DashboardController extends Controller
{
    public function weighted()
    {
        $alternatives = Alternative::all();
        $costs = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'C11', 'C12'];
        $benefits = ['C13', 'C14', 'C15', 'C16', 'C17', 'C18', 'C19','C20'];
        $criterias = ['C1','C2','C3','C4','C5','C6','C7', 'C8', 'C9', 'C10', 'C11', 'C12', 'C13', 'C14', 'C15', 'C16', 'C17', 'C18', 'C19', 'C20' ];

        $minCriteria = [];
        $maxCriteria = [];
        $maxMinDiff = [];
        $minMaxDiff = [];

        foreach( $benefits as $benefit)
        {
            $minCriteria[$benefit] = $alternatives->min($benefit); //nilai Xj Worst benefit
            $maxMinDiff[$benefit] = $alternatives->max($benefit) - $minCriteria[$benefit]; // Xj best - Xj Worst benefit
        }

        foreach ($costs as $cost)
        {
            $maxCriteria[$cost] = $alternatives->max($cost); // nilai Xj worst cost
            $minMaxDiff[$cost] = $alternatives->min($cost) - $maxCriteria[$cost]; // Xj best - Xj worst benefit
        }

        $allData = [];

        foreach ($alternatives as $alternative) {
            foreach ($benefits as $benefit) {
                $alternative->$benefit = ($alternative->$benefit - $minCriteria[$benefit]) / $maxMinDiff[$benefit];
            }
            foreach ($costs as $cost) {
                $alternative->$cost = ($alternative->$cost - $maxCriteria[$cost]) / $minMaxDiff[$cost];
            }
            $allData[] = $alternative;
        }

        //Standard Deviasi

        $stdDev = [];

        foreach ($criterias as $criteria) {
            $val = [];
            foreach( $allData as $alternative) {
                $val[] = $alternative->$criteria;
            }
            $stdDev[] = $this->calculateSD($val);
        }

        // dd($stdDev);

        $data = [];
        foreach ($criterias as $criteria) {
            $temp = [];
            foreach ($allData as $alternative) {
                $temp[] = $alternative->$criteria;
            }

                $data[] = $temp;
        }

        $correlationMatrix = $this->calculateCorrelation($data);
        $tolerance = 1e-10;

        //Index Koefisien Korelasi
        foreach ($correlationMatrix as &$row) {
            foreach ($row as &$value) {
                $value = abs(1 - $value) < $tolerance ? 0 : 1 - $value;
            }
        }

        /// Koefisien Pengaruh Bobot
            //Menjumlahkan hasil dari index koefisien korelasi secara horizontal
            $sum = array_map(function($num) {
                return array_sum($num);
            }, $correlationMatrix);
            //Operasi perkalian dengan standar deviasi
            $Cj = [];
            if(count($stdDev) === count($sum)) {
                $length = count($stdDev);
                for($i = 0; $i < $length; $i++) {
                    $Cj[] = $stdDev[$i] * $sum[$i];
                }
            }else {
                echo "Panjang array tidak sama";
            }
        ///

        /// Menghitung bobotnya
        $sumCj = array_sum($Cj);
        $W = [];
        for($i = 0; $i < count($Cj); $i++) {
            $W[] = $Cj[$i] / $sumCj;
        }

        return $W;

    }
   
    public function calculateSD($data) 
    {
        //Perhitungan Standar Deviasi dengan Sample Standar Deviasi
        $count = count($data);
        $mean = array_sum($data) / $count;
        // dd($mean);
        $sumSquared = 0;

        foreach($data as $val)
        {
            $sumSquared += ($val - $mean) ** 2;
        }
        $variance = $sumSquared / (count($data) - 1) ;
        $stdDev = sqrt($variance);
        
        return $stdDev;
        // dd($stdDev);    
    }

    public function calculateCorrelation($data)
    {
        $correlations = [];

        for ($i = 0; $i < count($data); $i++) {
            $correlations[$i] = [];

            for ($j = 0; $j < count($data); $j++) {
                $correlations[$i][$j] = $this->correlationCoefficient($data[$i], $data[$j]);
            }
        }
        
        return $correlations;
    }

    public function correlationCoefficient($x, $y)
    {
        $n = count($x);

        $meanX = array_sum($x) / $n;
        $meanY = array_sum($y) / $n;

        $numerator = 0;
        $denominatorX = 0;
        $denominatorY = 0;

        for ($i = 0; $i < $n; $i++) {
            $numerator += ($x[$i] - $meanX) * ($y[$i] - $meanY);
            $denominatorX += pow(($x[$i] - $meanX), 2);
            $denominatorY += pow(($y[$i] - $meanY), 2);
        }

        $denominator = sqrt($denominatorX) * sqrt($denominatorY);

        if ($denominator != 0) {
            $correlation = $numerator / $denominator;
        } else {
            $correlation = 0; 
        }

        return $correlation;
    }

    public function calculate() {

        ///Tahapan COPRAS-ARAS
        $alternatives = Alternative::all();

        // dd($alternatives);
        $costs = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'C11', 'C12'];
        $benefits = ['C13', 'C14', 'C15', 'C16', 'C17', 'C18', 'C19','C20'];
        $criterias = ['C1','C2','C3','C4','C5','C6','C7', 'C8', 'C9', 'C10', 'C11', 'C12', 'C13', 'C14', 'C15', 'C16', 'C17', 'C18', 'C19', 'C20' ];

        
        foreach( $benefits as $benefit)
        {
            $valBenefit[] = $alternatives->max($benefit);
            
        }

        foreach ($costs as $cost)
        {
            $valCost[] = $alternatives->min($cost);
        }

        // dd($valCost);

        $mapOnlyCriteria = $alternatives->map(function ($alternative) {
            return [
                'C1' => $alternative->C1,
                'C2' => $alternative->C2,
                'C3' => $alternative->C3,
                'C4' => $alternative->C4,
                'C5' => $alternative->C5,
                'C6' => $alternative->C6,
                'C7' => $alternative->C7,
                'C8' => $alternative->C8,
                'C9' => $alternative->C9,
                'C10' => $alternative->C10,
                'C11' => $alternative->C11,
                'C12' => $alternative->C12,
                'C13' => $alternative->C13,
                'C14' => $alternative->C14,
                'C15' => $alternative->C15,
                'C16' => $alternative->C16,
                'C17' => $alternative->C17,
                'C18' => $alternative->C18,
                'C19' => $alternative->C19,
                'C20' => $alternative->C20,
            ];
        });

        $mergeOptimum = array_merge($valCost, $valBenefit);

        $sumArray = array_fill(0, 20, 0);
        foreach ($mapOnlyCriteria as $criteria) {
          
            for ($i = 1; $i <= 20; $i++) {
                $property = 'C' . $i;
                $sumArray[$i-1] += $criteria[$property];
            }
        }

        $sumArraywithOpt = [];

        for ($i = 0; $i < count($sumArray); $i++) {
            $sumArraywithOpt[$i] = $sumArray[$i] + $mergeOptimum[$i];
        }
        // dd($sumArraywithOpt);

        $Normalization = [];
        foreach ($mapOnlyCriteria as $criteria) {
            $dividedCriteria = [];

            foreach ($criteria as $key => $value) {
                $property = substr($key, 1); // Menghapus huruf "C" dari nama properti
                $dividedCriteria[] = $value / $sumArraywithOpt[$property - 1];
            }

            $Normalization[] = $dividedCriteria;
        }

        // dd($Normalization);

        $NormalizationOpt= [];

        for ($i = 0; $i < count($mergeOptimum); $i++) {
            $NormalizationOpt[$i] = $mergeOptimum[$i] / $sumArraywithOpt[$i];
        }

        // dd($NormalizationOpt);
        
        $W = $this->weighted();
        // dd($W);

        $WeightedMatrix = [];

        for ($i = 0; $i < count($Normalization); $i++) {
            $row = $Normalization[$i];
            $rowresult = [];

            for ($j = 0; $j < count($row); $j++) {
                $result = $row[$j] * $W[$j];
                $rowresult[] = $result;
            }
            $WeightedMatrix[] = $rowresult;

        }
        // dd($WeightedMatrix);

        $WeightedMatrixforOptVal = [];
        for ($i = 0; $i < count($NormalizationOpt); $i++) {
            $resultOpt = $NormalizationOpt[$i] * $W[$i];
            $WeightedMatrixforOptVal[] = $resultOpt;
        }
        
        array_unshift($WeightedMatrix, $WeightedMatrixforOptVal);
       
         //S-1
        $Smin1Val = [];
        foreach ($WeightedMatrix as $row) {
            $splicearraymin = array_slice($row, 0, 12);
            $Smin1Val[] = array_sum($splicearraymin);
        }

         //S+1 
        $Splus1Val = [];
        foreach ($WeightedMatrix as $row) {
            $splicearrayplus = array_slice($row, 12, 8);
            $Splus1Val[] = array_sum($splicearrayplus);
        } 

        //S-1 min
        $Smin1min =  min($Smin1Val);
        // dd($Smin1min);

        //S-1 min / S-1 [];
        $hasil = [];
        foreach ($Smin1Val as $element) {
            $divide = $Smin1min / $element;
            $hasil[] = $divide;
        }

        //Sum S-1 min / S-1 [];
        $sumPenyebut = array_sum($hasil);

        //Sum S-1
        $hasilSum = array_sum($Smin1Val);

        //Pembilang
        $pembilang = $Smin1min * $hasilSum;

        //Penyebut
        $penyebut = [];
        foreach($Smin1Val as $v) {
            $multiply = $v * $sumPenyebut;
            $penyebut[] = $multiply;
        }

        //Pembagian
        $resultDivided = [];
        foreach ($penyebut as $hasilpenyebut) {
            $divide = $pembilang / $hasilpenyebut;
            $resultDivided[] = $divide;
        }
       
        //Qi
        $Qi = array_map(function ($a, $b) {
            return $a + $b;
        }, $Splus1Val, $resultDivided);
        
        $R0 = $Qi[0];

        array_shift($Qi);
        
  
        foreach ($Qi as $Qvalue) {
            $multiple = $Qvalue / $R0;
            $K[] = $multiple;
        }

        // dd($alternatives);
        $alternativesArray = $alternatives->toArray();
       
        $alternativeValues = array_column($alternativesArray, 'alternative_name');
        // dd($alternativeValues);

        array_multisort($K, SORT_DESC, $alternativeValues, $alternativesArray);
        $rankedAlternatives = [];
        foreach ($K as $index => $val) {
            $alternative = $alternativesArray[$index];
            $alternative['score'] = $val;
            $rankedAlternatives[] = $alternative;
        }
        
        usort($rankedAlternatives, function ($a, $b) {
            return $b['score'] - $a['score'];
        });

        $ranking = 1;
        foreach ($rankedAlternatives as &$alternative) {
            $alternative['rank'] = $ranking;
            $ranking++;
        }
        // Menentukan jumlah item per halaman
        $perPage = 4;

        // Membuat instance Paginator
        $rankedAlternatives = new Paginator($rankedAlternatives, $perPage);

        return view('pages.dashboard.ranking', [
            'items' => $rankedAlternatives
        ]); 

    }
}
