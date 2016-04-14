@extends('layouts.admin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/jstree/dist/themes/default/style.min.css')}}">
@endsection
@section('content')
<div class="page-bar">
  <ul class="page-breadcrumb">
      <li>
          <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
          <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span>{!! trans('labels.breadcrumb.userList') !!}</span>
      </li>
  </ul>
</div>
<!-- END PAGE BAR -->
<div id="tree_3" class="tree-demo"> </div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('backend/plugins/jstree/dist/jstree.min.js')}}"></script>
<script>
  $("#tree_3").jstree({
    "core" : {
        "themes" : {
            "responsive": false
        }, 
        // so that create works
        "check_callback" : true,
        'data': [{
                "text": "Parent Node",
                "children": [{
                    'id' : 'node_2',
                    "text": "Initially selected",
                    "state": {
                        "selected": true
                    }
                }, {
                    "text": "Custom Icon",
                    "icon": "fa fa-warning icon-state-danger"
                }, {
                    "text": "Initially open",
                    "icon" : "fa fa-folder icon-state-success",
                    "state": {
                        "opened": true
                    },
                    "children": [
                        {"text": "Another node", "icon" : "fa fa-file icon-state-warning"}
                    ]
                }, {
                    "text": "Another Custom Icon",
                    "icon": "fa fa-warning icon-state-warning"
                }, {
                    "id" : "jsssss",
                    "text": "Disabled Node",
                    "icon": "fa fa-check icon-state-success",
                    "state": {
                        "disabled": true
                    }
                }, {
                    "text": "Sub Nodes",
                    "icon": "fa fa-folder icon-state-danger",
                    "children": [
                        {"text": "Item 1", "icon" : "fa fa-file icon-state-warning"},
                        {"text": "Item 2", "icon" : "fa fa-file icon-state-success"},
                        {"text": "Item 3", "icon" : "fa fa-file icon-state-default"},
                        {"text": "Item 4", "icon" : "fa fa-file icon-state-danger"},
                        {"text": "Item 5", "icon" : "fa fa-file icon-state-info"}
                    ]
                }]
            },
            "Another Node"
        ]
    },
    "types" : {
        "default" : {
            "icon" : "fa fa-folder icon-state-warning icon-lg"
        },
        "file" : {
            "icon" : "fa fa-file icon-state-warning icon-lg"
        }
    },
    "state" : { "key" : "demo2" },
    "plugins" : [ "contextmenu", "dnd", "state", "types" ]
}).on('move_node.jstree', function(e,data){
  console.info(data);
});

</script>
@endsection