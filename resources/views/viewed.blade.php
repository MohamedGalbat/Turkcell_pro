@extends('layouts.appsearch')
@section('content')
    <div class="container">
        @if(count($FRD))
            <ul>
                <table class="table table-hover table-bordered table-striped  ">
                    <tr>
                        <th>ID No.</th>
                        <th>Title</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>View FRD</th>
                        <th>Status</th>
                    </tr>

                    @foreach($FRD as $frd)
                        <tr>
                            @if($frd->is_approved==1 | $frd->is_approved==2)
                                <td>{{$frd->id}}</td>
                                <td>{{$frd->title}}</td>
                                <td>{{$frd->full_name}}</td>
                                <td>{{$frd->created_at->diffForHumans()}}</td>
                                <td><a href="/displayViewed/{{$frd->id}}"> FRD</a></td>
                                @if($frd->is_approved==1)
                                    <td style="color: green"><strong>{{'Accepted'}}</strong></td>
                                @elseif($frd->is_approved==2)
                                    <td style="color: red"><strong>{{'Rejected'}}</strong></td>
                                @endif
                            @endif
                    @endforeach
                </table>
            </ul>
            {{$FRD->links()}}
        @else
            <div class="container">
                <h1 class="text-center">No requests yet!</h1>
            </div>
        @endif
    </div>
@endsection
