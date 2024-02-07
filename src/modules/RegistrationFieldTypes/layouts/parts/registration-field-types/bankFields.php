<?php

use MapasCulturais\i; 
?>

<div ng-if="field.fieldType == 'bankFields'">
    <span class="label">
        {{field.title}}
        <div ng-if="requiredField(field)" class="field-required"><span class="description"><?php i::_e('obrigatório') ?></span><span class="icon-required">*</span></div>
    </span>
    <?php $this->part('registration-field-types/fields/bankFields') ?>
</div>