<div class="modal-header">
    <h4 class="modal-title">Product Info</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Column Name</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Category</td>
                        <td><?php echo e($productInfo->categoryId ? $productInfo->category->name : 'No Category Found'); ?></td>
                    </tr>
                    <tr>
                        <td>Sub Category</td>
                        <td><?php echo e($productInfo->subCategoryId ? $productInfo->subCategory->name : 'No Sub Category Found'); ?></td>
                    </tr>
                    <tr>
                        <td>Child Sub Category</td>
                        <td><?php echo e($productInfo->childSubCategoryId ? $productInfo->childSubCategory->name : 'No Child Sub Category Found'); ?></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><?php echo e($productInfo->productName); ?></td>
                    </tr>
                    <tr>
                        <td>Is New Product</td>
                        <td><?php echo e($productInfo->isNew); ?></td>
                    </tr>
                    <tr>
                        <td>Product Catalogue Pdf</td>
                        <td>
                            <?php if($productInfo->productCatalogue): ?>
                            <a href="<?php echo e(url($productInfo->productCatalogue)); ?>" class="btn btn-primary btn-sm" title="View Catalogue" target="_blank">
                                <i class="fa fa-eye"></i>  
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Image</td>
                        <td>
                            <?php if($productInfo->productImage): ?>
                            <img src="<?php echo e(url($productInfo->productImage)); ?>" style="width: 100px;" />
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Gallery Images</td>
                        <td>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Product Gallery Images</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td>
                                                <img src="<?php echo e(url($productImg->productImage)); ?>" style="width: 100px;" />
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Overview</td>
                        <td>
                            <div class="table-responsive product-overview">
                                <?php echo $productInfo->productOverview; ?>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Special Features</td>
                        <td><?php echo $productInfo->productHighlighting; ?></td>
                    </tr>
                    <tr>
                        <td>Salient Features</td>
                        <td><?php echo $productInfo->productSpecifications; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>        
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/backend/products/info.blade.php ENDPATH**/ ?>