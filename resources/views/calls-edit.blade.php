@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{ Form::hidden('jr', 'product') }}  

    {{-- Card --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Meeting</h3>
        </div>
        <div class="card-body">
            
            <div class='form-row'>
                <div class="form-group col">
                    <label>Subject Name *</label>
                    <input name="name" type="text" class="form-control form-control-sm" value="{{$data->name??''}}">
                </div>
                <div class="form-group col">
                    <label>Parent</label>
                    <input name="$input" type="text" class="form-control form-control-sm" value="{{$data->parent_id??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Status *</label>
                    <input name="status" type="text" class="form-control form-control-sm" value="{{$data->status??''}}">
                </div>
                <div class="form-group col">
                    <label>Direction</label>
                    <input name="direction" type="text" class="form-control form-control-sm" value="{{$data->direction??''}}">
                </div>
            </div>

            <div class='form-row'>
                @php
                    $dts = strtotime($data->date_start);
                    $dt = date('Y-m-d', $dts);
                    $tm = date('H:m', $dts);
                @endphp
                <div class="form-group col">
                    <label>Date Start *</label>
                    <div class="row">
                        <div class="col mr-0 pr-0">
                            {!! Form::_datebox('date_start', $dt??'') !!} 
                        </div>
                        <div class="col ml-0 pl-0">
                            <input name="time_start" type="text" class="form-control form-control-sm" value="{{$tm??''}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Duration</label>
                    <input name="$input" type="text" class="form-control form-control-sm" value="1h">
                </div>
                <div class="form-group col">
                    <label>Reminders</label><br/>
                    <button id='cmAdd' type='button' class='btn btn-sm btn-secondary' style='width:50px;'><i class='fa fa-plus'></i></button>
                </div>
            </div>
        
            <div class='form-row'>
                <div class="form-group col">
                    <label>Repeat Type</label>
                    <input name="repeat" type="text" class="form-control form-control-sm" value="{{$data->repeat??''}}">
                </div>
                <div class="form-group col">
                    <label>CIF</label>
                    <input name="c_i_f" type="text" class="form-control form-control-sm" value="{{$data->c_i_f??''}}">
                </div>
            </div>

            <div class='form-row'>
                <label>Description</label>
                <input name="description" type="text" class="form-control form-control-sm" value="{{$data->description??''}}">
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
            $("button#cmSave").click(async function(e){ //using ajax
                e.preventDefault();
                var formdata=$('form').serialize();
                var id = '{{$id}}';
                var resp = await axios.post(window.API_URL+"/api/calls/save/"+id, formdata);
                console.log(resp)
                if (resp.status==200) {
                    console.log(resp.data)
                    if (resp.data.status=='Error') {
                        alert('Error:: '+resp.data.message);
                    } else {
                        alert('datasave.');
                        if (id=='new' || id=='') window.location.href = window.location.href.replace("/new", "/"+resp.data.data.id);
                    }
                } else {
                    alert('Error')
                    console.log(resp)
                }
            });
        });
        
    </script>
@stop

