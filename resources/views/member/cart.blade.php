@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive">
                            <div>
                                <tr class="table-borderless">
                                    <th width="200px">Image</th>
                                    <th width="150px">Product</th>
                                    <th width="50px">Quantity</th>
                                    <th width="200px">Price</th>
                                    {{--                                <th></th>--}}
                                </tr>
                                @foreach($data as $index=>$value)
                                    <tr class="table-borderless">
                                        <td>
                                            <a href="/member/cartDelete/{{$data[$index]->id}}"
                                               style="text-decoration: none; color: white">
                                                <button class="btn btn-danger">Remove</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <form method="POST" action="{{route('checkout')}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <tr>
                                            <td>
                                                <img src="/storage/figure/{{$data[$index]->figure->photo}}" alt="Image"
                                                     style="width: 150px; height: auto">
                                            </td>
                                            <td>
                                                <a href="/member/view/{{$data[$index]->figure->id}}"
                                                   style="text-decoration: none;">{{$data[$index]->figure->name}}</a>
                                            </td>
                                            <td>

                                                <input id="qty" type="number" onkeydown="return false"
                                                       name="qty[{{$index}}]" min="1"
                                                       max="{{$data[$index]->figure->quantity}}" placeholder="Qty">

                                            </td>

                                            <td>
                                                Rp. {{number_format($data[$index]->figure->price,2,',','.')}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td>

                                                Rp. {{number_format($balance,2,',','.')}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            {{--                                            @dd($data)--}}
                                            @if($balance != 0)
                                                <td>
                                                    <a href="{{route('checkout')}}">
                                                        <button type="submit" name="transaction"
                                                                style="background: green; border: none; color: white">
                                                            CHECKOUT
                                                        </button>
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    </form>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
