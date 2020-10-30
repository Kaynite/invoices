@extends('layouts.master')

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الإعدادات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الإقسام</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
@includeWhen(Session::has('success'), 'includes.success-alert', ['message' => Session::get('success')])
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">جدول الفواتير</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4 text-center">
                    <button class="modal-effect btn btn-outline-primary" data-effect="effect-scale" data-toggle="modal" data-target="#add-section">
                        <i class="fa fa-plus" style="margin-left: 10px"></i>إضافة قسم جديد
                    </button>
                </div>
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">#</th>
                            <th class="wd-15p border-bottom-0">الإسم</th>
                            <th class="wd-20p border-bottom-0">الوصف</th>
                            <th class="wd-15p border-bottom-0">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->name }}</td>
                            <td>{{ $section->description }}</td>
                            <td>
                                <button class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale" data-toggle="modal" data-target="#edit-section-{{ $section->id }}">تعديل</button>
                                <button class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal" data-target="#delete-section-{{ $section->id }}">حذف</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="add-section">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة قسم جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('sections.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">إسم القسم <small class="text-danger">(مطلوب)</small></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="إسم القسم">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">وصف القسم</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="وصف القسم"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    <button class="btn ripple btn-primary" type="submit">إضافة</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($sections as $section)
<div class="modal" id="edit-section-{{ $section->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('sections.update', $section->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">إسم القسم <small class="text-danger">(مطلوب)</small></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="إسم القسم" value="{{ $section->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">وصف القسم</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="وصف القسم">{{ $section->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    <button class="btn ripple btn-primary" type="submit">تحديث</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($sections as $section)
<div class="modal" id="delete-section-{{ $section->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('sections.destroy', $section->id) }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف {{ $section->name }} ؟</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    <button class="btn ripple btn-danger" type="submit">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

@error('name')
<script>
$(document).ready(function() {
    $('#add-section').modal('show')
});
</script>
@enderror

@endsection

@section('title', 'الأقسام')