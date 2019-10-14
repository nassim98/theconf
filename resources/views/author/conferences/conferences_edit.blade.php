@extends('templates.author.layout')

@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit conference <a href="{{route('conferencess.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{ route('conferencess.update', ['id' => $conference->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$conference->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('theme') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="theme">Theme <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$conference->theme}}" id="theme" name="theme" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('theme'))
                                        <span class="help-block">{{ $errors->first('theme') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('track') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="track">Track <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$conference->track}}" id="track" name="track" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('track'))
                                        <span class="help-block">{{ $errors->first('track') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="track">File <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" value="{{$conference->file}}" class="custom-file-input" id="customFile">

                                </div>
                            </div>



                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-success">Save conference Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop