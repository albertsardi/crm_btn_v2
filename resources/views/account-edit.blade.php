@extends('temp-master')

@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{-- {{ Form::hidden('jr', 'product') }}   --}}

    <div class='btn-group mb-2' role='group' aria-label='Button Group'>
        <button id='cmSave' type='button' class='btn btn-sm btn-primary' style='width:80px;'>Save</button>
        <button id='cmCancel'type='button' class='btn btn-sm btn-secondary' style='width:80px;'>Cancel</button>
    </div>

    {{-- Card 1 --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Overview</h3>
        </div>
        <div class="card-body">
            {{-- {{ Form::text('Code', 'Product #', $data->Code,['placeholder'=>'ID']) }} 
            {{ Form::text('Name', 'Product Name', $data->Name) }} 
            {{ Form::text('Barcode', 'Barcode', $data->Barcode) }}
            {{ Form::select('Category', 'Category', $mCat, $data->Category) }}
            {{ Form::select('Type', 'Type', $mType, $data->Type) }}
            {{ Form::checkbox('ActiveProduct', 'Active Product') }}
            {{ Form::checkbox('StockProduct', 'Have Stock', $data->StockProduct) }}
            {{ Form::checkbox('canBuy', 'Product can buy', $data->canBuy) }}
            {{ Form::checkbox('canSell', 'Product can sell', $data->canSell) }} --}}
                {{-- {{ Form::text('UOM', 'Main Unit', $data->UOM) }}
            {{ Form::text('ProductionUnit', 'Production Unit', $data->ProductionUnit) }}
            {{ Form::number('MinStock', 'Minimal Stock') }}
            {{ Form::number('MaxStock', 'Maximal Stock') }}
            {{ Form::number('SellPrice', 'Sell Price') }}
            {{ Form::number('LastBuyPrice', 'Last Buy Price',['disabled'=>true]) }}
            <br/><br/><br/><br/>
            {{ Form::textwlookup('AccHppNo', 'HPP Account No', 'modal-account') }}
            {{ Form::textwlookup('AccSellNo', 'Income Account No', 'modal-account') }}
            {{ Form::textwlookup('AccInventoryNo', 'Inventory Account No', 'modal-account') }} --}}

            <div class='form-row'>
                <div class="form-group col">
                    <label>Name *</label>
                    <input name="name" type="text" class="form-control form-control-sm" value="{{$data->name??''}}">
                </div>
                <div class="form-group col">
                    <label>No. CIF *</label>
                    <input name="cif" type="text" class="form-control form-control-sm" value="{{$data->cif??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Segmentation</label>
                    <input name="segmentation" type="text" class="form-control form-control-sm" value="{{$data->segmentation??''}}">
                </div>
                <div class="form-group col">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control form-control-sm" value="{{$data->email??''}}">
                </div>
                <div class="form-group col">
                    <label>Phone</label>
                    <input name="phone" type="text" class="form-control form-control-sm" value="{{$data->phone??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>ID Type *</label>
                    <input name="id_type" type="text" class="form-control form-control-sm" value="{{$data->id_type??''}}">
                </div>
                <div class="form-group col">
                    <label>ID Number *</label>
                    <input name="id_number" type="text" class="form-control form-control-sm" value="{{$data->id_number??''}}">
                </div>
                <div class="form-group col">
                    {!! Form::_check('id_lifetime', $data->id_lifetime??0) !!}
                    <label>Berlaku Seumur Hidup</label>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>ID Expiration Date</label>
                    {{-- <input id='$name' name='$name' value='$value' data-date='$value' type='text' class='form-control form-control-sm datepicker' placeholder='dd/mm/yyyy' >
  				    <div class='input-group-append'>
    				    <button class='btn btn-sm btn-outline-secondary' type='button'><i class='fa fa-calendar'></i></button>
  				    </div> --}}
                    {!! Form::_datebox('id_expiration', $data->id_expiration??'') !!} 
  				</div>
                <div class="form-group col">
                </div>
            </div>

             <div class='form-row'>
                <div class="form-group col">
                    <label>Tax ID Number</label>
                    <input name="tax_id_number" type="text" class="form-control form-control-sm" value="{{$data->tax_id_number??''}}">
                </div>
                <div class="form-group col">
                    <label>Tax ID Registration Date</label>
                    {!! Form::_datebox('tax_id_registration', $data->tax_id_registration??'') !!} 
                </div>
            </div>

            <div class='form-row'>
                <div class="group col">
                    <label>Birth Date</label>
                    {{-- <input id='$name' name='$name' value='$value' data-date='$value' type='text' class='form-control form-control-sm datepicker' placeholder='dd/mm/yyyy' >
  				    <div class='input-group-append'>
    				    <button class='btn btn-sm btn-outline-secondary' type='button'><i class='fa fa-calendar'></i></button>
  				    </div> --}}
                    {!! Form::_datebox('birth_date', $data->birth_date??'') !!} 
  				</div>
                <div class="form-group col">
                    <label>Birth Place</label>
                    <input name="birth_place" type="text" class="form-control form-control-sm" value="{{$data->birth_place??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Education</label>
                    {!! Form::_select('education', $select->education??[], $data->education??'' ) !!} 
                </div>
                <div class="form-group col">
                    <label>Gender</label>
                    {!! Form::_select('gender', $select->gender??[], $data->gender??'' ) !!} 
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Marital Status</label>
                    {!! Form::_select('marital_status', $select->maritalstatus??[], $data->marital_status??'' ) !!} 
                </div>
                <div class="form-group col">
                    <label>Nationality</label>
                    <input name="nationality" type="text" class="form-control form-control-sm" value="{{$data->nationality??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Occupation</label>
                    {!! Form::_select('occupation', $select->occupation??[], $data->occupation??'' ) !!} 
                </div>
                <div class="form-group col">
                    <label>Position</label>
                    <input name="position" type="text" class="form-control form-control-sm" value="{{$data->position??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Religion</label>
                    {!! Form::_select('religion', $select->religion??[], $data->religion??'' ) !!} 
                </div>
                <div class="form-group col">
                    <label>Risk Profile</label>
                    <input name="risk_profile" type="text" class="form-control form-control-sm" value="{{$data->risk_profile??''}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Address *</label>
                    <input name="address_street" type="text" class="form-control form-control-sm" placeholder="Street"  value="{{$data->address_street??''}}">
                    <div class="row">
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
                    <input name="alternate_address_country" type="text" class="form-control form-control-sm" placeholder="Country" value="{{$data->alternate_address_country??''}}">
                </div>
                <div class="form-group col">
                    <label>Alternate Address</label>
                    <input name="alternate_address_street" type="text" class="form-control form-control-sm" placeholder="Street"  value="{{$data->alternate_address_street??''}}">
                    <div class="row">
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
            </div>

        </div>
    </div><!-- end card-->
       
    {{-- Card 2 --}}
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Financial Information</h3>
        </div>
        <div class="card-body">
            <div class='form-row'>
                <div class="form-group col">
                    <label>Source Income</label>
                    <input name="source_income" type="text" class="form-control form-control-sm" value="{{$data->source_income??0}}">
                </div>
                <div class="form-group col">
                    <label>Additional Source Income</label>
                    <input name="source_income_additional" type="text" class="form-control form-control-sm" value="{{$data->source_income_additional??0}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Annual Gross Income</label>
                    <input name="gross_income_yearly" type="text" class="form-control form-control-sm" value="{{$data->gross_income_yearly??0}}">
                </div>
                <div class="form-group col">
                    <label>Monthly Expense</label>
                    <input name="expense_monthly" type="text" class="form-control form-control-sm" value="{{$data->expense_monthly??0}}">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col">
                    <label>Investment Objective</label>
                    <input name="objective_investment" type="text" class="form-control form-control-sm" value="{{$data->expense_monthly??0}}">
                </div>
                <div class="form-group col">
                    <label>Other Objective</label>
                    <input name="objective_other" type="text" class="form-control form-control-sm" value="{{$data->expense_monthly??0}}">
                </div>
            </div>
        </div>
    </div><!-- end card-->
    
    </form>
    <?php dump($data);?>
    <?php dump($select);?>
@stop

@section('modal')
   {{-- @include('modal.modal-account')  --}}
@stop
                    
@section('js')
    <script>
        $(document).ready(function() {
           //init page
            //$(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            //$('select.select2').select2({ theme: "bootstrap" });
            /*$.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            }); */
           
            
            //load data
            //loaddata(post);
            //$.ajax({url: "http://localhost:8000/ajax_getProduct/C-11", 
            /*$.ajax({url: "{{ url('ajax_getProduct') }}/{{$id}}", 
                success: function(resp){
                    var res=JSON.parse(resp); 
                    //alert(res.status);
                    res=res.data;
                    //console.log(res);
                    $.each(res, function( f, v ) {
                        $("input[name='"+f+"']").val(v);
                    })
                }
            });*/

            //save data
            $("button#cmSave").click(async function(e){ //using ajax
                e.preventDefault();
                var formdata=$('form').serialize();
                var id = '{{$id}}';
                var resp = await axios.post(window.API_URL+"/api/account/save/"+id, formdata);
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
            
            /*var dataSource= "http://localhost:8000/ajax_getProduct/C-11";
            $.getJSON(dataSource, function(data, status) {
                for(var row=0;row<data.length;row++) {
                    console.log(data);
                }
            })  */
            
            //cmSave click
            //$('button#cmxSave').click(function() {
                //console.log('Saving ....');
                /*var dialog = bootbox.dialog({
                    message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i>Saving, Please wait ...</p>',
                    closeButton: false
                });*/
             //});


                
               
                //Ajax_post( '{{env('API_URL')}}/api/product/datasave', 'formData');
               //var url= '{{env('API_URL')}}/api/datasave/product';
               
               /*$('form').submit(function(ee) {
                  var url= '//datasave_product';
                  var formId= 'formData';
                  var formdata=$("#"+formId).serialize();
                  $.ajax({
                     url: 'http://localhost:8000/datasave_product', 
                     data: formdata, 
                     type: 'POST', 
                     dataType: 'json',
                     success: function (e) {
                        console.log(JSON.stringify(e));
                        app.locals='OK'
                        return 'OK'
                     },
                     error:function(e){
                        console.log(JSON.stringify(e));
                        //return JSON.stringify(e)
                        return 'ERROR'
                     }
                  })
                  ee.preventDefault();
               });*/
               
			
                
            //tbLookup Event
            /*$('input[type=lookup]').change(function() {
                var nm=$(this).attr('name');
                var find=$(this).val();
                var row='';
                for(var a=0;a<mcoa.length;a++) {
                    row=mcoa[a];
                    if(row.AccNo==find) break;
                }
                $('#label-'+nm).text(row.AccName); 
                //alert(row.AccName);
            }) */
        });

        
    </script>
@stop

