<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\UserNotes;

?>
<div class="admin-default-index">

    <h1> Общее количество записей пользователя -
        <?= $noteList ?>

    </h1>

    <div class="row text-center" style="margin-top: 25px;">
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/passwords/create'">
                    <h4 id="thumbnail-label"><a href=/admin/passwords/create"
                                                target="_blank">Учетная запись</a></h4>

                    <div class="thumbnail-description smaller">Создайте запись с паролем, в которой будут храниться данные от Ваших учетных записей
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/note/create'">
                    <h4 id="thumbnail-label"><a href=/admin/passwords/create"
                                                target="_blank">Защищенная запись</a></h4>

                    <div class="thumbnail-description smaller">
                        Создайте защищенную запись, зашифрованную специальным алгоритмом
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center" style="margin-top: 25px;">
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/passwords/create'">
                    <h4 id="thumbnail-label"><a href=/admin/bank/create"
                                                target="_blank">Банковская карта</a></h4>

                    <div class="thumbnail-description smaller">Создайте запись с данными банковской карты, данные карты зашифрованны специальным алгоритмом
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/note/create'">
                    <h4 id="thumbnail-label"><a href=/admin/user-wifi/create"
                                                target="_blank">Беспроводные сети</a></h4>

                    <div class="thumbnail-description smaller">
                        Создайте защищенную запись, в которой хранятся данные от беспроводных сетей
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
