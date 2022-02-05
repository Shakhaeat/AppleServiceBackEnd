<?php

namespace App\Http\Controllers;
use App\Models\ServiceProduct;


use Illuminate\Http\Request;
use Validator;

class InvoiceController extends Controller
{
  public function __construct() {
    $this->middleware('auth:api', ['except' => ['login', 'register']]);
}
  public function index() {
    // return ServiceProduct::all();
      $invoices = ServiceProduct::orderBy('id', 'DESC')->get()->toJson(JSON_PRETTY_PRINT);
      return response($invoices, 200);
  }

  public function createInvoice(Request $request) {

      $validator = Validator::make($request->all(), [
        'customerName' => 'required',
        'address' => 'required',
        'phoneNo' => 'required',
        'productName' => 'required',
        'productProblem' => 'required',
        'productQty' => 'required',
        'total' => 'required',
        // 'total' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }


      $invoice = new ServiceProduct;

      $invoice->productId = $request->productId;
      $invoice->customerName = $request->customerName;
      $invoice->address = $request->address;
      $invoice->phoneNo = $request->phoneNo;
      $invoice->productName = $request->productName;
      $invoice->productProblem = $request->productProblem;
      $invoice->productQty = $request->productQty;
      $invoice->total = $request->total;
      $invoice->advance = $request->advance;
      $invoice->due = $request->due;
      $invoice->status = $request->status;

      $invoice->save();

      return response()->json([
        "message" => "New invoice created"
      ], 201);
  }

  public function showInvoice($id) {
    if (ServiceProduct::where('id', $id)->exists()) {
      $invoice = ServiceProduct::where('id', $id)->first()->toJson();
      return response($invoice, 200);
    } else {
      return response()->json([
        "message" => "Invoice not found"
      ], 404);
    }
  }

  public function updateInvoice(Request $request, $id) {
    $validator = Validator::make($request->all(), [
      'customerName' => 'required',
      'address' => 'required',
      'phoneNo' => 'required',
      'productName' => 'required',
      'productProblem' => 'required',
      'productQty' => 'required',
      'total' => 'required',
      // 'total' => 'required',
  ]);

  if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
  }
      if (ServiceProduct::where('id', $id)->exists()) {
        $invoice = ServiceProduct::find($id);

        $invoice->productId = is_null($request->productId) ? $request->productId : $request->productId;
        $invoice->productName = is_null($request->productName) ? $request->productName : $request->productName;
        // return $invoice->product_name;
        $invoice->customerName = is_null($request->customerName) ? $request->customerName : $request->customerName;
        $invoice->address = is_null($request->address) ? $request->address : $request->address;
        $invoice->phoneNo = is_null($request->phoneNo) ? $request->phoneNo : $request->phoneNo;
        $invoice->productProblem = is_null($request->productProblem) ? $invoice->productProblem : $request->productProblem;
        $invoice->productQty = is_null($request->productQty) ? $invoice->productQty : $request->productQty;
        $invoice->total = is_null($request->total) ? $invoice->total : $request->total;
        $invoice->advance = is_null($request->advance) ? $invoice->advance : $request->advance;
        $invoice->due = is_null($request->due) ? $invoice->due : $request->due;

        $invoice->save();

        return response()->json([
          "message" => "Invoice updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "Invoice not found"
        ], 404);
      }
  }

    public function destroyInvoice ($id) {
      if(ServiceProduct::where('id', $id)->exists()) {
        $invoice = ServiceProduct::find($id);
        $invoice->delete();

        return response()->json([
          "message" => "Invoice deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Invoice not found"
        ], 404);
      }
    }


}
