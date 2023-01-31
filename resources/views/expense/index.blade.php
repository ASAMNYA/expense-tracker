@extends('layout.master')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">Expense</div>
                    <a  href="{!! url('expense/create') !!}" class="btn btn-primary btn-xs">Add New</a>
                 </div>

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Expense</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($expensedata as $data)
                      <tr>
                        <th scope="row">#</th>
                        <td>{{$data->date}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->amount}}</td>
                        <td>{{$data->remarks}}</td>
                        <td>
                                <a  href="{{ route('expense.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('expense.delete', $data->id) }}">
                                    <input type="submit" value="Delete" class="btn btn-danger ">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    {{ method_field('DELETE') }}
                                </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection