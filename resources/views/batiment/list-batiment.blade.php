
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Liste Des Batiments</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('batiment/list') }}">Batiments</a></li>
                                <li class="breadcrumb-item active">Tous Les Batiments</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Batiments</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        @if (Session::get('role_name') === 'Directeur')
                                        <a href="{{ route('batiment/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-batiment table-hover table-center mb-0 table-striped">
                                    <thead class="batiment-thread">
                                        <tr>
                                            <th>État/Province</th>
                                            <th>Ville</th>
                                            <th>Adresse</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($batimentList as $key=>$list )
                                        <tr>
                                            <td hidden class="id">{{ $list->id }}</td>
                                            <td hidden class="avatar">{{ $list->upload }}</td>
                                            <td>{{ $list->state }}</td>
                                            <td>{{ $list->city }}</td>
                                            <td>{{ $list->address }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ url('batiment/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light batiment_delete" data-bs-toggle="modal" data-bs-target="#batimentUser">
                                                        <i class="feather-trash-2 me-1"></i>
                                                    </a>
                                                </div>
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
    </div>
    {{-- model batiment delete --}}
    <div class="modal fade contentmodal" id="batimentUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="feather-x-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('batiment/delete') }}" method="POST">
                        @csrf
                        <div class="delete-wrap text-center">
                            <div class="del-icon">
                                <i class="feather-x-circle"></i>
                            </div>
                            <input type="hidden" name="id" class="e_id" value="">
                            <input type="hidden" name="avatar" class="e_avatar" value="">
                            <h2>Sure you want to delete</h2>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-success me-2">Yes</button>
                                <a class="btn btn-danger" data-bs-dismiss="modal">No</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')

    {{-- delete js --}}
    <script>
        $(document).on('click','.batiment_delete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
            $('.e_avatar').val(_this.find('.avatar').text());
        });
    </script>
    @endsection

@endsection
