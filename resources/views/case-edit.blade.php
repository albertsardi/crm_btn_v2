@extends('temp-master')

@section('css')
    <style>
    .select2-search { background-color: #00; }
    .select2-search input { background-color: #00; }
    .select2-container--default .select2-selection--single{
        background-color: #000;
    }
    .select2-results { background-color: black; }

    .select2-results__option[id*="Completed"],
    .select2-results__option[id*="Closed"],
    .select2-results__option[id*="Held"],
    .select2-results__option[id*="Closed Won"]
            { color: green; }
    .select2-results__option[id*="High"] { color: brown; }
    .select2-results__option[id*="Urgent"],
    .select2-results__option[id*="Duplicate"],
    .select2-results__option[id*="Closed Lost"],
    .select2-results__option[id*="Rejected"]
            { color: red; }
    </style>
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
                    <h3><i class="fa fa-check-square-o"></i> Case</h3>
                </div>
                <div class="card-body">
                    
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Name *</label>
                            <input name="name" type="text" class="form-control form-control-sm" value="{{$data->name??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Number</label><br/>
                            {{$data->number??0}}
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Status</label>
                            {!! Form::_select('status', $select->case_status??[], $data->status??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Account</label>
                            <input name="account_id" type="text" class="form-control form-control-sm" value="{{$data->account_id??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Priority</label>
                            {!! Form::_select('priority', $select->priority??[], $data->priority??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Contacts</label>
                            <input name="contact_id" type="text" class="form-control form-control-sm" value="{{$data->contact_id??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Type</label>
                            {!! Form::_select('type', $select->type??[], $data->type??'' ) !!} 
                        </div>
                        <div class="form-group col">
                        </div>
                    </div>

                    <div class='form-row mb-3'>
                        <label>Description</label>
                        <input name="description" type="text" class="form-control form-control-sm" value="{{$data->description??''}}">
                    </div>

                    <div class='form-row'>
                        <label>Attachments</label>
                    </div>
                    <div class='form-row'>
                        <button id='cmAttach' type='button' class='btn btn-sm btn-secondary' style='width:50px;'><i class='fa fa-paperclip'></i></button>
                    </div>
                </div>
            </div><!-- end card-->

            {{-- Card Stream --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Stream</h3>
                </div>
                <div class="card-body">
                    <div class='form-row'>
                        <input name="status_description" type="text" class="form-control form-control-sm" placeholder="Write your comment here" value="{{$data->status_description??''}}">
                    </div>
                    <div class='form-row stream'>
                        <img src='{{ asset('assets/images/profile-image/p1.png') }}' alt='profileImage' width='15px' height='15px' class='mt-1' /> 
                        <span class="badge badge-secondary mt-1 mx-1">New</span> <a href='' class='mr-1'>Muhammad Zaenal Mutaqin</a> created this case assigned to <a href='' class='ml-1'>Adinda R</a><br/>
                    </div>
                    <hr class='line-spliter' />
                    <div class='form-row'>
                        @php $dt = strtotime($data->created_at??'');@endphp
                        <div class='text-muted'>{{date('d M', $dt)}}</div>
                    </div>
                </div>
            </div><!-- end card-->

            {{-- Card Knowledege --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Knowledge Base Article</h3>
                </div>
                <div class="card-body">
                    <div class='form-row'>
                        No Data
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
                var resp = await axios.post("{{env('API_URL')}}/api/case/save/"+id, formdata);
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

