<?php $__env->startSection('title'); ?>
Products
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .product-overview table {
        width: 100% !important;
        overflow-x: auto;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('products.index')); ?>">Products</a></li>
                </ol>
            </div>
        </div>

        <?php echo $__env->make('backend.layout.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Products Report</h3>
            <a href="<?php echo e(route('product.create')); ?>" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus"></i> Create
            </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Child Sub Category</th>
                        <th>Product name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e(optional($product->category)->name ?? 'No Category Found'); ?></td>
                        <td><?php echo e(optional($product->subCategory)->name ?? 'No Sub Category Found'); ?></td>                        
                        <td><?php echo e(optional($product->childSubCategory)->name ?? 'No Child Sub Category Found'); ?></td>                        
                        <td><?php echo e($product->productName); ?></td>
                        <td><?php echo e($product->created_at->format('d/m/Y')); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/product/edit/' . $product->id)); ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="getProductInfo(<?php echo e($product->id); ?>);">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(url('admin/product/delete/' . $product->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>

<div class="modal fade" id="modal-product-info" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javaScript'); ?>
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        $('.select2').select2();
    });
    
    const getProductInfo = (productId) => {
        $("#modal-product-info .modal-dialog .modal-content").load("<?php echo e(url('admin/product/info')); ?>/" + productId);
        $('#modal-product-info').modal('show');
    };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tapariatools.tapariatools.com\resources\views/backend/products/index.blade.php ENDPATH**/ ?>