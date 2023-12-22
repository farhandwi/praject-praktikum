@extends('layouts/main')

@section('container')
 <!-- data-panel -->
 <div class="container mt-5">
    <!--search bar-->
    <div class="row" id="search-bar">
      <div class="col-6">
        <form id="search" class="form-inline">
          <label class="sr-only" for="inlineFormInputName2">Name</label>
          <input type="text" class="form-control mb-2 mr-sm-2" id="search-input" placeholder="search name ..." />
          <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
      </div>
      <div class="col-6 d-flex align-items-center justify-content-end" id="switch-pages">
        <i class="fa fa-th fa-lg mr-2" id="icon-page" aria-hidden="true"></i>
        <i class="fa fa-bars fa-lg" id="list-page" aria-hidden="true"></i>
      </div>
    </div>

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

  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center" id="pagination">
      <li class="page-item">
        <!-- page-add -->
      </li>
    </ul>
  </nav>
  @endsection