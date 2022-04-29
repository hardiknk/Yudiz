@extends('admin.layouts.app')

{{-- @push('breadcrumb')
    {!! Breadcrumbs::render('users_update', $user->id) !!}
@endpush --}}
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
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
            <form id="frmCategoryEdit" method="POST" action="{{ route('admin.news.update', $news_detail->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- @php
                    // dd($category_data);
                @endphp --}}
                <div class="card-body"> 
                    <div class="form-group">
                        <label for="cat_id">{!! $mend_sign !!} Select Category :</label>
                        <select name="cat_id" id="cat_id" class="form-control select2-dropdown">
                            @foreach($category_data as $cat)
                            @if ($news_detail->cat_id == $cat->id) 
                            <option value="{{ $cat->id }}" selected> {{ $cat->cat_name }} </option>
                            @else
                            <option value="{{ $cat->id }}"> {{ $cat->cat_name }} </option> 
                            @endif
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
                        value="{{ old('title') != null ? old('title') : $news_detail->title }}"
    
                        placeholder="Enter News Title" autocomplete="title"
                            spellcheck="false" autocapitalize="sentences" tabindex="0" autofocus />
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
    
                    <div class="form-group">
                        <label for="description">{!! $mend_sign !!} News Description :</label>
                        <textarea class="ckeditor form-control" name="description"> {{ $news_detail->description }} </textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="banner_img"> {!! $mend_sign !!} Banner Photo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="banner_img" name="banner_img" tabindex="0" />
                            <label class="custom-file-label @error('banner_img') is-invalid @enderror" for="customFile">Choose file</label>
                            @if ($errors->has('banner_img'))
                            <span class="text-danger">
                                <strong class="form-text">{{ $errors->first('banner_img') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    @if ($news_detail->banner_img)
                    <div class="symbol symbol-120 mr-5">
                            <div class="symbol-label" style="background-image:url({{ asset('storage/'.$news_detail->banner_img)}})">
                            {{-- Custom css added .symbol div a --}}
                                <a href="#" class="btn btn-icon btn-light btn-hover-danger remove-img" id="kt_quick_user_close" style="width: 18px; height: 18px;">
                                    <i class="ki ki-close icon-xs text-muted"></i>
                                </a>
                            </div>
                     </div>
                     @endif
    
                    <div class="form-group">
                        <label for="created_by">{!! $mend_sign !!} News Written By:</label>
                        <input type="text" class="form-control @error('created_by') is-invalid @enderror" id="created_by"
                            name="created_by" value="{{ old('created_by') != null ? old('created_by') : $news_detail->created_by }}" placeholder="Enter Written By"
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
                        <input type="radio" name="is_popular" id="" {{ $news_detail->is_popular == "y" ?'checked':''  }}  value="y"> Yes
                        <input type="radio" name="is_popular" {{ $news_detail->is_popular == "n" ?'checked':''  }} value="n"> No
                        @if ($errors->has('is_popular'))
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('is_popular') }}</strong>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2-dropdown').select2();
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
