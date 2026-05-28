<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="true">×</button>
    <?php echo e(session('success')); ?>    
</div>
<?php elseif(session('error')): ?>
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo e(session('error')); ?>

  </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tapariatools.tapariatools.com\resources\views/backend/layout/alert.blade.php ENDPATH**/ ?>