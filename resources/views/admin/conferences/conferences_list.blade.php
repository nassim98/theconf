@extends('templates.admin.layout')

@section('content')
    <div class="">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Conferences</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Theme</th>
                                <th>Track</th>
                                <th>File</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Theme</th>
                                <th>Track</th>
                                <th>File</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($conferences))
                                @foreach ($conferences as $row)
                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->theme}}</td>
                                        <td>{{$row->track}}</td>
                                        <td><a href="/public/storage/storage/{{$row->file_name}}" download="{{$row->file_name}}"> {{$row->file_name}} </a> </td>
                                        <td>{{$row->rating}}</td>
                                        <td>{{$row->comment}}</td>
                                        <td>
                                            <a href="{{ route('conferences.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop