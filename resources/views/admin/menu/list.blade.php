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
                  <i class="icon-settings font-dark"></i>
                  <span class="caption-subject font-dark sbold uppercase">{!! trans('labels.breadcrumb.menuList') !!}</span>
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
                                    <div class="dd-handle"> {{$v['name']}} </div>
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
            132
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
</script>
@endsection