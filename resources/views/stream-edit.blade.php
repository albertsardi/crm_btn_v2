@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{ Form::hidden('jr', 'product') }}  

    <div class='row' style="color:lightgray;">    
        <div class='col-1'></div>
        <div class='col-10'>
            <div class='form-row mb-3 pb-2'>
                <input name="$input" type="text" class="form-control form-control-sm" placeholder="Write you comment here">
            </div>
            <div class='form-row stream'>
                <img src='{{ asset('assets/images/profile-image/p1.png') }}' alt='profileImage' width='15px' height='15px' class='mt-1' /> 
                <span class="badge badge-secondary mt-1 mx-1">New</span> <a href='' class='mr-1'>Muhammad Zaenal Mutaqin</a> created this case assigned to <a href='' class='ml-1'>Adinda R</a><br/>
            </div>
            <hr class='line-spliter' />
            <div class='form-row stream'>
                <img src='{{ asset('assets/images/profile-image/p1.png') }}' alt='profileImage' width='15px' height='15px' class='mt-1' /> 
                <span class="badge badge-secondary mt-1 mx-1">New</span> <a href='' class='mr-1'>Muhammad Zaenal Mutaqin</a> created this case assigned to <a href='' class='ml-1'>Adinda R</a><br/>
            </div>
            <hr class='line-spliter' />
            <div class='form-row stream'>
                <img src='{{ asset('assets/images/profile-image/p1.png') }}' alt='profileImage' width='15px' height='15px' class='mt-1' /> 
                <span class="badge badge-secondary mt-1 mx-1">New</span> <a href='' class='mr-1'>Muhammad Zaenal Mutaqin</a> created this case assigned to <a href='' class='ml-1'>Adinda R</a><br/>
            </div>
            <hr class='line-spliter' />
        </div>
        <div class='col-1'></div>
    </div>
    
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

