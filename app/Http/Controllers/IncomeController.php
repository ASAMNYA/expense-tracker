<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Income;

class IncomeController extends Controller
{
    public function index(){
        $incomedata=Income::where('user_id',Auth::user()->id)->get();
        return view('income.index',compact('incomedata'));
    }

    public function create(){
        return view('income.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required|date',
            'title'=>'required|min:3',
            'amount'=>'required'
        ]); 
        $data =[
            'title'=> $request->title,
            'date'=> $request->date,
            'amount'=> $request->amount,
            'user_id'=> Auth::user()->id,
        ];
        $model= Income::create($data);
        return redirect('income')->withSuccess('Income Stored Successful');
    }

    public function edit($id){
        $incomedata = Income::findorFail($id);
        return view('income.edit',compact('incomedata'));
    }

    public function update(Request $request, $id){
        
        $postData=$request->validate([
            'date'=>'required|date',
            'title'=>'required|min:3',
            'amount'=>'required'
        ]); 
    
        $incomedata=Income::find($id);
        $incomedata->fill($postData);
        $incomedata->save();
        return redirect()->route('income');
    }

    public function delete($id){
        $incomedata=Income::find($id);
        
        $incomedata->delete();
        return redirect()->route('income');
    }
}
