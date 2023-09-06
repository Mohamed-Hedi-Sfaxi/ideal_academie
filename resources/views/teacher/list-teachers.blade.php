
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Liste Des Formateurs</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('teacher/list/page') }}">Formateurs</a></li>
                        <li class="breadcrumb-item active">Tous Les Formateurs</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Formateurs</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    @if (Session::get('role_name') === 'RH')
                                    <a href="{{ route('teacher/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="DataList" class="table border-0 star-student table-hover table-center mb-0 table-striped">
                                <thead class="student-thread"> 
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom & Prénom</th>
                                        <th>Email</th>
                                        <th>Formateur de :</th>
                                        <th>Téléphone</th>
                                        <th>Adresse</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listTeacher as $list)
                                    <tr>
                                        <td hidden class="id">{{ $list->id }}</td>
                                        <td>{{ $list->user_id }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>{{ $list->formation }}</td>
                                        <td>{{ $list->mobile }}</td>
                                        <td>{{ $list->address }}</td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="{{ url('teacher/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <a class="btn btn-sm bg-danger-light teacher_delete" data-bs-toggle="modal" data-bs-target="#teacherDelete">
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

{{-- model teacher delete --}}
<div class="modal fade contentmodal" id="teacherDelete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content doctor-profile">
            <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                    class="feather-x-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teacher/delete') }}" method="POST">
                    @csrf
                    <div class="delete-wrap text-center">
                        <div class="del-icon">
                            <i class="feather-x-circle"></i>
                        </div>
                        <input type="hidden" name="id" class="e_id" value="">
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
        $(document).on('click','.teacher_delete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>
@endsection

@endsection
