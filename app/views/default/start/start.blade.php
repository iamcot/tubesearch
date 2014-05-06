@extends(Config::get('home.theme').'/layout/page')
@section('pagecontent')
<div id="startpage">

    <div id="search">
        <a id="logo">Logo here</a>
        <div>
            <div class="input-group">
                {{ Form::open(array(
                'url' => 'search',
                'method'=>'get',
                )) }}
                <input type="text" class="form-control" name="s" placeholder="{{trans('common.searchvideo')}}...">
                      <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search" style=""></span></button>
                      </span>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop