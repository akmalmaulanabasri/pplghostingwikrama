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
          <div class="card-header">
            <h4 class="text-dark">
              Akses hosting panel
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-striped border">
              <tr>
                <td>Link panel</td>
                <td>
                  <a href="https://pplgwikrama.my.id:8090" class="text-decoration-none">https://pplgwikrama.my.id:8090</a>
                </td>
              </tr>
              <tr>
                <td>Username</td>
                <td>
                  <code>{{ Auth::user()->username }}</code>
                </td>
              </tr>
              <tr>
                <td>Password</td>
                <td>
                  <code>Password anda saat mendaftarkan</code>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-item-center">
            <h4 class="text-dark"><i class="fa fa-table"></i> List Website Anda</h4>
            @if (Auth::user()->website_limit > 0)
              <h4 class="btn btn-primary text-light"><a href="{{ route('website.add') }}" class="text-light"><i class="fa fa-pencil"></i> Tambah Website</a></h4>
            @else
              <h4 class="btn btn-danger text-light" data-toggle="tooltip" data-placement="top" title="Limit membuat website anda sudah habis">Tidak dapat membuat website lagi</h4>
            @endif
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
                    <th>Verivied</th>
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
                        <div class="badge badge-success">{{ $w->state }}</div>
                      </td>
                      <td>
                        {{ $w->is_verified ? 'Sudah' : 'Belum' }}
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
