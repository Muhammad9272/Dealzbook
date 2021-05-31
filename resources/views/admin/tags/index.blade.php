@extends('admin.layouts.app')

<link href="{{ asset('assets/admin_assets/img_upload/imgUpload.css') }}" rel="stylesheet" type="text/css" />
@section('page_content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">



                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <input type="hidden" id="headerdata" value="{{ __('Tag') }}">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i  class="fa fa-list"></i>
                                        <span class="caption-subject  sbold uppercase">Tags</span>
                                        
                                    </div>
                                    <div class="actions">

                                                <div class="btn-group">
                                                    <a id="add-data" class="btn sbold green add" data-toggle="modal" href="#modal1" data-href="{{route('admin-tags-create')}}" href="#modal1"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                 
                                                </div>
                                         
                                    </div>
                                </div>
                                {{-- @include('includes.admin.form-both') --}}
                                <div class="portlet-body">
                                    <div class="table-scrollable table-scrollable-custom">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="geniustable" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                   
                                                    <th> Name</th>
                                                    <th> Slug</th>
                                                    <th> Status</th>
                                                    <th> Options </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>

                    </div>
    </div>
    <!-- END CONTENT BODY -->


                                    <!-- /.modal -->
                                    <div class="modal fade bs-modal-lg" id="modal1" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title"> Title</h4>
                                                </div>
                                                <div class="modal-body"> 


                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->



@endsection
@section('pagelevel_scripts')
<script src="{{ asset('assets/admin_assets/img_upload/imgUpload.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

        var table = $('#geniustable').DataTable({
               ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-tags-datatables') }}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'slug', name: 'slug' },
                        { data: 'status', searchable: false, orderable: false },

                        { data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                    processing: '<div class="preloader"  style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center ;"></div>'
                },
                drawCallback: function (oSettings) {
                    $("[data-toggle=confirmation]").confirmation({                        
                        onConfirm: function(event, element) {
                            $.ajax({
                                 type:"GET",
                                 url:$(this).attr('data-href'),
                                 success:function(data)
                                 {
                                      toastr.success(data);
                                      table.ajax.reload();
                                 }
                            });
                        }
                    })
                }
                
                
            });


{{-- DATA TABLE ENDS--}}
</script>

@endsection