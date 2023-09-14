    <!-- BEGIN Left Aside -->
    <aside class="page-sidebar">
        <div class="page-logo">
            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                <img src="{{asset('assets/img/logo.png')}}" alt="SLoan WebApp" aria-roledescription="logo">
                <span class="page-logo-text mr-1">Loan WebApp</span>
                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
            </a>
        </div>
        <!-- BEGIN PRIMARY NAVIGATION -->
        <nav id="js-primary-nav" class="primary-nav" role="navigation">
            <div class="nav-filter">
                <div class="position-relative">
                    <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                    <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                        <i class="fal fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="info-card">
                <img src="{{asset('assets/img/demo/avatars/avatar-m.png')}}" class="profile-image rounded-circle" alt="{{$logged_in_user->name}}">
                <div class="info-card-text">
                    <a href="#" class="d-flex align-items-center text-white">
                        <span class="text-truncate text-truncate-sm d-inline-block">
                            {{$logged_in_user->name}}
                        </span>
                    </a>
                    <span class="d-inline-block text-truncate text-truncate-sm">Toronto, Canada</span>
                </div>
                <img src="{{asset('assets/img/card-backgrounds/cover-2-lg.png')}}" class="cover" alt="cover">
                <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                    <i class="fal fa-angle-down"></i>
                </a>
            </div>
            <ul id="js-nav-menu" class="nav-menu">

                <li>
                    <a href="#" title="Tables" data-filter-tags="tables">
                        <i class="fal fa-th-list"></i>
                        <span class="nav-link-text" data-i18n="nav.tables">Manage Companies</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.companies.index')}}" title="Show All Companies" data-filter-tags="tables basic tables">
                                <span class="nav-link-text" data-i18n="nav.tables_basic_tables">List Companies</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.companies.create')}}" title="Create New Company" data-filter-tags="tables generate table style">
                                <span class="nav-link-text" data-i18n="nav.tables_generate_table_style">Create New</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#" title="Tables" data-filter-tags="tables">
                        <i class="fal fa-th-list"></i>
                        <span class="nav-link-text" data-i18n="nav.tables">Loan Applications</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.companies.loan-applications')}}" title="Show All Applications" data-filter-tags="tables basic tables">
                                <span class="nav-link-text" data-i18n="nav.tables_basic_tables">Show All</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.companies.loan-applications')}}?status=Pending" title="Create New Company" data-filter-tags="tables generate table style">
                                <span class="nav-link-text" data-i18n="nav.tables_generate_table_style">Pending Applications</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.companies.loan-applications')}}?status=Approved" title="Chat" data-filter-tags="pages chat">
                                <span class="nav-link-text" data-i18n="nav.pages_chat">Approved Applications</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.companies.loan-applications')}}?status=Cancelled" title="Chat" data-filter-tags="pages chat">
                                <span class="nav-link-text" data-i18n="nav.pages_chat">Cancelled Applications</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.companies.loan-applications')}}?status=Paid" title="Chat" data-filter-tags="pages chat">
                                <span class="nav-link-text" data-i18n="nav.pages_chat">Paid Applications</span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="#" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-window"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Suppliers</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.suppliers.index')}}" title="All Suppliers" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">All Suppliers</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.suppliers.index')}}?status=Pending" title="Pending Suppliers" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">Pending Suppliers</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.suppliers.index')}}?status=Approved" title="Approved Suppliers" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">Approved Suppliers</span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="#" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-window"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Form Fields</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.fields.index')}}" title="All Fields" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">All Fields</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.fields.create')}}?status=Pending" title="Create New Field" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">New Field</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-window"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Form Fields Values</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.fieldvalues.index')}}" title="All Fields Values" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">All Fields</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.fieldvalues.create')}}" title="New Field Values" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">New Field Value</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-window"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Service Form Fields</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.formfields.index')}}" title="All Fields Values" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">All Service Form Fields</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.formfields.create')}}" title="New Field Values" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">New Service Form Fields</span>
                            </a>
                        </li>
                    </ul>
                </li>


                 <li>
                    <a href="#" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-window"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Services</span>
                    </a>
                    <ul>
                        <li>
                            <a href="http://localhost/new_project/tailoronline/public/admin/services" title="All Fields Values" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">All Services</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.services.create')}}" title="New Field Values" data-filter-tags="ui components popovers">
                                <span class="nav-link-text" data-i18n="nav.ui_components_popovers">Add a New Service</span>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
            <div class="filter-message js-filter-message bg-success-600"></div>
        </nav>
        <!-- END PRIMARY NAVIGATION -->
        <!-- NAV FOOTER -->
        <div class="nav-footer shadow-top">
            <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                <i class="ni ni-chevron-right"></i>
                <i class="ni ni-chevron-right"></i>
            </a>
            <ul class="list-table m-auto nav-footer-buttons">
                <li>
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                        <i class="fal fa-comments"></i>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.services.list')}}" data-toggle="tooltip" data-placement="top" title="Support Chat">
                        <i class="fal fa-life-ring"></i>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.services.create')}}" data-toggle="tooltip" data-placement="top" title="Make a call">
                        <i class="fal fa-phone"></i>
                    </a>
                </li>
            </ul>
        </div> <!-- END NAV FOOTER -->
    </aside>