@extends(Config::get('home.theme').'/layout/page')
@section('pagecontent')
<div id="resultpage">

    <div id="search">
        <a id="logo">Logo here</a>

        <div>
            <div class="input-group">
                {{ Form::open(array(
                'url' => 'search',
                'method'=>'get',
                )) }}
                <input type="text" class="form-control" name="s"
                       placeholder="{{trans('common.searchvideo')}}...">
                      <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><span
                                class="glyphicon glyphicon-search" style=""></span></button>
                      </span>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="content" class="col-xs-12 col-sm-8">
        <div class="col-xs-12">
            <h1 class="searchinput">
                {{$sSearch}} - {{trans('common.resultsearch')}}
            </h1>
            @if(isset($aResult) && count($aResult)>0)
            <ul class="resultlist">
                @foreach($aResult as $video)
                <li class="col-xs-4">
                    <div class="thumb">
                        <a href="{{URL::to('/video?v='.$video->id->videoId)}}"
                           title="{{$video->snippet->title}}">
                            <img src="{{$video->snippet->thumbnails->medium->url}}">

                        </a>
                    </div>
                    <div class="videotitle">
                        <a href="{{URL::to('/video?v='.$video->id->videoId)}}"
                           title="{{$video->snippet->title}}">
                            {{$video->snippet->title}}
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="clearfix">
                @if($prevpage !='')
                <a href="{{URL::full()}}&p={{$prevpage}}">Trang trước</a>
                @endif
                ({{$totalresult}} Result)
                @if($nextpage !='')
                <a href="{{URL::full()}}&p={{$nextpage}}">Trang sau</a>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@stop