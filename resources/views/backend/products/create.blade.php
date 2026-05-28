@extends('backend.master')

@section('title')
Product Create
@endsection()

@section('content')
<style type="text/css">
    #productCatalogue, #productImages, #productImage {
        line-height: 1.3
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Create</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('product.create') }}">Product Create</a></li>
                </ol>
            </div>
        </div>

        @include('backend.layout.alert')
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-primary">
            <div class="card-header d-flex">
                <h3 class="card-title">Product Info</h3>
                <a href="{{ route('products.index') }}" class="btn btn-dark btn-sm ml-auto">
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
                                <option value="" disabled="" selected="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subCategoryId">Select Sub Category</label>
                            <select name="subCategoryId" class="form-control select2" id="subCategoryId" style="width: 100%;">
                                <option value="" disabled="" selected="">Select Sub Category</option>
                                @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="childSubCategoryId">Select Child Sub Category</label>
                            <select name="childSubCategoryId" class="form-control select2" id="childSubCategoryId" style="width: 100%;">
                                <option value="" disabled="" selected="">Select Child Sub Category</option>
                                @foreach ($childSubCategories as $childSubCategory)
                                <option value="{{ $childSubCategory->id }}">{{ $childSubCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productName">Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="productName" id="productName" class="form-control" placeholder="Enter Product Name" required="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="isNew">Is New Product <span class="text-danger">*</span></label>
                            <br />
                            <input type="radio" name="isNew" value="Y" id="Y" title="Yes" required="" />
                            Yes
                            <input type="radio" name="isNew" value="N" id="N" class="ml-5" checked="" title="No" required="" />
                            No
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productCatalogue">Product Catalogue Pdf</label>
                            <input type="file" name="productCatalogue" id="productCatalogue" class="form-control" title="Choose Catalogue Pdf" accept=".pdf" onchange="checkFileSize(this);" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productImage">Product Image <small class="text-danger">(Image size 525x525px for optimal layout.)</small></label>
                            <input type="file" name="productImage" id="productImage" class="form-control" title="Choose Product Image" accept="image/*" onchange="checkImageSize(this);" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productImages">Product Gallery Images <span class="text-danger">*</span> <small class="text-danger">(Image size 525x525px for optimal layout.)</small></label>
                            <input type="file" name="productImages[]" id="productImages" class="form-control" title="Choose Product Gallery Images" multiple="" required="" accept="image/*" onchange="checkFileSizeImage(this);" />
                            <small class="text-danger">Choose multiple images for gallery.</small>
                        </div>
                    </div>
                </div>
                
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="productOverview">Product Overview</label>
                            <textarea name="productOverview" id="productOverview"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="productHighlighting">Special Features</label>
                            <textarea name="productHighlighting" id="productHighlighting"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="productSpecifications">Salient Features</label>
                            <textarea name="productSpecifications" id="productSpecifications"></textarea>
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
</section>
@endsection()

@section('javaScript')
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
@endsection()