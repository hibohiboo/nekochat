<?php require_once(dirname(dirname(dirname(__FILE__))) . '/locale/locale.php') ?>
<div ng-if="!(history&&myroom)" layout-fill layout-align="center center" layout=column>
    <md-progress-circular md-mode="indeterminate"></md-progress-circular>
</div>
<md-content flex scroll-y style="flex: 1 1 0; overflow-x: hidden;">
    <div ng-if="history&&myroom">
        <section>
            <md-subheader class="md-primary md-whiteframe-z1" style="margin-right: 0;">
                <?= _('Create Room') ?>
            </md-subheader>
            <md-list style="margin: auto; max-width: 862px;" layout=column>
                <md-item>
                    <form ng-submit="create()" ng-controller=Lobby>
                        <md-item-content>
                            <md-input-container class="md-tile-content md-default-theme" style="margin-top: -16px;">
                                <label><?= _('Title') ?></label>
                                <input name=title ng-model=create_title layout-fill>
                            </md-input-container>
                            <div class=md-tile-right>
                                <input type=submit class="md-default-theme md-button md-raised md-primary" nd-transclude value="<?= _('Create Room') ?>">
                            </div>
                        </md-item-content>
                    </form>
                </md-item>
            </md-list>
        </section>
        <section>
            <md-subheader class="md-primary md-whiteframe-z1" style="margin-right: 0;">
                <?= _('Room History') ?>
            </md-subheader>
            <md-list style="margin: auto; max-width: 862px;" layout=column>
                <md-item ng-repeat="room in history">
                    <md-item-content>
                        <div class=md-tile-content>
                            <h3>{{room.title}}</h3>
                        </div>
                        <div class=md-tile-right>
                            <md-button class="md-primary" ng-href={{room.id}}><?= _('Join'); ?></md-button>
                        </div>
                    </md-item-content>
                    <md-divider ng-if="!$last"></md-divider>
                </md-item>
            </md-list>
        </section>
        <section>
            <md-subheader class="md-primary md-whiteframe-z1" style="margin-right: 0;">
                <?= _('My Rooms') ?>
            </md-subheader>
            <md-list style="margin: auto; max-width: 862px;" layout=column>
                <md-item ng-repeat="room in myroom">
                    <md-item-content>
                        <div class=md-tile-content>
                            <h3>{{room.title}}</h3>
                        </div>
                        <div class=md-tile-right>
                            <md-button class="md-warn" ng-click="remove(room, $event)"><?= _('Remove'); ?></md-button>
                            <md-button class="md-primary" ng-href={{room.id}}><?= _('Join'); ?></md-button>
                        </div>
                    </md-item-content>
                    <md-divider ng-if="!$last"></md-divider>
                </md-item>
            </md-list>
        </section>
    </div>
</md-content>
