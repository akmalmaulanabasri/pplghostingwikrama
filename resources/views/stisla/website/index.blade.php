@extends('stisla.layouts.app')

@section('title')
  {{ $title = 'Website' }}
@endsection

@section('content')
  @include('stisla.includes.breadcrumbs.breadcrumb-table')
@section('content')
  <div class="section-header">
    <h1>{{ $title }}</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active">
        <a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
      </div>
      <div class="breadcrumb-item">{{ $title }}</div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-item-center">
            <h4 class="text-dark"><i class="fa fa-table"></i> List Website Anda</h4>
            <h4 class="btn btn-primary text-light"><a href="{{ route('website.add') }}" class="text-light"><i class="fa fa-pencil"></i> Tambah Website</a></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="datatable">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th>Domain</th>
                    <th>Storage</th>
                    <th>Paket</th>
                    <th>Status</th>
                    <th>Tanggal dibuat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($websites as $w)
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                      </td>
                      <td><a href="https://{{ $w->domain }}" target="_blank">{{ $w->domain }}</a></td>
                      <td>
                        {{ $w->diskUsed }}
                      </td>
                      <td>{{ $w->package }}</td>
                      <td>
                        <div class="badge badge-{{ $w->state == 'Active' ? 'success' : 'danger' }}">{{ $w->state }}</div>
                      </td>
                      <td>{{ $w->created_at }}</td>
                      <td>
                        {{-- {{ $w->is_verified ? 'Sudah' : 'Belum' }} --}}
                        <a class="btn btn-{{ $w->state == 'Suspended' ? 'danger disabled' : 'success' }} text-dark">{{ $w->state == 'Unpaid' ? 'Bayar' : 'Access' }}</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@endsection
