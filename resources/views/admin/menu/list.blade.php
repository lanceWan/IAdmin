@extends('layouts.admin')
@section('css')
<link href="{{asset('backend/plugins/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-bar">
  <ul class="page-breadcrumb">
      <li>
          <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
          <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span>{!! trans('labels.breadcrumb.menuList') !!}</span>
      </li>
  </ul>
</div>
<div class="row margin-top-40">
    <div class="col-md-12">
        <div class="col-md-6">
          <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-green-sharp"></i>
                <span class="caption-subject font-green-sharp sbold uppercase">{!! trans('labels.breadcrumb.menuList') !!}</span>
              </div>
              <div class="actions">
                  <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
              </div>
            </div>
              <div class="portlet-body">
                  <div class="dd" id="nestable_list">
                      <ol class="dd-list">
                          @if($menus)
                          @foreach($menus as $v)
                          @if($v['child'])
                          <li class="dd-item" data-id="{{$v['id']}}">
                              <div class="dd-handle"> {{$v['name']}} </div>
                              <ol class="dd-list">
                                  @foreach($v['child'] as $val)
                                  <li class="dd-item" data-id="{{$val['id']}}">
                                      <div class="dd-handle"> {{$val['name']}} </div>
                                  </li>
                                  @endforeach
                              </ol>
                          </li>
                          @else
                              <li class="dd-item" data-id="{{$v['id']}}">
                                  <div class="dd-handle">
                                  {{$v['name']}}
                                    <div class="pull-right action-buttons">
                                      <a href="http://baidu.com" target="_black" class="btn-xs yellow tooltips" data-original-title="{{trans('crud.create')}}"  data-placement="top"><i class="fa fa-plus"></i></a>
                                      <a href="http://baidu.com" target="_black" class="btn-xs yellow tooltips" data-original-title="{{trans('crud.edit')}}"  data-placement="top"><i class="fa fa-pencil"></i></a>
                                    </div>
                                  </div>
                              </li>
                          @endif
                          @endforeach
                          @endif
                      </ol>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-green-sharp"></i>
                <span class="caption-subject font-green-sharp sbold uppercase">{!! trans('labels.menu.detail') !!}</span>
              </div>
              <div class="actions">
                  <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
              </div>
            </div>
              <div class="portlet-body form">
                @if (isset($errors) && count($errors) > 0 )
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    @foreach($errors->all() as $error)
                        <span class="help-block"><strong>{{ $error }}</strong></span>
                    @endforeach
                </div>
                @endif
                <form role="form" class="form-horizontal" method="POST" action="{{url('admin/menu')}}">
                  {!! csrf_field() !!}
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="name">{{trans('labels.menu.name')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('labels.menu.name')}}" value="{{old('name')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="pid">{{trans('labels.menu.pid')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="pid" name="pid" placeholder="{{trans('labels.menu.pid')}}" value="{{old('pid')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="language">{{trans('labels.menu.language')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="language" name="language" placeholder="{{trans('labels.menu.language')}}" value="{{old('language')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="icon">{{trans('labels.menu.icon')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="icon" name="icon" placeholder="{{trans('labels.menu.icon')}}" value="{{old('icon')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="slug">{{trans('labels.menu.slug')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="slug" name="slug" placeholder="{{trans('labels.menu.slug')}}" value="{{old('slug')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="url">{{trans('labels.menu.url')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="url" name="url" placeholder="{{trans('labels.menu.url')}}" value="{{old('url')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="description">{{trans('labels.menu.description')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="description" name="description" placeholder="{{trans('labels.menu.description')}}" value="{{old('description')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="sort">{{trans('labels.menu.sort')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="sort" name="sort" placeholder="{{trans('labels.menu.sort')}}" value="{{old('sort')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.permission.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="status1" name="status" value="{{config('admin.global.status.active')}}" class="md-radiobtn" @if(old('status') == config('admin.global.status.active')) checked @endif>
                                    <label for="status1">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.permission.active.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status2" name="status" value="{{config('admin.global.status.audit')}}" class="md-radiobtn" @if(old('status') === config('admin.global.status.audit')) checked @endif>
                                    <label for="status2">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.permission.audit.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status3" name="status" value="{{config('admin.global.status.trash')}}" class="md-radiobtn" @if(old('status') == config('admin.global.status.trash')) checked @endif>
                                    <label for="status3">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.permission.trash.1')}} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <button type="submit" class="btn blue">{{trans('crud.submit')}}</button>
                          </div>
                      </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="{{asset('backend/plugins/jquery-nestable/jquery.nestable.js')}}"></script>
<script>
$('#nestable_list').nestable({
    "maxDepth":2
})
.on('dragEnd', function(event, item, source, destination, position) {
    var currentItem = $(item).attr('data-id');
    var itemParent = $(item).parent().parent().attr('data-id');
    console.log(currentItem,itemParent);
});
$('.dd-handle a').on('mousedown', function(e){
  e.stopPropagation();
});

</script>
@endsection