
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
            <h5 class="mb-0 text-white h3 font-weight-400">Submit your loan application form.</h5>
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="p-2 shadow-lg card p-md-4">
                            <form method="post" action="<?php echo e(route ('loanform')); ?>" id="amt">
                              <?php echo csrf_field(); ?>

                              <div class="pt-3">
                                <label for="fullname">your full name</label>
                                <input value= "<?php echo e(Auth::user()->name); ?>" type="name" class="form-control" name="fullname" aria-describedby="emailHelp" disabled >
                              </div>

                                <div class="pt-3">
                                  <label for="Email1">Email address</label>
                                  <input value="<?php echo e(Auth::user()->email); ?>"type="email" class="form-control" id="Email1" name="usersemail" aria-describedby="emailHelp" placeholder="Enter email" disabled required>
                                </div>

                                <div class="pt-3">
                                  <label for="phone">Phone number</label>
                                  <input type="tel" class="form-control" name="phone" id='phone'required value="<?php echo e(Auth::user()->phone); ?> " readonly>

                                </div>

                                <div class="pt-3">
                                  <label for="amountloaned">amount to be loaned</label>
                                  <input id="amountloaned" type="number" class="form-control" name="amountloaned" aria-describedby="amount" min="2500" minlength="4" max="25000" maxlength="4" required >
                                  <small id="emailHelp" class="form-text text-muted">note! the amount should not be above 50 percent of the premium investment plan.</small>
                                </div>
                                
                                  <div class="pt-3">
                                      <label for="intrest">Charge during payback</label>
                                      <input id="intrest" type="number" class="form-control" name="intrest" aria-describedby="charges" value="<?php echo e($settings->currency); ?>" disabled required >
                                      <small id="" class="form-text text-muted">this would be charged on this user while paying back.</small>
                                  </div>
                               
                                 

                                  <div class="pt-3">
                                    <label for="exampleFormControlSelect1">select any government issued id to upload</label>
                                    <select type="file"   class="form-control" id="exampleFormControlSelect1">
                                      <option>national id</option>
                                      <option>drivers liscence</option>
                                      <option>registerd voters card</option>
                                      <option>others</option>
                                    </select>
                                  </div>

                                    <div class="pt-3">
                                        <label for="file">upload your government issued ID</label>
                                        <input type="file" class="form-control" name="file" required>
                                        <small id="" class="form-text text-muted">please upload for easy processing of your documents.</small>

                                      </div>


                            
                                <div class="pt-5">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer>
  function calculate() {
var inputform = document.forms['amt']
var firstelement = inputform.elements['amountloaned']
var firstvalue = firstelement.value
var percent = firstvalue * 0.02
var percent = Math.round(percent * 100) / 100
var secondelement = inputform.elements['intrest']
secondelement.value = percent

}
document.getElementById('amountloaned').addEventListener('keyup', calculate);
</script> 

  
  
  <div>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
  <?php endif; ?>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OT33\resources\views/user/loanform.blade.php ENDPATH**/ ?>