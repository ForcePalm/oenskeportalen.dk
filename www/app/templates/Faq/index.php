<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Faq> $faq
 */
?>
<div class="accordion accordion-wrapper" id="faq">
  <h3>FAQ</h3>
  <?php foreach ($faq as $faq): ?>
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading-<?= $faq->id ?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $faq->id ?>" aria-expanded="false" aria-controls="collapse-<?= $faq->id ?>">
          <?= $faq->title ?>
        </button>
      </h2>
      <div id="collapse-<?= $faq->id ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $faq->id ?>" data-bs-parent="#faq">
        <div class="accordion-body">
          <?=$faq->content ?> 
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

