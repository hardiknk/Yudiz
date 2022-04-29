<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.category.index')->with(['custom_title' => 'Category']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.category.create')->with(['custom_title' => 'Category']);
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
        $rules = [
            'cat_name' => 'required|max:60|unique:categories'
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->with('danger',  $validate->errors()->first());
        }
        try {
            DB::beginTransaction();
            Category::create(
                $request->all()
            );
            DB::commit();
            flash('Category Is Created Successfully!')->success();
            return redirect()->route('admin.category.index');
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

            $category_data = Category::find($id);
            // dd($category_data);
            return view('admin.pages.category.edit', compact('category_data'))->with(['custom_title' => 'Category']);
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

            $category_data = Category::find($id);
            if (!empty($request->action) && $request->action == 'change_status') {
                // echo "status call"; exit;
                $content = ['status' => 204, 'message' => "Something Went Wrong"];
                if ($category_data) {
                    // dd("hii inside the customer");
                    // dd($request->value);
                    $category_data->is_active = $request->value;
                    if ($category_data->save()) {
                        // dd("update the customer data");
                        DB::commit();
                        $content['status'] = 200;
                        $content['message'] = "Status updated successfully.";
                    }
                }
                return response()->json($content);
            } else {
                $category_data->cat_name = $request->cat_name;
                if ($category_data->save()) {
                    DB::commit();
                    flash('Category Details Updated Successfully!')->success();
                } else {

                    flash('Unable to update user. Try again later')->error();
                }
                // dd("hii hardik after retr");
                // exit;

                return redirect(route('admin.category.index'));
            }
        } catch (QueryException $e) {
            DB::rollback();
            flash('error', $e->getMessage());
            return redirect()->back();
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

            Category::whereIn('id', explode(',', $request->ids))->delete();
            $content['status'] = 200;
            $content['message'] = "Categorys deleted successfully.";
            $content['count'] = Category::all()->count();
            return response()->json($content);
        } else {
            $Category_data = Category::where('id', $id)->firstOrFail();
            // dd($Category_data);
            $Category_data->delete();
            if (request()->ajax()) {
                $content = array('status' => 200, 'message' => "Category deleted successfully.", 'count' => Category::all()->count());
                return response()->json($content);
            } else {
                flash('Categorys deleted successfully.')->success();
                return redirect()->route('admin.category.index');
            }
        }
    }

    public function listing(Request $request)
    {
        extract($this->DTFilters($request->all()));
        $records = [];
        $categories = Category::orderBy($sort_column, $sort_order);

        if ($search != '') {
            $categories->where(function ($query) use ($search) {
                $query->where('cat_name', 'like', "%{$search}%");
                // ->orWhere('last_name', 'like', "%{$search}%")
                // ->orWhere('contact_no', 'like', "%{$search}%")
                // ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $count = $categories->count();

        $records['recordsTotal'] = $count;
        $records['recordsFiltered'] = $count;
        $records['data'] = [];

        $categories = $categories->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $categories = $categories->get();
        // dd($users);
        foreach ($categories as $category) {
            $params = [
                'checked' => ($category->is_active == 'y' ? 'checked' : ''),
                'getaction' => $category->is_active,
                'class' => '',
                'id' => $category->id,
            ];
            // echo "hii hhhhh"; exit;

            $records['data'][] = [
                'id' => $category->id,
                'cat_name' => $category->cat_name,
                'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'category', 'id' => $category->id], $category)->render(),
                'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $category->id)->render(),
            ];
        }
        // dd($records);
        return $records;
    }
}
