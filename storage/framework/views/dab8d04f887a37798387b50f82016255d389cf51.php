
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('styles'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dash/css/stripeglobal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dash/css/stripenormalize.css')); ?>">
<?php $__env->stopSection(); ?>

<!-- Page title -->
<div class="page-title">
    <div class="row justify-content-between align-items-center">
        <div class="mb-3 col-md-6 mb-md-0">
            <h5 class="mb-0 text-white h3 font-weight-400">Payment Of Loan</h5>
        </div>
    </div>
</div>


<div>
  <?php if(!empty($successMsg)): ?>
  <div class="row">
      <div class="col-lg-12">
          <div class="alert alert-group alert-danger alert-icon alert-dismissible fade show" role="alert">
              <div class="alert-group-prepend">
                  <span class="alert-group-icon text-">
                      <i class="far fa-thumbs-down"></i>
                  </span>
              </div>
              <div class="alert-content">
                  <?php echo e($successMsg); ?>

              </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
  </div>
  <?php endif; ?>
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

<?php if($loan->amountloaned > 0): ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="p-2 shadow-lg card p-md-4">
                            <form method="POST" action="<?php echo e(route ('deposits')); ?>" id="amt">
                              <?php echo csrf_field(); ?>
                                
                                <div class="pt-3">
                                  <label for="amountloaned">Amount Loaned</label>
                                  <input id="amountloaned" type="number" value="<?php echo e($loan->amountloaned); ?>" class="form-control" name="amountloaned" aria-describedby="amount" required readonly>
                                  
                                </div>
                                
                                  <div class="pt-3">
                                      <label for="intrest">Amount To Pay </label>
                                      <input id="intrest" type="number" class="form-control" name="intrest" aria-describedby="charges" value="<?php echo e($loan->amountloaned + $loan->intrest); ?>" disabled required >
                                      <small id="" class="form-text text-muted">amount loaned + 2% charge</small>
                                  </div>
                                                        
                            
                                <div class="pt-5">
                                      <a  href="<?php echo e(route('deposits')); ?>" type="submit" class="btn btn-primary" <?php echo e((($loan->amountloaned + $loan->intrest) < ($user->account_bal)) ? 'disabled' : ''); ?>  value="submit" style="width:100%;" >proceed to loan application</a>
                                </div>
                              </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php else: ?>
<div class="mt-4 row">
    <div class="col-md-12">
        <div class="py-4 card">
            <div class="text-center card-body">

                <p>You are currently not on loan at the moment</p>
                <a href="<?php echo e(route('loan')); ?>" class="px-3 btn btn-primary">Apply for loan</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\otd44\resources\views/user/payloan.blade.php ENDPATH**/ ?>