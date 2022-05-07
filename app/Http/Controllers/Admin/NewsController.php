<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    //
    public function newsDetails(Request $request)
    {
        // dd($request->input());
        if ($request->news_id) {
            $news_data = News::find($request->news_id);
        } else {

            $news_data = News::find(1);
        }
        return view('front.news-details', ['news_data' => $news_data]);
    }

    public function news(Request $request)
    {

        //here get the all news by category
        // dd($request->input());
        $news_details = News::where('cat_id', $request->cat_id)->get();
        $cat_details = Category::find($request->cat_id);
        // $news_details = News::where('cat_id', $request->cat_id)->get();
        // $cat_details = Category::find($request->cat_id);

        return view('front.news', ['news_details' => $news_details, 'cat_details' => $cat_details]);
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
        // $category_data = Category::all();
        return view('admin.pages.news.create')->with(['custom_title' => 'News']);
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
                $path = $request->file('banner_img')->store('news/banner');
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
        try {
            $news_detail = News::find($id);
            $category_data = Category::all();
            // dd($category_data);
            return view('admin.pages.news.edit', ['news_detail' => $news_detail, 'category_data' => $category_data])->with(['custom_title' => 'News']);
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
        // dd($request->input());
        // dd("update call");
        try {
            DB::beginTransaction();

            $news_data = News::find($id);
            if (!empty($request->action) && $request->action == 'change_status') {
                // echo "status call"; exit;
                $content = ['status' => 204, 'message' => "Something Went Wrong"];
                if ($news_data) {
                    // dd("hii inside the customer");
                    // dd($request->value);
                    $news_data->is_active = $request->value;
                    if ($news_data->save()) {
                        // dd("update the customer data");
                        DB::commit();
                        $content['status'] = 200;
                        $content['message'] = "Status updated successfully.";
                    }
                }
                return response()->json($content);
            } else {
                $rules = [
                    'title' => 'required|max:150|unique:news,title,' . $news_data->id,
                    'created_by' => 'nullable',
                    'description' => 'required|min:100',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    flash($validate->errors()->first())->error();
                    return redirect()->back();
                }

                //for the banner image 
                if ($request->has('remove_profie_photo')) {
                    if ($news_data->banner_img) {
                        Storage::delete($news_data->banner_img);
                    }
                    $path = null;
                }

                $path = NULL;
                if ($request->has('banner_img')) {
                    $path = $request->file('banner_img')->store('news/banner');
                    Storage::delete($news_data->banner_img);
                }
                $news_data->title = $request->title;
                $news_data->cat_id = $request->cat_id;
                $news_data->created_by = $request->created_by;
                $news_data->banner_img = $path == NULL ? $news_data->banner_img : $path;
                $news_data->description = $request->description;
                $news_data->is_popular = $request->is_popular;
                if ($news_data->save()) {
                    // dd("news update");
                    DB::commit();
                    flash('News Details Updated Successfully!')->success();
                    return redirect()->route('admin.news.index');
                } else {
                    flash('Unable to update user. Try again later')->error();
                }
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
        $news = News::orderBy($sort_column, $sort_order);

        if ($search != '') {
            $news->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('created_by', 'like', "%{$search}%");
            });
        }

        $count = $news->count();

        $records['recordsTotal'] = $count;
        $records['recordsFiltered'] = $count;
        $records['data'] = [];

        $news = $news->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $news = $news->with('category')->get();
        // dd($news);
        foreach ($news as $news_detail) {
            // dd($news_detail->category);
            $params = [
                'checked' => ($news_detail->is_active == 'y' ? 'checked' : ''),
                'getaction' => $news_detail->is_active,
                'class' => '',
                'id' => $news_detail->id,
            ];
            // echo "hii hhhhh"; exit;

            $records['data'][] = [
                'id' => $news_detail->id,
                'title' => $news_detail->title,
                'cat_id' => $news_detail->category->cat_name,
                'created_by' => $news_detail->created_by,
                'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'News', 'id' => $news_detail->id], $news_detail)->render(),
                'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $news_detail->id)->render(),
            ];
        }
        // dd($records);
        return $records;
    }
    //admin panel route end 

}
