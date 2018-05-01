@extends('layouts.app')
@extends('layouts.progressBar')
@section('script')
    <script>
        var init = 0 ;
        $("#add").click(function () {
            init++;
            //Append a new row of code to the "#items" div
            $("#items").append('<input placeholder="item" name="Item['+init+']" type="text"  class="form-control items_input"><br>');
        });
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
@section('content')
    <div class="checkout-wrap">
        <ul class="checkout-bar">
                <li class="active"><h5>Title & Description</h5></li>
            <li class="next"> <h5>Audience & Channels</h5></li>
            <li class="next"><h5>Attachments</h5></li>
            <li class="next"><h5>SMS & Discounts</h5></li>
            <li class="next"><h5>Final FRD</h5></li>
        </ul>
    </div><br><br><br><br>
    <div class="container">
        {!! Form::open(['action'=>"FrdController@store",'method'=>'POST']) !!}
        <div class="jumbotron ">

            <div class="form-group">
                {{form::label('title','FRD Title' )}}
                {{form::text('title','',['class'=>'form-control','placeholder'=>'Title'] )}}
            </div>
            <div class="form-group">
                {{form::label('description','Description' )}}
                {{form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'] )}}
            </div>

            <ul class="list-group " id="items" style="margin-top: 25px;"> </ul><!-- where to add the items -->
            <button type="button" class="btn btn-primary " id="add">Add Item</button><!-- onclick calls the add function to add the item -->
            <br>
        </div>
        {{form::submit('submit',['class'=>'btn btn-success btn-lg '] )}}
        {!! Form::close() !!}
    </div>


@endsection