@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12   ">
                <div class="card">
                    <div class="card-body">
{{--                        Buyer Name: {{Auth::user()->name}}--}}
                        <table class="table table-responsive">
                            <div>
                                <tr>
                                    <th>Transaction Date</th>
                                    <th>Transaction Number</th>
                                    <th>Buyer Name</th>
                                    <th>Figure Picture</th>
                                    <th>Figure Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                                @foreach($data as $d)
                                    <tr>
                                        <td>
                                            {{$d->updated_at}}
                                        </td>
                                        <td>
                                            {{$d->transaction}}

                                        </td>
                                        <td>
                                            {{$d->user->name}}
                                        </td>
                                        <td>
                                            <img src="/storage/figure/{{$d->figure->photo}}" alt="Image"
                                                 style="width: 200px; height: auto">
                                        </td>
                                        <td>
                                            {{$d->figure->name}}
                                        </td>
                                        <td>
                                            {{$d->quantity}}
                                        </td>
                                        <td>
                                            Rp. {{number_format($d->figure_price,2,',','.')}}
                                        </td>
                                        <td>
                                            Rp. {{number_format($d->price,2,',','.')}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total:</td>
                                    <td colspan="3">
                                        Rp. {{number_format($data->sum('price'),2,',','.')}}
                                    </td>
                                </tr>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
