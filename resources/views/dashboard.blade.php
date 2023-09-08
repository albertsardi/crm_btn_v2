@extends('temp-master')
@section('css')
    <style>
    
    </style>
@stop

@section('content')
    {{ Form::hidden('jr', 'dashboard') }}   
    
        <div class="row d-none">
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-default">
                    <i class="fa fa-file-text-o float-right text-white"></i>
                    <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                    <h1 class="m-b-20 text-white counter">1,587</h1>
                    <span class="text-white">15 New Orders</span>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-warning">
                    <i class="fa fa-bar-chart float-right text-white"></i>
                    <h6 class="text-white text-uppercase m-b-20">Visitors</h6>
                    <h1 class="m-b-20 text-white counter">250</h1>
                    <span class="text-white">Bounce rate: 25%</span>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-info">
                    <i class="fa fa-user-o float-right text-white"></i>
                    <h6 class="text-white text-uppercase m-b-20">Users</h6>
                    <h1 class="m-b-20 text-white counter">120</h1>
                    <span class="text-white">25 New Users</span>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-danger">
                    <i class="fa fa-bell-o float-right text-white"></i>
                    <h6 class="text-white text-uppercase m-b-20">Alerts</h6>
                    <h1 class="m-b-20 text-white counter">58</h1>
                    <span class="text-white">5 New Alerts</span>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Chart 1 -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-line-chart"></i> Products Sold by Amount</h3>
                        Total product sold by amount in this year period. Can see each item sold ad profit.
                    </div>
                    <div class="card-body">
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div><!-- end card-->
            </div>

            <!-- Chart 2 -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-bar-chart-o"></i> Summary Leads</h3>
                        Total product sold by each category in this year period.
                    </div>
                    <div class="card-body">
                        <div id="barchart1"></div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div><!-- end card-->
            </div>
                
            <!-- Chart 3 -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-bar-chart-o"></i> Top 5 Customer</h3>
                        Top 5 big buyer customers in this year period.
                    </div>
                    <div class="card-body">
                        {{-- <canvas id="doughnutChart"></canvas>
                        <div class='position-absolute' style='top:55%;left:0%;width:100%;'>
                            <p class='text-center'>70%</p>
                        </div> --}}
                        <div id="barchart2"></div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div><!-- end card-->
            </div>
                
        </div>
        <!-- end row -->

        <div class="row">
            <!-- Chart 4 -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-line-chart"></i>  Sales Amount this year vs last year</h3>
                        Comparation of sales by amount from today year sales to prior year sales.
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart2"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div><!-- end card-->
            </div>

            <!-- Table 1 -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-users"></i> Top Expenses List</h3>
                            All expenses in year period sorted by bigger expense on the top ad lesser on bottom.
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                            <thead>
                                <tr>
                                    <th>Account #</th>
                                    <th>Account Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>													
                            <tbody>
                                <!--<tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010/10/14</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009/09/15</td>
                                    <td>$205,500</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008/12/13</td>
                                    <td>$103,600</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                    <td>2008/12/19</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2013/03/03</td>
                                    <td>$342,000</td>
                                </tr>										
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>48</td>
                                    <td>2010/03/11</td>
                                    <td>$850,000</td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>20</td>
                                    <td>2011/08/14</td>
                                    <td>$163,000</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>30</td>
                                    <td>2010/07/14</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>51</td>
                                    <td>2008/11/13</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr> -->
                                <?php
                                    /*
                                    foreach($tableexp_data as $dt) {
                                        echo "<tr>
                                                <td>$dt[accno]</td>
                                                <td>$dt[accname]</td>
                                                <td align='right'>Rp. ".number_format($dt['total'], 2)."</td>
                                            </tr>";
                                    }
                                    */
                                ?>
                            </tbody> 
                        </table>
                    </div>														
                </div><!-- end card-->					
            </div>
        </div>


@stop

@section('modal')
@stop
                    
@section('js')
    {{-- <script src="https://d3js.org/d3.v7.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/plugin/c3/c3.min.js') }}" type="text/javascript"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        $(document).ready(async function() {
            var chart = Highcharts.chart('barchart1', {
                chart: { type: 'column',backgroundColor:'#00' },
                title: { text: ' ' },
                {{-- title: {
                    text: 'Monthly Average Rainfall'
                },
                subtitle: {
                    text: 'Source: WorldClimate.com'
                }, --}}
                
                xAxis: {
                    categories: [
                        'Converted',
                        'In Process',
                        'New',
                        'Assigned',
                        'Closed',
                        'Duplicate',
                        'Pending',
                        'Rejected',
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Leads'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Leads Amount',
                    //data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,194.1, 95.6, 54.4]
                    //data: []
                    data:[{name:'Converted',y:120},{name:'name2',y:110}]

                }, ]
            });
            // load data for bar chart
            var resp = await loaddata('summarylead');
            console.log(resp)
            var datatext = _.pluck(resp, 'STATUS')
            var data = _.pluck(resp, 'tot')
            console.log(datatext)

            //barchart2
            var chart = Highcharts.chart('barchart2', {
                chart: { type: 'column',backgroundColor:'#00' },
                title: { text: ' ' },
                xAxis: {
                    categories: [
                        'Converted',
                        'In Process',
                        'New',
                        'Assigned',
                        'Closed',
                        'Duplicate',
                        'Pending',
                        'Rejected',
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Leads'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Leads Amount',
                    //data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,194.1, 95.6, 54.4]
                    //data: []
                    data:[{name:'Converted',y:120},{name:'name2',y:110}]

                }, ]
            });
            // load data for chart
            var resp = await loaddata('summaryopportunity');
            console.log(resp)
            var datatext = _.pluck(resp, 'STATUS')
            var data = _.pluck(resp, 'tot')
            console.log(datatext)
            
            
            /*chart.series[0].update({
                name: 'Jakarta',
                //data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,194.1, 95.6, 54.4]
                data: data
            });
            chart.xAxis.update({
                categories: datatext
            });
            */

            });

    loaddata =  async function(jr) {
        var res = await axios.get("{{env('API_URL')}}/api/report/"+jr);
        if (res.status=200) return res.data;
    }

        
    </script>

    
    
@stop

