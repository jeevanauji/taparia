<form action="{{ url('admin/reports-downloads/update/' . $reportAndDownloadInfo->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">Edit Report & Download</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="contentType">Select Content Type <span class="text-danger">*</span></label>
                    <select name="contentType" id="contentType" class="form-control select2" style="width: 100%;" required="">
                        <option value="" disabled="" selected="">Select Content Type</option>
                        <option value="Shareholding Pattern" {{ $reportAndDownloadInfo->contentType == 'Shareholding Pattern' ? 'selected' : '' }}>Shareholding Pattern</option>
                        <option value="Annual Reports" {{ $reportAndDownloadInfo->contentType == 'Annual Reports' ? 'selected' : '' }}>Annual Reports</option>
                        <option value="Corporate Governance" {{ $reportAndDownloadInfo->contentType == 'Corporate Governance' ? 'selected' : '' }}>Corporate Governance</option>
                        <option value="Financial Results" {{ $reportAndDownloadInfo->contentType == 'Financial Results' ? 'selected' : '' }}>Financial Results</option>
                        <option value="Clause 47" {{ $reportAndDownloadInfo->contentType == 'Clause 47' ? 'selected' : '' }}>Clause 47</option>
                        <option value="Investor Information" {{ $reportAndDownloadInfo->contentType == 'Investor Information' ? 'selected' : '' }}>Investor Information</option>
                        <option value="General Meetings" {{ $reportAndDownloadInfo->contentType == 'General Meetings' ? 'selected' : '' }}>General Meetings</option>
                        <option value="Downloads" {{ $reportAndDownloadInfo->contentType == 'Downloads' ? 'selected' : '' }}>Downloads Page</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="contentName">Category Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="contentName" name="contentName" value="{{ $reportAndDownloadInfo->contentName }}" placeholder="Enter Content Name" required="" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pdfFile">Choose Pdf File</label>
                    <input type="file" name="pdfFile" id="pdfFile" class="form-control" title="Choose Pdf File" accept=".pdf" onchange="checkFileSize(this);" />
                    <input type="hidden" name="oldPdfFile" value="{{ $reportAndDownloadInfo->pdfFile }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>
