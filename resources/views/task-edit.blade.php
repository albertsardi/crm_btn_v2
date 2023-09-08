@extends('temp-master')

@section('css')
@stop

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div class='btn-group mb-2' role='group' aria-label='Button Group'>
        <button id='cmSave' type='button' class='btn btn-sm btn-primary' style='width:80px;'>Save</button>
        <button id='cmCancel'type='button' class='btn btn-sm btn-secondary' style='width:80px;'>Cancel</button>
    </div> 

    <div class='row'>
        <div class='col-9'> <!-- Col-content-->
            {{-- Card --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Task</h3>
                </div>
                <div class="card-body">
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Name * </label>
                            <input name="name" type="text" class="form-control form-control-sm" value="{{$data->name??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Parent</label>
                            <input name="parent_id" type="text" class="form-control form-control-sm" value="{{$data->parent_id??''}}">
                        </div>
                    </div>
                    
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Status</label>
                            {!! Form::_select('task_status', $select->task_status??[], $data->task_status??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Priority</label>
                            {!! Form::_select('priority', $select->priority??[], $data->priority??'' ) !!} 
                        </div>
                    </div>

                    <div class='form-row'>
                        @php
                            $dts = strtotime($data->date_start);
                            if ($dts) {
                                $dt = date('Y-m-d', $dts);
                                $tm = date('H:m', $dts);
                            }
                        @endphp
                        <div class="form-group col">
                            <label>Date Start </label>
                            <div class="row">
                                <div class="col mr-0 pr-0">
                                    {!! Form::_datebox('date_start', $dt??'', ['placeholder'=>"dd/mm/yyyy"]) !!} 
                                </div>
                                <div class="col ml-0 pl-0">
                                    <input name="time_start" type="text" class="form-control form-control-sm" value="{{$tm??''}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='form-row'>
                        @php
                            $dts = strtotime($data->date_end);
                            if ($dts) {
                                $dt = date('Y-m-d', $dts);
                                $tm = date('H:m', $dts);
                            }
                        @endphp
                        <div class="form-group col">
                            <label>Date Due </label>
                            <div class="row">
                                <div class="col mr-0 pr-0">
                                    {!! Form::_datebox('date_end', $dt??'', ['placeholder'=>"dd/mm/yyyy"]) !!} 
                                </div>
                                <div class="col ml-0 pl-0">
                                    <input name="time_end" type="text" class="form-control form-control-sm" value="{{$tm??''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class='form-row'>
                        <label>Description</label>
                        <input name="description" type="text" class="form-control form-control-sm" value="{{$data->description??''}}">
                    </div>

                    <div class='form-row'>
                        <label>Attachments</label>
                    </div>
                    <div class='form-row'>
                        <button id='cmAttach' type='button' class='btn btn-sm btn-dark' style='width:50px;'><i class='fa fa-paperclip'></i></button>
                    </div>
                </div>
            </div><!-- end card-->

            {{-- Card stream--}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Stream</h3>
                </div>
                <div class="card-body">
                    <div class='form-row mb-2 pb-2'>
                        <input name="$input" type="text" class="form-control form-control-sm" placeholder="Write you comment here">
                    </div>
                    <div class='form-row stream'>
                        <img src='{{ asset('assets/images/profile-image/p1.png') }}' alt='profileImage' width='15px' height='15px' class='mt-1' /> 
                        <span class="badge badge-secondary mt-1 mx-1">New</span> <a href='' class='mr-1'>Muhammad Zaenal Mutaqin</a> created this case assigned to <a href='' class='ml-1'>Adinda R</a><br/>
                    </div>
                    <hr class='line-spliter' />
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
                        <label class='form-control-plaintext'>{{date('d M Y H:i',strtotime($data->created_at))??''}} > <a href='{{$data->created_by_id??''}}'>{{$data->created_by_name??''}}</a></label>
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
                var resp = await axios.post("{{env('API_URL')}}/api/task/save/"+id, formdata);
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

