<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link sidebar-item <?=($navlink=='dashboard') ? '' : 'collapsed'?>" href="<?=base_url('company/dashboard')?>">
                <i class="fas fa-th-large text-info"></i>
                <span class="mx-2">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed sidebar-item" data-bs-target="#masterdata-nav" data-bs-toggle="collapse" href="#">
                <i class="fas fa-database text-info"></i>
                <span class="mx-2">Master Data</span>
                <i class="fas fa-chevron-down ms-auto text-secondary"></i>
            </a>
            <ul id="masterdata-nav" class="collapse <?=(isset($masterdata)==True) ? 'show' : ''?>" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebar-item <?=($navlink=='dds') ? '' : 'collapsed'?>" href="<?=base_url('company/dds')?>">
                        <i class="fas fa-user"></i>
                        <span class="mx-2">DD Sukarelawan</span>
                    </a>
                </li>         
                <li class="nav-item">
                    <a class="nav-link sidebar-item <?=($navlink=='pasien') ? '' : 'collapsed'?>" href="<?=base_url('company/pasien')?>">
                        <i class="fas fa-user"></i>
                        <span class="mx-2">Pasien</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link sidebar-item <?=($navlink=='nahkoda') ? '' : 'collapsed'?>" href="<?=base_url('company/nahkoda')?>">
                        <i class="fas fa-id-card text-info"></i>
                        <span class="mx-2">Nahkoda</span>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link sidebar-item <?//=($navlink=='pelabuhan') ? '' : 'collapsed'?>" href="<?//=base_url('company/pelabuhan')?>">
                        <i class="fas fa-map-marked-alt text-info"></i>
                        <span class="mx-2">Pelabuhan</span>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link sidebar-item <?=($navlink=='route') ? '' : 'collapsed'?>" href="<?=base_url('company/route')?>">
                        <i class="fas fa-route text-info"></i>
                        <span class="mx-2">Routes</span>
                    </a>
                </li> -->
            </ul>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link collapsed sidebar-item" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
                <i class="fas fa-tags text-info"></i>
                <span class="mx-2">Product</span>
                <i class="fas fa-chevron-down ms-auto text-secondary"></i>
            </a>
            <ul id="product-nav" class="collapse <?=(isset($product)==True) ? 'show' : ''?>" data-bs-parent="#sidebar-nav">            
                <li class="nav-item">
                    <a class="nav-link sidebar-item <?=($navlink=='ticket_boat') ? '' : 'collapsed'?>" href="<?=base_url('company/product/ticket/boat')?>">
                        <span class="mx-2">Ticket Boat</span>
                    </a>
                </li>
            </ul>
        </li> -->

        <!-- <li class="nav-heading">Configuration</li>
        <li class="nav-item">
            <a class="nav-link sidebar-item <?=($navlink=='schedule') ? '' : 'collapsed'?>" href="<?=base_url('company/schedule')?>">
                <i class="fas fa-calendar-alt text-info"></i>
                <span class="mx-2">Schedule</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sidebar-item <?=($navlink=='reminder') ? '' : 'collapsed'?>" href="<?=base_url('company/reminder')?>">
                <i class="fas fa-bell text-info"></i>
                <span class="mx-2">Reminders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sidebar-item <?=($navlink=='account') ? '' : 'collapsed'?>" href="<?=base_url('company/account')?>">
                <i class="fas fa-user-alt text-info"></i>
                <span class="mx-2">Account</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sidebar-item <?=($navlink=='event') ? '' : 'collapsed'?>" href="<?=base_url('company/event')?>">
                <i class="fas fa-calendar-alt text-info"></i>
                <span class="mx-2">Event</span>
            </a>
        </li>

        <li class="nav-heading">Transactions</li>
        <li class="nav-item">
            <a class="nav-link sidebar-item <?=($navlink=='ordered') ? '' : 'collapsed'?>" href="<?=base_url('company/ordered')?>">
                <i class="fas fa-cart-arrow-down text-info"></i>
                <span class="mx-2">Ordered</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sidebar-item <?=($navlink=='history_trx') ? '' : 'collapsed'?>" href="<?=base_url('company/historyTrx')?>">
                <i class="fas fa-history text-info"></i>
                <span class="mx-2">History Trx</span>
            </a>
        </li> -->

        <!-- <li class="nav-heading">Integrations</li>

        <li class="nav-item">
            <a class="nav-link collapsed sidebar-item" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="fas fa-network-wired text-info"></i>
                <span class="mx-2">Integrations</span>
                <i class="fas fa-chevron-down ms-auto text-secondary"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse <?//=(isset($integrations)==True) ? 'show' : ''?>" data-bs-parent="#sidebar-nav">            
                <li>
                    <a class="nav-link <?//=($navlink=='simcard') ? '' : 'collapsed'?>" href="<?//=base_url('company/simcard')?>">
                        <i class="bi bi-circle"></i><span>SIM Cards</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?//=($navlink=='gps') ? '' : 'collapsed'?>" href="<?//=base_url('company/gps')?>">
                        <i class="bi bi-circle"></i><span>GPS</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?//=($navlink=='ibutton') ? '' : 'collapsed'?>" href="<?//=base_url('company/ibutton')?>">
                        <i class="bi bi-circle"></i><span>iButton</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?//=($navlink=='camera') ? '' : 'collapsed'?>" href="<?//=base_url('company/camera')?>">
                        <i class="bi bi-circle"></i><span>Camera</span>
                    </a>
                </li>
            </ul>
        </li> -->
    </ul>

</aside><!-- End Sidebar