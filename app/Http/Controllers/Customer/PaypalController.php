<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Checkout\CheckoutService;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;

class PaypalController extends Controller
{
    static $return_url = "/success-transaction";
    static $cancel_url = "/cancel-transaction";
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService) {

        $this->checkoutService = $checkoutService;
    }

    public function processTransaction(Request $request) {

        $order = session()->get('order');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => env('APP_URL') . self::$return_url . '/' . $order->id,
                "cancel_url" => env('APP_URL') . self::$cancel_url . '/' . $order->id,
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $order->total_price,
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {    
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->to('/checkout')
                ->with('error', 'Something went wrong.');

        } else {
            Order::find($order->id)->delete();
            return redirect()
                ->to('/checkout')
                ->with('error', $response['message'] ?? 'Something went wrong. Please try again!');
        }
    }

    public function successTransaction(Request $request, $order_id) {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            //Add order detail
            $this->checkoutService->addOrderDetail($order_id);
            //Send mail
            $this->checkoutService->sendMail(Order::find($order_id));

            return redirect('/checkout/noti')->with('notification', 'Order has been successfully paid. Please check your email!' );
        } 
        else {
            Order::find($order_id)->delete();
            return redirect('checkout')->with('error', 'Something went wrong. Please try again!');
        }
    }

    public function cancelTransaction(Request $request, $order_id) {

        Order::find($order_id)->delete();
        return redirect('checkout')->with('error', 'You have canceled the transaction.');
    }
}
