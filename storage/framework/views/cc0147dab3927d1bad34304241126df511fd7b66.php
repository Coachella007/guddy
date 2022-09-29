<?php
if (Auth('admin')->User()->dashboard_style  == "light") {
    $text = "dark";
    $bg = "light";
} else {
    $text = "light";
    $bg = "dark";
}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel bg-<?php echo e($bg); ?>">
            <div class="content bg-<?php echo e($bg); ?>">
                <div class="page-inner">
                    <div class="mt-2 mb-5">
                        <h1 class="title1 d-inline text-<?php echo e($text); ?>">Process Loan Request</h1>
                        <div class="d-inline">
                            <div class="float-right btn-group">
                                
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('adminloan')); ?>"> <i class="fa fa-arrow-left"></i> back</a>
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
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-lg-2 card p-md-4 p-2 bg-<?php echo e($bg); ?> shadow">
                            <div class="mb-3">
                                <?php if($loan->status != "Processed"): ?>
                                <h4 class="text-<?php echo e($text); ?>">Send Funds to <?php echo e($user->name); ?> through his payment details below</h4>
                                <?php else: ?>
                                <h4 class="text-success">Payment Completed</h4>
                                <?php endif; ?>
                            </div>
                           

                            <?php if($loan->status != "Processed"): ?>
                                <div class="mt-1">
                                    <form action="<?php echo e(route('ploan')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <h6 class="text-<?php echo e($text); ?>">Action</h6>
                                                <select name="action" id="action" class="bg-<?php echo e($bg); ?> text-<?php echo e($text); ?> mb-2 form-control">
                                                    
                                                    <option value="Paid">Paid</option>
                                                    <option value="Reject">Reject</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-row d-none" id="emailcheck">
                                            <div class="col-md-12 form-group">
                                                <div class="selectgroup">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="emailsend" id="dontsend" value="false" class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">Don't Send Email</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="emailsend" id="sendemail" value="true" class="selectgroup-input">
                                                        <span class="selectgroup-button">Send Email</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row d-none" id="emailtext">
                                            <div class="form-group col-md-12">
                                                <h6 class="text-<?php echo e($text); ?>">Subject</h6>
                                                <input type="text" name="subject" id="subject" class="bg-<?php echo e($bg); ?> text-<?php echo e($text); ?> form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h6 class="text-<?php echo e($text); ?>">Enter Reasons for rejecting this withdrawal request</h6>
                                                <textarea class="bg-<?php echo e($bg); ?> text-<?php echo e($text); ?> form-control" row="3" placeholder="Type in here" name="reason" id="message"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo e($loan->id); ?>">
                                            <input type="submit" class="px-3 btn btn-primary" value="Proccess">
                                        </div>
                                    </form>
                                </div> 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                let action = document.getElementById('action');
                 
                $('#action').change(function(){
                    if (action.value === "Reject") {
                        document.getElementById('emailcheck').classList.remove('d-none');
                    }else{
                        document.getElementById('emailcheck').classList.add('d-none');
                        document.getElementById('emailtext').classList.add('d-none');
                        document.getElementById('dontsend').checked = true;
                        document.getElementById('subject').removeAttribute('required');
                        document.getElementById('message').removeAttribute('required');
                    }
                });

                $('#sendemail').click(function(){
                    document.getElementById('emailtext').classList.remove('d-none');
                    document.getElementById('subject').setAttribute('required', '');
                    document.getElementById('message').setAttribute('required', '');
                });

                $('#dontsend').click(function(){
                    document.getElementById('emailtext').classList.add('d-none');
                    document.getElementById('subject').removeAttribute('required');
                    document.getElementById('message').removeAttribute('required');
                });
            

            </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OT3\resources\views/admin/loan/processloan.blade.php ENDPATH**/ ?>