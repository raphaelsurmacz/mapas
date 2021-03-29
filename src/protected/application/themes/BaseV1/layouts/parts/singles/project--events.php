<?php

use MapasCulturais\i;
use MapasCulturais\App;
use MapasCulturais\Entities\RegistrationEvaluation;

$app = App::i();
$class = "";

$events = $app->repo('Event')->findBy(['project' => $project, 'status' => 1]);
$project = $this->controller->requestedEntity;
$evaluation = $project->registration->accountabilityPhase ? $app->repo("RegistrationEvaluation")->findOneBy(["registration" => $project->registration->accountabilityPhase]) : null;

?>
<?php $this->applyTemplateHook('project-event', 'before') ?>
<div class="event-link registration-fieldset clearfix">
    <?php $this->applyTemplateHook('project-event', 'begin') ?>
    <header>
        <div class="title">
            <?php i::_e("Eventos vinculados a este projeto"); ?>
            <?php if ($project->canUser('@control')) : ?>
                <?php $this->renderModalFor('event', false, i::__("Adicionar Evento"), "btn add-event add"); ?>
            <?php endif; ?>
        </div>
    </header>

    <?php if ($project->canUser('evaluate') && $evaluation && ($evaluation->status < RegistrationEvaluation::STATUS_EVALUATED)) { ?>
        <div class='accountability-registration-field-controls'>
            <label>
                <?= i::__('Abrir conversação com proponente') ?>
                <span class="switch" ng-controller="AccountabilityEvaluationForm">
                    <input type="checkbox" ng-model="openChats[getFieldIdentifier(events)]" ng-change="toggleChat(events)">
                    <span class="slider"></span>
                </span>
            </label>
        </div>
    <?php } ?>
    <div class="event-status <?= $class ?>">

        <?php if ($events) : ?>
            <ul class="js-event-list">
                <?php foreach ($events as $event) { ?>
                    <?php $url = $event->id ? $app->createUrl('evento', $event->id) : "#"; ?>
                    <li class="event-item">
                        <div><span class="icon icon-event"></span></div>
                        <div><a href="<?= $url ?>"><?= $event->name ?></a></div>
                        <ul class="occurrence-list">
                            <?php foreach ($event->occurrences as $occurrence) { ?>
                                <li>
                                    <small><?= $occurrence->space->name ?> - <?= $create_rule_string($occurrence) ?></small>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        <?php else : ?>
            <p><?php i::_e('Nenhum evento encontrado neste projeto'); ?></p>
        <?php endif; ?>

    </div>
    <?php $this->applyTemplateHook('project-event', 'end'); ?>
</div>
<?php $this->applyTemplateHook('project-event', 'after'); ?>

<script>
    $(document).on('createEvent', function(e, event) {
        let url = MapasCulturais.createUrl('evento', '', [event.id]);
        if ($('.event-status').hasClass('no-event')) {
            $('.event-status').removeClass('no-event');
            $(".js-event-list").html("");
        }
        let newEvent = $(
            '<li>' +
            '<div><span class="icon icon-event"></span></div>' +
            '<div><a href="' + url + '">' + event.name + '</a></div>' +
            '</li>'
        );
        $('.js-event-list').append(newEvent);
    });
</script>

<style>
    #blockdiv {
        position: fixed !important;
    }

    #dialog-event-occurrence {
        margin-left: -403px !important;
        width: 40% !important;
        z-index: 1901 !important;
    }

    .tip-yellowsimple {
        z-index: 1901 !important;
    }
</style>