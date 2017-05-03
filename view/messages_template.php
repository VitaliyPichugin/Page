<ul class="media-list">
    <li class="media">
        <a class="pull-left" href="#">
            <img style="width: 45px" class="media-object" src="view/img/ava.gif">
        </a>
        <div class="media-body">
            <h4 class="media-heading text-right">Добавлено: <?=$message['date']?></h4>
            <p class="text-left" ><?=$message['text']?></p>
            <?php include 'view/inc/buttons.php' ?>
            <div class="media">
            <?php if(!empty($message['children'])): ?>
                <?php foreach($message['children'] as $message): ?>
                    <?php include 'view/messages_template.php'; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
    </li>
</ul>





