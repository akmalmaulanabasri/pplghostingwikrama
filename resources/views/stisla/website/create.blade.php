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
            <h4 class="text-dark"><i class="fa fa-table"></i> Tambah Website</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('website.store') }}" method="POST" class="form-group">
              @csrf
              <table class="table table-striped border">
                <tr>
                  <th>Nama Paket</th>
                  <th>Batas Domain</th>
                  <th>Jumlah Storage</th>
                  <th>Bandwith</th>
                  <th>Akun Email</th>
                  <th>Pilih Paket anda</th>
                </tr>
                @foreach ($package as $p)
                  @if (($p['packageName'] != 'Default') & ($p['packageName'] != 'admin_starter'))
                    <tr>
                      <td>{{ $p['packageName'] }}</td>
                      <td>{{ $p['allowedDomains'] }}</td>
                      <td>{{ $p['diskSpace'] }}MB</td>
                      <td>@if( $p['bandwidth'] == 0) Unlimited @else {{ $p['bandwidth'] }} @endif</td>
                      <td>{{ $p['emailAccounts'] }}</td>
                      <td><input type="radio" name="package" id="package" value="{{ $p['packageName'] }}" required></td>
                    </tr>
                  @endif
                @endforeach
              </table>

              <div class="row mt-2">
                <div class="col-6">
                  <label for="domain" class="form-label">Domain</label>
                  <div class="input-group">
                    <input name="domain" type="text" class="form-control" id="inlineFormInputGroupsub_domain_anda" placeholder="Subdomain pilihan kamu" required>
                    <div class="input-group-text" id="domain">.pplgwikrama.my.id</div>
                  </div>
                </div>
                <div class="col-6">
                  <label for="php" class="form-label">Pilih versi PHP</label>
                  <select name="php" id="php" class="form-control">
                    <option selected disabled hidden>Pilih...</option>
                    <option value="7.2">PHP 7.2</option>
                    <option value="7.3">PHP 7.3</option>
                    <option value="7.4">PHP 7.4</option>
                    <option value="7.2">PHP 8.0</option>
                    <option value="7.2">PHP 8.1</option>
                  </select>
                </div>
              </div>

              <input type="submit" value="Kirim" class="btn btn-info mt-3">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@endsection
