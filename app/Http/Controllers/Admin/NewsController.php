<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    //
    public function newsDetails(Request $request)
    {

        return view('front.news-details');
    }

    public function news(Request $request)
    {

        return view('front.news');
    }

    //admin panel route start
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.news.index')->with(['custom_title' => 'News']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd("hi news call");
        $category_data = Category::all();
        return view('admin.pages.news.create', ['category_data' => $category_data])->with(['custom_title' => 'News']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->input());
        // title	cat_id	banner_img	slug	created_by	description	is_active	is_popular
        $rules = [
            'title' => 'required|max:150|unique:news',
            'banner_img' => 'required',
            'created_by' => 'nullable',
            'description' => 'required|min:100',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            flash($validate->errors()->first())->error();
            return redirect()->back();
        }
        try {
            DB::beginTransaction();
            //for the banner image 
            $path = NULL;
            if ($request->has('banner_img')) {
                $path = $request->file('banner_img')->store('news/profile_photo');
            }
            $news_data = new News();
            $news_data->title = $request->title;
            $news_data->cat_id = $request->cat_id;
            $news_data->created_by = $request->created_by;
            $news_data->banner_img = $path;
            $news_data->description = $request->description;
            $news_data->is_popular = $request->is_popular;
            $news_data->save();

            DB::commit();
            flash('News Is Created Successfully!')->success();
            return redirect()->route('admin.news.index');
        } catch (QueryException $e) {
            DB::rollback();
            flash($e->getMessage())->error();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            flash($e->getMessage())->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {

            $News_data = News::find($id);
            // dd($News_data);
            return view('admin.pages.news.edit', compact('News_data'))->with(['custom_title' => 'News']);
        } catch (Exception $e) {
            flash("someting is wrong", $e->getMessage())->error();
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        try {
            DB::beginTransaction();

            $News_data = News::find($id);
            if (!empty($request->action) && $request->action == 'change_status') {
                // echo "status call"; exit;
                $content = ['status' => 204, 'message' => "Something Went Wrong"];
                if ($News_data) {
                    // dd("hii inside the customer");
                    // dd($request->value);
                    $News_data->is_active = $request->value;
                    if ($News_data->save()) {
                        // dd("update the customer data");
                        DB::commit();
                        $content['status'] = 200;
                        $content['message'] = "Status updated successfully.";
                    }
                }
                return response()->json($content);
            } else {
                $News_data->cat_name = $request->cat_name;
                if ($News_data->save()) {
                    DB::commit();
                    flash('News Details Updated Successfully!')->success();
                } else {

                    flash('Unable to update user. Try again later')->error();
                }
                // dd("hii hardik after retr");
                // exit;

                return redirect(route('admin.news.index'));
            }
        } catch (QueryException $e) {
            DB::rollback();
            return redirect()->back()->flash('error', $e->getMessage());
        } catch (Exception $e) {
            // dd("exception call");
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($request->action);
        if (!empty($request->action) && $request->action == 'delete_all') {
            $content = ['status' => 204, 'message' => "something went wrong"];

            News::whereIn('id', explode(',', $request->ids))->delete();
            $content['status'] = 200;
            $content['message'] = "Newss deleted successfully.";
            $content['count'] = News::all()->count();
            return response()->json($content);
        } else {
            $News_data = News::where('id', $id)->firstOrFail();
            // dd($News_data);
            $News_data->delete();
            if (request()->ajax()) {
                $content = array('status' => 200, 'message' => "News deleted successfully.", 'count' => News::all()->count());
                return response()->json($content);
            } else {
                flash('Newss deleted successfully.')->success();
                return redirect()->route('admin.news.index');
            }
        }
    }

    public function listing(Request $request)
    {
        extract($this->DTFilters($request->all()));
        $records = [];
        $categories = News::orderBy($sort_column, $sort_order);

        if ($search != '') {
            $categories->where(function ($query) use ($search) {
                $query->where('cat_name', 'like', "%{$search}%");
            });
        }

        $count = $categories->count();

        $records['recordsTotal'] = $count;
        $records['recordsFiltered'] = $count;
        $records['data'] = [];

        $categories = $categories->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $categories = $categories->get();
        // dd($users);
        foreach ($categories as $News) {
            $params = [
                'checked' => ($News->is_active == 'y' ? 'checked' : ''),
                'getaction' => $News->is_active,
                'class' => '',
                'id' => $News->id,
            ];
            // echo "hii hhhhh"; exit;

            $records['data'][] = [
                'id' => $News->id,
                'cat_name' => $News->cat_name,
                'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'News', 'id' => $News->id], $News)->render(),
                'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $News->id)->render(),
            ];
        }
        // dd($records);
        return $records;
    }
    //admin panel route end 

}
