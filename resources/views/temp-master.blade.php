<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRM - Bank BTN</title>
<meta name="description" content="CRM - Bank BTN">
<meta name="author" content="Albert - (c)Praisindo">

<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<html lang="en">
<head>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- BEGIN CSS for this page -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/plugin/DatePicker/bootstrap-datepicker.standalone.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/plugin/select2/select2.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/plugin/select2/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/ribbon.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
    
    
    <link href="{{ asset('assets/css/style-dark.css') }}" rel="stylesheet" type="text/css" >
    @yield('css')
    <!-- END CSS for this page -->
</head>

<!--<body class="adminbody widescreen" ng-controller="formCtrl">-->
<body >
<div id="main">
	<!-- top bar navigation -->
    @include('topmenu')
    <!-- End Navigation -->

    <!-- Left Sidebar -->
    @include('menu')
    <!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">
			    <div class="row">
					<div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">{{ $caption }}</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Forms</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
					</div>
			    </div>

                <!-- alert info -->
			    <div id='result'></div>
                @include('alertinfo')
                <!-- End alert info -->
            
            {{-- <form > --}}
                <!-- panel button -->
                {{-- @include('buttonpanel',['jr'=>'customer']) --}}
                <!--
                <div class="row">
                    <div class="card card-body mb-2">
                        <div class="form-group row">
                            <div class="col">
                                <button id='cmSave2' type='submit' class="btn btn-primary btn-sm btn-submit">Save</button>
                                <button id='cmPrint' type="submit" class="btn btn-primary btn-sm">Print</button>
                            </div>
                            <div class="col text-right">
                                
                            </div>
                        </div>
                    </div>
			    </div>
                -->

        
                @yield('content')
                
                <div class='row'>
                    @yield('tab')
                </div>

                <div class='row'>
                    @yield('grid')
                </div>

                {{-- <div class='row'>
                    @yield('modal')
                </div> --}}

                <div class='row'>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        Created {{$data->CreatedDate ?? ''}} by {{$data->CreatedBy ?? ''}} 
                    </div>
                </div>

            {{-- </form> --}}
            
            </div>
			<!-- END container-fluid -->
                
                

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		<? #require 'footer.php' ?>
	</footer>

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/plugin/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugin/DatePicker/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/plugin/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugin/bootstrap.min.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('assets/plugin/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugin/fastclick.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugin/select2/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugin/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pikeadmin.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/textwlookup.js') }}" type="text/javascript"></script> --}}
<script type="text/javascript">
   $(document).ready(function() {
		//init for checkbox
        $("input[type=checkbox]").change(function() {
			$(this).val( (this.checked)? '1' : '0' );
		})
        //init datepicker
        $('.datepicker').datepicker({
            //format: 'dd/mm/yyyy',
            format: 'yyyy-mm-dd',
            clearBtn:true,
        });
        //init textwselect
        $('.xxmselect2').select2({
            theme: "bootstrap",
            /*ajax: {
                url: 'http://localhost/lav7_PikeAdmin/'+api,
                dataType: 'json',
            },*/
            templateResult: function (dat) {
                var r = [dat.id, dat.text];
                var $result = $(
                    '<div class="row">' +
                    '<div class="col-md-3">' + r[0] + '</div>' +
                    '<div class="col-md-9">' + r[1] + '</div>' +
                    '</div>'
                );
                return $result;
            },
            templateSelection: function (dat) {
                var r = [dat.id, dat.text];
                var $result = $(
                    '<div class="row">' +
                    '<div class="col-md-3">' + r[0] + '</div>' +
                    '<div class="col-md-9">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            //matcher: function(term, text) {
            // TODO: search nya mash belum jalamconsole.log([term, text]);
            //return text.toUpperCase().indexOf(term.toUpperCase())>=0 || option.val().toUpperCase().indexOf(term.toUpperCase())>=0;
            //if (text.toUpperCase().indexOf(term.toUpperCase())==0) return true;
            //return false;
            //}
        });

        //init select2
        $('.select2').select2({
            theme: "bootstrap",
            //theme: "dark-adminlte",
            placeholder: 'Select an option'
        });
        
        $('button.btn:disabled').removeClass('btn-primary').addClass('btn-secondary')
	})
</script>
@yield('js')
<!-- END Java Script for this page -->

</body>
</html>

<!-- Modal -->
@yield('modal')
<!-- End Modal -->


