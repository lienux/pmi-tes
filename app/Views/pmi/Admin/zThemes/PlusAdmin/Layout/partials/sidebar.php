<aside id="sidebar" class="sidebar <?=(session()->get('page_workspace')=='admin') ? '' : ''?>">
    <ul class="sidebar-nav" id="sidebar-nav">
        <?php if(session()->get('page_workspace')=='admin') { ?>

            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='dashboard') ? '' : 'collapsed'?>" href="<?=base_url('admin/dashboard')?>">
                    <i class="bi bi-grid"></i>
                    <!-- <i class="fas fa-home"></i> -->
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Master Data</li>

            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='user') ? '' : 'collapsed'?>" href="<?=base_url('admin/user')?>">
                    <i class="bi bi-person"></i>
                    <!-- <i class="fas fa-users"></i> -->
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='vehicle') ? '' : 'collapsed'?>" href="<?=base_url('admin/vehicle')?>">
                    <i class="bi bi-truck"></i>
                    <!-- <i class="fas fa-bus-alt"></i> -->
                    <span>Vehicles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='driver') ? '' : 'collapsed'?>" href="<?=base_url('admin/driver')?>">
                    <i class="bi bi-person-badge"></i>
                    <!-- <i class="fas fa-id-card-alt"></i> -->
                    <span>Drivers</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link <?=($navlink=='geofence') ? '' : 'collapsed'?>" href="<?=base_url('admin/geofence')?>">
                    <i class="bi bi-bounding-box-circles"></i>
                    <span>Geofence</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='stop') ? '' : 'collapsed'?>" href="<?=base_url('admin/stop')?>">
                    <i class="bi bi-bounding-box-circles"></i>
                    <!-- <i class="fas fa-draw-polygon"></i> -->
                    <span>Stops</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='route') ? '' : 'collapsed'?>" href="<?=base_url('admin/route')?>">
                    <i class="bi bi-bezier2"></i>
                    <!-- <i class="fas fa-route"></i> -->
                    <span>Routes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='reminder') ? '' : 'collapsed'?>" href="<?=base_url('admin/reminder')?>">
                    <i class="bi bi-stopwatch"></i>
                    <!-- <i class="fas fa-stopwatch"></i> -->
                    <span>Reminders</span>
                </a>
            </li>

            <li class="nav-heading">Configuration</li>

            <li class="nav-item">
                <a class="nav-link sidebar-item <?=($navlink=='event') ? '' : 'collapsed'?>" href="<?=base_url('admin/event')?>">
                    <i class="bi bi-bell"></i>
                    <!-- <i class="far fa-bell"></i> -->
                    <span>Event</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#configuration-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-tools"></i>
                    <span>Configuration</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="configuration-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">            
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>GPS</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-accordion.html">
                            <i class="bi bi-circle"></i><span>iButton</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-badges.html">
                            <i class="bi bi-circle"></i><span>Camera</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-breadcrumbs.html">
                            <i class="bi bi-circle"></i><span>Payment</span>
                        </a>
                    </li>
                </ul>
            </li> -->

            <li class="nav-heading">Integrations</li>

            <li class="nav-item">
                <a class="nav-link collapsed sidebar-item" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i>
                    <!-- <i class="fas fa-link"></i> -->
                    <span>Integrations</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <?php
                    if (isset($itegrationlink)=='show') {
                        $show = 'show';
                    }else{
                        $show = '';
                    }
                ?>
                <ul id="components-nav" class="nav-content collapse <?=$show?>" data-bs-parent="#sidebar-nav">            
                    <li>
                        <a class="nav-link <?=($navlink=='simcard') ? '' : 'collapsed'?>" href="<?=base_url('admin/simcard')?>">
                            <i class="bi bi-circle"></i><span>SIM Cards</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?=($navlink=='gps') ? '' : 'collapsed'?>" href="<?=base_url('admin/gps')?>">
                            <i class="bi bi-circle"></i><span>GPS</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?=($navlink=='ibutton') ? '' : 'collapsed'?>" href="<?=base_url('admin/ibutton')?>">
                            <i class="bi bi-circle"></i><span>iButton</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?=($navlink=='camera') ? '' : 'collapsed'?>" href="<?=base_url('admin/camera')?>">
                            <i class="bi bi-circle"></i><span>Camera</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="nav-link <?=($navlink=='payment') ? '' : 'collapsed'?>" href="<?=base_url('admin/payment')?>">
                            <i class="bi bi-circle"></i><span>Payment</span>
                        </a>
                    </li> -->
                </ul>
            </li>
        <?php } ?>
    </ul>

</aside><!-- End Sidebar