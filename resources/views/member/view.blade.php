@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table table-responsive">
                        <div>
                            <tr>
                                <td>
                                    <a href="/member/view/{{$data->id}}"
                                       style="text-decoration: none;">{{$data->name}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="6">
                                    <img src="/storage/figure/{{$data->photo}}" alt="Image"
                                         style="width: 200px; height: auto">
                                </td>
                            </tr>
                            <tr>
                                <td>Description: {{$data->description}}</td>
                            </tr>
                            <tr>
                                <td>&#9679;Rp. {{$data->price}},00</td>

                            </tr>
                            <tr>
                                <td>&#9679;Qty: {{$data->quantity}}</td>
                            </tr>
                            <tr>
                                <td>
                                    &#9679;Category: {{$data->category}} <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if(Auth::user()->role == 'member')
                                        <a href="/member/cart/{{$data->id}}">
                                        <button style="background: #2d995b; border: none">
                                            Add To Cart
                                        </button>
                                        </a>
                                    @endif
                                </td>
                            </tr>

                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
