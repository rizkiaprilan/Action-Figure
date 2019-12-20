@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('insertfigure')}}">
                            <button class="btn btn-primary">Insert New Figure</button>
                        </a>
                        <table class="table table-responsive">
                            <tr>
                                <th>Figure Picture</th>
                                <th>Figure Name</th>
                                <th>Figure Category</th>
                                <th>Description</th>
                                <th>Quality</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($data as $d)
                                <div>
                                    <tr>
                                        <td>
                                            <img src="/storage/figure/{{$d->photo}}" alt="Image"
                                                 style="width: 200px; height: auto">
                                        </td>

                                        <td>{{$d->name}}</td>

                                        <td>Category: {{$d->category}}


                                        <td>{{$d->description}}</td>

                                        <td>Qty: {{$d->quantity}}</td>

                                        <td>Rp. {{number_format($d->price,2,',','.')}}</td>

                                        <td><a href="/admin/figure/update/{{$d->id}}">
                                                <button class="fa fa-edit btn btn-primary"></button>
                                            </a></td>

                                        <td><a href="/admin/figure/delete/{{$d->id}}">
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
