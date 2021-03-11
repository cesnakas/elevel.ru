<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule("sale");
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
$post = $request->getPostList()->toArray();

if($post['InvoiceId']){

    $order = \Bitrix\Sale\Order::load($post['InvoiceId']);
    $cloudPaymentsId = 20; // ID платежной системы cloudpayments

    if($order){
        $paymentCollection = $order->getPaymentCollection();
        foreach ($paymentCollection as $payment) {
            $sum = $payment->getSum(); // сумма к оплате
            $paysystemId = $payment->getPaymentSystemId(); // ID платежной системы в заказе
        }
        if($sum == $post['Amount']
            && $paysystemId == $cloudPaymentsId
            && $order->getCurrency() == $post['Currency']){
            $onePayment = $paymentCollection[0];
            $onePayment->setPaid("Y");
            $order->save();
            echo json_encode(['code' => 0]);
            die();
        }
    }
}