@extends('layout.master')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">Expense</div>
                 </div>

                 <form method="get">
                    <div class="row">
                        <div class="col-xs-1 col-md-4 form-group">
                        <label for="year">Year</label>
                        @php
                            $years = collect(range(2, 0))->map(function ($item) {
                            return (string) date('Y') - $item;
                        });
                            $months = cal_info(0)['months'];
                        @endphp
                        <select name="y" class="form-control" id="y">
                        @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="col-xs-2 col-md-4 form-group">
                        <label for="month">Month</label>
                        <select name="m" class="form-control" id="y">
                        @foreach($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="col-xs-4">
                            <label class="control-label">&nbsp;</label><br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Income</th>
                                    <td>Rs.{{$inc_total}}</td>
                                </tr>
                                <tr>
                                    <th>Expenses</th>
                                    <td>Rs.{{$exp_total}}</td>
                                </tr>
                                <tr>
                                    <th>Profit</th>
                                    <td>Rs.{{$profit}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection