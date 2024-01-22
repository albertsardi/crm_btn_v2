@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{ Form::hidden('jr', 'product') }}  

    {{-- Card --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Task</h3>
        </div>
        <div class="card-body">
            <div class='form-row'>
                <div class="form-group col">
                    <label>Name *</label>
                    <input name="$input" type="text" class="form-control form-control-sm">
                </div>
                <div class="form-group col">
                    <label>$label</label>
                    <input name="$input" type="text" class="form-control form-control-sm">
                </div>
            </div>
        </div>
    </div><!-- end card-->
    
    </form>
@stop

@section('modal')
@stop
                    
@section('js')
    <script>
        $(document).ready(function() {
           //init page
            //$(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            //$('select.select2').select2({ theme: "bootstrap" });
           
            //save data
            $("button#cmSave").click(function(e){
                e.preventDefault();
                var formdata=$('form').serialize();
                $('#formData').submit();
                
            });
        });
        
    </script>
@stop

