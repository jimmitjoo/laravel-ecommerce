@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <h1>Cart</h1>
            </div>
        </div>

        <div id="products" class="row list-group">

            <cart></cart>

        </div>

    </div>
@endsection