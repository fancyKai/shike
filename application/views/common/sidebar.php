<?php
$permission = $this->session->userdata('permission');
$permission = explode(',', $permission);
?>
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="side-menu">
			<?php
			if(in_array('examine', $permission) ):
			?>
			<li>
				<a href="personal">个人中心</a>
			</li>
			<?php endif; ?>
			<?php
			if(in_array('base', $permission) ):
			?>
			<li class="<?php if($current_function == 'course'): ?>active<?php endif; ?>">
				<a href="#">试用管理<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="course/curriculum">申请记录</a></li>
					<li><a href="course/teacher">试用中奖管理</a></li>
					<li><a href="course/teacher">优惠购买管理</a></li>
				</ul>
			</li>
			<li class="<?php if($current_function == 'specialist'): ?>active<?php endif; ?>">
				<a href="#">账号信息<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="specialist/specialist_edit">基本设置</a></li>
					<li><a href="specialist/specialist_list">银行卡绑定</a></li>
					<li><a href="specialist/specialist_list">会员管理</a></li>
				</ul>
			</li>
			<li class="<?php if($current_function == 'specialist'): ?>active<?php endif; ?>">
				<a href="#">资金管理<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="specialist/specialist_edit">本金体现</a></li>
					<li><a href="specialist/specialist_list">资金记录</a></li>
				</ul>
			</li>
			<?php endif; ?>
			
		</ul>
	<!-- /#side-menu -->
	</div>
	<!-- /.sidebar-collapse -->
</nav>
<!-- /.navbar-static-side -->
