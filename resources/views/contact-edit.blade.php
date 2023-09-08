@extends('temp-master')

@section('content')
    <script>
        /*function addOption() {
            alert('dddddeeeee');
            var id = $(this).attr('data-id');
            console.log(id)
            var count = $("input[name='"+id+"'].d-none").length;
            var idx = 5 - count;
            console.log(idx)
            $("input[name='".id."']:eq("+idx+")").removeClass('d-none');
        }*/
    </script>
    
    
    
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
                            <label>Accounts</label>
                            <input name="account" type="text" class="form-control form-control-sm" value="{{$data->account_id??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Lead Source</label>
                            {!! Form::_select('lead_source', $select->lead_source??[], $data->lead_source??'' ) !!} 
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
                        <div class="form-group col">
                            <label>ID Expired</label>
                            <input name="i_d_expired" type="text" class="form-control form-control-sm" value="{{$data->i_d_expired??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Gender</label>
                            <input name="gender" type="text" class="form-control form-control-sm" value="{{$data->gender??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Birth Date</label>
                            {!! Form::_datebox('birth_date', $data->birth_date??'') !!} 
                        </div>
                        <!--
                        <div class="form-group col">
                            <label>Email</label>
                            {{-- [emai-ctrl] --}}
                            {{-- <input name="email" type="text" class="form-control form-control-sm" value="{{$data->email??''}}"> --}}
                            <div class="input-group">
                                <input name="email" type="text" class="form-control form-control-sm" value="{{$data->email??''}}">
                                <div class="input-group-append" id="button-addon4">
                                    <button class="btn btn-sm btn-outline-secondary" type="button"> <i class='fa fa-ban'></i> </button>
                                    <button class="btn btn-sm btn-outline-secondary text-yellow" type="button"> <i class='fa fa-star'></i> </button>
                                </div>
                            </div>

                            <input name="email" type="text" class="form-control form-control-sm d-none" value="{{$data->email??''}}">
                            <input name="email" type="text" class="form-control form-control-sm d-none" value="{{$data->email??''}}">
                            <input name="email" type="text" class="form-control form-control-sm d-none" value="{{$data->email??''}}">
                            <input name="email" type="text" class="form-control form-control-sm d-none" value="{{$data->email??''}}">
                            
                            <button class='cmAddOption' data-id='email' type='button' class='btn btn-sm btn-dark' style='width:40px;'>+</button>
                        </div>
                        -->
                        <div class="form-group col">
                            <label>Email</label>
                            {{-- [emai-ctrl] --}}
                            {{-- <input name="email" type="text" class="form-control form-control-sm" value="{{$data->email??''}}"> --}}
                            <?php dump($modal->email)?>
                            {!! Form::_mtextbox('email',  $modal->email??[]) !!} 
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Address</label>
                            <input name="address_street" type="text" class="form-control form-control-sm" placeholder="Street"  value="{{$data->address_street??''}}">
                            <div class="form-row my-2">
                                <div class="col">
                                    <input name="address_city" type="text" class="form-control form-control-sm" placeholder="City" value="{{$data->address_city??''}}">
                                </div>
                                <div class="col">
                                    <input name="address_state" type="text" class="form-control form-control-sm" placeholder="State" value="{{$data->address_state??''}}">
                                </div>
                                <div class="col">
                                    <input name="address_postal_code" type="text" class="form-control form-control-sm" placeholder="Postal Code" value="{{$data->address_postal_code??''}}">
                                </div>
                            </div>
                            <input name="address_country" type="text" class="form-control form-control-sm" placeholder="Country" value="{{$data->alternate_address_country??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Phone *</label>
                            {!! Form::_mtextbox('phone', $modal->phone??'') !!} 
                        </div>
                        <div class="form-group col">
                            <label>Call Opt In</label>
                            <input name="call_opt_in" type="text" class="form-control form-control-sm" value="{{$data->call_opt_in??''}}">
                        </div>
                        <div class="form-group col">
                            <label>SMS Opt In</label>
                            <input name="s_m_s_opt_in" type="text" class="form-control form-control-sm" value="{{$data->s_m_s_opt_in??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Assistant Name</label>
                            <input name="assistant_name" type="text" class="form-control form-control-sm" value="{{$data->assistant_name??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Assistant Phone</label>
                            <input name="assistant_phone" type="text" class="form-control form-control-sm" value="{{$data->assistant_phone??''}}">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class="form-group col">
                            <label>Alternate Address</label>
                            <input name="alternate_address_street" type="text" class="form-control form-control-sm" placeholder="Street"  value="{{$data->alternate_address_street??''}}">
                            <div class="form-row my-2">
                                <div class="col">
                                    <input name="alternate_address_city" type="text" class="form-control form-control-sm" placeholder="City" value="{{$data->alternate_address_city??''}}">
                                </div>
                                <div class="col">
                                    <input name="alternate_address_state" type="text" class="form-control form-control-sm" placeholder="State" value="{{$data->alternate_address_state??''}}">
                                </div>
                                <div class="col">
                                    <input name="alternate_address_postal_code" type="text" class="form-control form-control-sm" placeholder="Postal Code" value="{{$data->alternate_address_postal_code??''}}">
                                </div>
                            </div>
                            <input name="alternate_address_country" type="text" class="form-control form-control-sm" placeholder="Country" value="{{$data->alternate_address_country??''}}">
                        </div>
                        <div class="form-group col">
                            <label>Description</label>
                            <textarea name="description" rows="2" cols="60" class="form-control form-control-sm" placeholder="description">{{$data->alternate_address_country??''}}</textarea>
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
           
            // add option button
            //$('.cmAddOption').click(function() {
            $('body').on('click', '.cmAddOption', function() {
                //alert('cccc');
                var id = $(this).attr('data-id');
                console.log(id)
                //var count = $("div.input-group-phone.d-none").length;
                var count = $("div.input-group-"+id+".d-none").length;
                var idx = 5 - count;
                console.log(idx)
                //$(`input[name='phone']:eq(`+id+`)`).removeClass('d-none');
                
                //$(`input[name='phone']:eq(`+id+`)`).removeClass('d-none');
                //$('div.input-group-phone:eq('+id+')').removeClass('d-none');
                $("div.input-group-"+id+"-"+idx).removeClass('d-none');
            });    
			// del option button
            $('.cmDelOption').click(async function() {
                
                var opt=$(this).attr('data-opt');
                var id=$(this).attr('data-id');
                var line=$(this).attr('data-line'); 

                alert(`delOption ${opt} ${id}`);
                var resp = await axios.post("{{env('API_URL')}}/api/email/delete/"+id);
                 //console.log(resp)
                if (resp.status==200) {
                    console.log(resp.data)
                    if (resp.data.status=='Error') {
                        alert('Error:: '+resp.data.message);
                    } else {
                        alert('datadeleted.');
                        //if (id=='new' || id=='') window.location.href = window.location.href.replace("/new", "/"+resp.data.data.id);
                        $("input[name='"+opt+"']:eq("+line+")").val('');
                    }
                } else {
                    alert('Error')
                    console.log(resp)
                }
            });          
            // set default option button
            //$('body').on('click', '.cmSetDefault', function() {
            $('.cmSetDefault').click(function() {
                var opt=$(this).attr('data-opt');
                var id=$(this).attr('data-id');
                var line=$(this).attr('data-line');
                alert('delSetDefault '+opt+' '+line);
                $('.btn-'+opt+'-primary').removeClass('text-yellow');
                $(this).addClass('text-yellow');
                $("input[name='"+opt+"-primary']").val(line)
            });

            //save data
            $("button#cmSave").click(async function(e){ //using ajax
                e.preventDefault();

                var formdata=$('form').serialize();
                var id = '{{$id}}';
                //var resp = await axios.post(window.API_URL+"/api/contact/save/"+id, formdata);
                var resp = await axios.post("{{env('API_URL')}}/api/contact/save/"+id, formdata);
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

