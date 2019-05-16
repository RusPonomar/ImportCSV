<?php
/**
 * Created by PhpStorm.
 * User: EVE
 * Date: 16.05.2019
 * Time: 10:15
 */
@extends('layouts.app')

@section('content')

    <div class="panel-heading">Import and Export Data Into Excel File</div>

    <div class="panel-body">
        {!! Form::open(array('route'=>'candidate.import','method'=>'POST','files'=>'true')) !!}
        <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session :: get('message')}}
                    </div>
                @endif
                @if(Session::has('warnning'))
                    <div class="alert alert-warnning">{{Session::get('message')}}</div>
                @endif
                <div class="form-group">
                    {!! Form::label('sample_file','Select Candidate File to Import:',['class'=>'col-md-3']) !!}
                    <div class="col-md-9">
                        {!! Form::file('candidates',array('class'=>'form-control')) !!}
                        {!! $errors->first('candidates','<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                {!! Form::submit('Upload',['class'=>'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        {!! Form::open(array('route'=>'job.import','method'=>'POST','files'=>'true')) !!}
        <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session :: get('message')}}
                    </div>
                @endif
                @if(Session::has('warnning'))
                    <div class="alert alert-warnning">{{Session::get('message')}}</div>
                @endif
                <div class="form-group">
                    {!! Form::label('sample_file','Select Job File to Import:',['class'=>'col-md-3']) !!}
                    <div class="col-md-9">
                        {!! Form::file('jobs',array('class'=>'form-control')) !!}
                        {!! $errors->first('jobs','<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                {!! Form::submit('Upload',['class'=>'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <br/>
                <a href="{{route('candidate.export',['type'=>'csv'])}}" class="btn btn-primary"
                   style="margin-right: 15px;"> Download - CSV file</a>

                <table width="100%" border="">
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                    @foreach($candidates as $candidate)
                        <tr>
                            <td>{{$candidate->first}}</td>
                            <td>{{$candidate->last}}</td>
                            <td>{{$candidate->email}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table border="1" width="100%">
                                    @foreach($candidate->jobs as $job)
                                        <tr>
                                            <td width="50"></td>
                                            <td>{{$job->position}}</td>
                                            <td>{{$job->company}}</td>
                                            <td>{{$job->start_at}}</td>
                                            <td>{{$job->end_at}}</td>
                                        </tr>
                                    @endforeach;
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
