@extends('admin.dashboard_admin')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Add Brand</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter brand name">
        </div>
        
        <!-- Slug (Readonly) -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" readonly>
        </div>

        <!-- Logo -->
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
        </div>
          <!-- Preview -->
          <div class="mb-3">
            <label class="form-label">Preview</label>
            <div id="preview-container">
                <img id="logo-preview" src="#" alt="Logo Preview" style="display: none; max-height: 200px; margin-top: 10px;">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Brand</button>
    </form>
</div>

<script>
    // Convert string to slug
    function stringToSlug(str) {
        return str
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9-]+/g, '-') // Replace spaces and non-alphanumeric characters with '-'
            .replace(/-+/g, '-')          // Replace multiple '-' with a single '-'
            .replace(/^-|-$/g, '');       // Remove leading or trailing '-'
    }

    // Auto-generate slug when name is typed
    document.getElementById('name').addEventListener('input', function () {
        const slugField = document.getElementById('slug');
        slugField.value = stringToSlug(this.value);
    });

    // Preview image functionality
    document.getElementById('logo').addEventListener('change', function (event) {
        const preview = document.getElementById('logo-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>

@endsection
