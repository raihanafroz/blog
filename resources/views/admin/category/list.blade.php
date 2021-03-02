@extends('layouts.admin_layout')

@section('stylesheet')
  <!-- DataTables -->
  <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css"/>

  <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css"/>

@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">
            <header class="panel-heading">
              <h2 class="panel-title">View Category</h2>
            </header>
            <div class="panel-body">
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.categories.create') }}" class="brn btn-success btn-sm">New Category</a>
                </div>
              </div>
              {{--<table class="table table-bordered table-striped mb-none" id="data-table">--}}
              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                     cellspacing="0" width="100%" style="font-size: 14px">

                <thead>
                <tr>
                  <th width="50">#</th>
                  <th>Name</th>
                  <th width="200">Created At</th>
                  <th width="50">Status</th>
                  <th class="hidden-phone" width="40">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $val)
                  <tr class="@if(($loop->iteration % 2) == 0)gradeX @else gradeC @endif">
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-capitalize">{{ $val->name }}</td>
                    <td>{{ date('F d, Y h:i A', strtotime($val->created_at)) }}</td>
                    <td class="text-capitalize p-2">
                      <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                               @if($val->status == 'active')
                               checked
                               @endif
                               data-id="{{ $val->id }}"
                               id="myonoffswitch{{ $loop->iteration }}">
                        <label class="onoffswitch-label" for="myonoffswitch{{ $loop->iteration }}">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </td>
                    <td class="center hidden-phone p-2" width="100">
                      <a href="{{ route('admin.categories.show', $val->id) }}" class="btn btn-sm btn-info"> <i
                          class="fa fa-eye"></i> </a>
                      <a href="{{ route('admin.categories.edit', $val->id) }}" class="btn btn-sm btn-success"> <i
                          class="fa fa-edit"></i> </a>
                      <span class="btn btn-sm btn-danger btn-delete delete_{{ $val->id }}" style="cursor: pointer"
                            data-id="{{ $val->id }}"><i
                          class="fa fa-trash-o"></i></span>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="categoryDeleteModal" tabindex="-1" role="dialog" aria-labelledby="categoryDeleteModal"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Delete Category</h4>
        </div>
        <div class="modal-body">
          <strong>Are you sure to delete this Category?</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-success btn-sm yes-btn">Yes</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
  <!-- Required datatable js -->
  <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Buttons examples -->
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/buttons.colVis.min.js') }}"></script>
  <!-- Responsive examples -->
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>


  <script>
    $(document).ready(function () {
      $('#datatable-buttons').DataTable();

      // var table = $('#datatable-buttons').DataTable({
      //   lengthChange: false,
      //   buttons: ['copy', 'excel', 'pdf']
      // });

      // table.buttons().container()
      //   .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


      $(document).on('change', 'input[name="onoffswitch"]', function () {
        var status = 'inactive';
        var id = $(this).data('id')
        var isChecked = $(this).is(":checked");
        if (isChecked) {
          status = 'active';
        }
        $.ajax({
          url: "{{ route('admin.ajax.update.categories.status', '') }}"+'/'+id,
          method: "post",
          dataType: "html",
          data: {status: status},
          success: function (data) {
            console.log(data)
            if (data === "success") {
            }
          }
        });
      })


      $(document).on('click', '.yes-btn', function () {
        var pid = $(this).data('id');
        var $this = $('.delete_' + pid)
        $.ajax({
          url: "{{ route('admin.categories.destroy', '') }}"+'/'+pid,
          method: "delete",
          dataType: "html",
          success: function (data) {
            if (data === "success") {
              $('#categoryDeleteModal').modal('hide')
              $this.closest('tr').css('background-color', 'red').fadeOut();
            }
          }
        });
      })

      $(document).on('click', '.btn-delete', function () {
        var pid = $(this).data('id');
        $('.yes-btn').data('id', pid);
        $('#categoryDeleteModal').modal('show')
      });
    })
  </script>
@endsection