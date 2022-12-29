<?php

return [

	'status' => [
		'OK' => 200
	],

	'app-type' => [
		'android' => "khatmenabowat-app-mobile",
	],
    'request_status'=>[
        'pending'=>'pending',
        'partial'=>'partial',
        'completed'=>'completed',
        'cancelled'=>'cancelled',
    ],
    'promotion_type'=>[
        'price'=>'price',
        // 'discount_percent'=>'discount_percent',
    ],
	'social_login' => [
		'facebook'=>'facebook',
		'twitter'=>'twitter',
		'gmail'=>'gmail',
	],
    'sender' =>[
        'user'=>'user',
        'sholar'=>'scholar'
    ],
    'fees_type' =>[
        'complete'=>'Complete',
        'installment'=>'Installment',
    ],
    'payment_status'=>[
        'paid'=>'paid',
        'refunded'=>'refunded',
    ],

    'ajax_action'=>[
        'create'=>'create',
        'update'=>'update',
        'delete'=>'delete',
        'error'=>'error',
        'success'=>'success',
    ],
    'order_status'=>[
        'all'=>'all',
        'pending'=>'pending',
        'inprogress'=>'inprogress',
        'completed'=>'completed',
        'rejected'=>'rejected',
    ],
];
