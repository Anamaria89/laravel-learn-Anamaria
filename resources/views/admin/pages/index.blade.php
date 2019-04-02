@extends('admin.layout.main')

@section('seo-title')
<title>{{ __('All admin pages') }} {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

<!-- Custom styles for this page -->
<link href="/admin/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('All admin pages') }}</h1>

@include('admin.layout.partials.messages')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All pages</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="pages" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th >Description</th>
                        <th >Image</th>
                        <th >Content</th>
                        <th >Layout</th>
                        <th >Contact Form</th>
                        <th>Header</th>
                        <th>Aside</th>
                        <th>Footer</th>
                        <th>Active</th>
                           
                    </tr>
                </thead>
                <tbody>
                    @if(count($pages) > 0)
                        @foreach($pages as $value)
                        <tr>
                                <td >{{ $value->title }} </td>
                                <td >{{ $value->description }}</td>
                                <td> <img src="/images/{{ $value->image }}" style="width:100px;" alt=""/></td>
                                <td >{{ $value->content }}</td>
                                <td >{{ $value->layout }}</td>
                                <td >
                                      @if($value->contact_form == 1)
                                     Yes
                                     @else
                                     No
                                    @endif
                                  
                                </td>
                                
                                <td >
                                      @if($value->header == 1)
                                     Yes
                                     @else
                                     No
                                    @endif
                                  
                                </td>
                               
                                <td >
                                      @if($value->aside == 1)
                                     Yes
                                     @else
                                     No
                                    @endif
                                  
                                </td>
                                 <td >
                                    @if($value->footer == 1)
                                     Yes
                                     @else
                                     No
                                    @endif
                                  
                                </td>
                                <td style="width:100px;">
                                     @if($value->active == 1)
                                     Yes
                                     @else
                                     No
                                    @endif
                                </td>
                               
                               
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
       
    </div>
</div>

@endsection

@section('custom-js')
<!-- Page level plugins -->
<script src="/admin/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#pages').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": [6] },
            { "searchable": false, "targets": [6] }
        ]
  });
});


$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var userName = button.data('name');
    var userDeleteUrl = button.data('href');
    
    $("#name-on-modal").html("<b>"+userName+"</b>");
    $("#delete-button-on-modal").attr('href', userDeleteUrl);
});

$(function () {
  $('.tooltip-custom').tooltip()
})

</script>



@endsection

