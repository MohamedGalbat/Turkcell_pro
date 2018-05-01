@extends('layouts.app')
@extends('layouts.progressBar')
@section('content')
    <div class="checkout-wrap">
        <ul class="checkout-bar">
            <li class="visited first"><h5>Title & Description</h5></li>
            <li class="previous visited"><h5>Audience & Channels</h5></li>
            <li class="previous visited"><h5>Attachments</h5></li>
            <li class="active"><h5>SMS & Discounts</h5></li>
            <li class=""><h5>Final FRD</h5></li>
        </ul>
    </div><br><br><br><br>
    <form method="POST" action="/store/{{$id}}" enctype="multipart/form-data">
        @csrf
        <div class="container ">
            <div class="jumbotron ">
                <a href="/discounts/{{$id}}" class="btn btn-danger btn-lg" style="float: right">Skip</a>
                <h2><strong> Adding SMS</strong></h2><br>
                <hr>
                <div class="container  ">
                    <br>
                    <table class="table table-hover table-bordered table-striped responsive">
                        <tr>
                            <th>Sender</th>
                            <th>Code</th>
                            <th>Explanation</th>
                            <th>Turkish Content</th>
                            <th>SMS Length</th>
                            <th>English Content</th>
                            <th>SMS Length</th>
                        </tr>
                        @foreach(App\SMS::all() as $sms)
                            <tr>
                                <td>{{$sms->sender}}</td>
                                <td>{{$sms->code}}</td>
                                <td>{{$sms->explanation}}</td>
                                <td>{{$sms->content_tr}}</td>
                                <td>{{$sms->length_tr}}</td>
                                <td>{{$sms->content_en}}</td>
                                <td>{{$sms->length_en}}</td>
                            </tr>
                        @endforeach
                        @foreach(App\SMS_FRD::all() as $sms)
                            @if($sms->status==1)
                                <tr>
                                    <td>{{$sms->sender}}</td>
                                    <td>{{"7000"}}{{$sms->id}}</td>
                                    <td>{{$sms->explanation}}</td>
                                    <td>{{$sms->content_tr}}</td>
                                    <td>{{strlen($sms->content_tr)}}</td>
                                    <td>{{$sms->content_en}}</td>
                                    <td>{{strlen($sms->content_en)}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>
                    <h6 style="color: red">*SMS body shouldn't exceed 254 characters</h6>

                    <input placeholder="Explanation" name="description" type="text"
                           class="form-control items_input"><br>
                    <h6 style="color: red">*Turkish characters are not allowed</h6>

                    <textarea placeholder="Turkish content" name="Turkish_content" rows="4" class="form-control items_input "
                           maxlength="254"></textarea><br>
                    <textarea placeholder="English content" name="English_content" rows="4" class="form-control items_input"
                              maxlength="254"></textarea><br><br></div>
                <a href="/attach/{{$id}}" class="btn btn-primary btn-lg" >Back </a>
                <input type="submit" class="btn btn-success btn-lg">
            </div>
        </div>
    </form>
@stop