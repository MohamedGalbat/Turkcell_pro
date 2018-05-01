@extends('layouts.app')
@extends('layouts.progressBar')
@section('content')
    <div class="checkout-wrap">
        <ul class="checkout-bar">
            <li class="visited first"><h5>Title & Description</h5></li>
            <li class="previous visited"><h5>Audience & Channels</h5></li>
            <li class="previous visited"><h5>Attachments</h5></li>
            <li class="previous visited"><h5>SMS & Discounts</h5></li>
            <li class="active"><h5>Final FRD</h5></li>
        </ul>
    </div><br><br><br><br>
    <div class="container" style="width: 65%; background-color:#f1f2f6; border-radius:7px;"><br>
        <div class="jumbotron">
            <div class="card list-group-item ">
                <div class="text-center"><h2><strong>Final FRD</strong></h2></div>
                <hr>
                <div class="container"><br>

                    <h3 class="card-header"><strong>{{"FRD Title "}}</strong></h3>
                    <h4 class="list-group-item">{{$frd->title}}</h4><br>
                    <h3 class="card-header"><strong>{{"FRD Description "}}</strong></h3>
                    <h5 class="list-group-item ">{!! $frd->description !!}</h5><br>
                    <h3 class="card-header"><strong>{{"FRD Item/s "}}</strong></h3>
                    <div class="list-group-item ">
                        <ol>
                        @foreach($frd->items as $item)<!--we are able to access the items because it has a relation with the frd!-->
                            <h5>
                                <li>{{$item->title}}</li>
                            </h5>
                            @endforeach
                        </ol>
                    </div>
                    <br>

                    <h3 class="card-header"><strong>{{"Targeted Audience"}}</strong></h3>
                    <div class="list-group-item">
                        <ol>
                            @foreach($frd->audience as $aud)
                                <h5>
                                    <li>{{$aud->name->name}}</li>
                                </h5>
                            @endforeach
                        </ol>
                    </div>
                    <br>
                    <h3 class="card-header"><strong>{{"Targeted Channel/s"}}</strong></h3>
                    <div class="list-group-item">
                        <ol>
                        @foreach($frd->channels as $channel)<!--we are able to access the comments because it has a relation with the items-->
                            <h5>
                                <li>{{$channel->name->name}}</li>
                            </h5>
                            @endforeach
                        </ol>
                    </div>
                    <br>
                    @Manager
                    <h1>hi there </h1>
                    @endManager
                    @if(count($frd->attach))
                        <h3 class="card-header"><strong>{{"Attachments"}}</strong></h3>
                        <div class="list-group-item">
                            <h5>
                            @foreach($frd->attach as $attach)<!--we are able to access the comments because it has a relation with the items-->
                                <h5><strong>{{"Attachment Description: "}}</strong>{{$attach->title}}</h5><br>
                                <a href="/addAttachment/attach/{{$attach->id}}" style=" float: right">
                                    <i class="fa fa-file-text" style="font-size:36px;"></i>
                                </a><br><br>
                                @if($attach->file_type== "image")
                                    <img width="180"
                                         src="data:image/jpeg;base64,{{ base64_encode(Storage::get( $attach->file)) }}">
                                @endif
                                <i>
                                    <small style="float: right">{{"Download "}}{{$attach->file_type}}</small>
                                </i><br>
                                <hr>
                                @endforeach
                            </h5>
                        </div>
                        <br>
                    @endif
                    @if(count($frd->sms))
                        <h3 class="card-header"><strong>{{"SMS"}}</strong></h3>

                        <table class="table table-hover table-bordered table-striped responsive">
                            <tr>
                                <th>Explanation</th>
                                <th>Turkish content</th>
                                <th>English content</th>
                            </tr>

                            @foreach($frd->sms as $sms)
                                <tr>
                                    <td>{{$sms->explanation}}</td>
                                    <td>{{$sms->content_tr}}</td>
                                    <td>{{$sms->content_en}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                    @endif

                    @if(count($frd->discounts))
                        <h3 class="card-header"><strong>{{"Discounts Prioritization"}}</strong></h3>

                        <table class="table table-hover table-bordered table-striped ">
                            <tr>
                                <th>Discount Name</th>
                                <th>Discount Code</th>
                            </tr>

                            @foreach($frd->discounts as $discount)
                                <tr>
                                    <td>{{$discount->description}}</td>
                                    <td>{{$discount->code}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                    @endif
                </div>
            </div>
            <br>

            <a href="/document/submit/{{$frd->id}}" class="btn btn-success btn-lg">submit to manager</a>
        </div>
        <br><br>
    </div>
@stop