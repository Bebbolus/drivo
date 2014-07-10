<!--=== Navigation ===-->
<ul id="nav">	
	<li>					
		<a href="javascript:void(0);">
			<i class="icon-list-alt"></i>
			{{Lang::get('messages.nav.address')}}
		</a>
		<ul class="sub-menu">
			<li>
				<a href="/{{$main_path}}/schooladmin/address/list">
				<i class="icon-angle-right"></i>
				{{Lang::get('messages.nav.address.list')}}
				</a>
			</li>
			<li>
				<a href="/{{$main_path}}/schooladmin/address/create">
				<i class="icon-angle-right"></i>
				{{Lang::get('messages.nav.address.add')}}
				</a>
			</li>
		</ul>
	</li>
	
	<li>					
		<a href="javascript:void(0);">
			<i class="icon-calendar"></i>
			{{Lang::get('messages.nav.reservation')}}
		</a>
		<ul class="sub-menu">
			<li>
				<a href="/{{$main_path}}/schooladmin/reservation/create?lic=A">
				<i class="icon-angle-right"></i>
				{{Lang::get('messages.nav.reservation.licence.a')}}
				</a>
			</li>
			<li>
				<a href="/{{$main_path}}/schooladmin/reservation/create?lic=B">
				<i class="icon-angle-right"></i>
				{{Lang::get('messages.nav.reservation.licence.b')}}
				</a>
			</li>
			<li>
				<a href="/{{$main_path}}/schooladmin/reservation/create?lic=C">
				<i class="icon-angle-right"></i>
				{{Lang::get('messages.nav.reservation.licence.c')}}
				</a>
			</li>
			<li>
				<a href="/{{$main_path}}/schooladmin/reservation/create?lic=D">
				<i class="icon-angle-right"></i>
				{{Lang::get('messages.nav.reservation.licence.d')}}
				</a>
			</li>
			<li>
				<a href="/{{$main_path}}/schooladmin/reservation/create?lic=E">
				<i class="icon-angle-right"></i>
				{{Lang::get('messages.nav.reservation.licence.e')}}
				</a>
			</li>
		</ul>
	</li>
	
	<li>
		<a href="/{{$main_path}}/">
			<i class="icon-dashboard"></i>
			Entry #1
		</a>
	</li>
</ul>
<!-- /Navigation -->