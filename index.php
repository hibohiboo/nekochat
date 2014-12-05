<?php require_once(dirname(dirname(__FILE__)) . '/locale/locale.php') ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= _('Beniimo Online') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="lib/materialize/css/materialize.css">
    <link rel="stylesheet" href="lib/cssdice/dice.css">
    <link rel="stylesheet" href="lib/cssdice/anim.css">
    <link rel="stylesheet" href="css/chat.css">
</head>
<body class="flex flex-column" ontouchmove="event.preventDefault()">
    <nav class="amber darken-1">
        <!-- .container -->
        <div class="container">
            <!-- .nav-wrapper -->
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><?= _('Beniimo Online') ?></a>
                <ul id="nav-mobile" class="right side-nav">
                    <li><a class="modal-trigger" href="#modal-room-selector" onclick="return false"><?= _('Switch Room') ?></a></li>
                    <li><a href=#modal-global-setting class="modal-trigger"><?= _('Global Settings') ?></a></li>
                    <li><a href="#" target=_blank class="open-log"><?= _('Text Log') ?></a></li>
                </ul>
                <a class="button-collapse" href="#" data-activates="nav-mobile"><i class="mdi-navigation-menu"></i></a>
            </div>
            <!-- /.nav-wrapper -->
        </div>
        <!-- /.container -->
    </nav>

    <main class="flex-grow-shrink-1 scroll-y" ontouchmove="event.stopPropagation()">
        <!-- .container -->
        <div class="container">
            <!-- .flex-grow-shirink-1 -->
            <div id=message-list>
                <div class="message template">
                    <div class="only-head-of-name header">
                        <div class="icon-container"><div class="icon"></div></div>
                        <a target=_blank href="#"><i class="mdi-action-assignment-ind right-align visible-if-pc pc-icon"></i></a>
                        <a class="name" target=_blank href="#"></a>
                        <span class="user_id"></span>
                    </div>
                    <div class="modified only-head-of-name"></div>
                    <div class="message"></div>
                </div>
            </div>
            <!-- /.flex-grow-shirink-1 -->
            <!-- #writing -->
            <div id="writing-list">
                <div class="writing template">
                    <i class="mdi-editor-mode-edit"></i>
                    <span data-field=name></span>
                    <span data-field=user_id></span>
                </div>
            </div>
            <!-- /#writing -->
        </div>
        <!-- /.container -->
    </main>

    <footer class="z-depth-2">
        <!-- .container -->
        <div class="container">
            <!-- #message-form-list -->
            <div id=message-form-list>
                <form class="message-form template flex" onsubmit="return false">
                    <input type=hidden class="name">
                    <input type=hidden class="character_url">
                    <!-- <button class="waves-effect waves-light btn-flat icon" style="margin-bottom: 0"><i class="mdi-content-add"></i></button> -->
                    <a class="waves-effect waves-light btn-flat icon modal-trigger" style="margin-bottom: 0" href=#modal-message-setting><i class="mdi-action-settings"></i></a>
                    <input class="message flex-grow-shrink-1">
                    <button class="waves-effect waves-light btn icon sharp-left" style="margin-bottom: 0"><i class="mdi-content-send"></i></button>
                </form>
            </div>
            <!-- /#message-form-list -->
        </div>
        <!-- /.container -->
    </footer>

    <div id="modal-connecting" class="modal">
        <h4><?= _('Connecting') ?></h4>
        <p><?= _('Please wait...') ?></p>
    </div>

    <div id="modal-room-selector" class="modal">
        <ul class="tabs">
            <li class="tab col s2"><a href="#room-history-page"><?= _('Room History') ?></a></li>
            <li class="tab col s2"><a href="#room-list-page"><?= _('My Rooms') ?></a></li>
            <li class="tab col s2"><a href="#form-create-room"><?= _('Create Room') ?></a></li>
        </ul>
        <div id=room-history-page>
            <ul id=room-history class="collection">
                <li class="room template collection-item"><a class="title" href="#"></a></li>
            </ul>
            <a href="#" class="waves-effect btn-flat modal_close" style="margin-bottom: 0"><?= _('Close') ?></a>
        </div>
        <div id=room-list-page>
            <ul id=room-list class="collection">
                <li class="room template collection-item"><a class="title" href="#"></a></li>
            </ul>
            <a href="#" class="waves-effect btn-flat modal_close" style="margin-bottom: 0"><?= _('Close') ?></a>
        </div>
        <form id=form-create-room onsubmit="return false">
            <p>
                <!-- .row -->
                <div class="row">
                    <div class="input-field col s12">
                        <input type=text name=title class=title id=form-create-room-title required>
                        <label for=form-create-room-title><?= _('Room Title') ?></label>
                    </div>
                </div>
                <!-- /.row -->
            </p>
            <button id=form-create-room-create class="waves-effect btn-flat" style="margin-bottom: 0"><?= _('Create') ?></button>
            <button class="modal_close waves-effect btn-flat" style="margin-bottom: 0"><?= _('Close') ?></button>
        </form>
    </div>

    <div id=modal-message-setting class="modal">
        <h4><?= _('Chat Settings') ?></h4>
        <br>
        <!-- .row -->
        <div class="row">
            <form id=form-message-setting onsubmit="return false">
                <!-- .col -->
                <div class="col s4">
                    <div class="input-field">
                        <input id=form-formsetting-name type="text" class="name">
                        <label for=form-formsetting-name><?= _('Name') ?></label>
                    </div>
                </div>
                <!-- /.col -->

                <!-- .col -->
                <div class="col s8">
                    <div class="input-field">
                        <input id=form-formsetting-character-url type="text" class="character_url">
                        <label for=form-formsetting-character-url><?= _('Character URL') ?></label>
                    </div>
                </div>
                <!-- /.col -->
            </form>

        </div>
        <!-- /.row -->
        <a href=# class="wave-effect btn-flat modal_close" style="margin-bottom: 0;"><?= _('Close') ?></a>
    </div>

    <div id=modal-global-setting class="modal">
        <h4><?= _('Global Settings') ?></h4>
        <!-- .row -->
        <div class="row">
            <form id=form-global-setting onsubmit="return false">
                <!-- .col -->
                <div class="col s12">
                    <p class="range-field">
                        <label for=form-global-setting-volume><?= _('Volume') ?></label>
                        <input id=form-global-setting-volume type="range" class="volume">
                    </p>
                </div>
                <!-- /.col -->
            </form>
        </div>
        <!-- /.row -->

        <a href=# class="wave-effect btn-flat modal_close" style="margin-bottom: 0;"><?= _('Close') ?></a>
    </div>

    <audio id=alert src="sound/nc32318.wav" preload=auto></audio>

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/socket.io-client/socket.io.js"></script>
    <script src="lib/materialize/js/materialize.js"></script>
    <script src="lib/cssdice/dice.js"></script>
    <script src="js/jquery.cssanim.js"></script>
    <script src="js/init.js"></script>
    <script src="js/util.js"></script>
    <script src="js/view.js"></script>
    <script src="js/socket.js"></script>
    <script src="js/client.js"></script>
</body>
</html>
