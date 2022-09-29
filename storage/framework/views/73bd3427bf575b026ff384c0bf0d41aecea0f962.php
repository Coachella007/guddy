<?php
$sub_link = 'https://trade.mql5.com/trade';
?>


<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Trading Account(s)</h5>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="shadow-lg col-lg-12 card p-lg-3 p-sm-5">
                            <h2 class=""><?php echo e($settings->site_name); ?> Account manager</h2> <br>
                            <div clas="well">
                                <p class="text-justify ">Don’t have time to trade or learn how to
                                    trade?
                                    Our Account Management Service is The Best Profitable Trading Option for you,
                                    We can help you to manage your account in the financial MARKET with a simple
                                    subscription model.<br>
                                    <small>Terms and Conditions apply</small><br>Reach us at <?php echo e($settings->contact_email); ?>

                                    for more info.
                                </p>
                            </div>
                            <br>
                            <div class="py-3">
                                <a class="text-white btn btn-primary" data-toggle="modal" data-target="#submitmt4modal">
                                    Subscribe Now
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="p-2 mb-5 shadow p-md-4 row card ">
                        <div class="mb-3 col-12">
                            <h5 class="">My Trading Accounts</h5>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive" data-example-id="hoverable-table">
                                <table id="UserTable" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Account ID</th>
                                            <th>Account Password</th>
                                            <th>Account Type</th>
                                            <th>Currency</th>
                                            <th>Leverage</th>
                                            <th>Server</th>
                                            <th>Duration</th>
                                            <th>Submitted at</th>
                                            <th>Started at</th>
                                            <th>Expiring at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($sub->mt4_id); ?></td>
                                                <td><?php echo e($sub->mt4_password); ?></td>
                                                <td><?php echo e($sub->account_type); ?></td>
                                                <td><?php echo e($sub->currency); ?></td>
                                                <td><?php echo e($sub->leverage); ?></td>
                                                <td><?php echo e($sub->server); ?></td>
                                                <td><?php echo e($sub->duration); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($sub->created_at)->toDayDateTimeString()); ?>

                                                </td>
                                                <td><?php echo e(\Carbon\Carbon::parse($sub->start_date)->toDayDateTimeString()); ?>

                                                </td>
                                                <td>
                                                    <?php if(!empty($sub->end_date)): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($sub->end_date)->toDayDateTimeString()); ?>

                                                    <?php else: ?>
                                                        Not Started yet
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($sub->status); ?></td>
                                                <td>
                                                    <?php if($sub->status == 'Pending'): ?>
                                                        <a href="<?php echo e(url('dashboard/delsubtrade')); ?>/<?php echo e($sub->id); ?>"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    <?php else: ?>
                                                        <a href="#" data-toggle="modal" class="btn btn-danger btn-sm"
                                                            onclick="deletemt4()">Delete</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="13" class="text-center">
                                                    No data available
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h3 class="">Connect to your trading account to monitor activities on
                                your trading account(s).</h3>
                            <iframe src="<?php echo e($sub_link); ?>" name="WebTrader" title="<?php echo e($title); ?>" frameborder="0"
                                style="display: block; border: none; height: 76vh; width: 80vw;"></iframe>
                        </div>
                    </div>
                    <!-- end of chart -->
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('user.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
        function deletemt4() {
            swal({
                title: "Error!",
                text: "Your subscription has already started, send an Email to <?php echo e($settings->contact_email); ?> to have your MT4 Details Deleted.",
                icon: "error",
                buttons: {
                    confirm: {
                        text: "Okay",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OT33\resources\views/user/subtrade.blade.php ENDPATH**/ ?>