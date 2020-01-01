<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

               <i class="fa fa-circle text-success"></i> Online
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
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню RP PSWD', 'options' => ['class' => 'header']],
                    ['label' => 'Добавить учетную запись', 'icon' => 'file-code-o', 'url' => ['./passwords/create']],
                    //['label' => 'Все записи', 'icon' => 'dashboard', 'url' => ['./note']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Категории',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Учетные записи', 'icon' => 'file-code-o', 'url' => ['./passwords'],],
                            ['label' => 'Сети', 'icon' => 'dashboard', 'url' => ['./user-wifi'],],
                            ['label' => 'Записи', 'icon' => 'dashboard', 'url' => ['./note'],],
                            ['label' => 'Банковские карты', 'icon' => 'dashboard', 'url' => ['./bank'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
