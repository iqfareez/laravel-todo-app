@extends('layouts.app')

@section('styles')
    <style>
        #outer {
            width: auto;
            justify-content: center;
        }

        .inner {
            margin: 0 5px;
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('alert-success') }}
                            </div>
                        @endif
                        @if (count($data) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Completed</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 0)
                                    @foreach ($data as $todoData)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $todoData->title }}</td>
                                            <td>{{ $todoData->description }}</td>
                                            <td>
                                                @if ($todoData->is_completed == 1)
                                                    <div class="btn btn-sm btn-success">Completed</div>
                                                @else
                                                    <div class="btn btn-sm btn-warning">In Progress</div>
                                                @endif
                                            </td>
                                            <td id="outer">
                                                <a href="" class="btn btn-sm btn-secondary inner">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger inner">Remove</a>
                                                <form action="" class="inner">
                                                    <input type="hidden" name="todo_id" value="{{ $todoData->id }}">
                                                    <input type="submit" class="btn btn-sm btn-info">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>No todos found</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
