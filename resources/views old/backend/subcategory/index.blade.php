@extends('backend.master')

@section('title')
Sub Categories
@endsection()

@section('content')
<style type="text/css">
    #subCategoryImage {
        line-height: 1.3
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sub Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('subcategory.index') }}">Sub Category</a></li>
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
            <h3 class="card-title">Create Sub Category</h3>
        </div>
        <form id="categoryForm" action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categorySelect">Select Category <span class="text-danger">*</span></label>
                            <select class="form-control select2" id="categorySelect" name="category_id" style="width: 100%;" required="">
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subcategoryName">Sub Category Name</label>
                            <input type="text" class="form-control" id="subcategoryName" name="name" placeholder="Enter Sub Category Name" pattern="[A-Za-z\s]+" title="Subcategory name should only contain alphabetic characters and spaces." required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subCategoryImage">
                                Sub Category Image 
                                <span class="text-danger">*</span>
                                <small class="text-danger">(Image size 415x365px for optimal layout.)</small>
                            </label>
                            <input type="file" name="subCategoryImage" id="subCategoryImage" class="form-control" title="Sub Category Image" accept="image/*" required="" onchange="checkFileSize(this);" />
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
            <h3 class="card-title">Sub Category Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subCategories as $subcategory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subcategory->category ? $subcategory->category->name : 'No Category Found' }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>
                            @if($subcategory->subCategoryImage)
                            <img src="{{ url($subcategory->subCategoryImage) }}" style="width: 100px;" />
                            @endif
                        </td>
                        <td>{{ $subcategory->created_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="subCategoryEdit({{ $subcategory->id }});">
                                <i class="fas fa-edit"></i> <!-- Edit icon -->
                            </a>

                            <!-- Delete Button -->                          
                            <a href="{{ url('admin/subcategory/delete/' . $subcategory->id) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">
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

<div class="modal fade" id="modal-sub-category-edit" style="display: none;" aria-hidden="true">
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
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
        $('.select2').select2();
    });
    
    const subCategoryEdit = (subCategoryId) => {
        $("#modal-sub-category-edit .modal-dialog .modal-content").load("{{ url('admin/subcategory/edit') }}/" + subCategoryId, function() {
            // Reinitialize select2 dropdowns after loading modal content
            $('#modal-sub-category-edit .select2').each(function() {
                $(this).select2({
                    dropdownParent: $(this).parent()
                });
            });
        });
        $('#modal-sub-category-edit').modal('show');
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