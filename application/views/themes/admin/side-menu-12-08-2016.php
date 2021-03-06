<aside id="left-panel">

    <div class="login-info">
        <span>
            <a href="<?=base_url()?>" id="show-shortcut" data-action="toggleShortcut">
                <img src="<?php echo base_url(); ?>assets/admin/img/avatars/sunny.png" alt="me" class="online" /> 
                <span>
                     <?php 
                        $user_info =$this->ion_auth->user()->row();
                        echo !empty($user_info->first_name) ? $user_info->first_name : '';
                    ?>
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 
        </span>
    </div>
    <nav>
		<?php
			$userPermissions = array();
			$userPermissions = getUserPermission($user_info->id);
		?>
        <ul>
            <li class="">
                <a title="Dashboard" href="<?=base_url('admin/dashboard')?>">
                    <i class="fa fa-lg fa-fw fa-home"></i>
                    <span class="menu-item-parent">Dashboard </span>
                    <b class="collapse-sign">
						<em class="fa fa-minus-square-o"></em>
					</b>
                </a>
            </li>
        </ul>
        <?php
			if(array_key_exists(1,$userPermissions)){
        ?>
        <ul>
            <li class="">
                <a title="User Management" href="#">
                    <i class="fa fa-lg fa-fw fa-users"></i><span class="menu-item-parent">User Management </span>
                </a>
				<ul style="<?=(!empty($this->PageTitle) && $this->PageTitle=='User Management') ? 'display: block' : 'display: none';?>">
					<li class="">
						<a title="User Groups" href="<?=base_url('admin/groups')?>">User Groups</a>
					</li>
					<li class="">
						<a title="User Permission" href="<?=base_url('admin/permissions')?>">Permissions</a>
					</li>
					<li class="">
						<a title="Users | Sub Admin" href="<?=base_url('admin/users/')?>">Sub Admin</a>
					</li>
					<li class="">
						<a title="Users | Clients" href="<?=base_url('admin/users/clients')?>">Clients</a>
					</li>
                </ul>
            </li>
        </ul>
        
        <?php
			}
			if(array_key_exists(2,$userPermissions)){
        ?>
        
		<ul>
			<li class="">
				<a title="Service Management" href="javascript:void(0)">
					<i class="fa fa-lg fa-fw fa-female"></i><span class="menu-item-parent">Service Management </span>
				</a>
				<ul style="<?=(!empty($this->PageTitle) && $this->PageTitle=='Service Management') ? 'display: block' : 'display: none';?>">
					<li class="">
						<a title="Services" href="<?=base_url('admin/services')?>">Services</a>
					</li>
				</ul>
			</li>
		</ul>
        <?php
			}
			if(array_key_exists(3,$userPermissions)){
        ?>
		<ul>
			<li class="">
				<a title="Content Management" href="javascript:void(0)">
					<i class="fa fa-lg fa-fw fa-file-word-o"></i><span class="menu-item-parent">Content Management </span>
				</a>
				<ul style="<?=(!empty($this->PageTitle) && $this->PageTitle=='Content Management') ? 'display: block' : 'display: none';?>">
					<li class="">
						<a title="Labels" href="<?=base_url('admin/contents')?>">Labels</a>
					</li>
					<li class="">
						<a title="Static Pages" href="<?=base_url('admin/contents/pages')?>">Static Pages</a>
					</li>
				</ul>
			</li>
		</ul>
        <?php
			}
			if(array_key_exists(4,$userPermissions)){
        ?>
		<ul>
			<li class="">
				<a title="SEO Management" href="javascript:void(0)">
					<i class="fa fa-lg fa-fw fa-file-word-o"></i><span class="menu-item-parent">SEO Management </span>
				</a>
				<ul style="<?=(!empty($this->PageTitle) && $this->PageTitle=='SEO Management') ? 'display: block' : 'display: none';?>">
					<li class="">
						<a title="Pages Meta" href="<?=base_url('admin/seo')?>">Pages Meta</a>
					</li>
					<li class="">
						<a title="Google Analytics Code" href="<?=base_url('admin/seo/googleAnalytics')?>">Google Analytics</a>
					</li>
				</ul>
			</li>
		</ul>
        <?php
			}
			if(array_key_exists(5,$userPermissions)){
        ?>
		<ul>
			<li class="">
				<a title="Email Management" href="javascript:void(0)">
					<i class="fa fa-lg fa-fw fa-envelope-o"></i><span class="menu-item-parent">Email Management </span>
				</a>
				<ul style="<?=(!empty($this->PageTitle) && $this->PageTitle=='Email Management') ? 'display: block' : 'display: none';?>">
					<li class="">
						<a title="Email Templates" href="<?=base_url('admin/emails')?>">Email Templates</a>
					</li>
					<li class="">
						<a title="Message Templates" href="<?=base_url('admin/emails/messageTemplates')?>">Message Templates</a>
					</li>
				</ul>
			</li>
		</ul>
		<?php } ?>
		<ul>
			<li class="">
				<a title="Review Management" href="javascript:void(0)">
					<i class="fa fa-lg fa-fw  fa-comments"></i><span class="menu-item-parent">Review Management </span>
				</a>
				<ul style="<?=(!empty($this->PageTitle) && $this->PageTitle=='Review Management') ? 'display: block' : 'display: none';?>">
					<li class="">
						<a title="Clients Reviews" href="<?=base_url('admin/reviews')?>">Clients Reviews</a>
					</li>
				</ul>
			</li>
		</ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
<!-- END NAVIGATION -->
