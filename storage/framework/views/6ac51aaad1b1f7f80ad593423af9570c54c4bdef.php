<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="main-panel">
			<div class="content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> ">
				<div class="page-inner">
					<div class="mt-2 mb-4">
					<h1 class="title1 text-<?php echo e($text); ?>">Manage clients loans</h1>
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
						
						<div class="col-12 card shadow p-4 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
							<div class="table-responsive" data-example-id="hoverable-table"> 
								<table id="ShipTable" class="table table-hover text-<?php echo e($text); ?>"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Client name</th>
											<th>Client email</th>
											<th>Amount Loaned</th>
											<th>amount to be paid</th>
											
											<th>Status</th> 
											<th>Date created</th>
											<th>Option</th>
										</tr> 
									</thead> 
									<tbody> 
										<?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr> 
											<th scope="row"><?php echo e($loan->id); ?></th>
											<td><?php echo e($loan->duser->name); ?></td>
											<td><?php echo e($loan->duser->email); ?></td> 
											<td><?php echo e($settings->currency); ?><?php echo e(number_format($loan->amountloaned)); ?></td> 
											<td><?php echo e($settings->currency); ?><?php echo e(number_format($loan->amountloaned + $loan->intrest)); ?></td>
											
											<td>
												<?php if($loan->status == "Processed"): ?>
													<span class="badge badge-success"><?php echo e($loan->status); ?></span>
												<?php else: ?>
													<span class="badge badge-danger"><?php echo e($loan->status); ?></span>
												<?php endif; ?>
											</td> 
											<td><?php echo e(\Carbon\Carbon::parse($loan->created_at)->toDayDateTimeString()); ?></td> 
											<td> 
												
												<a href="<?php echo e(route('processloan',$loan->id )); ?> " class="m-1 btn btn-danger btn-sm">process</a> 

												
													<a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/dashboard/delloan')); ?>/<?php echo e($loan->id); ?>">delete</a>
												
											</td> 
										</tr> 
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>	
			</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OT33\resources\views/admin/loan/adminloan.blade.php ENDPATH**/ ?>