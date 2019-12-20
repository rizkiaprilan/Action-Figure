@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <table class="table table-responsive">
                        <a href="{{route('insertcategory')}}">
                            <button class="btn btn-primary">Insert New Category</button>
                        </a>
                        <tr>
                            <th style="width: 400px">Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($data as $d)
                            <div>
                                <tr>

                                    <td>{{$d->category}}</td>

                                    <td><a href="/admin/category/update/{{$d->id}}">
                                            <button class="fa fa-edit btn btn-primary"></button>
                                        </a></td>

                                    <td><a href="/admin/category/delete/{{$d->id}}">
                                            <button class="fa fa fa-eraser btn btn-danger"></button>
                                        </a></td>
                                </tr>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
