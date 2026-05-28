@extends('backend.master')

@section('title')
Child Sub Categories
@endsection()

@section('content')
<style type="text/css">
    #childSubCategoryImage {
        line-height: 1.3
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Child Sub Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('childsubcategory.index') }}">Child Sub Category</a></li>
                </ol>
            </div>
        </div>

        @include('backend.layout.alert')

    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Child Sub Category</h3>
        </div>
        <form action="{{ route('childsubcategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                            <label for="childSubCategoryName">Child Sub Category Name</label>
                            <input type="text" name="childSubCategoryName" id="childSubCategoryName" class="form-control" placeholder="Enter Child Sub Category Name" pattern="[A-Za-z\s]+" title="Subcategory name should only contain alphabetic characters and spaces." required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="childSubCategoryImage">
                                Child Sub Category Image 
                                <span class="text-danger">*</span>
                                <small class="text-danger">(Image size 415x365px for optimal layout.)</small>
                            </label>
                            <input type="file" name="childSubCategoryImage" id="childSubCategoryImage" class="form-control" title="Child Sub Category Image" accept="image/*" required="" onchange="checkFileSize(this);" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Child Sub Category Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Child Sub Category</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($childSubCategories as $childsubcategory)
                    <tr>  
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ optional($childsubcategory->category)->name ?? 'No Category Found' }}</td>
                        <td>{{ optional($childsubcategory->subCategory)->name ?? 'No Sub Category Found' }}</td>
                        <td>{{ $childsubcategory->name }}</td>
                        <td>
                            @if($childsubcategory->childSubCategoryImage)
                            <img src="{{ url($childsubcategory->childSubCategoryImage) }}" style="width: 100px;" />
                            @endif
                        </td>
                        <td>{{ $childsubcategory->created_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="childSubCategoryEdit({{ $childsubcategory->id }});">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete Button -->                          
                            <a href="{{ url('admin/childsubcategory/delete/' . $childsubcategory->id) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>       
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>    
</section>

<div class="modal fade" id="modal-child-sub-category-edit" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>        

@endsection()

@section('javaScript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });
        
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    
    const childSubCategoryEdit = (childSubCategoryId) => {
        $("#modal-child-sub-category-edit .modal-dialog .modal-content").load("{{ url('admin/childsubcategory/edit') }}/" + childSubCategoryId, function() {
            // Reinitialize select2 inside the modal after loading content
            $('#modal-child-sub-category-edit .select2').each(function() {
                $(this).select2({
                    dropdownParent: $(this).parent()
                });
            });
        });
        $('#modal-child-sub-category-edit').modal('show');
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
@endsection()
