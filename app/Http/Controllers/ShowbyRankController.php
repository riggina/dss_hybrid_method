<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Hybrid;

class ShowbyRankController extends Controller
{
    use Hybrid;

    public function showbyrankhome()
    {
        $rankedAlternatives = $this->hybrid();
        $ranking = 1;
        foreach ($rankedAlternatives as &$alternative) {
            $alternative['rank'] = $ranking;
            $ranking++;
        }
        return view('pages.filterresult', [
            'items' => $rankedAlternatives
        ]);
    }

    public function showbyrankdashboard()
    {
        $rankedAlternatives = $this->hybrid();
        $ranking = 1;
        foreach ($rankedAlternatives as &$alternative) {
            $alternative['rank'] = $ranking;
            $ranking++;
        }
        return view('pages.dashboard.ranking', [
            'items' => $rankedAlternatives
        ]);
    }

}
