@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.users.store') }}" method="post">
                {{ csrf_field() }}

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('users.user meta') }}</div>

                        <div class="panel-body">
                            <div class="form-group">
                            </div>

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
                                <input class="form-control" id="name" type="text" name="name" placeholder="{{ __('users.name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('users.email') }}</label>
                                <input class="form-control" id="email" type="text" name="email" placeholder="{{ __('users.email') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('users.password') }}</label>
                                <input class="form-control" id="password" type="text" name="password" placeholder="{{ __('users.password') }}" value="{{ \App\User::generatePassword() }}" readonly>
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