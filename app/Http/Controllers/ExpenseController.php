<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(){
        return view('expense.index');
    }

    public function create(){
        return view('expense.create');
    }

    public function store()
    {
        // store all
        return redirect('expense.index');
    }

    public function edit(){
        return view('expense.edit');
    }

    public function update(){
        //update
        return redirect('expense.index');
    }

    public function delete(){
        return redirect('expense.index');
    }
}
