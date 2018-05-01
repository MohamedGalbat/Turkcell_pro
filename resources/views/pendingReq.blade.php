@extends('layouts.pendingSearch')
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
                        <tr>@if($frd->is_approved==0)
                            <td>{{$frd->id}}</td>
                            <td>{{$frd->title}}</td>
                            <td>{{$frd->full_name}}</td>
                            <td>{{$frd->created_at->diffForHumans()}}</td>
                            <td><a href="/displayReq/{{$frd->id}}"> FRD</a></td>
                            <td style="color: #0f74a8"><strong>{{'Pending'}}</strong></td>
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
