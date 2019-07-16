<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ config('app.sort_name') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{!! asset('images/logo/favicon.png') !!}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <link href="{!! asset('material-icon/material-icons.css') !!}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{!! asset('admin/plugins/bootstrap/css/bootstrap.css') !!}" rel="stylesheet">


    <!-- Bootstrap Select Css -->
    <link href="{!! asset('admin/plugins/bootstrap-select/css/bootstrap-select.css') !!}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{!! asset('admin/plugins/node-waves/waves.css') !!}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{!! asset('admin/plugins/animate-css/animate.css') !!}" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="{!! asset('admin/plugins/sweetalert/sweetalert.css') !!}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{!! asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') !!}" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="{!! asset('admin/plugins/morrisjs/morris.css') !!}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{!! asset('admin/css/style.css') !!}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{!! asset('admin/css/themes/all-themes.css') !!}" rel="stylesheet" />

    <!-- toastr -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('css/toastr.min.css')}}"/>

    {{-- this style used for borderless table
    --       no need to change this
    --}}
    <style type="text/css">.table.no-border tr td, .table.no-border tr th {border-width: 0;}</style>
    {{-- this style used for borderless table  --}}

    {{-- Datepicker --}}
    <link href="{!! asset('datepicker/datepicker.css') !!}" rel="stylesheet" />

    @yield('styles')
</head>

<body class="theme-deep-purple">
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{!! route('home') !!}">{{ config('app.name') }}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    {{-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> --}}
                    <!-- #END# Call Search -->

                    @if (Route::has('login'))
                        @auth
                            <li class="pull-right">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="pull-right">
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    @endif
                    <li class="pull-right">
                        <a href="{!! route('home') !!}">Registration</a>
                    </li>

                    <li class="pull-right">
                        <a href="{!! route('payment.view') !!}">Payment</a>
                    </li>

                    <li class="pull-right">
                        <a data-toggle="modal" data-target="#defaultModal">Applicant</a>
                    </li>

                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    @if ($exam_seasons->count())
                                        @foreach ($exam_seasons as $exam_season)
                                            <li>
                                                <a href="{!! route('notice.pdf',$exam_season->examSeason->id) !!}">
                                                    <div class="icon-circle bg-blue-grey">
                                                        <i class="material-icons">comment</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>{{ $exam_season->examSeason->exam_season }}</h4>
                                                        <p>
                                                            <i class="material-icons">supervisor_account</i> Approved Applicant List
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="footer">
                                {{-- <a href="javascript:void(0);">View All Notifications</a> --}}
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <section>
        {{-- applicant --}}
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Applicant</h4>
                    </div>
                    <form class="" action="{!! route('applicant.details') !!}" method="get">
                        <div class="modal-body">
                            <input placeholder="Enter Registration Token" class="form-control" type="text" name="reg_token" value="" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">Search</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="">
            <div class="col-md-12">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <script src="{!! asset('admin/plugins/bootstrap-notify/bootstrap-notify.js') !!}"></script>
    <script src="{!! asset('admin/js/pages/ui/modals.js') !!}"></script>

    <!-- Jquery Core Js -->
    <script src="{!! asset('admin/plugins/jquery/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{!! asset('admin/plugins/bootstrap/js/bootstrap.js') !!}"></script>

    <!-- Select Plugin Js -->
    <script src="{!! asset('admin/plugins/bootstrap-select/js/bootstrap-select.js') !!}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{!! asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.js') !!}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{!! asset('admin/plugins/node-waves/waves.js') !!}"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="{!! asset('admin/plugins/jquery-validation/jquery.validate.js') !!}"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="{!! asset('admin/plugins/jquery-steps/jquery.steps.js') !!}"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="{!! asset('admin/plugins/sweetalert/sweetalert.min.js') !!}"></script>

    <!-- Custom Js -->
    <script src="{!! asset('admin/js/pages/forms/form-wizard.js') !!}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{!! asset('admin/plugins/jquery-datatable/jquery.dataTables.js') !!}"></script>
    <script src="{!! asset('admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') !!}"></script>
    <script src="{!! asset('admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js') !!}"></script>

    <!-- Custom Js -->
    <script src="{!! asset('admin/js/admin.js') !!}"></script>
    {{-- <script src="{!! asset('admin/js/pages/index.js') !!}"></script> --}}
    <script src="{!! asset('admin/js/pages/tables/jquery-datatable.js') !!}"></script>

    <!-- Demo Js -->
    <script src="{!! asset('admin/js/demo.js') !!}"></script>

    <!-- Datepicker -->
    <script src="{!! asset('datepicker/datepicker.js') !!}"></script>

    <!-- toastr -->
    <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
    <!-- END TEMPLATE -->
    <script type="text/javascript">
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
        @if (Session::has('info'))
            toastr.info("{{Session::get('info')}}")
        @endif
    </script>
    <script>
        $(function() {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                format: 'dd-mm-yyyy',
                zIndex: 2048,
            });
        });
    </script>
    @yield('scripts')

</body>

</html>
