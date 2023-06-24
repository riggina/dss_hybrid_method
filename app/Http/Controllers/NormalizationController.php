<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;

class NormalizationController extends Controller
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
            $correlation = 0; // Handle division by zero error
        }

        return $correlation;
    }

    public function hybrid() {

        ///Tahapan COPRAS-ARAS
        $alternatives = Alternative::all();
        $costs = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'C11', 'C12'];
        $benefits = ['C13', 'C14', 'C15', 'C16', 'C17', 'C18', 'C19','C20'];
        $criterias = ['C1','C2','C3','C4','C5','C6','C7', 'C8', 'C9', 'C10', 'C11', 'C12', 'C13', 'C14', 'C15', 'C16', 'C17', 'C18', 'C19', 'C20' ];

        $sumArray = array_fill(0, count($costs), 0);

        // Menghitung penjumlahan vertikal
        foreach ($alternatives as $alternative) {
            for ($i = 0; $i < count($costs); $i++) {
                $cost = $costs[$i];
                $sumArray[$i] += $alternative->$cost;
            }
            for ($i = 0; $i < count($benefits); $i++) {
                $benefit = $benefits[$i];
                $sumArray[$i] += $alternative->$benefit;

            }
        }

        $Normalization = [];
        foreach ($alternatives as $alternative) {
            $dividedValues = [];
            for ($i = 0; $i < count($costs); $i++) {
                $cost = $costs[$i];
                $dividedValues[] = $alternative->$cost / $sumArray[$i];
            }
            for ($i = 0; $i < count($benefits); $i++) {
                $benefit = ($benefits[$i]);
                $dividedValues[] =  $alternative->$benefit / $sumArray[$i];
            }
            $Normalization[] = $dividedValues;
        }
        
        $W = $this->weighted();

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

        dd($WeightedMatrix);



        // foreach ($costs as $cost) {
        //     $sum[$cost] += $alternatives->$cost;
        // }

        // foreach($benefits as $benefit) {
        //     $sum[$benefit] = 0;
        // }

        // foreach( $alternatives as $alternative) {
        //     foreach($costs as $cost) {
        //         $alternative->$cost = $alternative->$cost / $sum[$cost];
        //     }
        //     // foreach($benefits as $benefit) {
        //     //     $sum[$benefit] += $alternative->$benefit;
        //     // }
        // }

        // dd($dividedArray);
    }

}
