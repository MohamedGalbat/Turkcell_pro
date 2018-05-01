@extends('layouts.appsearch')
@section('content')
    <div class="container">
        @if(count($FRD))
            <ul>
                <table class="table table-hover table-bordered table-striped  ">
                    <tr>
                        <th>ID No.</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Versions</th>
                    </tr>

                    @foreach($FRD as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                            <td><a href="frd/{{$item->id}}">Go to Comments</a></td>
                        </tr>
                    @endforeach
                </table>
            </ul>
            {{$FRD->links()}}
        @else <h1>No Requests Yet!</h1>
        @endif
    </div>
@endsection
