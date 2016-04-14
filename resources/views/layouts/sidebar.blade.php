<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  sidebar-search-bordered" action="" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="fa fa-times"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="fa fa-search"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="heading start">
                <h3 class="uppercase">Dashboard</h3>
            </li>
            <li class="nav-item active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">System</h3>
            </li>
            <li class="nav-item  {{active_class(if_uri_pattern(['admin/user*']),'active open')}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title">系统管理</span>
                    <span class="arrow {{active_class(if_uri_pattern(['admin/user*']),'open')}}""></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{url('admin/user')}}" class="nav-link">
                            <i class="fa fa-users"></i>
                            <span class="title">用户管理</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/role')}}" class="nav-link ">
                            <i class="fa fa-male"></i>
                            <span class="title">角色管理</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/permission')}}" class="nav-link ">
                            <i class="fa fa-paper-plane"></i>
                            <span class="title">权限管理</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/menu')}}" class="nav-link ">
                            <i class="fa fa-navicon"></i>
                            <span class="title">菜单管理</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">Components</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="components_date_time_pickers.html" class="nav-link ">
                            <span class="title">Date & Time Pickers</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_color_pickers.html" class="nav-link ">
                            <span class="title">Color Pickers</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_select2.html" class="nav-link ">
                            <span class="title">Select2 Dropdowns</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_bootstrap_select.html" class="nav-link ">
                            <span class="title">Bootstrap Select</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_multi_select.html" class="nav-link ">
                            <span class="title">Multi Select</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                            <span class="title">Select Splitter</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_typeahead.html" class="nav-link ">
                            <span class="title">Typeahead Autocomplete</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_bootstrap_tagsinput.html" class="nav-link ">
                            <span class="title">Bootstrap Tagsinput</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_bootstrap_switch.html" class="nav-link ">
                            <span class="title">Bootstrap Switch</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_bootstrap_maxlength.html" class="nav-link ">
                            <span class="title">Bootstrap Maxlength</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_bootstrap_fileinput.html" class="nav-link ">
                            <span class="title">Bootstrap File Input</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_bootstrap_touchspin.html" class="nav-link ">
                            <span class="title">Bootstrap Touchspin</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_form_tools.html" class="nav-link ">
                            <span class="title">Form Widgets & Tools</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_context_menu.html" class="nav-link ">
                            <span class="title">Context Menu</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_editors.html" class="nav-link ">
                            <span class="title">Markdown & WYSIWYG Editors</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_code_editors.html" class="nav-link ">
                            <span class="title">Code Editors</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_ion_sliders.html" class="nav-link ">
                            <span class="title">Ion Range Sliders</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_noui_sliders.html" class="nav-link ">
                            <span class="title">NoUI Range Sliders</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="components_knob_dials.html" class="nav-link ">
                            <span class="title">Knob Circle Dials</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Form Stuff</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Bootstrap Form
                                <br>Controls</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls_md.html" class="nav-link ">
                            <span class="title">Material Design
                                <br>Form Controls</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_icheck.html" class="nav-link ">
                            <span class="title">iCheck Controls</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_layouts.html" class="nav-link ">
                            <span class="title">Form Layouts</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_editable.html" class="nav-link ">
                            <span class="title">Form X-editable</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_wizard.html" class="nav-link ">
                            <span class="title">Form Wizard</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_validation.html" class="nav-link ">
                            <span class="title">Form Validation</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_image_crop.html" class="nav-link ">
                            <span class="title">Image Cropping</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_fileupload.html" class="nav-link ">
                            <span class="title">Multiple File Upload</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_dropzone.html" class="nav-link ">
                            <span class="title">Dropzone File Upload</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Tables</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Static Tables</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="table_static_basic.html" class="nav-link "> Basic Tables </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_static_responsive.html" class="nav-link "> Responsive Tables </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Datatables</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                            </li>
                            <li class="nav-item ">
                                <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="?p=" class="nav-link nav-toggle">
                    <i class="icon-wallet"></i>
                    <span class="title">Portlets</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="portlet_boxed.html" class="nav-link ">
                            <span class="title">Boxed Portlets</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="portlet_light.html" class="nav-link ">
                            <span class="title">Light Portlets</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="portlet_solid.html" class="nav-link ">
                            <span class="title">Solid Portlets</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="portlet_ajax.html" class="nav-link ">
                            <span class="title">Ajax Portlets</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="portlet_draggable.html" class="nav-link ">
                            <span class="title">Draggable Portlets</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Charts</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="charts_amcharts.html" class="nav-link ">
                            <span class="title">amChart</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="charts_flotcharts.html" class="nav-link ">
                            <span class="title">Flotchart</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="charts_flowchart.html" class="nav-link ">
                            <span class="title">Flowchart</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-pointer"></i>
                    <span class="title">Maps</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="maps_google.html" class="nav-link ">
                            <span class="title">Google Maps</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="maps_vector.html" class="nav-link ">
                            <span class="title">Vector Maps</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->