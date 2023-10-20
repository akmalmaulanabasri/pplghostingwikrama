@foreach ($websites as $w)
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-{{ $w->id }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Website anda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if ($w->state == 'Active')
            <table class="table">
              <tr>
                <td>Url</td>
                <td><a href="{{ $w->domain }}">{{ $w->domain }}</a></td>
              </tr>
              <tr>
                <td>Login dashboard</td>
                <td><a href="https://sata.host:8090">https://sata.host:8090</a></td>
              </tr>
              <tr>
                <td>Paket</td>
                <td>{{ $w->package }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>{{ $w->state }}</td>
              </tr>
              <tr>
                <td>Username</td>
                <td>{{ $w->username }}</td>
              </tr>
              <tr>
                <td>Password</td>
                <td>xtyiuxhjb </td>
              </tr>
            </table>
          @endif
          @if ($w->state == 'Unpaid')
            <table class="table">
              <tr>
                <td>Url</td>
                <td><a href="{{ $w->domain }}">{{ $w->domain }}</a></td>
              </tr>
              <tr>
                <td>Login dashboard</td>
                <td><a href="https://sata.host:8090">https://sata.host:8090</a></td>
              </tr>
              <tr>
                <td>Paket</td>
                <td>{{ $w->package }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>{{ $w->state }}</td>
              </tr>
              <tr>
                <td>Username</td>
                <td>-</td>
              </tr>
              <tr>
                <td>Password</td>
                <td>-</td>
              </tr>
            </table>

            <div class="alert alert-danger d-flex justify-content-center flex-column">
              <h6 class="text-center">Silahkan membayar sebesar @if ($w->package == 'satahost_student')
                  Rp7000
                @elseif ($w->package == 'satahost_competent')
                  Rp10.000
                @else
                  Rp15.000
                @endif untuk mengaktifkan paket anda</h6>
              <a href="https://api.whatsapp.com/send?phone=6287735605394&text=Hallo%20kak%2C%20aku%20mau%20bayar%20hosting%0Ausername%3A%20{{ $w->username }}%0Apaket%20%3A%20{{ $w->package }}"
                class="btn btn-info text-dark">Whatsapp Admin</a>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
@endforeach
