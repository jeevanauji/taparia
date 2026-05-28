<form action="{{ url('admin/childsubcategory/update/' . $childSubCategory->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">Edit Child Sub Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="categoryId">Select Category <span class="text-danger">*</span></label>
                    <select name="categoryId" class="form-control select2" id="categoryIdEdit" style="width: 100%;" required="">
                        <option value="" {{ $childSubCategory->categoryId == '' ? 'selected' : '' }}>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $childSubCategory->categoryId == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="subCategoryId">Select Category <span class="text-danger">*</span></label>
                    <select name="subCategoryId" class="form-control select2" id="subCategoryIdEdit" style="width: 100%;" required="">
                        <option value="" {{ $childSubCategory->subCategoryId == '' ? 'selected' : '' }}>Select Sub Category</option>
                        @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}" {{ $childSubCategory->subCategoryId == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="childSubCategoryName">Child Sub Category Name</label>
                    <input type="text" name="childSubCategoryName" value="{{ $childSubCategory->name }}" id="childSubCategoryName" class="form-control" placeholder="Enter Child Sub Category Name" pattern="[A-Za-z\s]+" title="Child sub category name should only contain alphabetic characters and spaces.">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="childSubCategoryImage">Child Sub Category Image <small class="text-danger">(Image size 415x365px for optimal layout.)</small></label>
                    <input type="file" name="childSubCategoryImage" id="childSubCategoryImage" class="form-control" title="Child Sub Category Image" accept="image/*"onchange="checkFileSize(this);" />
                    <input type="hidden" name="oldChildSubCategoryImage" value="{{ $childSubCategory->childSubCategoryImage }}" />
                </div>
            </div>
        </div>        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>