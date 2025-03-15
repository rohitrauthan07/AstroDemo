@extends('layouts.app')

@section('content')
@include('header')

<div class="container mt-4">
    <div class="profile-container">
        <h2 class="text-center mb-4">Manage Categories for {{ $user->name }}</h2>

        <!-- Add Category Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.storeCategory', $user->id) }}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="name" class="form-control form-control-sm me-2" placeholder="Category Name" required>
                    <button type="submit" class="btn btn-primary btn-sm">Add Category</button>
                </form>
            </div>
        </div>

        <div class="mt-4">
            @foreach ($categories as $category)
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <div>
                                <!-- Edit Category Button -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">Edit</button>

                                <!-- Delete Category Form -->
                                <form action="{{ route('admin.deleteCategory', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category? This will also delete its subcategories.');">Delete</button>
                                </form>
                            </div>
                        </div>

                        <!-- Edit Category Modal -->
                        <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCategoryLabel{{ $category->id }}">Edit Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.updateCategory', $category->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="categoryName{{ $category->id }}" class="form-label">Category Name</label>
                                                <input type="text" name="name" id="categoryName{{ $category->id }}" class="form-control" value="{{ $category->name }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Subcategory Form -->
                        <form action="{{ route('admin.storeSubcategory', $user->id) }}" method="POST" class="d-flex mt-2">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="text" name="name" class="form-control form-control-sm me-2" placeholder="Subcategory Name" required>
                            <button type="submit" class="btn btn-success btn-sm">Add Subcategory</button>
                        </form>

                        <!-- List of Subcategories -->
                        @if($category->subcategories->count() > 0)
                            <ul class="list-group list-group-flush mt-2">
                                @foreach ($category->subcategories as $subcategory)
                                    <li class="list-group-item d-flex justify-content-between align-items-center small">
                                        {{ $subcategory->name }}
                                        
                                        <div>
                                            <!-- Edit Subcategory Button -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal{{ $subcategory->id }}">Edit</button>

                                            <!-- Delete Subcategory Form -->
                                            <form action="{{ route('admin.deleteSubcategory', $subcategory->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subcategory?');">Delete</button>
                                            </form>
                                        </div>
                                    </li>

                                    <!-- Edit Subcategory Modal -->
                                    <div class="modal fade" id="editSubcategoryModal{{ $subcategory->id }}" tabindex="-1" aria-labelledby="editSubcategoryLabel{{ $subcategory->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editSubcategoryLabel{{ $subcategory->id }}">Edit Subcategory</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.updateSubcategory', $subcategory->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="subcategoryName{{ $subcategory->id }}" class="form-label">Subcategory Name</label>
                                                            <input type="text" name="name" id="subcategoryName{{ $subcategory->id }}" class="form-control" value="{{ $subcategory->name }}" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted mt-2 small">No subcategories added yet.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
