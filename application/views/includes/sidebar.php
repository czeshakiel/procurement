<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="<?=base_url('design/assets/images/logo.svg');?>" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="main"><img src="<?=base_url('design/assets/images/profile_av.jpg');?>" alt="User"></a>
                    <div class="detail">
                        <?=$this->session->fullname;?>
                        <small>Super Admin</small>
                    </div>
                    <ul class="navbar-nav">
                            <li><a href="#" data-toggle="modal" data-target="#logout" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
                        </ul>
                </div>
            </li>
            <li><a href="main"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Products</span></a>
                <ul class="ml-menu">
                    <li><a href="products">Manage Products</a></li>
                    <li><a href="chat.html">Chat Apps</a></li>
                    <li><a href="events.html">Calendar</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
