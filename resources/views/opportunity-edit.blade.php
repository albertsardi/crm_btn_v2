@extends('temp-master')

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
                    <h3><i class="fa fa-check-square-o"></i> Opportunity</h3>
                </div>
                <div class="card-body">
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Product Category</label>
                            {!! Form::_select('product_category', $select->product_category??[], $data->product_category??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Opportunity Name *</label>
                            <input name="name" type="text" class="form-control form-control-sm" value="{{$data->name??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Opportunity Id</label>
                            <input name="opportunity_id" type="text" class="form-control form-control-sm" value="{{$data->opportunity_id??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Account ID *</label>
                            <input name="account_id" type="text" class="form-control form-control-sm" value="{{$data->account_id??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Opportunity Type</label>
                            {!! Form::_select('opportunity_type', $select->opportunity_type??[], $data->opportunity_type??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Amount *</label>
                            <input name="amount" type="text" class="form-control form-control-sm" value="{{$data->amount??0}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Close Date *</label>
                            {!! Form::_datebox('close_date', $data->close_date??'') !!} 
                        </div>
                        <div class="form-group col">
                            <label>Sales Stage</label>
                            {!! Form::_select('sales_stage', $select->sales_stage??[], $data->sales_stage??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Probability (%) *</label>
                            {!! Form::_select('probability', $select->probability??[], $data->probability??'' ) !!} 
                        </div>
                    </div>
                    
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Next Step</label>
                            <input name="next_step" type="text" class="form-control form-control-sm" value="{{$data->next_step??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Lead Source</label>
                            <input name="lead_source" type="text" class="form-control form-control-sm" value="{{$data->lead_source??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Status</label>
                            {!! Form::_select('status', $select->opportunity_status??[], $data->status??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>Tag Set Name</label>
                            <input name="tag_set_name" type="text" class="form-control form-control-sm" value="{{$data->tag_set_name??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                    <div class="form-group col">
                            <label>Duration</label><br/>
                            {{$data->duration??'0'}} day(s)
                        </div>
                    </div>

                    <div class='form-row'>
                        <label>Description</label>
                        <input name="description" type="text" class="form-control form-control-sm" value="{{$data->description??''}}">
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
                    <div class='form-row'>
                        [icon]<span class="badge badge-secondary mt-1">New</span><a href=''>Adinda R</a> created this lead self-assigned<br/>
                    </div>
                    <div class='form-row'>
                        @php $dt = strtotime($data->created_at??'');@endphp
                        <div class='text-muted'>{{date('d M', $dt)}}</div>
                    </div>
                </div>
            </div><!-- end card-->

            {{-- Card Document --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Documents</h3>
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
                </div><!-- end card-->
            </div><!-- end col-->
        </div>
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
                var resp = await axios.post("{{env('API_URL')}}/api/opportunity/save/"+id, formdata);
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

