<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Validator;

class ValidationController extends Controller
{
    //
    public function index()
    {
        return view('form');
    }

    public function save_data(Request $request)
    {
        // dd($request->input());
        $validate = $request->validate([


            // //=======accepted start  ====="yes", "on", 1, or true
            // 'chk_terms_condition' => 'accepted',
            // 'title' => 'accepted_if:chk_terms_condition,==,"no"',

            // 'post_status'=> 'accepted',
            // // 'title' => 'accepted_if:post_status,==,"0"', //The title must be accepted when post status is 0
            // 'title' => 'accepted_if:post_status,==,"1"', //The title must be accepted when post status is 1

            // //=========end accepted =================

            //===========active url =================
            // 'url'=> 'active_url', //https://stackoverflow.com => 1 , https://stackoverflow.comddd => 0 
            // ===========end of active url ==========



            //============after date ===============
            // 'start_date' => 'required|date|after:tomorrow', //here all valida date after tommarow date tommarow date is also not valid
            // 'finish_date' => 'required|date|after:start_date',
            //============end after date ===============

            //============after Or equal date ===============
            // 'start_date' => 'required|date|after_or_equal:tomorrow', //here all valida date after tommarow date tommarow date is also not valid
            //============end of after or equal date ===============


            //============alpha ===============
            // 'title' => 'alpha', //only allow the alpha character like a-z
            //============end of alpha ===============

            //============alpha dash ===============
            // 'title' => 'alpha_dash', // letters, numbers, dashes and underscores not accepts the special character
            //============end of alpha dash ===============

            //============alpha Numaric ===============
            // 'title' => 'alpha_num', //letters and numbers only 
            //============end of alpha Numaric ===============



            // ===========start bail =================
            // 'title' => 'bail|required|max:200|alpha_dash', //stop exicution when find the first false validation
            //============end bail ==================


            //============before date ===============
            // 'start_date' => 'required|date|before:"2022-02-14"', //The start date must be a date before 2022-02-14.
            // 'start_date' => 'required|date|before_or_equal:"2022-02-14"', this date is convertable to strtotime() function 
            //but the 2022-02-14 is not valid so use the before_or_equal:date validation
            //============end before date ===============


            // ============= between:min,max start ============== 
            // 'title' => 'between:5,60', //string if 5 character then done min 5 and max 60
            // 'numbers' => 'between:5,60', // The numbers must be between 5 and 60 characters.
            // ============= between:min,max end ==============



            // ============= boolean ============== 
            // 'chk_terms_condition' => 'boolean', // true, false, 1, 0, "1", and "0". 
            // 'title' => 'boolean', // true, false, 1, 0, "1", and "0".  if enter manually in tittle then false
            // ============= boolean end ==============


            // ============confirmed start   =============
            // 'password' => 'required|confirmed',
            // 'password_confirmation' => 'required||min:6'
            // ============confirmed end ===============



            // ============current_password :::pending   =============
            // 'password' => 'required|current_password',
            // ============confirmed end ===============



            // ============ DATE start   =============
            // 'start_date' => 'date', //valid date or not according to the strtotime function
            // ============date end ===============

            // // ============ DATE equals   ============= 
            // 'start_date' => 'date_equals:"2022-02-14"', //valid date or not according to the strtotime function
            // //if the date is equal to 2022-02-14 so only validatation true
            // // ============date end ===============


            // // ============ DATE date_format:format :::pending   ============= 
            // 'start_date' => 'date_format:format:Y-m-d', //valid date or not according to the strtotime function
            // 'start_date' => 'date_format:format:"m-d-Y"', //valid date or not according to the strtotime function
            // // ============ date_format:format end ===============


            // // // ============declined start   ============= 
            // 'post_status' => 'declined',  //"no", "off", 0, or false here post_status == 0 then suDbmit form
            // // 'chk_terms_condition' => 'declined_if:post_status,0',  //The chk terms condition must be declined when post status is 0.
            // //another senario
            // 'title' => 'declined_if:post_status,"0"',  //here post_statis = 0 The title must be declined when post status is 0.
            // // ============declined end ===============


            // // // ============declined start   ============= 
            // 'post_status' => 'declined',  //"no", "off", 0, or false here post_status == 0 then suDbmit form
            // // 'chk_terms_condition' => 'declined_if:post_status,0',  //The chk terms condition must be declined when post status is 0.
            // //another senario
            // 'title' => 'declined_if:post_status,"0"',  //here post_statis = 0 The title must be declined when post status is 0.

            // // ============  different:field start ===============
            // 'password' => 'required',
            // 'password_confirmation' => 'required|different:password' //the password and confirma password is not match then sumbit form
            // // ============  different:field end===============


            // // ============  digits start ===============
            // 'numbers' => 'digits:5', //here only number and The numbers must be 5 digits ==equals
            // // ============  digits end===============


            // // ============  digits_between:min,max start  ===============
            // 'numbers' => 'digits_between:5,10', //here only number and The numbers must be min 5 digit and max 10 digits 
            // // ============  digits_between:min,max  end===============



            // // ============  dimensions start :::pending  ===============
            // 'image_upload' => 'dimensions:min_width=800,max_width=100000',
            // 'image_upload' => 'dimensions:ratio=3/2',
            // // ============  digits_between:min,max  end===============


            // // ============  distinct start :::pending  ===============

            // // ============  distinct  end===============


            // // ============  email start :::pending  ===============
            // 'email' => 'email:rfc,dns', //if domain present then only submit form 
            //other rfc: RFCValidation details are pending to show 
            // strict: NoRFCWarningsValidation
            // dns: DNSCheckValidation
            // spoof: SpoofCheckValidation
            // filter: FilterEmailValidation
            // 'email' => 'email:strict'
            // // ============  email  end===============

            //===========ends_with:foo,bar,... start =================
            // 'title' => 'ends_with:hardik,akshay' //jkladfhardik submit form but jkladfhardikkkk not submit 
            //===========end with end =================


            //===========  enum  start :::pending  =================
            // 'post_status' => [new Enum(ServerStatus::class)],
            //==========   enum  end =================



            // ======================== exclude start========== 
            // 'post_status' => 'exclude', //exclude means not applying the validation for post_status
            // ======================== exclude end==========


            // ======================== exclude_if start========== here value is match then submit form 
            // 'post_status' => 'boolean',
            // 'title' => 'exclude_if:post_status,false|required', //here if post_status selected yes so title is required and post_status=false so submit the form
            // ======================== exclude_if end==========


            // ======================== exclude_unless start========== here value is match then not submit form 
            //opposite of the exclude_if and also null then submit the form 
            // 'post_status' => 'boolean',
            // 'title' => 'exclude_unless:post_status,false|required', //here if post_status selected yes so title is required and post_status=false so title
            // ======================== exclude_unless end==========


            // ======================== exclude_without:anotherfield start==========
            // 'post_status' => 'boolean',  // post_status has value then title is required otherwise submit the form 
            // 'title' => 'exclude_without:post_status|required',
            // ======================== exclude_unless end==========


            // ======================== exists:table,column start ==========
            // 'email' => 'exists:users,email',  // kpfeffer@example.com if this email is in database so submit and if not found then not submit the form so this email address records is must exists in the table
            // ======================== exists:table,column end==========


            // ======================== file start :::pending ==========
            // 'image_upload' => 'file',
            // ======================== file end==========


            // ======================== filled start ==========
            // 'chk_terms_condition' => 'filled', //jyare checkbox select nathi karyu tyare te dd($request->input()) ma chk_terms_condition nu name aavtu nathi atle filled tyare j call thay jyare te name(chk_terms_condition) present hoy and required is compulsary to have value 
            // ======================== filled end==========


            // ======================== gt start  ========== greater then 
            // // here same type and also equeal value is not submit the form 
            // 'numbers' => 'required',
            // 'numbers_two' => 'required|gt:numbers',

            // 'password' => 'required', // here is the string greater then 
            // 'password_confirmation' => 'required|gt:password',
            // ======================== gt end==========


            // ======================== gte start  ========== greater then 
            // here same type and also equeal or greater value is submit the form 
            // 'numbers' => 'required',
            // 'numbers_two' => 'required|gte:numbers',

            // 'password' => 'required', // equeal or greater value is submit the form 
            // 'password_confirmation' => 'required|gte:password',
            // ======================== gte end==========


            // ======================== image start  ========== 
            // here the file is must have an image and jpg, jpeg, png, bmp, gif, svg, webp only this type is allowed
            // 'image_upload' => 'image',
            // ======================== image end==========


            // ======================== in start :::pending ========== 
            // ======================== in end==========

            // ======================== in_array:anotherfield.* :::pending ========== 
            // ======================== in end==========

            // ======================== ip address start ========== 
            // 'title' => 'ip', //=>  10.255.255.255 then submit the form and valid ip not then not submit the form 
            // ======================== ip end==========

            // ======================== ipv4 address start ========== 
            // 'title' => 'ipv4', //=>  192.0.2.146 then submit the form and valid ip not then not submit the form 
            // ======================== ipv4 end==========


            // ======================== ipv6 address start ========== here total 8 : colulmn so it is valid ipv6
            // 'title' => 'ipv6', //=>  2001:0db8:85a3:0000:0000:8a2e:0370:7334 then submit the form and valid ip not then not submit the form 
            // ======================== ipv6 end==========


            // // ======================== mac_address start ========== 
            // 'title' => 'mac_address', //=>  00:00:5e:00:53:af this type of the mac_address so submit the form
            // // ======================== mac_end==========

            // // ======================== json start ========== if the valid json so submit othervise not submit
            // 'title' => 'json', //=>   {"name":"John", "age":30, "car":null} so submit the form 
            // // ======================== json end==========



            // ======================== lt start  ========== less then 
            // // here same type and also equeal value is not submit the form 
            // 'numbers' => 'required',
            // 'numbers_two' => 'required|lt:numbers',

            // 'password' => 'required', // here is the string greater then 
            // 'password_confirmation' => 'required|lt:password',
            // ======================== gt end==========


            // ======================== lte start  ========== less then 
            // here same type and also equeal or less value is submit the form 
            // 'numbers' => 'required',
            // 'numbers_two' => 'required|lte:numbers',

            // 'password' => 'required', // equeal or less value is submit the form 
            // 'password_confirmation' => 'required|lte:password',
            // ======================== lte end==========

            //=========== mimetypes:text/plain,... start =============
            // 'image_upload' => 'mimetypes:image/jpg,image/jpeg', //here image is in jpg/jpeg so upload 
            //=========== mimetypes:text/plain,... end =============


            //=========== mimes start =============
            // 'image_upload' => 'mimes:jpg,jpeg,xls,pdf,txt', //this extension is allowed
            //=========== mimes end =============


            //=========== min start =============
            // 'title' => 'min:5', //here min is the 5 character then allow , The title must be at least 5 characters.
            //=========== min end =============


            // //=========== multiple_of:value start :::pending =============
            // 'title' => 'min:5',
            // // =========== multiple_of:value end =============


            // //=========== nullable start  =============
            // 'title' => 'nullable', //The field under validation may be null.
            // 'chk_terms_condition' => 'nullable', //The field under validation may be null.
            // // =========== nullable end =============

            // //=========== numeric start  =============
            // 'numbers' => 'numeric', //The field under validation is numbers only
            // 'title' => 'numeric', //The field under validation is numbers only
            // // =========== numeric end =============

            // //=========== present start =============
            // 'chk_terms_condition' => 'present', // must be present in the input data but can be empty //The chk terms condition field must be present.
            // // =========== present end =============


            // //=========== present start =============
            // 'chk_terms_condition' => 'present', // must be present in the input data but can be empty //The chk terms condition field must be present.
            // // =========== present end =============

            // //=========== prohibited start =============
            // 'chk_terms_condition' => 'prohibited', //  must be empty or not present. prohibited means 
            // 'title' => 'prohibited', //  must be empty or not present. prohibited means 
            // // =========== prohibited end =============

            // //=========== prohibited_if:anotherfield,value,... start =============
            // 'chk_terms_condition' => 'prohibited', //if value match then only submit the form
            // 'title' => 'prohibited_if:chk_terms_condition,false',
            // // =========== prohibited_if:anotherfield,value,... end =============

            // //===========prohibited_unless:anotherfield,value,... start =============
            // 'chk_terms_condition' => 'prohibited', //opposite of the prohibited_if 
            // 'title' => 'prohibited_unless:chk_terms_condition,false',
            // // ===========prohibited_unless:anotherfield,value,... end =============


            // //===========prohibits:anotherfield start :::pending=============
            // 'description' => '',
            // 'chk_terms_condition' => '', //opposite of the prohibited_if 
            // 'title' => 'prohibits:chk_terms_condition,description',
            // // ===========prohibits:anotherfield end =============


            // //====================regex satart ================ regular expression
            // 'email' => 'regex:/^.+@.+$/i',
            // //====================regex end  ================


            // //====================required satart ================ 
            // 'email' => 'required',
            // //====================required end  ================


            // //====================required_if satart ================ condition sachi to form submit no thay
            // 'post_status' => 'boolean', //here select no => 0 
            // 'email' => 'required_if:post_status,false', //The email field is required when post status is 0.
            // //====================required_if end  ================

            // //====================required_unless:anotherfield,value,... satart ================ condition sachi to j form submit thay
            // 'post_status' => 'boolean', //here select no => 0 
            // 'email' => 'required_unless:post_status,false', //if null value is comes so it is not submit the form also
            // //====================required_unless:anotherfield,value,... end  ================

            // //====================required_with:foo,bar,... satart ================ 
            // 'email' => 'required_with:post_status,title,description', // email+ (koin pan ek =>post_status,title,description) so sumibt the form  //The email field is required when post status / title / description is present. //only email submit the form
            // //====================required_with:foo,bar,... end  ================


            // //====================required_with_all:foo,bar,... satart ================ 
            // 'email' => 'required_with_all:title,post_status', // (bhada filed post_status,title,description is not empty so form is not submit othervise submit the form) 
            // // if email only then submit if email+title then submit etc //if not enter anyting then not submit
            // //====================required_with_all:foo,bar,... end  ================

            // //====================required_without:foo,bar,... satart ================ 
            // 'email' => 'required_without:title,post_status', // only email submit //only title then not submit 
            // // eamil+title => submit , title + post_status submit //email + (any filed ) so submit
            // //jyare kai pan select nathi karyu tyare The email field is required when title / post status is not present.
            // //====================required_without:foo,bar,... end  ================



            // //====================required_without_all:foo,bar,... satart ================ 
            // 'email' => 'required_without_all:title,post_status,numbers', // ony tittle submit // only email submit 
            //without any not submit //title+email submit //title+post_status submit 
            // //====================required_without_all:foo,bar,... end  ================

            // //====================same:field satart ================ 
            // 'password' => 'required',
            // 'password_confirmation' => 'same:password', //if password and password_conformation match then submit 
            // //====================same:field end  ================


            // //====================same:field satart ================ 
            // Validate that a string is exactly 12 characters long...
            // 'title' => 'size:12',
            // Validate that a provided integer equals 10...
            // 'numbers' => 'integer|size:10',
            // //====================same:field end  ================



            //===========start_with:foo,bar,...  start =================
            // 'title' => 'start_with:hardik,akshay' //jkladfhardik submit form but jkladfhardikkkk not submit 
            //===========end with end =================

            //===========string  start =================
            // 'title' => 'string' ////if not pass then display the The title must be a string.
            //===========strintg end =================

            ////===========timezone  start ::pending  =================
            //// 'title' => 'timezone' ////if not pass then display the The title must be a timezone.
            ////===========timezone end =================



            //===========unique  start =================
            // 'email' => 'unique:posts,email' //table,column_name if email found then not submit the form 
            //===========unique end =================

            //===========url  start =================
            // 'url' => 'url' //The field under validation must be a valid URL.
            //===========url end =================

            //===========uuid  start =================
            // 'title' => 'uuid' //The field under validation must be a valid uuid. like  123e4567-e89b-12d3-a456-426614174000
            //===========uuid end ================
            

        ]);

        // //========array ::: pending ====================
        // $input = [
        //     'user' => [
        //         'name' => 'Taylor Otwell',
        //         'username' => 'taylorotwell',
        //         'admin' => true,
        //     ],
        // ];

        // $validator = Validator::make($input, [
        //     'user' => 'array:username,locale',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->with('failed', 'error something is wrong');
        // }
        //========end array ==================


        dd("validation done");
    }
}
