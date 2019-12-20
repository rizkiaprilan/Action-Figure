@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('search')}}" method="get">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td>
                                            @if(Auth::user() ==  null)
                                                Welcome Guest
                                            @else
                                                Welcome {{Auth::user()->name}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Current Date:
                                            <label id="timer" style="color: black" class="mr-auto mr-sm-4"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="search" name="search" class="form-control"
                                                   placeholder="Name or Category">
                                        </td>
                                        <td>
                                            <span class="form-group-btn"></span>
                                            <button type="submit" class="btn btn-primary">search</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <label>
                                @if($data->count() == 0)
                                    <b style="color: darkred">Data Doesn't Exists</b>
                                @endif
                            </label>
                        </form>

                    <table class="table table-responsive">
                        @foreach($data as $index=>$value)
                            <div>
                                <tr>
                                    <td>
                                        <img src="storage/figure/{{$data[$index]->photo}}" alt="Image"
                                             style="width: 200px; height: auto">
                                    </td>
                                <tr class="table-borderless">
                                    <td>
                                        <a href="/member/view/{{$data[$index]->id}}"
                                           style="text-decoration: none;">{{$data[$index]->name}}</a>
                                    </td>
                                </tr>
                                <tr class="table-borderless">
                                    <td>Rp. {{number_format($data[$index]->price,2,',','.')}}</td>

                                </tr>
                                <tr class="table-borderless">
                                    <td>{{$data[$index]->description}}</td>
                                </tr>
                                <tr class="table-borderless">
                                    <td>Qty: {{$data[$index]->quantity}}</td>
                                </tr>
                                <tr>
                                    <td class="table-dark">

                                        Category: {{$data[$index]->category}} <br>
                                        @if(Auth::user() != null)
                                            @if(Auth::user()->role == 'member')
                                                <a href="/member/cart/{{$data[$index]->id}}">
                                                    <button style="background: #2d995b; border: none">
                                                        Add To Cart
                                                    </button>
                                                </a>
{{--                                                <label>{{$error}}</label>--}}
                                            @endif
                                        @endif
                                    </td>

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
