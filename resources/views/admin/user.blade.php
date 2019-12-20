@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tr>
                                <td>
                                    <a href="{{route('insertuser')}}">
                                        <button class="btn btn-primary" style="width: 150px">Insert New User</button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Profile Picture</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($data as $d)
                                <div>
                                    <tr>
                                        <td>
                                            <img src="/storage/user/{{$d->photo}}" alt="Image"
                                                 style="width: 100px; height: auto">
                                        </td>

                                        <td>{{$d->name}}</td>

                                        <td>{{$d->email}}</td>

                                        <td>{{$d->phone}}</td>

                                        <td>{{$d->address}}</td>

                                        <td>{{$d->gender}}</td>

                                        <td>{{$d->role}}</td>

                                        <td><a href="/admin/user/update/{{$d->id}}">
                                                <button class="fa fa-edit btn btn-primary"></button>
                                            </a></td>

                                        <td><a href="/admin/user/delete/{{$d->id}}">
                                                <button class="fa fa fa-eraser btn btn-danger"></button>
                                            </a></td>
                                    </tr>
                                </div>
                            @endforeach
                        </table>
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
