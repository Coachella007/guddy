
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
            <h5 class="mb-0 text-white h3 font-weight-400">Terms and Conditions.</h5>
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
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="p-2 shadow-lg card p-md-4">
                            <div >


                                <H3>Finnamontassets Loan Documentation</H3>

                                <h6>finnamontassets utilises a customer friendly loan service system. Our loan services give our customers the opportunity to circumvent the financial barrier put between them and their realizable goal. The process of obtaining loans is very straightforward and this makes our loans readily available and easily accessible. However, to qualify for our loans, some conditions must be met</h6>




<p><h4><bold>Conditions and Requirements</bold></h4></p>
<p><h6>Availability: Our loans are only available for the purchase of plans above $10,000. This would go ahead to include the premium, and deluxe pack plans. This would enable our customers who may temporarily be short of funds and would want to buy a king-sized plan able to achieve this feat. Customers are encouraged to complete their payments before the end of the investment time lap. Active loan plans expire at the end of the time lap. Failure to complete payment before expiration dramatically affects the ROI. 
</h6></p>

<p><h6>Span: There are limits to how much or how little loan customers can take. Customers who are qualified can only obtain loan 50% of their desired plan. This is mainly to bring redundancy in our loaning system to a bare minimum.
</h6>   </p>

<p><h6>Balance Check: Customers who are willing to apply for loans must make sure that their main account balance is able to complement the loan amount in order to tally with the price of the desired plan. In other words, if a customer, Brent, wants a 50% loan on a $5,000 plan, he should have AT LEAST $2,500 in his main account balance in order to complement the $500 loan amount.
</h6> </p>

<p><h6>Withdrawal: The withdrawal feature is not accessible to customers who are on an active loan plan. To regain access to this feature, the customer must pay back the loan in full. This ensures the authenticity of this service. Note that expired loans are considered inactive. 
</h6></p>
 <p><h6>Note: We would give you feedback on your application status within 48 hours from the time of application.</h6></p>














                                
                               </div>
                               <div>
                                  <form action="<?php echo e(route('loanform')); ?>" method="post">
                                      <?php echo csrf_field(); ?>
                                      <div>
                                      <div class="pl-4">
                                      <input type="checkbox" class="form-check-input text 2xl" name="accept" required>
                                      <label class="form-check-label" for="exampleCheck1">accept terms and conditions</label>
                                    </div>
                                    <div>
                                      <button   type="submit" class="btn btn-primary">proceed to loan application</button>
                  
                                  </form>
                               </div>
  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OT3\resources\views/user/Loan.blade.php ENDPATH**/ ?>