<script type="application/javascript" src="js/funciones.js"></script>
<ul class="sidebar-menu">
	<li class="active">
		<a href="index.php">
			<i class="fa fa-dashboard" style="content:url(img/menu/home_menu.png); height:14px; width:14px"></i> <span>Principal</span>
		</a>
	</li>
	<li>
		<a href="javascript:cargarMapas(0);">
			<i class="fa fa-th" style="content:url(img/menu/map_menu.png); height:14px; width:14px"></i> <span>Ver Mapa</span>
		</a>
	</li>
	
	
	
	
	<li class="treeview active">
		<a href="#">
			<i class="fa fa-table" style="content:url(img/menu/gear_menu.png); height:14px; width:14px"></i> 
                <span>Administraci&oacute;n</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li><a href="JavaScript:cargarMapas(1);"><i class="fa" style="content:url(img/menu/child_item_menu.png); height:14px; width:14px"></i> Registrar ni&ntilde;o</a></li>
			<li><a href="JavaScript:viewChild(this);"><i class="fa" style="content:url(img/menu/search_item_menu.png); height:14px; width:14px"></i> Ver Ni&ntilde;os</a></li>
			<li><a href="JavaScript:viewSchema(this);"><i class="fa" style="content:url(img/menu/checklist_item_menu.png); height:14px; width:14px"></i> Esquema vacunaci&oacute;n</a></li>
		</ul>
	</li>
	
	<li>
		<a href="JavaScript:cargarCalendario(this)">
			<i class="fa fa-calendar" style="content:url(img/menu/calendar_menu.png); height:14px; width:14px"></i> <span>Calendario</span>
			<small class="badge pull-right bg-red">En construcci&oacute;n</small>
		</a>
	</li>
	
	<li class="treeview">
		<a href="#">
			<i class="fa fa-bar-chart-o" style="content:url(img/menu/reports_menu.png); height:14px; width:14px"></i>
			<span>Reportes</span>
			<!--<i class="fa fa-angle-left pull-right"></i>-->
            <small class="badge pull-right bg-red">En construcci&oacute;n</small>
		</a>
		<!--<ul class="treeview-menu">
			<li><a href="JavaScript:cargarReporte1(this)"><i class="fa fa-angle-double-right"></i> Reporte 1</a></li>
			<li><a href="JavaScript:cargarReporte1(this)"><i class="fa fa-angle-double-right"></i> Reporte 2 </a></li>
			<li><a href="JavaScript:cargarReporte1(this)"><i class="fa fa-angle-double-right"></i> Reporte 3 </a></li>
		</ul>-->
	</li>
	
	<!-- 
		<li class="treeview">
		<a href="#">
		<i class="fa fa-laptop"></i>
		<span>UI Elements</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
		<li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
		<li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
		<li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
		<li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
		</ul>
		</li>
		
		<li class="treeview">
		<a href="#">
		<i class="fa fa-edit"></i> <span>Forms</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
		<li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
		<li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
		</ul>
		</li>
		
		
		<li>
		<a href="pages/mailbox.html">
		<i class="fa fa-envelope"></i> <span>Mailbox</span>
		<small class="badge pull-right bg-yellow">12</small>
		</a>
		</li>
		
		<li class="treeview">
		<a href="#">
		<i class="fa fa-folder"></i> <span>Examples</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
		<li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
		<li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
		<li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
		<li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
		<li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
		<li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
		</ul>
		</li>
	-->
</ul>