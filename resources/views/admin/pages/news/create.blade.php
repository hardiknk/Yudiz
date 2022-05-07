@extends('admin.layouts.app')

@push('breadcrumb')
    {!! Breadcrumbs::render('users_create') !!}
@endpush
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
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
            <form id="frmNewsAdd" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="card-body">
                    <div class="form-group">
                        <label for="cat_id">{!! $mend_sign !!} Select Category :</label>
                        <select name="cat_id" id="cat_id" class="form-control select2-dropdown">
                            @foreach ($all_category as $category)
                                <option value="{{ $category->id }}"> {{ $category->cat_name }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('cat_id'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('cat_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">{!! $mend_sign !!} News Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            value="{{ old('title') }}" placeholder="Enter News Title" autocomplete="title"
                            spellcheck="false" autocapitalize="sentences" tabindex="0" autofocus />
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">{!! $mend_sign !!} News Description :</label>
                        <textarea class="ckeditor form-control" name="description"></textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="banner_img">{!! $mend_sign !!} Banner Photo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="banner_img" name="banner_img" tabindex="0" />
                            <label class="custom-file-label @error('banner_img') is-invalid @enderror"
                                for="customFile">Choose file</label>
                            @if ($errors->has('banner_img'))
                                <span class="text-danger">
                                    <strong class="form-text">{{ $errors->first('banner_img') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="created_by">{!! $mend_sign !!} News Written By:</label>
                        <input type="text" class="form-control @error('created_by') is-invalid @enderror" id="created_by"
                            name="created_by" value="{{ old('created_by') }}" placeholder="Enter Written By"
                            autocomplete="created_by" spellcheck="false" autocapitalize="sentences" tabindex="0"
                            autofocus />
                        @if ($errors->has('created_by'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('created_by') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="is_popular">{!! $mend_sign !!} News Popular:</label>
                        <input type="radio" name="is_popular" id="" value="y"> Yes
                        <input type="radio" name="is_popular" id="" value="n" checked> No
                        @if ($errors->has('is_popular'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('is_popular') }}</strong>
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
    {{-- <script src=" {{ asset('js/ckeditor.js') }} "></script> --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2-dropdown').select2();
            $('.ckeditor').ckeditor();
            $("#frmNewsAdd").validate({
                rules: {
                    title: {
                        required: true,
                        not_empty: true,
                        minlength: 10,
                    },
                    banner_img: {
                        extension: "jpg|jpeg|png",
                    },
                    created_by: {
                        required: true,
                        not_empty: true,
                        minlength: 4,
                    },
                    description: {
                        required: true,
                        not_empty: true,
                        minlength: 50,
                    },
                },
                messages: {
                    title: {
                        required: "@lang('validation.required',['attribute'=>'title'])",
                        not_empty: "@lang('validation.not_empty',['attribute'=>'title'])",
                        minlength: "@lang('validation.min.string',['attribute'=>'title','min'=>10])",
                    },
                    created_by: {
                        required: "@lang('validation.required',['attribute'=>'created by'])",
                        not_empty: "@lang('validation.not_empty',['attribute'=>'created by'])",
                        minlength: "@lang('validation.min.string',['attribute'=>'created by','min'=>4])",
                    },
                    description: {
                        required: "@lang('validation.required',['attribute'=>'description'])",
                        not_empty: "@lang('validation.not_empty',['attribute'=>'description'])",
                        minlength: "@lang('validation.min.string',['attribute'=>'description','min'=>50])",
                    },
                    banner_img: {
                        extension: "@lang('validation.mimetypes',['attribute'=>'banner photo','value'=>'jpg|png|jpeg'])",
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
            $('#frmNewsAdd').submit(function() {
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
