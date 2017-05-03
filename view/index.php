<?php include 'inc/header.php' ?>
<body id="body">
<div class="reload">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
			<?php if($_SESSION['userUid']): ?>
				<img class="img-circle pull-left"  src="<?=$_SESSION['userPhoto']?>">
				<p class="navbar-text">Добро пожаловать <?=$_SESSION['userName']?></p>
				<a href="?param=logout" class="btn btn-default navbar-btn pull-right">Выйти</a>
			<?php endif; ?>
			<?php if(!$_SESSION['userUid']): ?>
				<p class="navbar-text">Для добавления или комментирования сообщения нужно войти</p>
				<div> <a href="?option=auth" class="btn btn-default navbar-btn  pull-right">Войти</a></div>
			<?php endif; ?>
        </div>
    </nav>
    <div class="container content modal-content">
        <div class="form-group">
            <label for="msg" id="lbl_msg"></label>
            <form method="post" name="myForm" action="">
                <?php if($_SESSION['userUid']): ?>
                <textarea class="form-control message" rows="5" id="message"  placeholder="Введите сообщение"></textarea>
                <div class="clearfix"></div>
                <button class="btn btn-success pull-left " id="msg" type="submit" name="submit" value="submit" > Отправить <span class="glyphicon glyphicon-send"></span></button>
                <div class="clearfix"></div>
                <?php endif; ?>
            </form>
            </div>
        <ul>
            <?php echo $messages ?>
        </ul>
        </div>
    </div>
<script src="view/js/jquery-3.2.1.js"></script>
<script src="view/js/jquery-ui.min.js"></script>
<script src="view/js/bootstrap.min.js"></script>
<script src="view/js/script.js"></script>
</body>
</html>
