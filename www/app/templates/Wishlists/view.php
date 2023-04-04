<?php
use Cake\I18n\Number;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wishlist $wishlist
 */
?>

<div class="content-container dashboard-wrapper default-text-color">
    <h3><?= h($wishlist->name) ?></h3>
    <div>
        <div class="row dashboard-header dashboard-header-column">
            <h4 class="col"><?= ucfirst(h($wishlist->description)) ?></h4>
            <div class="col options-header">
                <button class="default-hover-effect share-button">Del<span class="fa-solid fa-share-from-square fa-lg"></span></button>
                <a class="default-hover-effect" href="<?= $this->Url->build(['controller' => 'Wishes', 'action' => 'add', $wishlist->uuid]) ?>">Nyt ønske<span class="fa-solid fa-plus fa-xl"></span></a>
                <a class="default-hover-effect" href="<?= $this->Url->build(['controller' => 'Wishlists', 'action' => 'edit', $wishlist->uuid]) ?>">Rediger<span class="fa-solid fa-pen-to-square fa-lg"></span></a>
                <a class="default-hover-effect" href="<?= $this->Url->build(['controller' => 'Wishlists', 'action' => 'delete', $wishlist->uuid]) ?>">Slet<span class="fa-solid fa-trash fa-lg"></span></a>                
            </div>
        </div>
        
        <div class="row">
            <?php foreach($wishlist->wishes as $wish) : ?>
            <div class="col-md-4">
                <div class="wish-wrapper default-background default-border">
                    <a href="<?= $this->Url->build(['controller' => 'wishes', 'action' => 'view', $wish->uuid]) ?>">
                            <div class="wish-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/Wishlists/'. $wishlist->uuid . '/' . $wish->wish_img : 'nopic.webp' ?>)"></div>
                        <div class="wish-text default-text-color">
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
<div class="popup-overlayer"></div>
<div class="share-popup default-text-color default-border">
    <div class="closeBtn">
        <span class="fa-solid fa-xmark fa-lg"></span>
    </div>
    
    <div class="form-container">
        <?= $this->Flash->render() ?>
        <h3>Del din ønskeliste</h3>
        <?= $this->Form->create() ?>
        <fieldset>
            <?= $this->Form->control('share_email', [
                'required' => true,
                'label' => 'Modtagers Email'
            ]) ?>
        </fieldset>
        <?= $this->Form->submit(__('Send')); ?>
        <?= $this->Form->end() ?>
    </div>
    
    <div class="form-container">
        <p>Tryk på knappen for at kopier dit delelink</p>
        <button value="<?= \Cake\Routing\Router::url(['controller' => 'Shared', 'action' => 'view', $wishlist->uuid], true) ?>" id="shareBtn">Kopier link</button>
    </div>
</div>
<!--append scripts-->
<?= $this->Html->script(['modules/copy_text']) ?>