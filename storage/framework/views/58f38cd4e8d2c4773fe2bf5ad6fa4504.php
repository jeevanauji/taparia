<form action="<?php echo e(url('admin/subcategory/update/' . $subCategory->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="modal-header">
        <h4 class="modal-title">Edit Sub Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="categorySelect">Select Category <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="categorySelect" name="category_id" style="width: 100%;" required="">
                        <option value="" <?php echo e($subCategory->categoryId == '' ? 'selected' : ''); ?>>Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e($subCategory->categoryId == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="subcategoryName">Sub Category Name</label>
                    <input type="text" class="form-control" id="subcategoryName" name="name" value="<?php echo e($subCategory->name); ?>" placeholder="Enter Subcategory name" pattern="[A-Za-z\s]+" title="Subcategory name should only contain alphabetic characters and spaces." required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="subCategoryImage">Sub Category Image <small class="text-danger">(Image size 415x365px for optimal layout.)</small></label>
                    <input type="file" name="subCategoryImage" id="subCategoryImage" class="form-control" title="Sub Category Image" accept="image/*" onchange="checkFileSize(this);" />
                    <input type="hidden" name="oldSubCategoryImage" value="<?php echo e($subCategory->subCategoryImage); ?>" />
                </div>
            </div>
        </div>        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>
<?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/backend/subcategory/edit.blade.php ENDPATH**/ ?>