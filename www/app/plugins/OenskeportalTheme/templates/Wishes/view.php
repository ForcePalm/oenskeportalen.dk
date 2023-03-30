<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wish $wish
 */
?>
<div class="content-container">
    <h3><?= ucfirst(h($wish->wish_name)) ?></h3>
    <div class="wish-links">
        <a href="javascript:history.back()">Tilbage<span class="fa-solid fa-arrow-left fa-lg"></span></a>
        <a href="">Rediger<span class="fa-solid fa-pen-to-square fa-lg"></span></a>
        <a href="">Slet<span class="fa-solid fa-trash fa-lg"></span></a>
    </div>   
    <div class="wishes-wrapper">
        <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/'. $wish->wish_img : 'nopic.webp' ?>)"></div>
        <div class="wish-text">
            <p><?= h($wish->wish_description) ?></p>
            <p><?= h($wish->wish_price) ?> kr</p>
            <a class="wish-link" target="_BLANK" href="<?= h($wish->wish_link) ?>" >Link</a>
        </div>
    </div> 
</div>