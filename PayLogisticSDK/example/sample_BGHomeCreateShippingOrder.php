﻿<?php
    // 宅配物流訂單幕後建立
    define('HOME_URL', 'http://www.sample.com.tw/logistics_dev');
    require('ECPay.Logistics.Integration.php');
    try {
        $AL = new ECPayLogistics();
        $AL->HashKey = '5294y06JbISpM5x9';
        $AL->HashIV = 'v77hoKGq4kWxNNIS';
        $AL->Send = array(
            'MerchantID' => '2000132',
            'MerchantTradeNo' => 'no' . date('YmdHis'),
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'LogisticsType' => LogisticsType::HOME,
            'LogisticsSubType' => LogisticsSubType::TCAT,
            'GoodsAmount' => 1500,
            'CollectionAmount' => 10,
            'IsCollection' => IsCollection::NO,
            'GoodsName' => '測試商品',
            'SenderName' => '測試寄件者',
            'SenderPhone' => '0226550115',
            'SenderCellPhone' => '0911222333',
            'ReceiverName' => '測試收件者',
            'ReceiverPhone' => '0226550115',
            'ReceiverCellPhone' => '0933222111',
            'ReceiverEmail' => 'test_emjhdAJr@test.com.tw',
            'TradeDesc' => '測試交易敘述',
            'ServerReplyURL' => HOME_URL . '/ServerReplyURL.php',
            'LogisticsC2CReplyURL' => HOME_URL . '/LogisticsC2CReplyURL.php',
            'Remark' => '測試備註',
            'PlatformID' => '',
        );

        $AL->SendExtend = array(
            'SenderZipCode' => '11560',
            'SenderAddress' => '台北市南港區三重路19-2號10樓D棟',
            'ReceiverZipCode' => '11560',
            'ReceiverAddress' => '台北市南港區三重路19-2號5樓D棟',
            'Temperature' => Temperature::ROOM,
            'Distance' => Distance::SAME,
            'Specification' => Specification::CM_150,
            'ScheduledDeliveryTime' => ScheduledDeliveryTime::TIME_17_20
        );
        // BGCreateShippingOrder()
        $Result = $AL->BGCreateShippingOrder();
        echo '<pre>' . print_r($Result, true) . '</pre>';
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>
