<?php

namespace App\Http\Controllers;

use App\Entities\Payment;
use App\Entities\PaymentDocument;
use App\Entities\PaymentHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Entities\PaymentStudent;

class PaymentController extends Controller
{
    /**
     * Find All @payments
     *
     * @return mixed
     */
    public function index()
    {
        $payments = Payment::with('category', 'hours', 'transactions')->get();

        return $payments;
    }

    /**
     * Find by Id
     *
     * @param $paymentId
     * @return mixed
     */
    public function show($paymentId)
    {
        $payment = Payment::with('category', 'transactions', 'hours')->findOrfail($paymentId);

        return $payment;
    }

    /**
     * Store Payment
     *
     * @param $studentId
     * @param Request $request
     * @return Payment|\Illuminate\Http\JsonResponse
     *
     */
    public function store($studentId, Request $request)
    {


        $validator = Validator::make($request->json('payment'), [
            'pay_type' => 'in:Cash,Bank|required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->passes()) {

            $payment = new Payment();

            $payment->pay_type = $request->json('payment')['pay_type'];
            $payment->description = $request->json('payment')['description'];
            $payment->category_id = $request->json('payment')['category_id'];
            $payment->pay_flag = false;

            $payment->save();

            $paymentStudent = new PaymentStudent();
            $paymentStudent->student_id = $studentId;
            $paymentStudent->payment_id = $payment->id;

            $paymentStudent->save();

            $paymentTotal = 0;
            foreach($request->json('paymentsHours') as $payHour) {
                $paymentHours = new PaymentHour();
                $paymentHours->title = $payHour['title'];
                $paymentHours->pay_hours = $payHour['pay_hours'];
                $paymentHours->pay_per_hour = $payHour['pay_per_hour'];
                $paymentHours->pay_total = 10;
                $paymentHours->payment_id = $payment->id;

                $paymentTotal += $payHour['pay_hours'] * $payHour['pay_per_hour'];

                $paymentHours->save();
            }

            $payment->update(['pay_total' => $paymentTotal, 'pay_dept' => $paymentTotal]);

            return $payment;
        }

        return response()->json(["errors" => $validator->messages()], 422);
}

//



    /**
     * Update Payment
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pay_type' => 'in:Cash, Bank|required',
            'pay_hours' => 'required|numeric',
            'pay_per_hour' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required'

        ]);

        if ($validator->passes()) {

            $payment = Payment::findOrfail($id);

            $payment->pay_type = $request->json('pay_type');
            $payment->pay_hours = $request->json('pay_hours');
            $payment->pay_per_hour = $request->json('pay_per_hour');
            $payment->pay_amount = 0;
            $payment->description = $request->json('description');
            $payment->category_id = $request->json('category_id');

            $payment->pay_total = $request->json('pay_hours') * $payment->pay_per_hour = $request->get('pay_per_hour');

            $payment->pay_dept = $payment->pay_total;

            $payment->pay_flag = false;

            $payment->update();

            return $payment;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete Payment
     *
     * @param $id
     */
    public function destroy($id)
    {
        $payment = Payment::findOrfail($id);

        $payment->delete();
    }

    /**
     * Add Document Payment
     *
     * @param Request $request
     * @param $paymentId
     */
    public function documentPayment($paymentId, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pay_amount' => 'required'

        ]);

        if ($validator->passes()) {

            $payment = Payment::findOrfail($paymentId);

            $documentPay = new PaymentDocument();

            $documentPay->pay_amount = $request->get('pay_amount');
            $documentPay->payment_id = $paymentId;

            $destinationPath = public_path() . '/fonix/documents/payments/';

            $docName = str_random() . '.' .
                $request->file('pay_file')->getClientOriginalExtension();

            $request->file('pay_file')->move($destinationPath, $docName);

            $documentPay->pay_file = $docName;

            $documentPay->save();

            $payDept = $payment['pay_dept'] - $documentPay->pay_amount;
            $payAmount = $payment['pay_amount'] + $documentPay->pay_amount;

            $payment->update(['pay_dept' => $payDept, 'pay_amount' => $payAmount]);

            if ($payment['pay_amount'] == $payment['pay_total']) {
                $payment->update(['pay_flag' => true]);
            }

            return $payment;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update Document Value
     *
     * @param $documentId
     * @param Request $request
     * @return mixed
     */
    public function documentPaymentUpdate($documentId, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pay_amount' => 'required'

        ]);

        if ($validator->passes()) {

            $document = PaymentDocument::findOrfail($documentId);

            $payment = Payment::where('id', $document->payment_id)->first();

            $document->pay_amount = $request->json('pay_amount');

            $document->update(['pay_amount' => $document->pay_amount]);

            $payDept = $payment->pay_dept - $document->pay_amount;
            $payAmount = $payment->pay_amount + $document->pay_amount;

            $payment->update(['pay_dept' => $payDept, 'pay_amount' => $payAmount]);

            if ($payment->pay_amount == $payment->pay_total) {
                $payment->update(['pay_flag' => true]);
            }

            return $payment;
        }

        return response()->json(["errors" => $validator->messages()], 422);

    }
}
