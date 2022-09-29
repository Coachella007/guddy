<!-- Sidenav -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    @media  screen and (max-width: 600px) {
        .userMiniSideBar {
            position: absolute !important;
            background-color: white !important;
            height: 100vh !important;
            width: 65vw !important;
            top: 0 !important;
            left: 0 !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
            align-items: center !important;
            overflow-y: scroll;
            border: 1px solid darkblue !important;
            border-bottom-right-radius: 7px !important;
        }

        .positionAbsolute {
            display: flex !important;
            height: 10rem !important;
            line-height: 1.3rem !important;
            width: 90% !important;
        }

        .clearfix {
            background-color: white !important;
            height: 100vh !important;
            width: 64vw !important;
            overflow: scroll !important;
            display: flex !important;
            flex-direction: column;
            align-items: center !important;
            justify-content: left !important;
            border-top: 1px solid darkblue !important;
            border-radius: 4px !important;
            column-gap: 1rem;
            padding-top: 1.5rem !important;
            margin-top: 3.2rem !important;

        }


        .nav-application>.btn {
            float: unset !important;
            color: #8492a6;
            display: flex !important;
            align-items: center !important;
            flex-direction: row !important;
            justify-content: left !important;
            font-size: 0.6rem !important;
            margin-top: -2rem !important;
            width: 100% !important;
            height: 4rem !important;
            display: flex !important;
            align-items: center !important;
            flex-direction: row !important;
            justify-content: left !important;
            font-size: 0.6rem !important;
        }



        .nav-application>.btn.active {
            color: darkblue !important;
            background-color: transparent !important;
        }

        .nav-application>.btn:nth-child(odd) {
            margin-right: unset !important;
        }

        .pt-2 {
            padding-top: 0 !important;
        }

        .contactUsCard {
            width: 64vw !important;
            height: 6.7rem !important;
            font-size: 0.8rem !important;
            display: none !important;
        }

        .contactBtn {
            width: 56vw !important;
            text-align: center !important;
            margin-left: -1.3rem !important;
            font-size: 0.9rem !important;
        }

        .logoSm {
            background-color: white !important;
            width: 100vw !important;
            margin-left: -2.2rem !important;
            height: 4.6rem !important;
        }

    }
</style>
<div style="overflow-x: hidden !important;" class="sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="logoSm sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
            <img src="<?php echo e(asset('storage/app/public/'. $settings->logo)); ?>" class="navbar-brand-img" alt="logo">
        </a>
        <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="mediaSmallScreen sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i style="background-color: darkblue !important;" class="bg-primary sidenav-toggler-line"></i>
                    <i style="background-color: darkblue !important;" class="bg-primary sidenav-toggler-line"></i>
                    <i style="background-color: darkblue !important;" class="bg-primary sidenav-toggler-line"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- User mini profile -->
    <div style="z-index: -1 !important;" class="userMiniSideBar text-center">
        <!-- Avatar -->

        <div class="userHideSmallScreen">
            <a href="#" class="avatar rounded-circle avatar-xl">
                <i class="fas fa-user-circle fa-4x"></i>
            </a>
            <div class="mt-4">
                <h5 class="mb-0 text-white"> <?php echo e(Auth::user()->name); ?></h5>
                <span class="mb-3 text-sm text-white d-block opacity-8">online</span>
                <a href="#" class="shadow btn btn-sm btn-white btn-icon rounded-pill hover-translate-y-n3">
                    <span class="btn-inner--icon"><i class="far fa-coins"></i></span>
                    <span class="btn-inner--text"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></span>
                </a>
            </div>
        </div>

        <!-- User info -->
        <!-- Actions -->
        <div class="hideForSmallScreen mt-4 w-100 actions d-flex justify-content-between">
            
            
        </div>
        <!-- Application nav -->
        <div class="clearfix nav-application">
            <a href=" <?php echo e(route('dashboard')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('dashboard')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="far fa-home fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Home</span>
            </a>
            <a href="<?php echo e(route('deposits')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('deposits')) ? 'active' : ''); ?> <?php echo e((request()->routeIs('payment')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="far fa-download fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Deposit</span>
            </a>
            <a href="<?php echo e(route('withdrawalsdeposits')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('withdrawalsdeposits')) ? 'active' : ''); ?> <?php echo e((request()->routeIs('withdrawfunds')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fas fa-arrow-alt-circle-up fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Withdraw</span>
            </a>
            <a href="<?php echo e(route('tradinghistory')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('tradinghistory')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fal fa-history fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Profit History</span>
            </a>
            <a href="<?php echo e(route('accounthistory')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('accounthistory')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fas fa-money-check-alt fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Transactions</span>
            </a>
            <?php if($moresettings->use_crypto_feature == 'true'): ?>
            <a href="<?php echo e(route('assetbalance')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('assetbalance')) ? 'active' : ''); ?> <?php echo e((request()->routeIs('swaphistory')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fab fa-stack-exchange fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Swap Crypto</span>
            </a>
            <?php endif; ?>
            <?php if($moresettings->use_transfer): ?>
            <a href="<?php echo e(route('transferview')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('transferview')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fas fa-exchange fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Transfer funds</span>
            </a>
            <?php endif; ?>
            <?php if($settings->subscription_service == 'on'): ?>
            <a href="<?php echo e(route('subtrade')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('subtrade')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="far fa-receipt fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Managed Accounts</span>
            </a>
            <?php endif; ?>
            <a href="<?php echo e(route('profile')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('profile')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fas fa-address-card fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Profile</span>
            </a>

            <a href="<?php echo e(route('mplans')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('mplans')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fas fa-hand-holding-seedling fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">investment Plans</span>
            </a>

            <a href="<?php echo e(route('loan')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('loan')) ? 'active' : ''); ?> <?php echo e((request()->routeIs('loanform')) ? 'active' : ''); ?> ">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class='fa fa-indent fa-2x'></i>

                </span>
                <span class="pt-2 btn-inner--icon d-block">Loan</span>
            </a>

            <a href="<?php echo e(route('PayLoan')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('PayLoan')) ? 'active' : ''); ?>  ">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class='fa fa-bank fa-2x'></i>

                </span>
                <span class="pt-2 btn-inner--icon d-block">Pay-Loan</span>
            </a>

            <a href="<?php echo e(route('myplans', 'All')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('myplans')) ? 'active' : ''); ?> <?php echo e((request()->routeIs('plandetails')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="far fa-hand-holding-seedling fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">My Plans</span>
            </a>
            <a href="<?php echo e(route('referuser')); ?>" class="text-sm btn btn-square <?php echo e((request()->routeIs('referuser')) ? 'active' : ''); ?>">
                <span class="btn-inner--icon d-block"><i style="font-size: 0.8rem !important" class="fas fa-retweet fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Referrals</span>
            </a>
        </div>


        <!-- Misc area -->
        <div class="contactUsCard card bg-gradient-warning">
            <div class="cardBody card-body">
                <h5 class="text-white">Need Help!</h5>
                <p class="mb-4 text-white">
                    Contact our 24/7 customer support center
                </p>
                <a href="<?php echo e(route('support')); ?>" class="contactBtn btn btn-sm btn-block btn-white rounded-pill">Contact Us</a>
            </div>
        </div>
    </div>

</div><?php /**PATH C:\XAMPP-MYSQL\htdocs\REEL\resources\views/user/sidebar.blade.php ENDPATH**/ ?>