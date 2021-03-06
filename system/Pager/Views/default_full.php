<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination justify-content-center">
		<?php if ($pager->hasPreviousPage()) : ?>
			<li class="page-item">
				<a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="page-link">
					<span aria-hidden="true">Primero</span>
				</a>
			</li>
			<li class="page-item">
				<a href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>" class="page-link">
					<span aria-hidden="true">Anterior</span>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li class="page-item <?= $link['active'] ? 'active' : '' ?>">
				<a href="<?= $link['uri'] ?>" class="page-link">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNextPage()) : ?>
			<li class="page-item">
				<a href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>" class="page-link">
					<span aria-hidden="true">Siguiente</span>
				</a>
			</li>
			<li class="page-item">
				<a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" class="page-link">
					<span aria-hidden="true">Último</span>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>
