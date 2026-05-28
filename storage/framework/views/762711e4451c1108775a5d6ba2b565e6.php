<?php $__env->startSection('title'); ?>
Reports & Downloads
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    #pdfFile {
        line-height: 1.3;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reports & Downloads</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('reportsAndDownloads.index')); ?>">Reports & Downloads</a></li>
                </ol>
            </div>
        </div>

        <?php echo $__env->make('backend.layout.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="<?php echo e(route('reportsAndDownloads.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card card-primary">
            <div class="card-header d-flex">
                <h3 class="card-title">Reports & Downloads Info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contentType">Select Content Type <span class="text-danger">*</span></label>
                            <select name="contentType" id="contentType" class="form-control select2" style="width: 100%;" required="">
                                <option value="" disabled="" selected="">Select Content Type</option>
                                <option value="Shareholding Pattern">Shareholding Pattern</option>                                
                                <option value="Annual Reports">Annual Reports</option>                                
                                <option value="Corporate Governance">Corporate Governance</option>                                
                                <option value="Financial Results">Financial Results</option>
                                <option value="Clause 47">Clause 47</option>                                
                                <option value="Investor Information">Investor Information</option>                                
                                <option value="General Meetings">General Meetings</option>                                
                                <option value="Downloads">Downloads Page</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contentName">Content Name <span class="text-danger">*</span></label>
                            <input type="text" name="contentName" id="contentName" class="form-control" placeholder="Enter Content Name" required="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pdfFile">Choose Pdf File <span class="text-danger">*</span></label>
                            <input type="file" name="pdfFile" id="pdfFile" class="form-control" title="Choose Pdf File" accept=".pdf" required="" onchange="checkFileSize(this);" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
    
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Reports & Downloads Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Type</th>
                        <th>Content Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reportsAndDownloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportDownload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($reportDownload->contentType); ?></td>
                        <td><?php echo e($reportDownload->contentName); ?></td>
                        <td><?php echo e($reportDownload->created_at->format('d/m/Y')); ?></td>
                        <td>
                            <a href="<?php echo e(url($reportDownload->pdfFile)); ?>" class="btn btn-primary btn-sm" title="View" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="reportsDownloadEdit(<?php echo e($reportDownload->id); ?>);" class="btn btn-success btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?php echo e(url('admin/reports-downloads/delete/' . $reportDownload->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm" title="Delete">
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

<div class="modal fade" id="modal-report-download-edit" style="display: none;" aria-hidden="true">
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        $('.select2').select2();
    });
    
    function checkFileSize(input) {
        const maxSize = 5 * 1024 * 1024;
        const file = input.files[0];
      
        if (file && file.size > maxSize) {
            alert("The file size exceeds 5 MB. Please select a smaller file.");
            input.value = "";
        }
    }
    
    const reportsDownloadEdit = (reportsDownloadId) => {
        $("#modal-report-download-edit .modal-dialog .modal-content").load("<?php echo e(url('admin/reports-downloads/edit')); ?>/" + reportsDownloadId, function() {
            $('#modal-report-download-edit .select2').each(function() {
                $(this).select2({
                    dropdownParent: $(this).parent()
                });
            });
        });
        $('#modal-report-download-edit').modal('show');
    };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/backend/reportsanddownloads/index.blade.php ENDPATH**/ ?>