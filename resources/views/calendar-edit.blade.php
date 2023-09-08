@extends('temp-master')

@section('css')
    <style>
    .calendar {overflow:scroll;}
    </style>
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
    
@stop


@section('content')
    <form id='formData'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{-- {{ Form::hidden('jr', 'product') }}   --}}

    {{-- Card --}}
    <div class="card mb-3 style="background-color:white;">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Calendar</h3>
        </div>
        <div class="card-body">
            <div class='form-row'>
                <div class="form-group col">
                    <label>Name *</label>
                    <input name="$input" type="text" class="form-control form-control-sm">
                </div>
                <div class="form-group col">
                    <label>$label</label>
                    <input name="$input" type="text" class="form-control form-control-sm">
                </div>
            </div>

            <div class='form-row'>
            [calendar]
            <div class='calender d-none' style='width:100px;'>
                <table class='table table-bordered'>
                <?php
                for($r=1;$r<=6;$r++) {
                    echo "<tr style='height:50px;'>";
                    for($c=1;$c<=18;$c++) {
                        echo "<td style='width:50px;'>$c</td>";
                    }
                    echo '</tr>';
                }
                ?>
                </table>
            </div>
            [CAL]
            </div>

            <div id="calendar" style="height:800px;background-color:white;"></div>
        
        </div>
    </div><!-- end card-->
    
    </form>
@stop

@section('modal')
@stop
                    
@section('js')
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <script>
        $(document).ready(function() {
           //init page
            //$(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            //$('select.select2').select2({ theme: "bootstrap" });
           
            //save data
            $("button#cmSave").click(async function(e){ //using ajax
                
            });

            //init calendar
            const calendar = new Calendar('#calendar', {
                defaultView: 'week',
                template: {
                    time(event) {
                    const { start, end, title } = event;

                    return `<span style="color: white;">${formatTime(start)}~${formatTime(end)} ${title}</span>`;
                    },
                    allday(event) {
                    return `<span style="color: gray;">${event.title}</span>`;
                    },
                },
                calendars: [
                    {
                    id: 'cal1',
                    name: 'Personal',
                    backgroundColor: '#03bd9e',
                    },
                    {
                    id: 'cal2',
                    name: 'Work',
                    backgroundColor: '#00a9ff',
                    },
                ],
            });
        });
        
    </script>
@stop

