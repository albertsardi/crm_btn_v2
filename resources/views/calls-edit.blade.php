@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{-- {{ Form::hidden('jr', 'product') }}   --}}

    <div class='btn-group mb-2' role='group' aria-label='Button Group'>
        <button id='cmSave' type='button' class='btn btn-sm btn-primary' style='width:80px;'>Save</button>
        <button id='cmCancel'type='button' class='btn btn-sm btn-secondary' style='width:80px;'>Cancel</button>
    </div> 

    <div class='row'>
        <div class='col-9'> <!-- Col-content-->
            {{-- Card --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Calls</h3>
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
                            {!! Form::_select('status', $select->call_status??[], $data->status??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Direction</label>
                            {!! Form::_select('direction', $select->direction??[], $data->direction??'' ) !!} 
                        </div>
                    </div>

                    <div class='form-row'>
                        @php
                            $dts = strtotime($data->date_start??date('Y-m-d H:i:s'));
                            if($dts) {
                                $dt = date('Y-m-d', $dts);
                                $tm = date('H:i:s', $dts);
                            }
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
                            {!! Form::_select('duration', $select->duration??[], $data->duration??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Reminders</label><br/>
                            <button id='cmAdd' type='button' class='btn btn-sm btn-secondary' style='width:50px;'><i class='fa fa-plus'></i></button>
                        </div>
                    </div>
                
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Repeat Type</label>
                            {!! Form::_select('repeat', $select->repeat_type??[], $data->repeat??'' ) !!} 
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
        </div><!-- end col-->
        @if(isset($data->created_at))
        <div class='col-3'><!-- Col-assigned-->
            {{-- Card Assigned --}}
            <div class="card mb-3">
                <div class="card-body style='color:white;'">
                    <div class='form-row pb-4'>
                        <label>Assigned User *</label>
                        <div class='input-group'>
                            <input name="assigned_user_id" type="hidden" value="{{$data->assigned_user_id??''}}">
                            <input name="assigned_user_name" type="text" class="form-control form-control-sm" value="{{$data->assigned_user_name??''}}">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-dark" type="button" id="cmLook">☰</button>
                            </div>
                        </div>
                    </div>
                    <div class='form-row form-group pb-4'>
                        <label class='my-0'>Created</label>
                        <label class='form-control-plaintext'>{{date('d M Y H:i',strtotime($data->created_at??''))}} > <a href='{{$data->created_by_id??''}}'>{{$data->created_by_name??''}}</a></label>
                    </div>
                </div>
            </div><!-- end card-->
        </div><!-- end col-->
        @endif
    </div>

    </form>
@stop

@section('modal')
@stop
                    
@section('js')
    <script src="{{ asset('assets/js/app-form.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            //init page

            //look button
            var look_table = `{!! $lookup['user'] !!}`;
            $("button#cmLook").click(function(e) {
                e.preventDefault();
                show_looktable(e, look_table);
            });
           
            //save data
            $("button#cmSave").click(async function(e){ //using ajax
                e.preventDefault();
                var formdata=$('form').serialize();
                var id = '{{$id}}';
                var resp = await axios.post("{{env('API_URL')}}/api/calls/save/"+id, formdata);
                //console.log(resp)
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

