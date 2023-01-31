@extends('layout.master')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Menus</li>
                        <li class="list-group-item list-group-item-primary"><a href="{{route('income')}}">Income</a></li>
                        <li class="list-group-item list-group-item-secondary"><a href="{{route('expense')}}">Expense</a></li>
                        <li class="list-group-item list-group-item-success"> <a href="{{route('monthly.report')}}"> Monthly Expense</a></li>
                      </ul>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection