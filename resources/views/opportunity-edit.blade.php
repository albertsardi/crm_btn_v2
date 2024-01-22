@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{-- {{ Form::hidden('jr', 'product') }}   --}}

    <div class='btn-group mb-2' role='group' aria-label='Button Group'>
        <button id='cmSave' type='button' class='btn btn-sm btn-primary' style='width:80px;'>Save</button>
        <button id='cmCancel'type='button' class='btn btn-sm btn-secondary' style='width:80px;'>Cancel</button>
    </div>

    {{-- Card --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Opportunity</h3>
        </div>
        <div class="card-body">
            
            <div class='form-row'>
                <div class="form-group col">
                    <label>Product Category</label>
                    <input name="product_category" type="text" class="form-control form-control-sm" value="{{$data->product_category??''}}">
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
                    <input name="opportunity_type" type="text" class="form-control form-control-sm" value="{{$data->opportunity_type??''}}">
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
                    <input name="sales_stage" type="text" class="form-control form-control-sm" value="{{$data->sales_stage??''}}">
                </div>
                <div class="form-group col">
                    <label>Probability (%) *</label>
                    <input name="probability" type="text" class="form-control form-control-sm" value="{{$data->probability??''}}">
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
                    <input name="status" type="text" class="form-control form-control-sm" value="{{$data->status??''}}">
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
                var resp = await axios.post(window.API_URL+"/api/opportunity/save/"+id, formdata);
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

