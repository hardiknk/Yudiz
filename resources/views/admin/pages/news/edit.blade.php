@extends('admin.layouts.app')

{{-- @push('breadcrumb')
    {!! Breadcrumbs::render('users_update', $user->id) !!}
@endpush --}}

@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="fas fa-user-edit text-primary"></i>
                    </span>
                    <h3 class="card-label text-uppercase">Edit {{ $custom_title }}</h3>
                </div>
            </div>

            <!--begin::Form-->
            <form id="frmCategoryEdit" method="POST" action="{{ route('admin.category.update', $category_data->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">

                    {{-- First Name --}}
                    <div class="form-group">
                        <label for="cat_name">{!! $mend_sign !!}Category Name:</label>
                        <input type="text" class="form-control @error('cat_name') is-invalid @enderror" id="cat_name"
                            name="cat_name"
                            value="{{ old('cat_name') != null ? old('cat_name') : $category_data->cat_name }}"
                            placeholder="Enter first name" autocomplete="cat_name" spellcheck="false"
                            autocapitalize="sentences" tabindex="0" autofocus />
                        @if ($errors->has('cat_name'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('cat_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Update {{ $custom_title }}</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection

@push('extra-js-scripts')
    <script>
        $(document).ready(function() {
            $("#frmCategoryEdit").validate({
                rules: {
                    cat_name: {
                        required: true,
                        not_empty: true,
                        minlength: 3,
                    },

                },
                messages: {
                    cat_name: {
                        required: "@lang('validation.required',['attribute'=>'Category Name'])",
                        not_empty: "@lang('validation.not_empty',['attribute'=>'Category Name'])",
                        minlength: "@lang('validation.min.string',['attribute'=>'Category Name','min'=>3])",
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
                    $(element).siblings('label').removeClass('text-danger');
                },
                errorPlacement: function(error, element) {
                    if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            $('#frmCategoryEdit').submit(function() {
                if ($(this).valid()) {
                    addOverlay();
                    $("input[type=submit], input[type=button], button[type=submit]").prop("disabled",
                        "disabled");
                    return true;
                } else {
                    return false;
                }
            });

            //remove the imaegs
            $(".remove-img").on('click', function(e) {
                e.preventDefault();
                $(this).parents(".symbol").remove();
                $('#frmCategoryEdit').append(
                    '<input type="hidden" name="remove_profie_photo" id="remove_image" value="removed">'
                );
            });
        });
    </script>
@endpush
