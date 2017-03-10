@extends('layouts.serverside')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Category meta</div>

                    <div class="panel-body">


                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Categories</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>{{ __('categories.name') }}</td>
                                    <td class="text-right">{{ __('default.edit') }}</td>
                                    <td class="text-right">{{ __('default.delete') }}</td>
                                </tr>
                            </thead>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><a href="{{ route('admin.categories.show', ['id' => $category->id]) }}">{{ $category->name }}</a></td>
                                    <td class="text-right"><a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">{{ __('default.edit') }}</a></td>
                                    <td class="text-right"><a href="{{ route('admin.categories.delete', ['id' => $category->id]) }}">{{ __('default.delete') }}</a></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="text-center"> {{ $categories->links() }} </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection