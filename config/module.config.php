<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Dashboard;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

$CTHEME = getenv('APPLICATION_CTHEME') ? : 'limitless';

return [

    'router' => [
        'routes' => [
            'cpanel' => [
                'type' => Segment::class,
                'options' => [
                    'route' => "/[:locale[/]]",
                    'defaults' => [
                        'controller' => \MSBios\CPanel\Controller\IndexController::class,
                        'action' => 'index',
                        // MSBios\Theme
                        'theme_identifier' => $CTHEME,
                    ],
                    'constraints' => [
                        'locale' => '(?i)[a-z]{2,3}(?:_[a-z]{2})?',
                    ]
                ],
            ],
        ],
    ],

//    'controllers' => [
//        'factories' => [
//            Controller\IndexController::class =>
//                InvokableFactory::class,
//        ]
//    ],
//
//    'view_manager' => [
//        'display_not_found_reason' => true,
//        'display_exceptions' => true,
//        'doctype' => 'HTML5',
//        'not_found_template' => 'error/404',
//        'exception_template' => 'error/index',
//        'template_map' => [
//            // 'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
//            // 'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
//            // 'error/404'               => __DIR__ . '/../view/error/404.phtml',
//            // 'error/index'             => __DIR__ . '/../view/error/index.phtml',
//        ],
//        'template_path_stack' => [
//            __DIR__ . '/../view',
//        ],
//    ],
//
//    'widget_manager' => [
//        'factories' => [
//            Widget\FollowDevelopmentWidget::class =>
//                InvokableFactory::class
//        ]
//    ],
//
//    \MSBios\Theme\Module::class => [
//        'themes' => [
//            'default' => [
//                'identifier' => 'default',
//                'title' => 'Default Application Theme',
//                'description' => 'Default Application Theme Description',
//                'template_path_stack' => [
//                    __DIR__ . '/../themes/default/view/',
//                ],
//                'translation_file_patterns' => [
//                    [
//                        'type' => 'gettext',
//                        'base_dir' => __DIR__ . '/../themes/default/language/',
//                        'pattern' => '%s.mo',
//                    ],
//                ],
//                'widget_manager' => [
//                    'template_map' => [
//                    ],
//                    'template_path_stack' => [
//                        __DIR__ . '/../themes/default/widget/'
//                    ],
//                ],
//            ]
//        ]
//    ]
];
