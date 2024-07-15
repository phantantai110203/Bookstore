<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Author;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\User;
use Illuminate\Http\Request;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        /**
         * Show the form for creating a new resource.
         */
    }
    // public function vnpay_payment(Request $request)
    // {

    //     $data = $request->all();
    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
    //     $vnp_TmnCode = "RFY5JE4C"; //Mã website tại VNPAY
    //     $vnp_HashSecret = "GQ3K813VC1SO4R6G79W5MNW63BQXC34H"; //Chuỗi bí mật

    //     $vnp_TxnRef = "12000"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     $vnp_OrderInfo = "Thanh toán hóa đơn";
    //     $vnp_OrderType = "NTBookStore";
    //     $vnp_Amount = $data['total'] * 100;
    //     $vnp_Locale = "VN";
    //     $vnp_BankCode = "NCB";
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef,

    //     );

    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }
    //     if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //         $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    //     }

    //     //var_dump($inputData);
    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     $returnData = array(//         'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    //     );
    //     if (isset($_POST['redirect'])) {
    //         header('Location: ' . $vnp_Url);
    //         die();
    //     } else {
    //         echo json_encode($returnData);
    //     }
    //     // vui lòng tham khảo thêm tại code demo

    // }
    public function paymomo(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $code = $request->input('count_invoice');
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $request->input('total'); //tổng tiền
        $orderId = time() . "" . $code;
        $redirectUrl = route('momo.return'); // Sử dụng route mới
        $ipnUrl = 'http://127.0.0.1:8000/invoices';
        $extraData = "";
        $paymentTimeout = now()->addHours(24)->format('Y-m-d H:i:s');
        $extraData = json_encode(['paymentTimeout' => $paymentTimeout]);
        //$paymentTimeout = 86400;
        $requestId = time() . "";
        $requestType = "captureWallet";

        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Muli Shop",
            "storeId" => "Momo Payment",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
            'paymentTimeout' => $paymentTimeout
        );

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);
        $resultCode = $jsonResult['resultCode'];

        if ($resultCode == 22) {
            return redirect()->route('invoices.index')->with('cancel-payment', 'TỔNG TIỀN ĐƠN HÀNG VƯỢT QUÁ HẠN MỨC GIAO DỊCH CỦA MOMO QR!');
        }
        if (isset($jsonResult['payUrl'])) {
            return redirect()->away($jsonResult['payUrl']);
        } else {
            return redirect()->route('invoices.index');
        }
    }

    public function handleReturn(Request $request)
    {
        $resultCode = $request->input('resultCode');
        $orderId = $request->input('orderId');
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();

        // Tính tổng tiền giỏ hàng
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->price * $cart->quantity;
        }





        if ($resultCode == 0) {
            // $invoice = new Invoice();

            // $invoice->name = Auth::user()->name;
            // $invoice->ShippingAddress = $user->ShippingAddress;
            // $invoice->ShippingPhone = $user->ShippingPhone;
            // $invoice->payment_method = $request->invoiceMethod;

            // $invoice->total = $total; // Make sure to pass the total amount in the form
            // $invoice->user_id = Auth::id();
            // $invoice->status = 'Chờ xác nhận';
            // $invoice->save();




            // $carts = Cart::where('user_id', Auth::id())->get(); // Assuming you have a Cart model

            // foreach ($carts as $cart) {

            //     $invoiceDetail = InvoiceDetail::create([
            //         'invoice_id' => $invoice->id,
            //         'book_id' => $cart->book_id,
            //         'quantity' => $cart->quantity,

            //     ]);
            // }
            // dd($invoiceDetail->invoice_id);
            $invoice = Invoice::create([
               // Mã hóa đơn tự tạo
                'name' => 'text',
                'total' => $total,
                'ShippingAddress' => 'text',
                'ShippingPhone' => 'text' ,
                'status' => 'Chờ xác nhận',
                'user_id'=> Auth::user()->id
            ]);

            foreach ($carts as $cart) {
                InvoiceDetail::create([
                    'invoice_id' => $invoice->id, // Link to the created invoice
                    'book_id' => 1, // Link to the product detail
                    'quantity' => 1, // Quantity of the product
                                
                ]);
            }

            Cart::where('user_id', Auth::id())->delete();
            return redirect()->route('index')->with('success', 'Thanh toán thành công!');
        } else {
            // Giao dịch bị hủy hoặc thất bại
            return redirect()->route('index')->with('error', 'Giao dịch bị hủy hoặc thất bại!');
        }
    }

    public function  execPostRequest($url, $data)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //

   }
}