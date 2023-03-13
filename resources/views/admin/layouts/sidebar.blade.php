@php
    $settings = setting();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ $settings->site_name }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @yield('dashboard')">
                        <i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>


                <li class="nav-item @yield('Property Management') ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Properties<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('Property Management')">
                        <li class="nav-item">
                            <a href="{{ route('admin.property.index') }}"
                                class="nav-link @yield('property_list')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Property List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('Property Seekers')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Property Seekers<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('Property Seekers')">
                        <li class="nav-item">
                            <a href="{{route('admin.seeker.index')}}"
                                class="nav-link @yield('seeker_list')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Seeker List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('Property Owner')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Property Owner<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('Property Owner')">
                        <li class="nav-item">
                            <a href="{{route('admin.owner.index')}}"
                                class="nav-link @yield('owner_list')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Owner List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('BDFLAT Agents')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>BDFLAT Agents<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('BDFLAT Agents')">
                        <li class="nav-item">
                            <a href="{{route('admin.agents.index')}}"
                                class="nav-link @yield('agent_list')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Agent List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('Payment')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Payment<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('Payment')">
                        <li class="nav-item">
                            <a href="{{route('admin.transaction.index')}}"
                                class="nav-link @yield('transaction_list')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Transactions</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.refund_request')}}"
                                class="nav-link @yield('refund_request')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Refund Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.recharge_request')}}"
                                class="nav-link @yield('recharge_request')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Refund Request</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.agent_commission')}}"
                                class="nav-link @yield('agent_commission')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Refund Request</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('Pages')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Pages<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('Pages')">
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.index') }}"
                                class="nav-link @yield('pages_index')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Pages List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages-category.list') }}"
                                class="nav-link @yield('pages-category')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Pages List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('Web Ads')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Web Ads<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('Web Ads')">
                        <li class="nav-item">
                            <a href="{{route('admin.ads')}}"
                                class="nav-link @yield('property_list')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Ads</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.ads_position')}}"
                                class="nav-link @yield('ads_position')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Ad Position</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item @yield('TEST')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>TEST<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview @yield('TEST')">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link @yield('property_list')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>TEST</p>
                            </a>
                        </li>
                    </ul>
                </li>







                <li class="nav-item @yield('settings_menu') ">
                    <a href="{{ route('admin.settings') }}" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Settings<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview @yield('settings_menu')">
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.settings.general') }}"
                                class="nav-link @yield('general')">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.language') }}" class="nav-link">
                                <i class="fas fa-globe nav-icon"></i>
                                <p>Language</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.Smtp.mail') }}"
                                class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>SMTP</p>
                            </a>
                        </li> --}}


                    </ul>
                </li>


                <li class="nav-item"><a href="{{ route('admin.user.index') }}" class="nav-link @yield('admin-user')"><i class=" fa fa-book"></i> {{ __('Admin User & Role') }}</a></li>

                <li class="nav-item"><a href="{{ route('admin.roles.index') }}"
                        class="nav-link @yield('admin-roles')"><i class=" fa fa-book"></i> {{ __('Admin Roles') }}</a>
                </li>

                <li class="nav-item"><a href="{{ route('admin.permissions.index') }}"
                        class="nav-link @yield('admin-permissions')"><i class=" fa fa-book"></i>
                        {{ __('Admin permissions') }}</a></li>



            </ul>
        </nav>
    </div>
</aside>
