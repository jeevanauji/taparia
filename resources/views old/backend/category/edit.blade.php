<form action="{{ url('admin/category/update/' . $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="category_name">Category Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="category_name" name="name" value="{{ $category->name }}" placeholder="Enter category name" pattern="[A-Za-z\s]+" title="Category name should only contain alphabetic characters and spaces." required="" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="categoryImage">Category Image <small class="text-danger">(Image size 415x365px for optimal layout.)</small></label>
                    <input type="file" name="categoryImage" id="categoryImage" class="form-control" title="Category Image" accept="image/*" onchange="checkFileSize(this);" />
                    <input type="hidden" name="oldCategoryImage" value="{{ $category->categoryImage }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>
