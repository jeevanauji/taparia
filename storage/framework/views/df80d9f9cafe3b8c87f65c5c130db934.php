<?php $__env->startSection('title'); ?>
Product Edit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    #productCatalogue, #productImages, #newProductImages, #productImage {
        line-height: 1.3
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('products.index')); ?>">Product</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(url('admin/product/edit/' . $productInfo->id)); ?>">Product Edit</a></li>
                </ol>
            </div>
        </div>

        <?php echo $__env->make('backend.layout.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="<?php echo e(url('admin/product/update/' . $productInfo->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card card-primary">
            <div class="card-header d-flex">
                <h3 class="card-title">Product Info</h3>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-dark btn-sm ml-auto">
                    <i class="fas fa-angle-double-left"></i> Back
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categoryId">Select Category <span class="text-danger">*</span></label>
                            <select name="categoryId" id="categorySelect" class="form-control select2" style="width: 100%;" required="">
                                <option value="" disabled="" <?php echo e($productInfo->categoryId == '' ? 'selected' : ''); ?>>Select Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e($productInfo->categoryId == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subCategoryId">Select Sub Category</label>
                            <select name="subCategoryId" class="form-control select2" id="subCategoryId" style="width: 100%;">
                                <option value="" <?php echo e($productInfo->subCategoryId == '' ? 'selected' : ''); ?>>Select Sub Category</option>
                                <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subCategory->id); ?>" <?php echo e($productInfo->subCategoryId == $subCategory->id ? 'selected' : ''); ?>><?php echo e($subCategory->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="childSubCategoryId">Select Child Sub Category</label>
                            <select name="childSubCategoryId" class="form-control select2" id="childSubCategoryId" style="width: 100%;">
                                <option value="" <?php echo e($productInfo->childSubCategoryId == '' ? 'selected' : ''); ?>>Select Child Sub Category</option>
                                <?php $__currentLoopData = $childSubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($childSubCategory->id); ?>" <?php echo e($productInfo->childSubCategoryId == $childSubCategory->id ? 'selected' : ''); ?>><?php echo e($childSubCategory->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productName">Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="productName" value="<?php echo e($productInfo->productName); ?>" id="productName" class="form-control" placeholder="Enter Product Name" required="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="isNew">Is New Product <span class="text-danger">*</span></label>
                            <br />
                            <input type="radio" name="isNew" value="Y" id="Y" <?php echo e($productInfo->isNew == 'Y' ? 'checked' : ''); ?> title="Yes" required="" />
                            Yes
                            <input type="radio" name="isNew" value="N" id="N" class="ml-5" <?php echo e($productInfo->isNew == 'N' ? 'checked' : ''); ?> title="No" required="" />
                            No
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productCatalogue">Product Catalogue Pdf</label>
                            <input type="file" name="productCatalogue" id="productCatalogue" class="form-control" title="Choose Product Catalogue" accept=".pdf" onchange="checkFileSize(this);" />
                            <input type="hidden" name="oldProductCatalogue" value="<?php echo e($productInfo->productCatalogue); ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productImage">Product Image <small class="text-danger">(Image size 525x525px for optimal layout.)</small></label>
                            <input type="file" name="productImage" id="productImage" class="form-control" title="Choose Product Image" accept="image/*" onchange="checkImageSize(this);" />
                            <input type="hidden" name="oldProductImage" value="<?php echo e($productInfo->productImage); ?>" />
                        </div>
                    </div>
                </div>
                
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Product Gallery Image</th>
                                    <th>Change Product Gallery Image <small class="text-danger">(Image size 525x525px for optimal layout.)</small></th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="productImageRowId[]" value="<?php echo e($productImg->id); ?>" />
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <img src="<?php echo e(url($productImg->productImage)); ?>" style="width: 100px;" />
                                    </td>
                                    <td>
                                        <input type="file" name="productImages[]" id="productImages" class="form-control" title="Choose Product Image" accept="image/*" onchange="checkFileSizeImage(this);" />
                                    </td>
                                    <td>
                                        <a href="<?php echo e(url('admin/product-image/delete/' . $productImg->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
                
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="newProductImages">Add More Product Gallery Images <small class="text-danger">(Image size 525x525px for optimal layout.)</small></label>
                            <input type="file" name="newProductImages[]" id="newProductImages" class="form-control" title="Choose Product Gallery Images" multiple="" accept="image/*" onchange="checkFileSizeImage(this);" />
                            <small class="text-danger">Choose multiple images for gallery.</small>
                        </div>
                    </div>
                </div>
                
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="productOverview">Product Overview</label>
                            <textarea name="productOverview" id="productOverview"><?php echo e($productInfo->productOverview); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="productHighlighting">Special Features</label>
                            <textarea name="productHighlighting" id="productHighlighting"><?php echo e($productInfo->productHighlighting); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="productSpecifications">Salient Features</label>
                            <textarea name="productSpecifications" id="productSpecifications"><?php echo e($productInfo->productSpecifications); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javaScript'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        
        $('#productOverview').summernote({
            height: 200,
            placeholder: 'Product Overview'
        });
        
        $('#productHighlighting').summernote({
            height: 200,
            placeholder: 'Special Features'
        });
        
        $('#productSpecifications').summernote({
            height: 200,
            placeholder: 'Salient Features'
        });
    });
    
    function checkFileSize(input) {
        const maxSize = 2 * 1024 * 1024;
        const file = input.files[0];
      
        if (file && file.size > maxSize) {
            alert("The file size exceeds 2 MB. Please select a smaller file.");
            input.value = "";
        }
    }
    
    function checkImageSize(input) {
        const maxSize = 512 * 1024;
        const file = input.files[0];
      
        if (file && file.size > maxSize) {
            alert("The file size exceeds 512 KB. Please select a smaller file.");
            input.value = "";
        }
    }
    
    function checkFileSizeImage(input) {
        const maxSize = 512 * 1024; // 512 KB
        const files = input.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file.size > maxSize) {
                alert(`The file "${file.name}" exceeds 512 KB. Please select a smaller file.`);
                input.value = ""; // Clear the input
                return; // Stop checking further if one file is invalid
            }
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/backend/products/edit.blade.php ENDPATH**/ ?>