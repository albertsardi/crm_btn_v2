{{-- https://fontawesome.com/v4/cheatsheet/ --}}
@php
	$menu = [
		['Home', 'fa fa-fw fa-bars', 'dashboard'],
		['Accounts', 'fa fa-fw fa-id-badge', 'account'],
		['Contacts', 'fa fa-fw fa-address-card-o', 'contact'],
		['Leads', 'fa fa-fw fa-file-text-o', 'lead'],
		['Opportunities', 'fa fa-fw fa-usd', 'opportunity'],
		['Cases', 'fa fa-fw fa-shopping-bag', 'case'],
		['Emails', 'fa fa-fw fa-envelope-o', 'email'],
		['Calendar', 'fa fa-fw fa-calendar', 'calendar'],
		['Meetings', 'fa fa-fw fa-calendar-check-o', 'meeting'],
		['Calls', 'fa fa-fw fa-phone', 'call'],
		['Tasks', 'fa fa-fw fa-list-ul', 'task'],
		['Stream', 'fa fa-fw fa-rss', 'stream'],
		['Reports', 'fa fa-fw fa-bar-chart-o', 'report'],
	];
@endphp

<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                @foreach($menu as $m)
				<li class='submenu'>
					{{-- <a href='{{url($m[2])}}' > --}}
					<a href="{{ url('list/'.$m[2]) }}" >
					<i class='{{ $m[1] }}'></i><span> {{ $m[0] }} </span> 
					</a>
            	</li>
				@endforeach
			</ul>
			<div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>



<!--
<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class='submenu'>
					<a href='http://localhost/lav7_PikeAdmin_multi/dashboard' >
					<i class='fa fa-fw fa-bars'></i><span> Dashboard </span> 
					</a>
            	</li>
				<li class='submenu'>
					<a href='http://localhost/lav7_PikeAdmin_multi/reportall' >
						<i class='fa fa-fw fa-area-chart'></i><span> Reports </span> 
					</a>
            	</li>
				<li class='submenu'>
					<a href='http://localhost/lav7_PikeAdmin_multi/datalist/bank' >
					<i class='fa fa-fw fa-file-text-o'></i><span> Cash & Banks </span> 
					</a>
            	</li>
				<li class='submenu'>
              		<a href='#' >
			  		<i class='fa fa-fw fa-th'></i> <span> Purchases </span> <span class='menu-arrow'></span>
					</a>
              		<ul class='list-unstyled'><li><a href='http://localhost/lav7_PikeAdmin_multi/translist/PO' > Purchase Order </a></li><li><a href='http://localhost/lav7_PikeAdmin_multi/translist/PI' > Purchase Invoices </a></li><li><a href='http://localhost/lav7_PikeAdmin_multi/translist/AP' > Pay BIlls </a></li>
					</ul>
            	</li>
				<li class='submenu'>
              		<a href='#' ><i class='fa fa-fw fa-th'></i> <span> Sales </span> <span class='menu-arrow'></span></a>
              		<ul class='list-unstyled'><li><a href='http://localhost/lav7_PikeAdmin_multi/translist/SO' > Sales Order </a></li><li><a href='http://localhost/lav7_PikeAdmin_multi/translist/SI' > Sales Invoices </a></li><li><a href='http://localhost/lav7_PikeAdmin_multi/translist/AR' > Receive Payments </a></li></ul>
            	</li>                <li class='submenu'>
              		<a href='http://localhost/lav7_PikeAdmin_multi/translist/EX' >
                	<i class='fa fa-fw fa-file-text-o'></i><span> Expenses </span> 
              		</a>
            	</li>
				<li class='submenu'>
              		<a href='http://localhost/lav7_PikeAdmin_multi/datalist/customer' >
                	<i class='fa fa-fw fa-file-text-o'></i><span> Customers </span> 
              		</a>
            	</li>
				<li class='submenu'>
              		<a href='http://localhost/lav7_PikeAdmin_multi/datalist/supplier' >
                	<i class='fa fa-fw fa-file-text-o'></i><span> Suppliers </span> 
              		</a>
            	</li>
				<li class='submenu'>
              		<a href='http://localhost/lav7_PikeAdmin_multi/datalist/product' >
                	<i class='fa fa-fw fa-file-text-o'></i><span> Products </span> 
              		</a>
            	</li>
				<li class='submenu'>
              		<a href='http://localhost/lav7_PikeAdmin_multi/datalist/coa' >
                	<i class='fa fa-fw fa-file-text-o'></i><span> Chart of Accounts </span> 
              		</a>
            	</li>
				<li class='submenu'>
              		<a href='http://localhost/lav7_PikeAdmin_multi/setting' >
                	<i class='fa fa-fw fa-file-text-o'></i><span> Setting </span> 
              		</a>
            	</li>
				<li class='submenu'>
              		<a href='http://localhost/lav7_PikeAdmin_multi/logout' >
                	<i class='fa fa-fw fa-file-text-o'></i><span> Log out </span> 
              		</a>
            	</li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
-->