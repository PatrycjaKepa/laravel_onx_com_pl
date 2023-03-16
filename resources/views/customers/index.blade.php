@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Stocks</h1>
            <div>
                <a href="{{ route('customers.create')}}" class="btn btn-primary mb-3">Add Customer</a>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Surname</td>
                    <td>Phone</td>
                    <td>User</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}} </td>
                        <td>{{$customer->surname}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->user}}</td>
                        <td>
                            <a href="{{ route('customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
