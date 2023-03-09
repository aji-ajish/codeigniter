<?php 

use \Stripe\Checkout\Session;
use \Stripe\Stripe;
class PaymentGateway extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');  
    }
    public function index(){
        $this->load->view('paymentgateway');
    }
    public function payment()
    {
        $qty=$this->input->post('quantity');
        $amount=$this->input->post('amount');
        // echo($qty.$amount);
        // die();
        Stripe::setApiKey($this->config->item('stripe_secret_key'));
        $checkout_session=Session::create([
            // 'line_items'=>[
            //     ['price'=>(int) $amount*100,
            //     'name'=>'Buying Products',
            //     'quantity'=>$qty,
            //     'currency'=>$this->config->item('stripe_currency')]
            // ],
            // 'payment_method_types'=>[
            //     'card'
            // ],
            // 'mode'=>'payment',
            // 'success_url'=>base_url('PaymentGateway/success'),
            // 'cancel_url'=>base_url('PaymentGateway/cancel')
            'line_items' => [[
                'price_data' => [
                  'currency' => $this->config->item('stripe_currency'),
                  'unit_amount' => (int) $amount*100,
                  'product_data' => [
                    'name' => 'Buying Products',
                  ],
                ],
                'quantity' => $qty,
              ]],
              'mode' => 'payment',
              'success_url'=>base_url('PaymentGateway/success'),
              'cancel_url'=>base_url('PaymentGateway/cancel')
        ]);
        header('location:'.$checkout_session->url);
    }
    public function success()
    {
        $this->load->view('paymentsuccess');
    }
    public function cancel()
    {
        $this->load->view('paymentcancel');
    }
    
}