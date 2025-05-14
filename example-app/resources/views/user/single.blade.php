@extends('user.dashboard_user')

@section('content')
<div class="container mt-4">
    @if(!empty($search))
    <h4>Kết quả tìm kiếm cho: <strong>{{ $search }}</strong></h4>
    @endif
    <div class="row g-4 mt-4">
        @foreach($products as $item)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card h-100 shadow-sm border-light rounded">
                <img src="{{ asset('storage/' . $item->image) }}"
                    style="object-fit: contain; width: 100%; height: 300px;" alt="{{ $item->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($item->description, 100) }}</p>
                    <p class="text-danger fw-bold">{{ number_format($item->price, 0, ',', '.') }}₫</p>
                    <a href="{{ route('product.show', $item->id) }}" class="btn btn-outline-primary mt-2">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Phân trang -->
    <div class="mt-4 d-flex justify-content-center">
        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection