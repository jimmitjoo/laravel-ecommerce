@extends('layouts.serverside')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.categories.store') }}" method="post">
                {{ csrf_field() }}

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('categories.category meta') }}</div>

                        <div class="panel-body">
                            <div class="form-group">
                            </div>

                            <input class="btn btn-primary" type="submit" value="{{ __('default.save') }}">

                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('categories.category information') }}</div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="name">{{ __('categories.name') }}</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="{{ __('categories.name') }}">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="{{ __('default.save') }}">
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection