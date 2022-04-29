@extends('admin.layouts.app')

@push('breadcrumb')
    {!! Breadcrumbs::render('users_create') !!}
@endpush

@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="fas fa-user-plus text-primary"></i>
                    </span>
                    <h3 class="card-label text-uppercase">ADD {{ $custom_title }}</h3>
                </div>
            </div>

            <!--begin::Form-->
            <form id="frmCategoryAdd" method="POST" action="{{ route('admin.category.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    {{-- First Name --}}
                    <div class="form-group">
                        <label for="cat_name">{!! $mend_sign !!}Category Name:</label>
                        <input type="text" class="form-control @error('cat_name') is-invalid @enderror" id="cat_name"
                            name="cat_name" value="{{ old('cat_name') }}" placeholder="Enter Category name"
                            autocomplete="cat_name" spellcheck="false" autocapitalize="sentences" tabindex="0" autofocus />
                        @if ($errors->has('cat_name'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('cat_name') }}</strong>
                            </span>
                        @endif
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2 text-uppercase"> Add {{ $custom_title }}</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary text-uppercase">Cancel</a>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection

@push('extra-js-scripts')
    <script>
        $(document).ready(function() {
            $("#frmCategoryAdd").validate({
                rules: {
                    cat_name: {
                        required: true,
                        not_empty: true,
                        minlength: 3,
                    },
                },
                messages: {
                    cat_name: {
                        required: "@lang('validation.required',['attribute'=>'first name'])",
                        not_empty: "@lang('validation.not_empty',['attribute'=>'first name'])",
                        minlength: "@lang('validation.min.string',['attribute'=>'first name','min'=>3])",
                    },
                },
                errorClass: 'invalid-feedback',
                errorElement: 'span',
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                    $(element).siblings('label').addClass('text-danger'); // For Label
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                    $(element).siblings('label').removeClass('text-danger'); // For Label
                },
                errorPlacement: function(error, element) {
                    if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            $('#frmCategoryAdd').submit(function() {
                if ($(this).valid()) {
                    addOverlay();
                    $("input[type=submit], input[type=button], button[type=submit]").prop("disabled",
                        "disabled");
                    return true;
                } else {
                    return false;
                }
            });
        });
    </script>
@endpush
