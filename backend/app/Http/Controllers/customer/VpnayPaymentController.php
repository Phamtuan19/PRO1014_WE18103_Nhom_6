<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VpnayPaymentController extends Controller
{
    // public function index(Request $request)
    // {
    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
    //     $vnp_TmnCode = "C957WG8A"; //Mã website tại VNPAY
    //     $vnp_HashSecret = "IMMNAQXNGCEEGVFNTRUPSVDCWJSZLYDF"; //Chuỗi bí mật

    //     $vnp_TxnRef = '123456'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     $vnp_OrderInfo = 'Thanh toán đơn hàng';
    //     $vnp_OrderType = 'billpayment';
    //     $vnp_Amount = 20000 * 100;
    //     $vnp_Locale = 'vn';
    //     $vnp_BankCode = 'NCB';
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //     //Add Params of 2.0.1 Version
    //     // $vnp_ExpireDate = $_POST['txtexpire'];
    //     //Billing

    //     if (isset($fullName) && trim($fullName) != '') {
    //         $name = explode(' ', $fullName);
    //         $vnp_Bill_FirstName = array_shift($name);
    //         $vnp_Bill_LastName = array_pop($name);
    //     }
    //     // $vnp_Bill_Address = 'hải dươn';
    //     // $vnp_Bill_City = $_POST['txt_bill_city'];
    //     // $vnp_Bill_Country = $_POST['txt_bill_country'];
    //     // $vnp_Bill_State = $_POST['txt_bill_state'];
    //     // // Invoice
    //     // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
    //     // $vnp_Inv_Email = $_POST['txt_inv_email'];
    //     // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
    //     // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
    //     // $vnp_Inv_Company = $_POST['txt_inv_company'];
    //     // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
    //     // $vnp_Inv_Type = $_POST['cbo_inv_type'];
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
    //         "vnp_TxnRef" => $vnp_TxnRef
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
    //     $returnData = array(
    //         'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    //     );
    //     if (isset($_POST['redirect'])) {
    //         header('Location: ' . $vnp_Url);
    //         die();
    //     } else {
    //         echo json_encode($returnData);
    //     }
    //     // vui lòng tham khảo thêm tại code demo
    // }
}
