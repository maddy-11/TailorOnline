{{-- mainLayouts extends --}}
@extends('admin.layouts.app')

{{-- Page title --}}
@section('title', 'Dashboard')
{{-- vendor styles --}}

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="">
@endsection
@section('content')


<!-- END Left Aside -->
<div class="page-content-wrapper">
    <!-- BEGIN Page Header -->
    <header class="page-header" role="banner">
        <!-- we need this logo when user switches to nav-function-top -->
        <div class="page-logo">
            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
            </a>
        </div>
        <!-- DOC: nav menu layout change shortcut -->
        <div class="hidden-md-down dropdown-icon-menu position-relative">
            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                <i class="ni ni-menu"></i>
            </a>
            <ul>
                <li>
                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                        <i class="ni ni-minify-nav"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                        <i class="ni ni-lock-nav"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- DOC: mobile button appears during mobile width -->
        <div class="hidden-lg-up">
            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                <i class="ni ni-menu"></i>
            </a>
        </div>
        <div class="search">
            <form class="app-forms hidden-xs-down" role="search" action="page_search.html" autocomplete="off">
                <input type="text" id="search-field" placeholder="Search for anything" class="form-control" tabindex="1">
                <a href="#" onclick="return false;" class="btn-danger btn-search-close js-waves-off d-none" data-action="toggle" data-class="mobile-search-on">
                    <i class="fal fa-times"></i>
                </a>
            </form>
        </div>
        <div class="ml-auto d-flex">
            <!-- activate app search icon (mobile) -->
            <div class="hidden-sm-up">
                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                    <i class="fal fa-search"></i>
                </a>
            </div>
            <!-- app settings -->
            <div class="hidden-md-down">
                <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                    <i class="fal fa-cog"></i>
                </a>
            </div>
            <!-- app shortcuts -->
            <div>
                <a href="#" class="header-icon" data-toggle="dropdown" title="My Apps">
                    <i class="fal fa-cube"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated w-auto h-auto">
                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
                        <h4 class="m-0 text-center color-white">
                            Quick Shortcut
                            <small class="mb-0 opacity-80">User Applications & Addons</small>
                        </h4>
                    </div>
                    <div class="custom-scroll h-100">
                        <ul class="app-list">
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-2 icon-stack-3x color-primary-600"></i>
                                        <i class="base-3 icon-stack-2x color-primary-700"></i>
                                        <i class="ni ni-settings icon-stack-1x text-white fs-lg"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Services
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-2 icon-stack-3x color-primary-400"></i>
                                        <i class="base-10 text-white icon-stack-1x"></i>
                                        <i class="ni md-profile color-primary-800 icon-stack-2x"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Account
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-9 icon-stack-3x color-success-400"></i>
                                        <i class="base-2 icon-stack-2x color-success-500"></i>
                                        <i class="ni ni-shield icon-stack-1x text-white"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Security
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-18 icon-stack-3x color-info-700"></i>
                                        <span class="position-absolute pos-top pos-left pos-right color-white fs-md mt-2 fw-400">28</span>
                                    </span>
                                    <span class="app-list-name">
                                        Calendar
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-7 icon-stack-3x color-info-500"></i>
                                        <i class="base-7 icon-stack-2x color-info-700"></i>
                                        <i class="ni ni-graph icon-stack-1x text-white"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Stats
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-4 icon-stack-3x color-danger-500"></i>
                                        <i class="base-4 icon-stack-1x color-danger-400"></i>
                                        <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Messages
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-4 icon-stack-3x color-fusion-400"></i>
                                        <i class="base-5 icon-stack-2x color-fusion-200"></i>
                                        <i class="base-5 icon-stack-1x color-fusion-100"></i>
                                        <i class="fal fa-keyboard icon-stack-1x color-info-50"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Notes
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-16 icon-stack-3x color-fusion-500"></i>
                                        <i class="base-10 icon-stack-1x color-primary-50 opacity-30"></i>
                                        <i class="base-10 icon-stack-1x fs-xl color-primary-50 opacity-20"></i>
                                        <i class="fal fa-dot-circle icon-stack-1x text-white opacity-85"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Photos
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-19 icon-stack-3x color-primary-400"></i>
                                        <i class="base-7 icon-stack-2x color-primary-300"></i>
                                        <i class="base-7 icon-stack-1x fs-xxl color-primary-200"></i>
                                        <i class="base-7 icon-stack-1x color-primary-500"></i>
                                        <i class="fal fa-globe icon-stack-1x text-white opacity-85"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Maps
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-5 icon-stack-3x color-success-700 opacity-80"></i>
                                        <i class="base-12 icon-stack-2x color-success-700 opacity-30"></i>
                                        <i class="fal fa-comment-alt icon-stack-1x text-white"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Chat
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-5 icon-stack-3x color-warning-600"></i>
                                        <i class="base-7 icon-stack-2x color-warning-800 opacity-50"></i>
                                        <i class="fal fa-phone icon-stack-1x text-white"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Phone
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="app-list-item hover-white">
                                    <span class="icon-stack">
                                        <i class="base-6 icon-stack-3x color-danger-600"></i>
                                        <i class="fal fa-chart-line icon-stack-1x text-white"></i>
                                    </span>
                                    <span class="app-list-name">
                                        Projects
                                    </span>
                                </a>
                            </li>
                            <li class="w-100">
                                <a href="#" class="btn btn-default mt-4 mb-2 pr-5 pl-5"> Add more apps </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- app message -->
            <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-messenger">
                <i class="fal fa-globe"></i>
                <span class="badge badge-icon">!</span>
            </a>
            <!-- app notification -->
            <div>
                <a href="#" class="header-icon" data-toggle="dropdown" title="You got 11 notifications">
                    <i class="fal fa-bell"></i>
                    <span class="badge badge-icon">11</span>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-xl">
                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top mb-2">
                        <h4 class="m-0 text-center color-white">
                            11 New
                            <small class="mb-0 opacity-80">User Notifications</small>
                        </h4>
                    </div>
                    <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-messages" data-i18n="drpdwn.messages">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-feeds" data-i18n="drpdwn.feeds">Feeds</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-events" data-i18n="drpdwn.events">Events</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-notification">
                        <div class="tab-pane active p-3 text-center">
                            <h5 class="mt-4 pt-4 fw-500">
                                <span class="d-block fa-3x pb-4 text-muted">
                                    <i class="ni ni-arrow-up text-gradient opacity-70"></i>
                                </span> Select a tab above to activate
                                <small class="mt-3 fs-b fw-400 text-muted">
                                    This blank page message helps protect your privacy, or you can show the first message here automatically through
                                    <a href="#">settings page</a>
                                </small>
                            </h5>
                        </div>
                        <div class="tab-pane" id="tab-messages" role="tabpanel">
                            <div class="custom-scroll h-100">
                                <ul class="notification">
                                    <li class="unread">
                                        <a href="#" class="d-flex align-items-center">
                                            <span class="status mr-2">
                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-c.png')"></span>
                                            </span>
                                            <span class="d-flex flex-column flex-1 ml-1">
                                                <span class="name">Melissa Ayre <span class="badge badge-primary fw-n position-absolute pos-top pos-right mt-1">INBOX</span></span>
                                                <span class="msg-a fs-sm">Re: New security codes</span>
                                                <span class="msg-b fs-xs">Hello again and thanks for being part...</span>
                                                <span class="fs-nano text-muted mt-1">56 seconds ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="unread">
                                        <a href="#" class="d-flex align-items-center">
                                            <span class="status mr-2">
                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-a.png')"></span>
                                            </span>
                                            <span class="d-flex flex-column flex-1 ml-1">
                                                <span class="name">Adison Lee</span>
                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                <span class="fs-nano text-muted mt-1">2 minutes ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <span class="status status-success mr-2">
                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-b.png')"></span>
                                            </span>
                                            <span class="d-flex flex-column flex-1 ml-1">
                                                <span class="name">Oliver Kopyuv</span>
                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                <span class="fs-nano text-muted mt-1">3 days ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <span class="status status-warning mr-2">
                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-e.png')"></span>
                                            </span>
                                            <span class="d-flex flex-column flex-1 ml-1">
                                                <span class="name">Dr. John Cook PhD</span>
                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                <span class="fs-nano text-muted mt-1">2 weeks ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <span class="status status-success mr-2">
                                                <!-- <img src="img/demo/avatars/avatar-m.png" data-src="img/demo/avatars/avatar-h.png" class="profile-image rounded-circle" alt="Sarah McBrook" /> -->
                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-h.png')"></span>
                                            </span>
                                            <span class="d-flex flex-column flex-1 ml-1">
                                                <span class="name">Sarah McBrook</span>
                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                <span class="fs-nano text-muted mt-1">3 weeks ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <span class="status status-success mr-2">
                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-m.png')"></span>
                                            </span>
                                            <span class="d-flex flex-column flex-1 ml-1">
                                                <span class="name">Anothony Bezyeth</span>
                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                <span class="fs-nano text-muted mt-1">one month ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <span class="status status-danger mr-2">
                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-j.png')"></span>
                                            </span>
                                            <span class="d-flex flex-column flex-1 ml-1">
                                                <span class="name">Lisa Hatchensen</span>
                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                <span class="fs-nano text-muted mt-1">one year ago</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-feeds" role="tabpanel">
                            <div class="custom-scroll h-100">
                                <ul class="notification">
                                    <li class="unread">
                                        <div class="d-flex align-items-center show-child-on-hover">
                                            <span class="d-flex flex-column flex-1">
                                                <span class="name d-flex align-items-center">Administrator <span class="badge badge-success fw-n ml-1">UPDATE</span></span>
                                                <span class="msg-a fs-sm">
                                                    System updated to version <strong>4.5.1</strong> <a href="docs_buildnotes.html">(patch notes)</a>
                                                </span>
                                                <span class="fs-nano text-muted mt-1">5 mins ago</span>
                                            </span>
                                            <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center show-child-on-hover">
                                            <div class="d-flex flex-column flex-1">
                                                <span class="name">
                                                    Adison Lee <span class="fw-300 d-inline">replied to your video <a href="#" class="fw-400"> Cancer Drug</a> </span>
                                                </span>
                                                <span class="msg-a fs-sm mt-2">Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day...</span>
                                                <span class="fs-nano text-muted mt-1">10 minutes ago</span>
                                            </div>
                                            <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center show-child-on-hover">
                                            <!--<img src="img/demo/avatars/avatar-m.png" data-src="img/demo/avatars/avatar-k.png" class="profile-image rounded-circle" alt="k" />-->
                                            <div class="d-flex flex-column flex-1">
                                                <span class="name">
                                                    Troy Norman'<span class="fw-300">s new connections</span>
                                                </span>
                                                <div class="fs-sm d-flex align-items-center mt-2">
                                                    <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                                    <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
                                                    <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                                                    <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                                                    <div data-hasmore="+3" class="rounded-circle profile-image-md mr-1">
                                                        <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                                                    </div>
                                                </div>
                                                <span class="fs-nano text-muted mt-1">55 minutes ago</span>
                                            </div>
                                            <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center show-child-on-hover">
                                            <!--<img src="img/demo/avatars/avatar-m.png" data-src="img/demo/avatars/avatar-e.png" class="profile-image-sm rounded-circle align-self-start mt-1" alt="k" />-->
                                            <div class="d-flex flex-column flex-1">
                                                <span class="name">Dr John Cook <span class="fw-300">sent a <span class="text-danger">new signal</span></span></span>
                                                <span class="msg-a fs-sm mt-2">Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</span>
                                                <span class="fs-nano text-muted mt-1">10 minutes ago</span>
                                            </div>
                                            <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center show-child-on-hover">
                                            <div class="d-flex flex-column flex-1">
                                                <span class="name">Lab Images <span class="fw-300">were updated!</span></span>
                                                <div class="fs-sm d-flex align-items-center mt-1">
                                                    <a href="#" class="mr-1 mt-1" title="Cell A-0012">
                                                        <span class="d-block img-share" style="background-image:url('img/thumbs/pic-7.png'); background-size: cover;"></span>
                                                    </a>
                                                    <a href="#" class="mr-1 mt-1" title="Patient A-473 saliva">
                                                        <span class="d-block img-share" style="background-image:url('img/thumbs/pic-8.png'); background-size: cover;"></span>
                                                    </a>
                                                    <a href="#" class="mr-1 mt-1" title="Patient A-473 blood cells">
                                                        <span class="d-block img-share" style="background-image:url('img/thumbs/pic-11.png'); background-size: cover;"></span>
                                                    </a>
                                                    <a href="#" class="mr-1 mt-1" title="Patient A-473 Membrane O.C">
                                                        <span class="d-block img-share" style="background-image:url('img/thumbs/pic-12.png'); background-size: cover;"></span>
                                                    </a>
                                                </div>
                                                <span class="fs-nano text-muted mt-1">55 minutes ago</span>
                                            </div>
                                            <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center show-child-on-hover">
                                            <!--<img src="img/demo/avatars/avatar-m.png" data-src="img/demo/avatars/avatar-h.png" class="profile-image rounded-circle align-self-start mt-1" alt="k" />-->
                                            <div class="d-flex flex-column flex-1">
                                                <div class="name mb-2">
                                                    Lisa Lamar<span class="fw-300"> updated project</span>
                                                </div>
                                                <div class="row fs-b fw-300">
                                                    <div class="col text-left">
                                                        Progress
                                                    </div>
                                                    <div class="col text-right fw-500">
                                                        45%
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm d-flex mt-1">
                                                    <span class="progress-bar bg-primary-500 progress-bar-striped" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></span>
                                                </div>
                                                <span class="fs-nano text-muted mt-1">2 hrs ago</span>
                                                <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                    <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-events" role="tabpanel">
                            <div class="d-flex flex-column h-100">
                                <div class="h-auto">
                                    <table class="table table-bordered table-calendar m-0 w-100 h-100 border-0">
                                        <tr>
                                            <th colspan="7" class="pt-3 pb-2 pl-3 pr-3 text-center">
                                                <div class="js-get-date h5 mb-2">[your date here]</div>
                                            </th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted bg-faded">30</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td><i class="fal fa-birthday-cake mt-1 ml-1 position-absolute pos-left pos-top text-primary"></i> 6</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
                                            <td class="bg-primary-300 pattern-0">10</td>
                                            <td>11</td>
                                            <td>12</td>
                                            <td>13</td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>15</td>
                                            <td>16</td>
                                            <td>17</td>
                                            <td>18</td>
                                            <td>19</td>
                                            <td>20</td>
                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>22</td>
                                            <td>23</td>
                                            <td>24</td>
                                            <td>25</td>
                                            <td>26</td>
                                            <td>27</td>
                                        </tr>
                                        <tr>
                                            <td>28</td>
                                            <td>29</td>
                                            <td>30</td>
                                            <td>31</td>
                                            <td class="text-muted bg-faded">1</td>
                                            <td class="text-muted bg-faded">2</td>
                                            <td class="text-muted bg-faded">3</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="flex-1 custom-scroll">
                                    <div class="p-2">
                                        <div class="d-flex align-items-center text-left mb-3">
                                            <div class="width-5 fw-300 text-primary l-h-n mr-1 align-self-start fs-xxl">
                                                15
                                            </div>
                                            <div class="flex-1">
                                                <div class="d-flex flex-column">
                                                    <span class="l-h-n fs-md fw-500 opacity-70">
                                                        October 2020
                                                    </span>
                                                    <span class="l-h-n fs-nano fw-400 text-secondary">
                                                        Friday
                                                    </span>
                                                </div>
                                                <div class="mt-3">
                                                    <p>
                                                        <strong>2:30PM</strong> - Doctor's appointment
                                                    </p>
                                                    <p>
                                                        <strong>3:30PM</strong> - Report overview
                                                    </p>
                                                    <p>
                                                        <strong>4:30PM</strong> - Meeting with Donnah V.
                                                    </p>
                                                    <p>
                                                        <strong>5:30PM</strong> - Late Lunch
                                                    </p>
                                                    <p>
                                                        <strong>6:30PM</strong> - Report Compression
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-2 px-3 bg-faded d-block rounded-bottom text-right border-faded border-bottom-0 border-right-0 border-left-0">
                        <a href="#" class="fs-xs fw-500 ml-auto">view all notifications</a>
                    </div>
                </div>
            </div>
            <!-- app user menu -->
            <div>
                <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                    <img src="img/demo/avatars/avatar-admin.png" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                    <!-- you can also add username next to the avatar with the codes below:
									<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
									<i class="ni ni-chevron-down hidden-xs-down"></i> -->
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                            <span class="mr-2">
                                <img src="img/demo/avatars/avatar-admin.png" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                            </span>
                            <div class="info-card-text">
                                <div class="fs-lg text-truncate text-truncate-lg">Dr. Codex Lantern</div>
                                <span class="text-truncate text-truncate-md opacity-80">drlantern@gotbootstrap.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider m-0"></div>
                    <a href="#" class="dropdown-item" data-action="app-reset">
                        <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                    </a>
                    <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
                        <span data-i18n="drpdwn.settings">Settings</span>
                    </a>
                    <div class="dropdown-divider m-0"></div>
                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                        <i class="float-right text-muted fw-n">F11</i>
                    </a>
                    <a href="#" class="dropdown-item" data-action="app-print">
                        <span data-i18n="drpdwn.print">Print</span>
                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                    </a>
                    <div class="dropdown-multilevel dropdown-multilevel-left">
                        <div class="dropdown-item">
                            Language
                        </div>
                        <div class="dropdown-menu">
                            <a href="#?lang=fr" class="dropdown-item" data-action="lang" data-lang="fr">Français</a>
                            <a href="#?lang=en" class="dropdown-item active" data-action="lang" data-lang="en">English (US)</a>
                            <a href="#?lang=es" class="dropdown-item" data-action="lang" data-lang="es">Español</a>
                            <a href="#?lang=ru" class="dropdown-item" data-action="lang" data-lang="ru">Русский язык</a>
                            <a href="#?lang=jp" class="dropdown-item" data-action="lang" data-lang="jp">日本語</a>
                            <a href="#?lang=ch" class="dropdown-item" data-action="lang" data-lang="ch">中文</a>
                        </div>
                    </div>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item fw-500 pt-3 pb-3" href="page_login.html">
                        <span data-i18n="drpdwn.page-logout">Logout</span>
                        <span class="float-right fw-n">&commat;codexlantern</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- END Page Header -->
    <!-- BEGIN Page Content -->
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
            <li class="breadcrumb-item">Form Stuff</li>
            <li class="breadcrumb-item active">Basic Inputs</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-edit'></i> Basic Inputs
                <small>
                    Default input elements for forms
                </small>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            General <span class="fw-300"><i>inputs</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag">
                                Be sure to use an appropriate type attribute on all inputs (e.g., code <code>email</code> for email address or <code>number</code> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                            </div>
                            <form>
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-email-2">Email</label>
                                    <input type="email" id="example-email-2" name="example-email-2" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-password">Password</label>
                                    <input type="password" id="example-password" class="form-control" value="password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-palaceholder">Placeholder</label>
                                    <input type="text" id="example-palaceholder" class="form-control" placeholder="placeholder">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-textarea">Text area</label>
                                    <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-static">Static control</label>
                                    <input type="text" readonly="" class="form-control-plaintext" id="example-static" value="email@example.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-helping">Helping text</label>
                                    <input type="text" id="example-helping" class="form-control" placeholder="Helping text">
                                    <span class="help-block">
                                        A block of help text that breaks onto a new line and may extend beyond one line.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-select">Input Select</label>
                                    <select class="form-control" id="example-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-multiselect">Multiple Select</label>
                                    <select id="example-multiselect" multiple="" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-fileinput">Default file input</label>
                                    <input type="file" id="example-fileinput" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-datetime-local-input">Date and time</label>
                                    <input class="form-control" type="datetime-local" value="2023-07-23T11:25:00" id="example-datetime-local-input">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-date">Date</label>
                                    <input class="form-control" id="example-date" type="date" name="date" value="2023-07-23">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-month">Month</label>
                                    <input class="form-control" id="example-month" type="month" name="month">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-week">Week</label>
                                    <input class="form-control" id="example-week" type="week" name="week">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-time-2">Time</label>
                                    <input class="form-control" id="example-time-2" type="time" name="time">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-time-3">Time</label>
                                    <input class="form-control" id="example-time-3" type="time" name="time">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-number">Number</label>
                                    <input class="form-control" id="example-number" type="number" name="number" value="839473">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-color">Color</label>
                                    <input class="form-control" id="example-color" type="color" name="color" value="#727cf5">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-range">Range</label>
                                    <input class="form-control" id="example-range" type="range" name="range" min="0" max="100">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="customRange2">Range (custom)</label>
                                    <input type="range" class="custom-range" id="customRange2">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Select (custom)</label>
                                    <select class="custom-select form-control">
                                        <option selected="">Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">File (Browser)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            General <span class="fw-300"><i>inputs (disabled)</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag">
                                Add the disabled boolean attribute on an input to prevent user interactions and make it appear lighter. By default, browsers will treat all native form controls (<code>&lt;input&gt;</code>, <code>&lt;select&gt;</code> and <code>&lt;button&gt;</code> elements) inside a <code>&lt;fieldset disabled&gt;</code> as disabled, preventing both keyboard and mouse interactions on them.
                            </div>
                            <form>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="simpleinput-disabled">Text disabled</label>
                                    <input type="text" id="simpleinput-disabled" class="form-control" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-email-disabled">Email disabled</label>
                                    <input type="email" id="example-email-disabled" name="example-email-disabled" class="form-control" placeholder="Email" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-password-disabled">Password disabled</label>
                                    <input type="password" id="example-password-disabled" class="form-control" value="password" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-palaceholder-disabled">Placeholder disabled</label>
                                    <input type="text" id="example-palaceholder-disabled" class="form-control" placeholder="placeholder" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-textarea-disabled">Text area disabled</label>
                                    <textarea class="form-control" id="example-textarea-disabled" rows="5" disabled=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-static-disabled">Static control disabled</label>
                                    <input type="text" readonly="" class="form-control-plaintext" id="example-static-disabled" value="email@example.com" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-helping-disabled">Helping text disabled</label>
                                    <input type="text" id="example-helping-disabled" class="form-control" placeholder="Helping text" disabled="">
                                    <span class="help-block">
                                        A block of help text that breaks onto a new line and may extend beyond one line.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-select-disabled">Input Select disabled</label>
                                    <select class="form-control" id="example-select-disabled" disabled="">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-multiselect-disabled">Multiple Select disabled</label>
                                    <select id="example-multiselect-disabled" multiple="" class="form-control" disabled="">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-fileinput-disabled">Default file input disabled</label>
                                    <input type="file" id="example-fileinput-disabled" class="form-control-file" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-datetime-local-input-disabled">Date and time disabled</label>
                                    <input class="form-control" type="datetime-local" value="2023-07-23T11:25:00" id="example-datetime-local-input-disabled" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-date-disabled">Date disabled</label>
                                    <input class="form-control" id="example-date-disabled" type="date" name="date" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-month-disabled">Month disabled</label>
                                    <input class="form-control" id="example-month-disabled" type="month" name="month" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-week-disabled">Week disabled</label>
                                    <input class="form-control" id="example-week-disabled" type="week" name="week" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-time-disabled">Time disabled</label>
                                    <input class="form-control" id="example-time-disabled" type="time" name="time" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-time-disabled-2">Time disabled</label>
                                    <input class="form-control" id="example-time-disabled-2" type="time" name="time" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-number">Number disabled</label>
                                    <input class="form-control" id="example-number-disabled" type="number" name="number" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-color">Color disabled</label>
                                    <input class="form-control" id="example-color-disabled" type="color" name="color" value="#ed1c24" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted" for="example-range-disabled">Range disabled</label>
                                    <input class="form-control" id="example-range-disabled" type="range" name="range" min="0" max="100" disabled="">
                                </div>
                                <div class="form-group">
                                    <label for="customRange1" class="form-label text-muted">Range (disabled)</label>
                                    <input type="range" class="custom-range" id="customRange1" disabled="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-muted">Select (disabled)</label>
                                    <select class="custom-select form-control" disabled="">
                                        <option selected="">Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label text-muted">File Browser (disabled)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile-2" disabled="">
                                        <label class="custom-file-label" for="customFile-2">Choose file</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Input <span class="fw-300"><i>Sizes</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag">
                                Set heights using classes like <code>.input-lg</code>, <code>.input-sm</code> and for custom inputs, you can use <code>.custom-select-sm</code>, <code>.custom-select-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="example-input-small" class="form-label">Small</label>
                                    <input type="text" id="example-input-small" name="example-input-small" class="form-control form-control-sm" placeholder=".input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="example-input-normal" class="form-label">Normal</label>
                                    <input type="text" id="example-input-normal" name="example-input-normal" class="form-control" placeholder="Normal">
                                </div>
                                <div class="form-group">
                                    <label for="example-input-large" class="form-label">Large</label>
                                    <input type="text" id="example-input-large" name="example-input-large" class="form-control form-control-lg" placeholder=".input-lg">
                                </div>
                                <div class="form-group mb-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="example-gridsize" class="form-label">Grid Sizes</label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="utilities_responsive_grid.html" title="Responsive Grid" target="_blank">Check out how it works</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <input type="text" id="example-gridsize" class="form-control bg-primary-50" placeholder=".col-3">
                                        </div>
                                        <div class="col">
                                            <input type="text" id="example-gridsize-2" class="form-control bg-success-50" placeholder=".col">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-0">
                                                <input class="form-control" id="gridrange" type="range" name="gridrange" min="1" max="12" value="3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Altering <span class="fw-300"><i>with utilities</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag">
                                You can easily alter the border, boder-radius and padding using the utility classes.
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="example-input-square" class="form-label">Square edges</label>
                                        <input type="text" id="example-input-square" class="form-control form-control-lg rounded-0" placeholder="Square borders">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="example-input-pill" class="form-label">Rounded pill</label>
                                        <input type="text" id="example-input-pill" class="form-control form-control-lg rounded-pill" placeholder="Rounded pill">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="example-input-material" class="form-label">Material</label>
                                        <input type="text" id="example-input-material" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0 bg-transparent" placeholder="Material">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="example-input-border" class="form-label">Border color</label>
                                        <input type="text" id="example-input-border" class="form-control form-control-lg border-info" placeholder="Border colors">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
    <!-- BEGIN Page Footer -->
    <footer class="page-footer" role="contentinfo">
        <div class="d-flex align-items-center flex-1 text-muted">
            <span class="hidden-md-down fw-700">2020 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-primary fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a></span>
        </div>
        <div>
            <ul class="list-table m-0">
                <li><a href="intel_introduction.html" class="text-secondary fw-700">About</a></li>
                <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">License</a></li>
                <li class="pl-3"><a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a></li>
                <li class="pl-3 fs-xl"><a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary" target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </footer>
    <!-- END Page Footer -->
    <!-- BEGIN Shortcuts -->
    <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="app-list w-auto h-auto p-0 text-left">
                        <li>
                            <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                <div class="icon-stack">
                                    <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                    <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                </div>
                                <span class="app-list-name">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
                                <div class="icon-stack">
                                    <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                    <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                    <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                </div>
                                <span class="app-list-name">
                                    Inbox
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                <div class="icon-stack">
                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                    <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                </div>
                                <span class="app-list-name">
                                    Add More
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Shortcuts -->
    <!-- BEGIN Color profile -->
    <!-- this area is hidden and will not be seen on screens or screen readers -->
    <!-- we use this only for CSS color refernce for JS stuff -->
    <p id="js-color-profile" class="d-none">
        <span class="color-primary-50"></span>
        <span class="color-primary-100"></span>
        <span class="color-primary-200"></span>
        <span class="color-primary-300"></span>
        <span class="color-primary-400"></span>
        <span class="color-primary-500"></span>
        <span class="color-primary-600"></span>
        <span class="color-primary-700"></span>
        <span class="color-primary-800"></span>
        <span class="color-primary-900"></span>
        <span class="color-info-50"></span>
        <span class="color-info-100"></span>
        <span class="color-info-200"></span>
        <span class="color-info-300"></span>
        <span class="color-info-400"></span>
        <span class="color-info-500"></span>
        <span class="color-info-600"></span>
        <span class="color-info-700"></span>
        <span class="color-info-800"></span>
        <span class="color-info-900"></span>
        <span class="color-danger-50"></span>
        <span class="color-danger-100"></span>
        <span class="color-danger-200"></span>
        <span class="color-danger-300"></span>
        <span class="color-danger-400"></span>
        <span class="color-danger-500"></span>
        <span class="color-danger-600"></span>
        <span class="color-danger-700"></span>
        <span class="color-danger-800"></span>
        <span class="color-danger-900"></span>
        <span class="color-warning-50"></span>
        <span class="color-warning-100"></span>
        <span class="color-warning-200"></span>
        <span class="color-warning-300"></span>
        <span class="color-warning-400"></span>
        <span class="color-warning-500"></span>
        <span class="color-warning-600"></span>
        <span class="color-warning-700"></span>
        <span class="color-warning-800"></span>
        <span class="color-warning-900"></span>
        <span class="color-success-50"></span>
        <span class="color-success-100"></span>
        <span class="color-success-200"></span>
        <span class="color-success-300"></span>
        <span class="color-success-400"></span>
        <span class="color-success-500"></span>
        <span class="color-success-600"></span>
        <span class="color-success-700"></span>
        <span class="color-success-800"></span>
        <span class="color-success-900"></span>
        <span class="color-fusion-50"></span>
        <span class="color-fusion-100"></span>
        <span class="color-fusion-200"></span>
        <span class="color-fusion-300"></span>
        <span class="color-fusion-400"></span>
        <span class="color-fusion-500"></span>
        <span class="color-fusion-600"></span>
        <span class="color-fusion-700"></span>
        <span class="color-fusion-800"></span>
        <span class="color-fusion-900"></span>
    </p>
    <!-- END Color profile -->
</div>


@endsection
@section('page-scripts')

<script>
    $(document).ready(function() {
        // initialize datatable
        var example_gridsize = $("#example-gridsize");
        $("#gridrange").on("input change", function() { //do something
            example_gridsize.attr("placeholder", ".col-" + $(this).val());
            example_gridsize.parent().removeClass().addClass("col-" + $(this).val())
            console.log("col-" + $(this).val());
        });
    });
</script>

@endsection