<?php $__env->startSection('title'); ?>
Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    #categoryImage {
        line-height: 1.3
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('category.index')); ?>">Category</a></li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('backend.layout.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Create Category</h3>
        </div>
        <form id="categoryForm"  action="<?php echo e(route('category.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoryName">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="category_name" name="name" placeholder="Enter category name" pattern="[A-Za-z\s]+" title="Category name should only contain alphabetic characters and spaces." required="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categoryImage">
                                Category Image 
                                <span class="text-danger">*</span>
                                <small class="text-danger">(Image size 415x365px for optimal layout.)</small>
                            </label>
                            <input type="file" name="categoryImage" id="categoryImage" class="form-control" title="Category Image" accept="image/*" required="" onchange="checkFileSize(this);" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger mx-3">Reset</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td>
                        <?php if($category->categoryImage): ?>
                        <img src="<?php echo e(url($category->categoryImage)); ?>" style="width: 100px;" />
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($category->created_at->format('d/m/Y')); ?></td>
                    <td>
                        <!-- Edit Button -->
                        <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="categoryEdit(<?php echo e($category->id); ?>);">
                            <i class="fas fa-edit"></i> <!-- Edit icon -->
                        </a>

                        <!-- Delete Button -->                          
                        <a href="<?php echo e(url('admin/category/delete/' . $category->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>                          
                    </td>

                    <!-- Actions for edit and delete can be added here -->
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>    
</section>

<div class="modal fade" id="modal-category-edit" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
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
    });
    
    const categoryEdit = (categoryId) => {
        $("#modal-category-edit .modal-dialog .modal-content").load("<?php echo e(url('admin/category/edit')); ?>/" + categoryId);
        $('#modal-category-edit').modal('show');
    };
    
    function checkFileSize(input) {
        const maxSize = 512 * 1024;
        const file = input.files[0];
      
        if (file && file.size > maxSize) {
            alert("The file size exceeds 512 KB. Please select a smaller file.");
            input.value = "";
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/backend/category/index.blade.php ENDPATH**/ ?>