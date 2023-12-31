<div class="dlabnav">
	<div class="dlabnav-scroll">
		<ul class="metismenu" id="menu">
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-home"></i>
					<span class="nav-text">Dashboard</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="index.html">Dashboard Light</a></li>
					<li><a href="index-2.html">Dashboard Dark</a></li>
					<li><a href="kanban.html">Kanban</a></li>
					<li><a href="clients.html">Clients</a></li>
					<li><a href="project-details.html">Project Details</a></li>
					<li><a href="message.html">Messages</a></li>
					<li><a href="latest-activity.html">Latest Activity</a></li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-info-circle"></i>
					<span class="nav-text">MAIN</span>
				</a>
				<ul aria-expanded="false">

					<li><a href="{{ route('urusan.index') }}">Urusan</a></li>
					<li><a href="{{ route('bidang.index') }}">Bidang</a></li>
					<li><a href="{{ route('program.index') }}">Program</a></li>
					<li><a href="{{ route('kegiatan.index') }}">Kegiatan</a></li>
					<li><a href="{{ route('subkegiatan.index') }}">Sub Kegiatan</a></li>
					<li><a href="{{ route('opd.index') }}">OPD</a></li>
					<li><a href="{{ route('admin.index') }}">Admin OPD</a></li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-info-circle"></i>
					<span class="nav-text">RPJMD</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('rpjmds.index') }}">RPJMD</a></li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-info-circle"></i>
					<span class="nav-text">Renstra</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('rpjmds.index') }}">Tujuan Renstra</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>