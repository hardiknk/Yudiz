<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Role;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.pages.customers.index')->with(['custom_title' => 'Customer']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "hii customer create"; exit;
        return view('admin.pages.customers.create')->with(['custom_title' => 'Customer']);
    }
    //getting the list of the customer data 
    public function listing(Request $request)
    {
        // echo "hiii hardik"; exit;
        // dd($request->input());
        extract($this->DTFilters($request->all()));
        // dd($request->customer_status);
        $records = [];
        $customer_data = Customer::orderBy($sort_column, $sort_order);
        if ($request->customer_status) {
            $customer_data->where('is_active', $request->customer_status);
        }

        if ($search != '') {
            $customer_data->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('contact_no', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $count = $customer_data->count();

        $records['recordsTotal'] = $count;
        $records['recordsFiltered'] = $count;
        $records['data'] = [];

        $customer_data = $customer_data->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $customer_data = $customer_data->get();
        // dd($customer_data);
        foreach ($customer_data as $customer) {

            $params = [
                'checked' => ($customer->is_active == 'y' ? 'checked' : ''),
                'getaction' => $customer->is_active,
                'class' => '',
                'id' => $customer->id,
            ];
            // echo "hii hhhhh"; exit;

            $records['data'][] = [
                'id' => $customer->id,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'email' => '<a href="mailto:' . $customer->email . '" >' . $customer->email . '</a>',
                'contact_no' => $customer->contact_no ? '<a href="tel:' . $customer->contact_no . '" >' . $customer->contact_no . '</a>' : 'N/A',
                'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'customer', 'id' => $customer->id], $customer)->render(),
                'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $customer->id)->render(),
            ];
        }
        // dd($records);
        return $records;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->input());
        try {
            $customer_data = new Customer();
            $customer_data->first_name = $request->first_name;
            $customer_data->last_name = $request->last_name;
            $customer_data->email = $request->email;
            $customer_data->contact_no = $request->contact_no;

            if ($customer_data->save()) {
                flash('Customer account created successfully!')->success();
            }
            return redirect(route('admin.customers.index'));
        } catch (Exception $e) {
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
    public function edit(Customer $customer)
    {
        return view('admin.pages.customers.edit', compact('customer'))->with(['custom_title' => 'Customer']);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // dd("hii edit call update");
        // dd($customer);
        try {
            DB::beginTransaction();

            if (!empty($request->action) && $request->action == 'change_status') {
                // echo "status call"; exit;
                $content = ['status' => 204, 'message' => "Something Went Wrong"];
                if ($customer) {
                    // dd("hii inside the customer");
                    // dd($request->value);
                    $customer->is_active = $request->value;
                    if ($customer->save()) {
                        // dd("update the customer data");
                        DB::commit();
                        $content['status'] = 200;
                        $content['message'] = "Status updated successfully.";
                    }
                }
                // dd("after the customer clal");
                // echo "hii before json response "; exit;
                // dd($content);
                return response()->json($content);
            } else {
                $customer->first_name = $request->first_name;
                $customer->last_name = $request->last_name;
                $customer->email = $request->email;
                $customer->contact_no = $request->contact_no;
                if ($customer->save()) {
                    // dd("hii hardik");
                    // exit;
                    DB::commit();
                    flash('Customer Details Updated Successfully!')->success();
                } else {

                    flash('Unable to update user. Try again later')->error();
                }
                // dd("hii hardik after retr");
                // exit;

                return redirect(route('admin.customers.index'));
            }
        } catch (QueryException $e) {
            DB::rollback();
            // dd("query exception call");
            // dd($e->getMessage());
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
        // dd("hi destroy call");
        // dd($id);
        if (!empty($request->action) && $request->action == 'delete_all') {
            $content = ['status' => 204, 'message' => "something went wrong"];

            Customer::whereIn('id', explode(',', $request->ids))->delete();
            $content['status'] = 200;
            $content['message'] = "Customers deleted successfully.";
            $content['count'] = Customer::all()->count();
            return response()->json($content);
        } else {
            $customer_data = Customer::where('id', $id)->firstOrFail();
            // dd($customer_data);
            $customer_data->delete();
            if (request()->ajax()) {
                $content = array('status' => 200, 'message' => "Customer deleted successfully.", 'count' => Customer::all()->count());
                return response()->json($content);
            } else {
                flash('Customers deleted successfully.')->success();
                return redirect()->route('admin.customers.index');
            }
        }
        //
    }
}
