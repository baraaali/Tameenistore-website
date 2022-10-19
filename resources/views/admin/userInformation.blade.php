<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tameein Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-primary">
                    <h2>Users information</h2>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Account type</th>
                    <th>Country</th>
                    <th>Country Code</th>
                    <th>City</th>
                    <th>Region</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users_information as $user)
                    <tr>
                        <td>{{$user->id }}</td>
                        <td>{{Auth::user()->name}}</td>
                        <td>{{Auth::user()->email}}</td>
                        <td>{{$user->phone }}</td>
                        <td>{{$user->account_type }}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->country_code}}</td>
                        <td>{{$user->city }}</td>
                        <td>{{$user->region}}</td>

                        <td>
                            <form action="{{ route('destroy-profile',$user->id) }}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>