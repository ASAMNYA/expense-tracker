@extends('layout.master')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Expense Create</div>
                    <form class="" action="{{ route('expense.store') }}" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" placeholder="Choose Date">
                        </div>
                      <div class="form-group col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Enter Amount">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" name="remarks" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a  href="{!! url('expense') !!}" class="btn btn-danger btn-xs">Cancel</a>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection