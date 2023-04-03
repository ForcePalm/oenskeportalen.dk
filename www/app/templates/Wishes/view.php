<?php
use Cake\I18n\Number;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wish $wish
 */
?>
<div class="content-container default-text-color">
    <h3><?= ucfirst(h($wish->wish_name)) ?></h3>
    <div class="wish-links">
        <a class="default-hover-effect" href="javascript:history.back()">Tilbage<span class="fa-solid fa-arrow-left fa-lg"></span></a>
        <a class="default-hover-effect" href="<?= $this->Url->build(['controller' => 'Wishes', 'action' => 'edit', $wish->uuid]) ?>">Rediger<span class="fa-solid fa-pen-to-square fa-lg"></span></a>
        <a class="default-hover-effect" href="<?= $this->Url->build(['controller' => 'Wishes', 'action' => 'delete', $wish->uuid]) ?>">Slet<span class="fa-solid fa-trash fa-lg"></span></a>
    </div>   
    <div class="wishes-wrapper default-background default-border">
        <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/Wishlists/'. $wish->wishlist->uuid . '/' . $wish->wish_img : 'nopic.webp' ?>)"></div>
        <div class="wish-text">
            <p><?= h($wish->wish_description) ?></p>
            <p><?= Number::currency($wish->wish_price, 'DKK') ?></p>
            <a class="wish-link" target="_BLANK" href="<?= h($wish->wish_link) ?>" >Link</a>
        </div>
    </div> 
</div>
