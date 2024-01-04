@extends('layouts/mainFav')

@section('container')
<!-- data-panel -->
<div class="container mt-5">
    <div class="row" id="data-panel">
      <!-- print movie list here -->
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="show-movie-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="show-movie-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="show-movie-body">
          <div class="row">
            <div class="col-sm-8" id="show-movie-image"></div>
            <div class="col-sm-4">
              <p><em id="show-movie-date"></em></p>
              <p id="show-movie-description"></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection