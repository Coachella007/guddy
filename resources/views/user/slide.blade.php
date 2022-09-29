<!-- Sidenav -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('storage/app/public/'. $settings->logo) }}" class="navbar-brand-img" alt="logo">
        </a>
        <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler sidenav-toggler-dark" data-action="sidenav-unpin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- User mini profile -->
    <div class="userMiniSideBar text-center sidenav-user">

        <!-- Avatar -->
        <div class="leftSideBarWrapper">
            <div>
                <a href="#" class="avatar rounded-circle avatar-xl">
                    <i class="fas fa-user-circle fa-4x"></i>
                </a>
                <div class="mt-4">
                    <h5 class="mb-0 text-white"> {{ Auth::user()->name }}</h5>
                    <span class="mb-3 text-sm text-white d-block opacity-8">online</span>
                    <a href="#" class="shadow btn btn-sm btn-white btn-icon rounded-pill hover-translate-y-n3">
                        <span class="btn-inner--icon"><i class="far fa-coins"></i></span>
                        <span class="btn-inner--text">{{ $settings->currency  }}{{ number_format(Auth::user()->account_bal, 2, '.', ',') }}</span>
                    </a>
                </div>
            </div>


            <div class="colo-md-3 card mt-5 positionAbsolute">
                <h4 class="px-0 dropdown-header" style="font-size: 1rem; font-weight: 800 !important; color: #07458b !important;">Hi, {{ Auth::user()->name }}!</h4>
                <a href="{{ route('profile') }}" class="dropdown-item">
                    <i class="far fa-user"></i>
                    <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="far fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <!-- User info -->

        <div class="clearfix nav-application" style="display: flex !important; align-items: center !important; justify-content: center !important;">
            <a style="margin-top: 1rem !important;" href="{{ route('dashboard') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="far fa-home fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Home</span>
            </a>
            <a href="{{ route('deposits') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('deposits')) ? 'active' : '' }} {{ (request()->routeIs('payment')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="far fa-download fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Deposit</span>
            </a>
            <a href="{{ route('withdrawalsdeposits') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('withdrawalsdeposits')) ? 'active' : '' }} {{ (request()->routeIs('withdrawfunds')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fas fa-arrow-alt-circle-up fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Withdraw</span>
            </a>
            <a href="{{ route('tradinghistory') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('tradinghistory')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fal fa-history fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Profit History</span>
            </a>
            <a href="{{ route('accounthistory') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('accounthistory')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fas fa-money-check-alt fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Transactions</span>
            </a>
            @if ($moresettings->use_crypto_feature == 'true')
            <a href="{{ route('assetbalance') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('assetbalance')) ? 'active' : '' }} {{ (request()->routeIs('swaphistory')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fab fa-stack-exchange fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Swap Crypto</span>
            </a>
            @endif
            @if ($moresettings->use_transfer)
            <a href="{{ route('transferview') }}" class="navBtnLinks text-sm btn btn-square {{(request()->routeIs('transferview')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fas fa-exchange fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Transfer funds</span>
            </a>
            @endif
            @if ($settings->subscription_service == 'on')
            <a href="{{ route('subtrade') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('subtrade')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="far fa-receipt fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Managed Accounts</span>
            </a>
            @endif
            <a href="{{ route('profile') }}" class="navBtnLinks text-sm btn btn-square {{(request()->routeIs('profile')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fas fa-address-card fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Profile</span>
            </a>

            <a href="{{ route('mplans') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('mplans')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fas fa-hand-holding-seedling fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">investment Plans</span>
            </a>

            <a href="{{ route('loan') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('loan')) ? 'active' : '' }} {{ (request()->routeIs('loanform')) ? 'active' : '' }} ">
                <span class="btn-inner--icon d-block"><i class='fa fa-indent fa-2x'></i>

                </span>
                <span class="pt-2 btn-inner--icon d-block">Loan</span>
            </a>

            <a href="{{ route('PayLoan') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('PayLoan')) ? 'active' : '' }}  ">
                <span class="btn-inner--icon d-block"><i class='fa fa-bank fa-2x'></i>

                </span>
                <span class="pt-2 btn-inner--icon d-block">Pay-Loan</span>
            </a>

            <a href="{{ route('myplans', 'All') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('myplans')) ? 'active' : '' }} {{ (request()->routeIs('plandetails')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="far fa-hand-holding-seedling fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">My Plans</span>
            </a>
            <a href="{{ route('referuser') }}" class="navBtnLinks text-sm btn btn-square {{ (request()->routeIs('referuser')) ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fas fa-retweet fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Referrals</span>
            </a>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-4 w-100 actions d-flex justify-content-between">
        {{-- <a href="{{ route('profile') }}" class="pl-0 text-white action-item action-item-lg">
        <i class="far fa-user"></i>
        </a> --}}
        {{-- <a href="#modal-chat" class="text-white action-item action-item-lg" data-toggle="modal">
                <i class="far fa-comment-alt"></i>
            </a>
            <a href="shop/invoices.html" class="pr-0 text-white action-item action-item-lg">
                <i class="far fa-receipt"></i>
            </a> --}}
    </div>
    <!-- Application nav -->

    <!-- Misc area -->
    <div class="card bg-gradient-warning">
        <div class="card-body">
            <h5 class="text-white">Need Help!</h5>
            <p class="mb-4 text-white">
                Contact our 24/7 customer support center
            </p>
            <a href="{{ route('support') }}" class="btn btn-sm btn-block btn-white rounded-pill">Contact Us</a>
        </div>
    </div>