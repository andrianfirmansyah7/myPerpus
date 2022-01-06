@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
<div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top:5px;margin-bottom: 100px;">
  @forelse ($data as $v)
  <div class="col">
    <div class="card h-100">
      <img src="{{url('/images/'.$v->image)}}" class="card-img-top" alt="{{ $v->name }}">
      <div class="card-body">
        <h5 class="card-title">{{ $v->name }}</h5>
        <p class="card-text"><small class="text-muted">Rp.{{ number_format($v->price,2,',','.');  }}</small></p>
        <p class="card-text">{{ $v->description }}</p>
      </div>
      <div class="card-footer">
        <a href="/MulaiVaksin/{{ $v->id }}" class="btn btn-primary">Vaksin Sekarang</a>
      </div>
    </div>
  </div>
  @empty
  <h4 style="margin: auto;color: red;">Tidak Ada Buku Tersedia</h4>
  @endforelse
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
