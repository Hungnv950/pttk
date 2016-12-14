<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    [
                        'label' => 'User',
                        'icon' => 'glyphicon glyphicon-user',
                        'url' => '#',
                        'items' => [
                            ['label' => 'All User', 'icon' => 'glyphicon glyphicon-asterisk','url' => ['/user/index?user_id=']],
                            ['label' => 'Employee', 'icon' => 'glyphicon glyphicon-adjust','url' => ['/user/index?user_id=1']],
                            ['label' => 'Customer', 'icon' => 'glyphicon glyphicon-tint','url' => ['/user/index?user_id=0']],
                        ]
                    ],
                    [
                        'label' => 'Booking',
                        'icon' => 'fa fa-file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'All Booking','icon' => 'glyphicon glyphicon-asterisk', 'url' => ['/booking/index?status=0']],
                            ['label' => 'Wait', 'icon' => 'glyphicon glyphicon-option-horizontal','url' => ['/booking/index?status=1']],
                            ['label' => 'Cancel', 'icon' => 'glyphicon glyphicon-remove','url' => ['/booking/index?status=2']],
                            ['label' => 'Accept', 'icon' => 'glyphicon glyphicon-check','url' => ['/booking/index?status=3']],
                            ['label' => 'Eating','icon' => 'glyphicon glyphicon-time', 'url' => ['/booking/index?status=4']],
                            ['label' => 'Done', 'icon' => 'glyphicon glyphicon-ok','url' => ['/booking/index?status=5']],
                        ],
                    ],
                    [
                        'label' => 'Table',
                        'url' => ['/table/index'],
                        'icon' => 'glyphicon glyphicon-blackboard',
                        'items' => [
                            ['label' => 'Tables','icon' => 'glyphicon glyphicon-blackboard', 'url' => ['/table/index']],
                            ['label' => 'Table Type','icon' => 'glyphicon glyphicon-tag', 'url' => ['/table-type/index']],
                        ]
                    ],
                    ['label' => 'Service','icon' => 'glyphicon glyphicon-plus', 'url' => ['/advanced-service/index']],
                    ['label' => 'Booking Serivce', 'url' => ['/booking-service/index?id=0']],

                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],

                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
