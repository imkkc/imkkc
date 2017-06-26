
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="packages/admin/AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="packages/admin/font-awesome/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="packages/admin/AdminLTE/dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="packages/prism/prism.css">
    <link rel="stylesheet" href="packages/admin/AdminLTE/plugins/iCheck/all.css">
    <link rel="stylesheet" href="packages/admin/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="packages/admin/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="packages/admin/bootstrap-fileinput/css/fileinput.min.css">
    <link rel="stylesheet" href="packages/admin/AdminLTE/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css">
    <link rel="stylesheet" href="packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css">
    <link rel="stylesheet" href="packages/admin/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" href="packages/admin/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet" href="packages/codemirror-5.20.2/lib/codemirror.css">
    <link rel="stylesheet" href="packages/wangEditor-2.1.22/dist/css/wangEditor.min.css">
    <link rel="stylesheet" href="packages/bootstrap-markdown-editor/dist/css/bootstrap-markdown-editor.css">

    <link rel="stylesheet" href="packages/admin/nestable/nestable.css">
    <link rel="stylesheet" href="packages/admin/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="packages/admin/bootstrap3-editable/css/bootstrap-editable.css">
    <link rel="stylesheet" href="packages/admin/google-fonts/fonts.css">
    <link rel="stylesheet" href="packages/admin/AdminLTE/dist/css/AdminLTE.min.css">

    <!-- REQUIRED JS SCRIPTS -->
    <script src="packages/admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <script src="packages/admin/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="packages/admin/AdminLTE/dist/js/app.min.js"></script>
    <script src="packages/admin/jquery-pjax/jquery.pjax.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>La</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Laravel</b> admin</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">



                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="http://120.26.143.106/upload/image/8ea42f1c18060434c0ee26d97a76e7bc.png" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Administrator</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="http://120.26.143.106/upload/image/8ea42f1c18060434c0ee26d97a76e7bc.png" class="img-circle" alt="User Image">

                                <p>
                                    Administrator
                                    <small>Member since admin </small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/admin/auth/setting" class="btn btn-default btn-flat">Setting</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/admin/auth/logout" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->



                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://120.26.143.106/upload/image/8ea42f1c18060434c0ee26d97a76e7bc.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Administrator</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <!--<form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
            </form>-->
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">Menu</li>

                <li>
                    <a href="/admin/"><i class="fa fa-bar-chart"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>Admin</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/admin/auth/users"><i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth/roles"><i class="fa fa-user"></i>
                                <span>Roles</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth/permissions"><i class="fa fa-bars"></i>
                                <span>Permissions</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth/menu"><i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth/logs"><i class="fa fa-history"></i>
                                <span>Operation log</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Demos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/admin/demo/tags"><i class="fa fa-tags"></i>
                                <span>Tags</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/articles"><i class="fa fa-anchor"></i>
                                <span>Orderable Grid</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/painters"><i class="fa fa-align-left"></i>
                                <span>painters</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/categories"><i class="fa fa-tree"></i>
                                <span>Model tree</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/videos"><i class="fa fa-file-image-o"></i>
                                <span>Videos</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/images"><i class="fa fa-image"></i>
                                <span>Images</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/posts"><i class="fa fa-file"></i>
                                <span>Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/users"><i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/demo/multiple-images"><i class="fa fa-image"></i>
                                <span>Multiple images</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-map-o"></i>
                        <span>China area</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/admin/china-area/province"><i class="fa fa-map"></i>
                                <span>Province</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/china-area/city"><i class="fa fa-building"></i>
                                <span>City</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/china-area/district"><i class="fa fa-bars"></i>
                                <span>District</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/china-area/nested"><i class="fa fa-bars"></i>
                                <span>多级联动</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/china-area/schema"><i class="fa fa-terminal"></i>
                                <span>China area schema</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/china-area/models"><i class="fa fa-database"></i>
                                <span>China area model</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Sakila</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/admin/sakila/actors"><i class="fa fa-users"></i>
                                <span>Actors</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/counties"><i class="fa fa-flag"></i>
                                <span>Countries</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/cities"><i class="fa fa-building"></i>
                                <span>Cities</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/category"><i class="fa fa-cubes"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/address"><i class="fa fa-map-marker"></i>
                                <span>Address</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/rentals"><i class="fa fa-credit-card"></i>
                                <span>Rentals</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/films"><i class="fa fa-film"></i>
                                <span>Film</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/customers"><i class="fa fa-group"></i>
                                <span>Customer</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/languages"><i class="fa fa-language"></i>
                                <span>Language</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/payments"><i class="fa fa-credit-card"></i>
                                <span>Payments</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/inventory"><i class="fa fa-bars"></i>
                                <span>Inventory</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/stores"><i class="fa fa-shopping-bag"></i>
                                <span>Store</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/staffs"><i class="fa fa-tty"></i>
                                <span>Staffs</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/models"><i class="fa fa-terminal"></i>
                                <span>Sakila Models</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/world/city"><i class="fa fa-building"></i>
                                <span>City</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sakila/schema"><i class="fa fa-bars"></i>
                                <span>Sakila schema</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>World</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/admin/world/country"><i class="fa fa-map-o"></i>
                                <span>Country</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/world/city"><i class="fa fa-building-o"></i>
                                <span>City</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/world/schema"><i class="fa fa-bars"></i>
                                <span>World Schema</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/world/models"><i class="fa fa-terminal"></i>
                                <span>Word Models</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Widgets</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gear"></i>
                                <span>Forms</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="/admin/form1"><i class="fa fa-gear"></i>
                                        <span>Form1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/form2"><i class="fa fa-bars"></i>
                                        <span>Form2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/form3"><i class="fa fa-bars"></i>
                                        <span>Form3</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/box"><i class="fa fa-cube"></i>
                                <span>Box</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/notice"><i class="fa fa-ban"></i>
                                <span>Notice</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/carousel"><i class="fa fa-image"></i>
                                <span>Carousel</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/info-box"><i class="fa fa-info"></i>
                                <span>Info Box</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/tab"><i class="fa fa-database"></i>
                                <span>Tab</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/table"><i class="fa fa-table"></i>
                                <span>Tables</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-movie-o"></i>
                        <span>Data from API</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/admin/movies/in-theaters"><i class="fa fa-bars"></i>
                                <span>In Theaters</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/movies/coming-soon"><i class="fa fa-bars"></i>
                                <span>Coming soon</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/movies/top250"><i class="fa fa-bars"></i>
                                <span>Top250</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/system/login-history"><i class="fa fa-history"></i>
                        <span>Login history</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/editors"><i class="fa fa-pencil-square-o"></i>
                        <span>Editors</span>
                    </a>
                </li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper" id="pjax-container">
        <section class="content-header">
            <h1>
                Roles
                <small>List</small>
            </h1>

        </section>

        <section class="content">


            <div class="row"><div class="col-md-12"><div class="box">
                        <div class="box-header">

                            <h3 class="box-title"></h3>

        <span style="position: absolute;left: 10px;top: 5px;">
             <a class="btn btn-sm btn-primary grid-refresh"><i class="fa fa-refresh"></i> Refresh</a>
        </span>

                            <div class="box-tools">
                                <div class="form-inline pull-right">
                                    <form action="http://120.26.143.106/admin/auth/roles" method="get" pjax-container>
                                        <fieldset>

                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><strong>Id</strong></span>
                                                <input type="text" class="form-control" placeholder="Id" name="id" value=""></div>

                                            <div class="input-group input-group-sm">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </div>
                                                <div class="input-group-btn">
                                                    <a href="http://120.26.143.106/admin/auth/roles" class="btn btn-warning" ><i class="fa fa-undo"></i></a>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>
                                </div>

                                <div class="btn-group pull-right" style="margin-right: 10px">
                                    <a href="/admin/auth/roles?_export_=1" target="_blank" class="btn btn-sm btn-twitter">
                                        <i class="fa fa-download"></i>&nbsp;&nbsp;Export
                                    </a>
                                </div>


                                <div class="btn-group pull-right" style="margin-right: 10px">
                                    <a href="/admin/auth/roles/create" class="btn btn-sm btn-success">
                                        <i class="fa fa-save"></i>&nbsp;&nbsp;New
                                    </a>
                                </div>

                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th> </th>
                                    <th>ID<a class="fa fa-fw fa-sort" href="http://120.26.143.106/admin/auth/roles?_sort%5Bcolumn%5D=id&_sort%5Btype%5D=desc"></a></th>
                                    <th>Slug</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>

                                <tr >
                                    <td><input type="checkbox" class="grid-row-checkbox" data-id="1" /></td>
                                    <td>1</td>
                                    <td>administrator</td>
                                    <td>Administrator</td>
                                    <td></td>
                                    <td>2016-12-15 15:12:40</td>
                                    <td><a href="/admin/auth/roles/1/edit">
                                            <i class="fa fa-edit"></i>
                                        </a></td>
                                </tr>
                                <tr >
                                    <td><input type="checkbox" class="grid-row-checkbox" data-id="44" /></td>
                                    <td>44</td>
                                    <td>developer</td>
                                    <td>Developer</td>
                                    <td>2017-01-05 10:41:20</td>
                                    <td>2017-01-23 14:58:43</td>
                                    <td><a href="/admin/auth/roles/44/edit">
                                            <i class="fa fa-edit"></i>
                                        </a><a href="javascript:void(0);" data-id="44" class="grid-row-delete">
                                            <i class="fa fa-trash"></i>
                                        </a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            Showing <b>1</b> to <b>14</b> of <b>14</b> entries<ul class="pagination pagination-sm no-margin pull-right">
                                <!-- Previous Page Link -->
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>

                                <!-- Pagination Elements -->
                                <!-- "Three Dots" Separator -->

                                <!-- Array Of Links -->
                                <li class="page-item active"><span class="page-link">1</span></li>

                                <!-- Next Page Link -->
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            </ul>

                            <label class="control-label pull-right" style="margin-right: 10px; font-weight: 100;">

                                <small>Show</small>&nbsp;
                                <select class="input-sm grid-per-pager" name="per-page">
                                    <option value="http://120.26.143.106/admin/auth/roles?per_page=10" >10</option>
                                    <option value="http://120.26.143.106/admin/auth/roles?per_page=20" selected>20</option>
                                    <option value="http://120.26.143.106/admin/auth/roles?per_page=30" >30</option>
                                    <option value="http://120.26.143.106/admin/auth/roles?per_page=50" >50</option>
                                    <option value="http://120.26.143.106/admin/auth/roles?per_page=100" >100</option>
                                </select>
                                &nbsp;<small>entries</small>
                            </label>

                        </div>
                        <!-- /.box-body -->
                    </div></div></div>

        </section>
        <script data-exec-on-popstate>

            $(function () {
                $('.grid-row-checkbox').iCheck({checkboxClass:'icheckbox_minimal-blue'}).on('ifChanged', function () {
                    if (this.checked) {
                        $(this).closest('tr').css('background-color', '#ffffd5');
                    } else {
                        $(this).closest('tr').css('background-color', '');
                    }
                });

                $('.grid-row-delete').click(function() {
                    if(confirm("Are you sure to delete this item ?")) {
                        $.ajax({
                            method: 'post',
                            url: '/admin/auth/roles/' + $(this).data('id'),
                            data: {
                                _method:'delete',
                                _token:'ANFbNc8ZaZfy0EBU9ccKxYrluW945bcLPIqP9dCw'
                            },
                            success: function (data) {
                                $.pjax.reload('#pjax-container');

                                if (typeof data === 'object') {
                                    if (data.status) {
                                        toastr.success(data.message);
                                    } else {
                                        toastr.error(data.message);
                                    }
                                }
                            }
                        });
                    }
                });


                $('.grid-refresh').on('click', function() {
                    $.pjax.reload('#pjax-container');
                    toastr.success('Refresh succeeded !');
                });


                $('.grid-per-pager').on("change", function(e) {
                    $.pjax({url: this.value, container: '#pjax-container'});
                });

            });
        </script>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            <strong>Version</strong>&nbsp;&nbsp; 1.0
        </div>
        <!-- Default to the left -->
        <strong>Powered by <a href="https://github.com/z-song/laravel-admin" target="_blank">laravel-admin</a></strong>
    </footer>
