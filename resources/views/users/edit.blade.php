@extends('layouts.serverside')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="post">
                {{ csrf_field() }}

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('users.user meta') }}</div>

                        <div class="panel-body">
                            <input class="btn btn-primary" type="submit" value="{{ __('default.save') }}">

                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('users.user information') }}</div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="name">{{ __('users.name') }}</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="{{ __('users.name') }}" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('users.email') }}</label>
                                <input class="form-control" id="email" type="text" name="email" placeholder="{{ __('users.email') }}" value="{{ $user->email }}">
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