<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(){
        $expensedata=Expense::where('user_id',Auth::user()->id)->get();
        return view('expense.index',compact('expensedata'));
    }

    public function create(){
        return view('expense.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required|date',
            'title'=>'required|min:3',
            'amount'=>'required',
        ]); 
        $data =[
            'title'=> $request->title,
            'date'=> $request->date,
            'amount'=> $request->amount,
            'user_id'=> Auth::user()->id,
            'remarks'=> $request->remarks,
        ];
        $model= Expense::create($data);
        return redirect('expense')->withSuccess('Expense Stored Successful');
    }

    public function edit($id){
        $expensedata = Expense::findorFail($id);
        return view('expense.edit',compact('expensedata'));
    }

    public function update(Request $request, $id){
        
        $postData=$request->validate([
            'date'=>'required|date',
            'title'=>'required|min:3',
            'amount'=>'required'
        ]); 
    
        $expensedata=Expense::find($id);
        $expensedata->fill($postData);
        $expensedata->save();
        return redirect()->route('expense');
    }

    public function delete($id){
        $expensedata=Expense::find($id);
        
        $expensedata->delete();
        return redirect()->route('expense');
    }
}
