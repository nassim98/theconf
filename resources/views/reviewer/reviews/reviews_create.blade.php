@extends('templates.reviewer.layout')


@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Give review<a href="{{route('conference.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{ route('reviews.update', ['id' => $conference->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating">Rate it <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select name="rating" id="rating" class="form-control col-md-7 col-xs-12">
                                        <option value="{{$conference->rating}}" selected disabled hidden>{{$conference->rating}}</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @if ($errors->has('rating'))
                                        <span class="help-block">{{ $errors->first('rating') }}</span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comment">Comment <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$conference->comment}}" id="comment" name="comment" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('comment'))
                                        <span class="help-block">{{ $errors->first('comment') }}</span>
                                    @endif
                                </div>
                            </div>




                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-success">Save Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
