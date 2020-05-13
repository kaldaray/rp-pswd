<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<script type="text/javascript">
    window.onload=function(){
        $('#search_input').on('keyup',function(){
            var $this = $(this),
                val = $this.val();

            if(val.length >= 1){
                $('#search_bt').show(100);
            }else {
                $('#search_bt').hide(100);
            }
        });
        document.getElementById('search_bt').onclick=function(){
            var param=document.getElementById('search_input').value;
            document.getElementById('search_bt').href="/admin/default/search?value="+param;
        }
    }
</script>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/user.png" class="img-circle img-responsive" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>
        <!--Форма поиска--><?
        ActiveForm::begin(
            [
                'method' => 'get',
                'action' => '/admin/default/search',
                'options' => [
                    'class' => 'sidebar-form'
                ]
            ]
        );
        echo '
        <div class="search">
            <div class="input-group">
                    <input class="form-control" type="text" id="search_input" name="search" aria-invalid="false" />
                 <span class="input-group-btn">
                    <a  class="btn btn-flat" id="search_bt"><i class="fa fa-search"></i></a>
                    </span>
            </div>
        </div>

        ';
        ActiveForm::end();
        ?>
        <!-- search form -->
        <!--        <form action="<? /*= Url::to(['search']); */ ?>" method="get" class="sidebar-form">
            <div class="input-group">
            <input class="form-control" type="text" id="search_input" name="search" aria-invalid="false" />

                <input type="text" class="form-control" id="search_input" name="search" placeholder="Поиск..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Меню RP PSWD', 'options' => ['class' => 'header']],
                    ['label' => 'Добавить учетную запись', 'icon' => 'file-code-o', 'url' => ['./passwords/create']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Категории',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Учетные записи', 'icon' => 'fas fa-mail-bulk', 'url' => ['./passwords'],],
                            ['label' => 'Сети', 'icon' => 'fas fa-wifi', 'url' => ['./user-wifi'],],
                            ['label' => 'Записи', 'icon' => 'fas fa-sticky-note', 'url' => ['./note'],],
                            ['label' => 'Банковские карты', 'icon' => 'far fa-credit-card', 'url' => ['./bank'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
