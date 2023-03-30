<?php
use Cake\I18n\Number;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shared $shared
 */
?>

<div class="content-container dashboard-wrapper">
    <h3><?= h($shared->name) ?></h3>
    <div>
        <div class="row dashboard-header">
            <h4 class="col"><?= ucfirst(h($shared->description)) ?></h4>
            <div class="col options-header">
                <a href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'delete']) ?>">Slet<span class="fa-solid fa-trash fa-lg"></span></a>                
            </div>
        </div>
        
        <div class="row">
            <?php foreach($shared->wishes as $wish) : ?>
            <div class="col-md-4">
                <div class="wish-wrapper shared-wrapper">
                    <a href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'wish', $wish->uuid]) ?>">
                        <?php 
                            if($wish->is_reserved){
                                if ($wish->reserved_by == $this->request->getAttribute('identity')->getIdentifier()){
                                ?>
                                    <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/'. $wish->wish_img : 'nopic.webp' ?>)">
                                        <p>Reserveret af mig</p>
                                    </div>
                                <?php }else{ ?>
                                    <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/'. $wish->wish_img : 'nopic.webp' ?>)">
                                        <p>Reserveret</p>
                                    </div>
                                <?php
                                }
                            }else{
                                ?>
                                    <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/'. $wish->wish_img : 'nopic.webp' ?>)"></div>
                                <?php
                            }
                        ?>
                        <div class="wish-text">
                            <p><?= $wish->wish_name ?></p>
                            <p><?= $wish->wish_description ?></p>
                            <p><?= Number::currency($wish->wish_price, 'DKK') ?></p>
                        </div>
                    </a>
                    <a class="wish-link" target="_BLANK"href="<?= $wish->wish_link ?>">Link</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
