@extends('backend.master')

@section('title', 'Chronology Order')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-7"><h1>Chronology Order</h1></div>
            <div class="col-sm-5">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Chronology Order</li>
                </ol>
            </div>
        </div>
        @include('backend.layout.alert')
    </div>
</section>

<section class="content chronology-order-page">
    <div class="callout callout-info">
        <p class="mb-0"><strong>Drag the grip to reorder active items.</strong> Expand a row to see its contents, then click <strong>Save</strong> for that group.</p>
    </div>

    <div class="order-group-header">
        <div><strong>Categories</strong></div>
        @if($categories->count() > 1)
        <button type="button" class="btn btn-primary btn-xs" data-save-list="chronology-categories"><i class="fas fa-save mr-1"></i>Save</button>
        @endif
    </div>
    <ul class="chronology-list category-list" id="chronology-categories" data-order-list data-type="category" data-parent-type="root" data-parent-id="0">
        @forelse($categories as $category)
        <li class="order-item" data-id="{{ $category->id }}">
            <details class="order-node category-node">
                <summary class="order-summary">
                    <span class="drag-handle" draggable="true" title="Drag to reorder" aria-label="Drag {{ $category->name }} to reorder"><i class="fas fa-grip-vertical"></i></span>
                    <span class="node-name">{{ $category->name }}</span>
                    <span class="node-count">{{ $category->orderedSubCategories->count() }} subcategories</span>
                </summary>
                <div class="order-children">
                    <div class="order-group-header nested-header">
                        <div><strong>Subcategories</strong></div>
                        @if($category->orderedSubCategories->count() > 1)
                        <button type="button" class="btn btn-outline-primary btn-xs" data-save-list="chronology-subcategories-{{ $category->id }}"><i class="fas fa-save mr-1"></i>Save</button>
                        @endif
                    </div>
                    <ul class="chronology-list subcategory-list" id="chronology-subcategories-{{ $category->id }}" data-order-list data-type="subcategory" data-parent-type="category" data-parent-id="{{ $category->id }}">
                        @forelse($category->orderedSubCategories as $subcategory)
                        <li class="order-item" data-id="{{ $subcategory->id }}">
                            <details class="order-node subcategory-node">
                                <summary class="order-summary">
                                    <span class="drag-handle" draggable="true" title="Drag to reorder" aria-label="Drag {{ $subcategory->name }} to reorder"><i class="fas fa-grip-vertical"></i></span>
                                    <span class="node-name">{{ $subcategory->name }}</span>
                                    <span class="node-count">{{ $subcategory->orderedChildren->count() }} child categories</span>
                                </summary>
                                <div class="order-children">
                                    <div class="order-group-header nested-header">
                                        <div><strong>Child categories</strong></div>
                                        @if($subcategory->orderedChildren->count() > 1)
                                        <button type="button" class="btn btn-outline-primary btn-xs" data-save-list="chronology-children-{{ $subcategory->id }}"><i class="fas fa-save mr-1"></i>Save</button>
                                        @endif
                                    </div>
                                    <ul class="chronology-list child-list" id="chronology-children-{{ $subcategory->id }}" data-order-list data-type="childsubcategory" data-parent-type="subcategory" data-parent-id="{{ $subcategory->id }}">
                                        @forelse($subcategory->orderedChildren as $childcategory)
                                        <li class="order-item" data-id="{{ $childcategory->id }}">
                                            <details class="order-node child-node">
                                                <summary class="order-summary">
                                                    <span class="drag-handle" draggable="true" title="Drag to reorder" aria-label="Drag {{ $childcategory->name }} to reorder"><i class="fas fa-grip-vertical"></i></span>
                                                    <span class="node-name">{{ $childcategory->name }}</span>
                                                    <span class="node-count">{{ $childcategory->orderedProducts->count() }} products</span>
                                                </summary>
                                                <div class="order-children">
                                                    <div class="order-group-header nested-header">
                                                        <div><strong>Products</strong></div>
                                                        @if($childcategory->orderedProducts->count() > 1)
                                                        <button type="button" class="btn btn-outline-primary btn-xs" data-save-list="chronology-products-child-{{ $childcategory->id }}"><i class="fas fa-save mr-1"></i>Save</button>
                                                        @endif
                                                    </div>
                                                    <ul class="chronology-list product-list" id="chronology-products-child-{{ $childcategory->id }}" data-order-list data-type="product" data-parent-type="childsubcategory" data-parent-id="{{ $childcategory->id }}">
                                                        @foreach($childcategory->orderedProducts as $product)
                                                        <li class="order-item product-item" data-id="{{ $product->id }}"><span class="drag-handle" draggable="true" title="Drag to reorder" aria-label="Drag {{ $product->productName }} to reorder"><i class="fas fa-grip-vertical"></i></span><span class="node-name">{{ $product->productName }}</span></li>
                                                        @endforeach
                                                        @if($childcategory->orderedProducts->isEmpty())<li class="empty-list">No products in this child category.</li>@endif
                                                    </ul>
                                                </div>
                                            </details>
                                        </li>
                                        @empty
                                        <li class="empty-list">No child categories in this subcategory.</li>
                                        @endforelse
                                    </ul>

                                    @if($subcategory->directProducts->isNotEmpty())
                                    <div class="direct-products">
                                        <div class="order-group-header nested-header">
                                            <div><strong>Other products</strong></div>
                                            @if($subcategory->directProducts->count() > 1)
                                            <button type="button" class="btn btn-outline-primary btn-xs" data-save-list="chronology-products-sub-{{ $subcategory->id }}"><i class="fas fa-save mr-1"></i>Save</button>
                                            @endif
                                        </div>
                                        <ul class="chronology-list product-list" id="chronology-products-sub-{{ $subcategory->id }}" data-order-list data-type="product" data-parent-type="subcategory" data-parent-id="{{ $subcategory->id }}">
                                            @foreach($subcategory->directProducts as $product)
                                            <li class="order-item product-item" data-id="{{ $product->id }}"><span class="drag-handle" draggable="true" title="Drag to reorder" aria-label="Drag {{ $product->productName }} to reorder"><i class="fas fa-grip-vertical"></i></span><span class="node-name">{{ $product->productName }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </details>
                        </li>
                        @empty
                        <li class="empty-list">No subcategories in this category.</li>
                        @endforelse
                    </ul>

                    @if($category->unassignedProducts->isNotEmpty())
                    <div class="direct-products">
                        <div class="order-group-header nested-header">
                            <div><strong>Other products</strong></div>
                            @if($category->unassignedProducts->count() > 1)
                            <button type="button" class="btn btn-outline-primary btn-xs" data-save-list="chronology-products-category-{{ $category->id }}"><i class="fas fa-save mr-1"></i>Save</button>
                            @endif
                        </div>
                        <ul class="chronology-list product-list" id="chronology-products-category-{{ $category->id }}" data-order-list data-type="product" data-parent-type="category" data-parent-id="{{ $category->id }}">
                            @foreach($category->unassignedProducts as $product)
                            <li class="order-item product-item" data-id="{{ $product->id }}"><span class="drag-handle" draggable="true" title="Drag to reorder" aria-label="Drag {{ $product->productName }} to reorder"><i class="fas fa-grip-vertical"></i></span><span class="node-name">{{ $product->productName }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </details>
        </li>
        @empty
        <li class="empty-list">No categories found.</li>
        @endforelse
    </ul>
</section>

<style>
    .chronology-order-page { padding-bottom: 24px; font-size:14px; }
    .chronology-order-page .callout { padding:10px 14px; margin-bottom:12px; }
    .order-group-header { display:flex; align-items:center; justify-content:space-between; gap:10px; padding:8px 10px; background:#f4f6f9; border:1px solid #dfe4ea; border-radius:5px; margin-bottom:6px; }
    .order-group-header > div { display:flex; flex-direction:column; gap:2px; }
    .order-group-header small { color:#78838e; }
    .nested-header { margin:8px 0 6px; }
    .chronology-list { list-style:none; padding:0; margin:0; }
    .order-item { margin:0 0 5px; }
    .order-node { border:1px solid #dfe4ea; border-radius:5px; overflow:hidden; background:#fff; }
    .category-node { border-left:4px solid #17a2b8; }
    .subcategory-node { border-left:4px solid #6c757d; }
    .child-node { border-left:4px solid #28a745; }
    .order-summary { display:flex; align-items:center; gap:8px; min-height:38px; padding:6px 9px; cursor:pointer; list-style:none; }
    .order-summary::-webkit-details-marker { display:none; }
    .order-summary::after { content:'›'; margin-left:4px; color:#83909c; font-size:22px; line-height:1; transform:rotate(90deg); }
    details[open] > .order-summary::after { transform:rotate(-90deg); }
    .node-name { font-weight:600; color:#34495e; }
    .node-count { margin-left:auto; color:#77838f; font-size:12px; }
    .drag-handle { flex:none; color:#84919d; cursor:grab; padding:3px 5px; border-radius:4px; user-select:none; }
    .drag-handle:hover { background:#e9edf1; color:#34495e; }
    .drag-handle:active { cursor:grabbing; }
    .order-item.dragging { opacity:.45; }
    .order-children { padding:0 8px 8px; }
    .subcategory-list,.child-list { padding-left:10px; border-left:2px solid #e5e9ee; margin-left:8px; }
    .product-list { padding:0 0 0 10px; border-left:2px solid #edf0f3; margin-left:8px; }
    .product-item { display:flex; align-items:center; gap:6px; min-height:31px; padding:2px 6px; border:1px solid #e5e9ee; border-radius:4px; background:#fff; }
    .product-item .node-name { font-weight:400; }
    .direct-products { margin:8px 0 0 10px; padding:8px; background:#f8f9fa; border-radius:5px; }
    .empty-list { color:#87919b; font-size:12px; padding:6px 9px; }
    [data-save-list] { white-space:nowrap; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = @json(csrf_token());
    let draggedItem = null;
    let sourceList = null;

    document.querySelectorAll('[data-order-list]').forEach(function (list) {
        list.addEventListener('dragstart', function (event) {
            if (!event.target.closest('.drag-handle')) return;
            const item = event.target.closest('.order-item');
            if (!item || item.parentElement !== list) return;
            draggedItem = item;
            sourceList = list;
            item.classList.add('dragging');
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', item.dataset.id);
        });

        list.addEventListener('dragend', function () {
            if (draggedItem) draggedItem.classList.remove('dragging');
            draggedItem = null;
            sourceList = null;
        });

        list.addEventListener('dragover', function (event) {
            if (!draggedItem || sourceList !== list) return;
            event.preventDefault();
            const target = event.target.closest('.order-item');
            if (!target || target === draggedItem || target.parentElement !== list) return;
            const bounds = target.getBoundingClientRect();
            list.insertBefore(draggedItem, event.clientY < bounds.top + bounds.height / 2 ? target : target.nextSibling);
        });
    });

    document.querySelectorAll('[data-save-list]').forEach(function (button) {
        button.addEventListener('click', async function () {
            const list = document.getElementById(button.dataset.saveList);
            if (!list) return;
            const ids = Array.from(list.children)
                .filter(item => item.classList.contains('order-item'))
                .map(item => Number(item.dataset.id));
            if (ids.length < 2) return;

            const originalText = button.innerHTML;
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Saving';
            try {
                const response = await fetch('{{ route('chronology.order.save') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        type: list.dataset.type,
                        parent_type: list.dataset.parentType,
                        parent_id: Number(list.dataset.parentId),
                        ids: ids
                    })
                });
                if (!response.ok) throw new Error('Could not save. Reload and try again.');
                button.innerHTML = '<i class="fas fa-check mr-1"></i>Saved';
                setTimeout(() => { button.innerHTML = originalText; }, 1600);
            } catch (error) {
                button.textContent = error.message;
                setTimeout(() => { button.innerHTML = originalText; }, 2400);
            } finally {
                button.disabled = false;
            }
        });
    });
});
</script>
@endsection
