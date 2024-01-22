@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{-- {{ Form::hidden('jr', 'product') }}   --}}

    <div class='btn-group mb-2' role='group' aria-label='Button Group'>
        <button id='cmSave' type='button' class='btn btn-sm btn-primary' style='width:80px;'>Save</button>
        <button id='cmCancel'type='button' class='btn btn-sm btn-secondary' style='width:80px;'>Cancel</button>
    </div>

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
                            <input name="salutation_name" type="text" class="form-control form-control-sm" placeholder="Salutation" value="{{$data->salitation_name??''}}">
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
                    <input name="customer_category" type="text" class="form-control form-control-sm" value="{{$data->customer_category??''}}">
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
                    <input name="id_type" type="text" class="form-control form-control-sm" value="{{$data->id_type??''}}">
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
                    <input name="fbi_percentage" type="text" class="form-control form-control-sm" value="{{$data->fbi_percentage??'0%'}}">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col">
                    <label>Nominal</label>
                    <input name="nominal" type="text" class="form-control form-control-sm" value="{{$data->nominal??0}}">
                </div>
                <div class="form-group col">
                    <label>Probability (%)</label>
                    <input name="probability" type="text" class="form-control form-control-sm" value="{{$data->probability??0}}">
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
                var resp = await axios.post(window.API_URL+"/api/lead/save/"+id, formdata);
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

