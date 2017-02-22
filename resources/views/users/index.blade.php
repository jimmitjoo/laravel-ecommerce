@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">User meta</div>

                    <div class="panel-body">


                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>{{ __('users.name') }}</td>
                                <td>{{ __('roles.role') }}</td>
                                <td class="text-right">{{ __('default.edit') }}</td>
                                <td class="text-right">{{ __('default.delete') }}</td>
                            </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tr>
                                    <td><a href="{{ route('admin.users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                                    <td>---</td>
                                    <td class="text-right"><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}">{{ __('default.edit') }}</a></td>
                                    <td class="text-right"><a href="{{ route('admin.users.delete', ['id' => $user->id]) }}">{{ __('default.delete') }}</a></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="text-center"> {{ $users->links() }} </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection