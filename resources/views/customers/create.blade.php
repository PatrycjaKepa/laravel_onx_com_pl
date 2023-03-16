@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add Stock</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:*</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="surname">Surname:*</label>
                        <input type="text" class="form-control" name="surname"/>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
