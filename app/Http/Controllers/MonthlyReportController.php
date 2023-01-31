<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;

class MonthlyReportController extends Controller
{
    public function index(Request $request){
        
        $from    = Carbon::parse(sprintf(
            '%s-%s-01',
            $request->query('y', Carbon::now()->year),
            $request->query('m', Carbon::now()->month)
        ));

        $to      = clone $from;
        $to->day = $to->daysInMonth;

        $exp_total = Expense::where('user_id',Auth::user()->id)
            ->whereBetween('date', [$from, $to])->sum('amount');

        $inc_total = Income::where('user_id',Auth::user()->id)
            ->whereBetween('date', [$from, $to])->sum('amount');
        $profit    = $inc_total - $exp_total;

        return view('monthly',compact('exp_total','inc_total','profit'));
    }
}
