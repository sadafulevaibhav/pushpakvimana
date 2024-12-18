<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pushpaka Vimana</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <?php
        if (Yii::$app->controller->action->id != 'login') {
        ?>
            <!-- Sidebar user panel (optional) -->
            <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->

            <!-- SidebarSearch Form -->
            <!-- href be escaped -->
            <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <?php
                // echo \hail812\adminlte\widgets\Menu::widget([
                //     'items' => [
                //         [
                //             'label' => 'Starter Pages',
                //             'icon' => 'tachometer-alt',
                //             'badge' => '<span class="right badge badge-info">2</span>',
                //             'items' => [
                //                 ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                //                 ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                //             ]
                //         ],
                //         ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                //         ['label' => 'Yii2 PROVIDED', 'header' => true],
                //         ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                //         ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                //         ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                //         ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                //         ['label' => 'Level1'],
                //         [
                //             'label' => 'Level1',
                //             'items' => [
                //                 ['label' => 'Level2', 'iconStyle' => 'far'],
                //                 [
                //                     'label' => 'Level2',
                //                     'iconStyle' => 'far',
                //                     'items' => [
                //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                //                     ]
                //                 ],
                //                 ['label' => 'Level2', 'iconStyle' => 'far']
                //             ]
                //         ],
                //         ['label' => 'Level1'],
                //         ['label' => 'LABELS', 'header' => true],
                //         ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                //         ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                //         ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                //     ],
                // ]);
                echo \hail812\adminlte\widgets\Menu::widget([
                    'items' => [
                        [
                            'label' => 'Masters',
                            'items' => [
                                ['label' => 'Addon', 'url' => ['addon/'], 'iconStyle' => 'far'],
                                ['label' => 'Country', 'url' => ['destination-country/'], 'iconStyle' => 'far'],
                                ['label' => 'Inclusion/Exclusion', 'url' => ['tour-inclusion-exclusion/'], 'iconStyle' => 'far'],
                                ['label' => 'Destination Media', 'url' => ['destination-media/'], 'iconStyle' => 'far'],
                                ['label' => 'Destination Packages', 'url' => ['destination-package/'], 'iconStyle' => 'far'],
                                ['label' => 'General Picklists', 'url' => ['general-picklist/'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Tour Masters',
                            'items' => [
                                ['label' => 'Tour Itinerary', 'url' => ['tour-itinerary/'], 'iconStyle' => 'far'],
                                ['label' => 'Tour Packages', 'url' => ['tour-package/'], 'iconStyle' => 'far'],
                                ['label' => 'Tour Details', 'url' => ['tour-detail/'], 'iconStyle' => 'far'],
                                ['label' => 'Tour Landing Images', 'url' => ['tour-landing-image/'], 'iconStyle' => 'far'],
                                ['label' => 'Tour Enquiries', 'url' => ['tour-enquiries/'], 'iconStyle' => 'far'],
                                ['label' => 'Booking Requests', 'url' => ['booking-details/'], 'iconStyle' => 'far'],
                                
                            ]
                        ],

                        ['label' => 'About Us', 'url' => ['about-us/'], 'iconStyle' => 'far'],
                        ['label' => 'Static Pages', 'url' => ['static-page/'], 'iconStyle' => 'far'],
                        
                        ['label' => 'App Testimonials', 'url' => ['app-testimonial/'], 'iconStyle' => 'far'],
                    ],
                ]);
                ?>
            </nav>
            <!-- /.sidebar-menu -->
        <?php
        }
        ?>
    </div>
    <!-- /.sidebar -->

</aside>