</div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="packages/admin/AdminLTE/plugins/chartjs/Chart.min.js"></script>
<script src="packages/admin/nestable/jquery.nestable.js"></script>
<script src="packages/admin/toastr/build/toastr.min.js"></script>
<script src="packages/admin/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script src="packages/prism/prism.js"></script>
<script src="packages/clipboard/dist/clipboard.min.js"></script>
<script src="packages/admin/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script src="packages/admin/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="packages/admin/AdminLTE/plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
<script src="packages/admin/moment/min/moment-with-locales.min.js"></script>
<script src="packages/admin/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="packages/admin/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
<script src="packages/admin/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="packages/admin/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script src="packages/admin/number-input/bootstrap-number-input.js"></script>
<script src="packages/admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js"></script>
<script src="packages/admin/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<script src="packages/admin/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.min.js"></script>
<script src="packages/codemirror-5.20.2/lib/codemirror.js"></script>
<script src="packages/codemirror-5.20.2/addon/edit/matchbrackets.js"></script>
<script src="packages/codemirror-5.20.2/mode/htmlmixed/htmlmixed.js"></script>
<script src="packages/codemirror-5.20.2/mode/xml/xml.js"></script>
<script src="packages/codemirror-5.20.2/mode/javascript/javascript.js"></script>
<script src="packages/codemirror-5.20.2/mode/css/css.js"></script>
<script src="packages/codemirror-5.20.2/mode/clike/clike.js"></script>
<script src="packages/codemirror-5.20.2/mode/php/php.js"></script>
<script src="packages/wangEditor-2.1.22/dist/js/wangEditor.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
<script src="packages/bootstrap-markdown-editor/dist/js/bootstrap-markdown-editor.js"></script>


</body>
</html>
