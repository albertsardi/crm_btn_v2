@extends('temp-master')
@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div class='btn-group mb-2' role='group' aria-label='Button Group'>
        <button id='cmSave' type='button' class='btn btn-sm btn-primary' style='width:80px;'>Save</button>
        <button id='cmCancel'type='button' class='btn btn-sm btn-secondary' style='width:80px;'>Cancel</button>
    </div>

     <div class='row'>
        <div class='col-9'>
            {{-- Card Overview --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Overview</h3>
                </div>
                <div class="card-body">
                    
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Name</label>
                            <div class="form-row">
                                <div class="col mx-0">
                                    {!! Form::_select('salutation_name', $select->salutation_name??[], $data->salutation_name??'' ) !!} 
                                </div>
                                <div class="col mx-0">
                                    <input name="first_name" type="text" class="form-control form-control-sm" placeholder="first" value="{{$data->first_name??''}}">
                                </div>
                                <div class="col mx-0">
                                    <input name="last_name" type="text" class="form-control form-control-sm" placeholder="last" value="{{$data->last_name??''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label>Customer Category *</label>
                            {!! Form::_select('customer_category', $select->customer_category??[], $data->customer_category??'' ) !!} 
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Email *</label>
                            <input name="email_opt_in" type="text" class="form-control form-control-sm" value="{{$data->email_opt_in??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Mobile Number *</label>
                            <input name="mobile" type="text" class="form-control form-control-sm" value="{{$data->mobile??''}}">
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>ID Type</label>
                            {!! Form::_select('id_type', $select->id_type??[], $data->id_type??'' ) !!} 
                        </div>
                        <div class="form-group col">
                            <label>ID Number</label>
                            <input name="id_number" type="text" class="form-control form-control-sm" value="{{$data->id_number??''}}">
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Product Category</label>
                            <input name="product_category" type="text" class="form-control form-control-sm" value="{{$data->product_category??''}}">
                        </div>
                        <div class="form-group col">
                            <label>FBI Percentage (%)</label>
                            {!! Form::_select('fbi_percentage', $select->fbi_percentage??[], $data->fbi_percentage??'' ) !!} 
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Nominal</label>
                            <input name="nominal" type="text" class="form-control form-control-sm" value="{{$data->nominal??0}}">
                        </div>
                        <div class="form-group col">
                            <label>Probability (%)</label>
                            {!! Form::_select('probability', $select->probability??[], $data->probability??'' ) !!} 
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="form-group col">
                            <label>FBI Estimation</label><br/>
                            <label>{{$fbi_estimation??0}}</label>
                        </div>
                        <div class="form-group col">
                        </div>
                    </div>
                </div>
            </div><!-- end card-->

            {{-- Card Stream --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Stream</h3>
                </div>
                <div class="card-body">
                    <div class='form-row mb-3'>
                        <input name="status_description" type="text" class="form-control form-control-sm" placeholder="Write your comment here" value="">
                    </div>
                    <div class='form-row stream'>
                        <img src='{{ asset('assets/images/profile-image/p1.png') }}' alt='profileImage' width='15px' height='15px' class='mt-1' /> 
                        <span class="badge badge-secondary mt-1">New</span><a href='' class='mx-1'>Adinda R</a> created this lead self-assigned<br/>
                    </div>
                    <div class='form-row'>
                        @php $dt = strtotime($data->created_at??'');@endphp
                        <div class='text-muted'>{{date('d M', $dt)}}</div>
                    </div>
                </div>
            </div><!-- end card-->

            {{-- Card Target --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Target Lists</h3>
                </div>
                <div class="card-body">
                    <div class='form-row'>
                        No Data
                    </div>
                </div>
            </div><!-- end card-->
        </div>
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
                //var resp = await axios.post(window.API_URL+"/api/lead/save/"+id, formdata);
                var resp = await axios.post("{{env('API_URL')}}/api/lead/save/"+id, formdata);
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

