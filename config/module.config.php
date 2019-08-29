<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Dashboard;

use Zend\Router\Http\Regex;
use Zend\Router\Http\Segment;

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
                'may_terminate' => true,
                'child_routes' => [
                    'navigation' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex' => 'navigation.(?<format>(json|xml)?)',
                            'spec' => 'navigation.%format%',
                            'defaults' => [
                                'controller' => \MSBios\CPanel\Controller\SidebarController::class,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
