@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ __('categories.categories') }}</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>{{ __('categories.name') }}</td>
                            </tr>
                            </thead>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><a href="{{ route('frontend.categories.show', ['id' => $category->id]) }}">{{ $category->name }}</a></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="text-center"> {{ $categories->links() }} </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection