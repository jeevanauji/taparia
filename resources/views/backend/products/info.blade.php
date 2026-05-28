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
                        <td>{{ $productInfo->categoryId ? $productInfo->category->name : 'No Category Found' }}</td>
                    </tr>
                    <tr>
                        <td>Sub Category</td>
                        <td>{{ $productInfo->subCategoryId ? $productInfo->subCategory->name : 'No Sub Category Found' }}</td>
                    </tr>
                    <tr>
                        <td>Child Sub Category</td>
                        <td>{{ $productInfo->childSubCategoryId ? $productInfo->childSubCategory->name : 'No Child Sub Category Found' }}</td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td>{{ $productInfo->productName }}</td>
                    </tr>
                    <tr>
                        <td>Is New Product</td>
                        <td>{{ $productInfo->isNew }}</td>
                    </tr>
                    <tr>
                        <td>Product Catalogue Pdf</td>
                        <td>
                            @if ($productInfo->productCatalogue)
                            <a href="{{ url($productInfo->productCatalogue) }}" class="btn btn-primary btn-sm" title="View Catalogue" target="_blank">
                                <i class="fa fa-eye"></i>  
                            </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Product Image</td>
                        <td>
                            @if ($productInfo->productImage)
                            <img src="{{ url($productInfo->productImage) }}" style="width: 100px;" />
                            @endif
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
                                        @foreach($productImages as $productImg)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ url($productImg->productImage) }}" style="width: 100px;" />
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Overview</td>
                        <td>
                            <div class="table-responsive product-overview">
                                {!! $productInfo->productOverview !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Special Features</td>
                        <td>{!! $productInfo->productHighlighting !!}</td>
                    </tr>
                    <tr>
                        <td>Salient Features</td>
                        <td>{!! $productInfo->productSpecifications !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>        
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>