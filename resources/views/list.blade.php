@extends('layouts.app')

@section('content')
    <div class="panel-heading">Data from DB about employees</div>
    <table width="100%" border="1" cellpadding="10">
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
            @endforeach
            </tr>
            </table>

        </div>
    </div>
    </div>

@endsection