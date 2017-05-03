<?php if($_SESSION['userUid']): ?>
    <p class="b1 btn btn-default pull-right btn-sm" id="<?=$message['id']?>">Комментировать <span class="glyphicon glyphicon-comment"></span></p>
<?php endif ?>
<?php if($_SESSION['userUid'] == $message['uid']): ?>

    <p class="b_edit btn btn-default pull-right btn-sm" id="<?=$message['id']?>">Редактировать <span class="glyphicon glyphicon-edit"></span></p>
<?php endif ?>

<div class="d_edit" style="display: none" id="<?=$message['id']?>">
    <div class="clearfix"></div>
    <form method="post" name="myForm" action="">
        <textarea  class="form-control comment_edit " rows="5" id="<?=$message['id']?>"  name="msg_edit" placeholder="Введите сообщение "><?=$message['text']?></textarea>
    </form>
</div>
<div class="clearfix"></div>
<div class="d1" style="display: none" id="<?=$message['id']?>">
    <form method="post" name="myForm" action="">
        <textarea  class="form-control comment" rows="5" id="<?=$message['id']?>"  name="msg" placeholder="Введите сообщение "></textarea>
    </form>
</div>