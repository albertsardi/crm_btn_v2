@extends('temp-master')

@section('css')
@stop

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{-- {{ Form::hidden('jr', 'product') }}  --}}

    <div class='btn-group mb-2' role='group' aria-label='Button Group'>
        <button id='cmSave' type='button' class='btn btn-sm btn-primary' style='width:80px;'>Save</button>
        <button id='cmCancel'type='button' class='btn btn-sm btn-secondary' style='width:80px;'>Cancel</button>
    </div> 

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
                    <input name="status" type="text" class="form-control form-control-sm" value="{{$data->status??''}}">
                </div>
                <div class="form-group col">
                    <label>Account</label>
                    <input name="account_id" type="text" class="form-control form-control-sm" value="{{$data->account_id??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Priority</label>
                    <input name="priority" type="text" class="form-control form-control-sm" value="{{$data->priority??''}}">
                </div>
                <div class="form-group col">
                    <label>Contacts</label>
                    <input name="contact_id" type="text" class="form-control form-control-sm" value="{{$data->contact_id??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Type</label>
                    <input name="type" type="text" class="form-control form-control-sm" value="{{$data->type??''}}">
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
                [icon]<span class="badge badge-secondary mt-1">New</span><a href=''>Muhammad Zaenal Mutaqin</a> created this case assigned to <a href=''>Adinda R</a><br/>
            </div>
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
                var resp = await axios.post(window.API_URL+"/api/case/save/"+id, formdata);
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

