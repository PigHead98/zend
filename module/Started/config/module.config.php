<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonStarted for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Started;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'started' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/started',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action' => '[a-zA-Z0-9]*' //rang buoc
                    ]
                ],
                'my_terminate' => false, // khong kế thừa controller từ route cha
                'child_routes' => [
                    // 'UserController' => [ route nằm ở controller khác 
                    //     'type'    => Segment::class,
                    //     'options' => [
                    //         'route'    => '[/:action]',
                    //         'defaults' => [
                    //             'controller' => Controller\UserController::class,
                    //             'action'     => 'Login',
                    //         ],
                    //         'constraints' => [
                    //             'action' => '[a-zA-Z0-9]*' //rang buoc
                    //         ]
                    //     ],
                    // ],
                    'IndexController' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '[/:action][/:id]',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,

                            ],
                            'constraints' => [
                                'action' => '[a-zA-Z0-9]*',
                                'id' => '[0-9]*',
                                 //rang buoc
                            ]
                        ],
                    ],
                ]
            ],
            
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\UserController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'started/index/index' => __DIR__ . '/../view/started/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
