<?php $pager->setSurroundCount(2) ?>
<nav class="bg-dark text-light" aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <?php if ($pager->hasPrevious()) : ?>
        <a class="page-link bg-dark text-light" href="<?= $pager->getFirst() ?>" tabindex="-1" aria-disabled="true">First</a>
      <?php else : ?>
        <a class="page-link bg-dark text-light" href="#" tabindex="-1" aria-disabled="true">First</a>
      <?php endif ?>
    </li>
    <li class="page-item">
      <?php if ($pager->hasPrevious()) : ?>
        <a class="page-link bg-dark text-light" href="<?= $pager->getPrevious() ?>" tabindex="-1" aria-disabled="true">Previous</a>
      <?php else : ?>
        <a class="page-link bg-dark text-light" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      <?php endif ?>
    </li>
    <?php foreach ($pager->links() as $link) : ?>
      <li class="page-item <?= $link['active'] ?  'active' : '' ?>">
        <a class="page-link bg-dark text-light" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
      </li>
    <?php endforeach ?>
    <li class="page-item">
      <?php if ($pager->hasNext()) : ?>
        <a class="page-link bg-dark text-light" href="<?= $pager->getNext() ?>">Next</a>
      <?php else : ?>
        <a class="page-link bg-dark text-light" href="#">Next</a>
      <?php endif ?>
    </li>
    <li class="page-item">
      <?php if ($pager->hasNext()) : ?>
        <a class="page-link bg-dark text-light" href="<?= $pager->getLast() ?>">Last</a>
      <?php else : ?>
        <a class="page-link bg-dark text-light" href="#">Last</a>
      <?php endif ?>
    </li>
  </ul>
</nav>
