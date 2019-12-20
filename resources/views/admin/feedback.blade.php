@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <table class="table table-responsive">

                        <tr>
                            <th style="width: 400px">Feedback Description</th>
                            <th>Status</th>
                            <th>Approve</th>
                            <th>Reject</th>
                        </tr>
                        @foreach($data as $d)
                            <div>
                                <tr>

                                    <td>{{$d->feedback}}</td>
                                    <td>{{$d->status}}</td>

                                    <td><a href="/admin/feedback/update/{{$d->id}}">
                                            <button class="fa fa-check-square btn btn-primary"></button>
                                        </a></td>

                                    <td><a href="/admin/feedback/delete/{{$d->id}}">
                                            <button class="fa fa-window-close btn btn-danger"></button>
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
