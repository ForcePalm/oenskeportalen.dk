<?php
use Cake\I18n\Number;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shared $shared
 */
?>

<div class="content-container dashboard-wrapper default-text-color">
    <h3><?= h($share->name) ?></h3>
    <div>
        <div class="row dashboard-header">
            <h4 class="col"><?= ucfirst(h($share->description)) ?></h4>
            <div class="col options-header">
                <a class="default-hover-effect" href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'delete', $share->uuid]) ?>">Slet<span class="fa-solid fa-trash fa-lg"></span></a>                 
            </div>
        </div>
        
        <div class="row">
            <?php foreach($share->wishes as $wish) : ?>
            <div class="col-md-4">
                <div class="wish-wrapper shared-wrapper default-background default-border">
                    <a class="default-text-color" href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'wish', $wish->uuid]) ?>">
                        <?php 
                            if($wish->is_reserved){
                                if ($wish->reserved_by == $this->request->getAttribute('identity')->getIdentifier()){
                                ?>
                                    <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/Wishlists/'. $share->uuid . '/' . $wish->wish_img : 'nopic.webp' ?>)">
                                        <p>Reserveret af mig</p>
                                    </div>
                                <?php }else{ ?>
                                    <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/Wishlists/'. $share->uuid . '/' . $wish->wish_img : 'nopic.webp' ?>)">
                                        <p>Reserveret</p>
                                    </div>
                                <?php
                                }
                            }else{
                                ?>
                                    <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/Wishlists/'. $share->uuid . '/' . $wish->wish_img : 'nopic.webp' ?>)"></div>
                                <?php
                            }
                        ?>
                        <div class="wish-text">
                            <p><?= $wish->wish_name ?></p>
                            <p><?= $wish->wish_description ?></p>
                            <p><?= Number::currency($wish->wish_price, 'DKK') ?></p>
                        </div>
                    </a>
                    <?php 
                        if(!empty($wish->wish_link)){
                            ?>
                                <a class="wish-link" target="_BLANK" href="<?= $wish->wish_link ?>">Link</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
