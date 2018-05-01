@extends('layouts.app')
@section('style')
    <style>
        body {
            background-image: url("http://www.namosathi.co.za/images/How-to-make-an-App-Go-Viral.png");
            background-size: cover;
            background-position: left;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('script')
    <script>

        function add_comment(v) {
            var title = $(".id-" + v).val();//go to the place with id (id-)concatenate the value v to it (the id) and get its value
            var file = $(".file-" + v).val();//go to the place with class file-id and get the file
            $(".dynamic_form_id").val(v);//go to the class dynamic_from_id and give it the value v(the id)
            $(".dynamic_form_title").val(title);//go to the class dynamic_form_title and give it the value of the title
            $('.add').append($(".file-" + v));//append to the comment the file before submitting
            $('.add').submit()//submit the form
        }

        function displayById(v) {
            $(".file-" + v).show();
        }
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="card" style="width: 40rem;">
            <div class="card-block">
                <div class="container"><br>
                    <div >
                        <div class="container"><br>
                            <h1 style="font-family: 'Roboto Slab', serif;" >{{$frd->title}}</h1>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text" style="width:20%"> {!! $frd->description !!}</p>
                </div>
            </div>
            <div class="card-footer text-muted">
                <img style="border-radius: 50%" width="60" height="60"
                     src="{{$frd->profile_pic}}"><br>
                <small><strong>
                        {{'Created by:'}}
                        {{$frd->full_name}}<br>
                        {{$frd->created_at->diffForHumans()}}
                    </strong></small>
            </div>
        </div>

        <ul class="list-group" style="margin-top: 20px">

        @foreach($frd->items as $item)<!--we are able to access the items because it has a relation with the frd!-->
            <li class="list-group-item" style="width: 35rem;">
                <img style="border-radius:50%;" width="50" height="50"
                     src="{{$frd->profile_pic}}">
                <span>{{$frd->full_name}}</span>
                <br>
                <span><small><strong>Version</strong> </small><small><strong>{{$item->version}}</strong></small></span>
                <h4 >{{$item->title}}</h4>
                <hr>

                <ul style="margin-top: 20px;position: relative">

                @foreach($item->comments as $comment)<!--we are able to access the comments because it has a relation with the items-->
                    <li class="list-group-item">
                        <img style="border-radius: 50%;" width="40" height="40"
                             src="{{$comment->profile_pic}}"><br>
                        <small><strong>{{'Created by:'}} {{($comment->full_name)}}
                                <br> {{$comment->created_at->diffForHumans()}}</strong></small><br>
                        <hr>
                        <h5><strong>{{$comment->title}}</strong></h5><br><br>

                        @if($comment->file)
                            <a href="/addcomment/attach/{{$comment->id}}" style=" float: right">
                                <i class="fa fa-file-text" style="font-size:36px;"></i>
                            </a><br><br>
                            <i>
                                <small style="float: right">Attachment</small>
                            </i>
                            <br>
                        @endif

                    </li>
                    <br>
                    @endforeach
                    <li class="list-group-item">
                        <textarea oninput="displayById('{{$item->id}}')" class="form-control id-{{$item->id}}"
                                  name="title" placeholder="Comment on item" rows="3" class="form-control items_input"></textarea><br>
                        <button style="float: right;" type="button" class="btn btn-primary" onclick="add_comment('{{$item->id}}')">comment
                        </button>
                        <input type="file" name="file" class="file-{{$item->id}}"/>

                    </li>
                </ul>
            </li>

            @endforeach
        </ul>

    </div>

    <form class="add" method="POST" action="/addcomment" enctype="multipart/form-data">@csrf
        <input class="dynamic_form_id" type="hidden" name="item_id" value="">
        <input class="dynamic_form_title" type="hidden" name="title" value="">
    </form>

@endsection