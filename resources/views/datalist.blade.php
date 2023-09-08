@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{-- {{ Form::hidden('jr', {{$jr}}) }}   --}}

    <div class='row mb-3'>
        <div class='col'> </div>
        <div class='col text-right'>
            <a href='{{ url($jr).'/' }}' class='btn btn-sm btn-dark' style='width:150px;'>+ Create {{ Str::title($jr) }}</a>
        </div>
    </div>

    {{-- find text --}}
    <div class='form-row mb-2'>
        <div class="input-group mb-3">
            <div class="input-group-prepend xxcolor-brown">
                <span class="input-group-text xxcolor-brown" id="find">Authorized</span>
            </div>
            <input type="text" class="form-control" id="find-text" onkeyup="findgrid()">
            {{-- <input type="text" class="form-control" id="find-text" onkeyup="findgrid2()"> --}}
            <div class="input-group-append">
                <span class="input-group-text"><i class='fa fa-search'></i></span>
            </div>
        </div>
    </div>
    
    {{-- Data list --}}
    {!! $grid !!}

@stop

@section('modal')
    {{-- @include('modal.modal-account')  --}}
@stop
                    
@section('js')
    <script src="{{ asset('assets/js/tablesearch.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
           //init page
            //$(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            //$('select.select2').select2({ theme: "bootstrap" });

            //init confirmation box
            
           
            //save data
            $("button#cmSave").click(async function(e){ //using ajax
                e.preventDefault();
            });
            //delete data
            $("button.cmDel").click(function(e){ 
                e.preventDefault();
                var id = $(this).attr("data-id");
                //alert('delete '+id);
                bootbox.confirm({
                            //title: 'Destroy planet?',
                            message: 'Are you sure want to delete ?',
                            buttons: {
                                cancel: { label: '<i class="fa fa-times"></i> No' },
                                confirm: { label: '<i class="fa fa-check"></i> Yes' }
                            },
                            callback: function (result) {
                                console.log('This was logged in the callback: ' + result);
                                if(result) {

                                }
                            }
                });
            });
        });

        function findgrid() {
            // Declare variables
            var input, filter, table, tr, td, i, c, txtValue;
            input = document.getElementById("find-text");
            filter = input.value.toUpperCase();
            table = document.getElementById("list-table");
            tr = table.getElementsByTagName("tr");
            cols = table.rows[0].cells.length;
            // Loop semua data di table, dan hide yg gak sama denga filter
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        //tr[i].style.display = "none";
                        if (tr[i].style.display == "") tr[i].style.display = "none";
                    }
                }
            }
        }

        function findgrid2() {
            var input = document.getElementById("find-text");
            searchTable(input.value, 'list-table', 0)
            searchTable(input.value, 'list-table', 1)
            searchTable(input.value, 'list-table', 2)
            searchTable(input.value, 'list-table', 3)
            searchTable(input.value, 'list-table', 4)
            searchTable(input.value, 'list-table', 5)
        }
        
    </script>
@stop

