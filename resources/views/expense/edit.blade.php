@extends('layout.master')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Expense Details</div>
                    <form class="" action="{{ route('expense.update',$expensedata->id) }}" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$expensedata->title}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" placeholder="Choose Date" value="{{$expensedata->date}}">
                        </div>
                      <div class="form-group col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Enter Amount" value="{{$expensedata->amount}}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" name="remarks" rows="3" >{{$expensedata->remarks}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a  href="{!! url('expense') !!}" class="btn btn-danger btn-xs">Cancel</a>
                    {{ method_field('PUT') }} 
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection