<?php
use MapasCulturais\i;
$this->layout = 'entity';

$this->import('
    entity-header
    mapas-breadcrumb
    tabs
    entity-files-list
    share-links
    entity-gallery-video
    entity-gallery
    entity-social-media
    entity-seals
    entity-related-agents
    entity-owner
    entity-terms
    timeline
    entity-actions
    entity-request-ownership
    opportunity-subscription-content
');
$this->breadcrumb = [
  ['label' => i::__('Inicio'), 'url' => $app->createUrl('panel', 'index')],
  ['label' => i::__('Minhas oportunidades'), 'url' => $app->createUrl('panel', 'opportunity')],
  ['label' => $entity->name, 'url' => $app->createUrl('opportunity', 'single', [$entity->id])],
];
?>

<div class="main-app single">
  <mapas-breadcrumb></mapas-breadcrumb>
  <entity-header :entity="entity"></entity-header>
    <mapas-container class="opportunity">
        <main>
            <opportunity-subscription-content :entity="entity"></opportunity-subscription-content>
        </main>
        <aside>
            <div class="grid-12">
                <div class="col-12 controller-opportunity__phases">
                    <div>
                        <timeline
                            :timeline-items="[{
                                from: new Date(2017, 5, 2),
                                title: 'Inscrições',
                                description: 'de 05/03/2022 a 21/03/2022 às 12:00',
                                showDayAndMonth: true
                                }]"
                            :message-when-no-items="'NO'"
                            :unique-year="true"
                            order="asc">
                        </timeline>
                    </div>
                </div>
                <div class="col-12">
                    <button class="button button--primary-outline">
                      <?= i::__("Baixar regulamento") ?>
                    </button>
                </div>
            </div>
        </aside>
    </mapas-container>

    <tabs class="tabs">
        <tab label="<?= i::__('Informações') ?>" slug="info">
            <mapas-container>
                <main>
                    <div class="grid-12">
                        <div class="col-12">
                            <h3><?= i::__("Apresentação") ?></h3>
                            <p>{{ entity.shortDescription }}</p>
                        </div>
                        <entity-files-list :entity="entity" classes="col-12" group="downloads"  title="<?php i::esc_attr_e('Arquivos para download');?>"></entity-files-list>
                        <div class="col-12">
                            <entity-links :entity="entity" title="<?php i::esc_attr_e('Links'); ?>"></entity-links>
                        </div>
                        <entity-gallery-video :entity="entity" classes="col-12"></entity-gallery-video>
                        <entity-gallery :entity="entity" classes="col-12"></entity-gallery>
                        <div class="col-12">
                            <entity-request-ownership></entity-request-ownership>
                        </div>
                        <div class="col-12 controller-opportunity__helpers">
                            <button class="button button--primary-outline">Denúncia</button>
                            <button class="button button--primary">Contato</button>
                        </div>
                    </div>
                </main>
                <aside>
                    <div class="grid-12">
                        <entity-terms :entity="entity" taxonomy="area" classes="col-12" title="<?php i::esc_attr_e('Áreas de interesse'); ?>"></entity-terms>
                        <entity-social-media :entity="entity" classes="col-12"></entity-social-media>
                        <entity-seals :entity="entity" classes="col-12" title="<?php i::esc_attr_e('Verificações');?>"></entity-seals>
                        <entity-terms :entity="entity" classes="col-12" taxonomy="tag" title="<?php i::_e('Tags')?>"></entity-terms>
                        <entity-related-agents :entity="entity" classes="col-12" title="<?php i::esc_attr_e('Agentes Relacionados');?>"></entity-related-agents>
                        <entity-owner classes="col-12" title="<?php i::esc_attr_e('Publicado por');?>" :entity="entity"></entity-owner>
                        <share-links  classes="col-12" title="<?php i::esc_attr_e('Compartilhar');?>" text="<?php i::esc_attr_e('Veja este link:');?>"></share-links>
                    </div>
                </aside>
            </mapas-container>
        </tab>
        <tab label="<?= i::__('Projetos contemplados') ?>" slug="project">
        </tab>
        <tab label="<?= i::__('Suporte') ?>" slug="support">
        </tab>
    </tabs>
    <entity-actions :entity="entity"></entity-actions>
</div>
