@extends('layouts.pendingSearch')
@section('content')

    <div class="container">
        <ul>
            <div class="card">
                <div class="card-header">
                    @if(count($myfrd))
                        <div class="container">
                            <h1>Your Requests</h1>
                        </div>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped ">
                <tr>
                    <th>ID No.</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Go To Request</th>
                    <th>Status</th>
                </tr>
                @foreach($myfrd as $frd)
                    <tr>
                        <td>{{$frd->id}}</td>
                        <td>{{$frd->title}}</td>
                        <td>{{$frd->created_at->diffForHumans()}}</td>
                        <td><a href="/displayReq/{{$frd->id}}">Go to Request</a></td>
                        @if($frd->is_approved==0) <td style="color: #0f74a8"><strong>{{'Pending'}}</strong></td>
                        @elseif($frd->is_approved==1) <td style="color: green"><strong>{{'Accepted'}}</strong></td>
                        @elseif($frd->is_approved==2) <td style="color: red"><strong>{{'Rejected'}}</strong></td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </ul>
        {{$myfrd->links()}}
        @else
            <div class="container">
                <h3>No requests yet!</h3>
            </div>
        @endif
    </div>
@endsection