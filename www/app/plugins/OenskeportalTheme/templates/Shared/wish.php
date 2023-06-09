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
        <?php 
            if($wish->is_reserved){
                if($wish->reserved_by == $this->request->getAttribute('identity')->getIdentifier()){
                    ?>
                        <a href="<?= $this->Url->build(['controller' => 'Wishes', 'action' => 'cancel', $wish->uuid]) ?>">Annuller reservation</a>
                    <?php
                }else{
                    ?>
                        <button disabled class="disabled">Reserveret</button>
                    <?php
                }
            }else{
                ?>
                    <a href="<?= $this->Url->build(['controller' => 'Wishes', 'action' => 'reserve', $wish->uuid]) ?>">Reserver</a>
                <?php
            }
        ?>
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