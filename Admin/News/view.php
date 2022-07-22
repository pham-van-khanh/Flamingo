<div id="exampleModal" class="modal fade show" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $news_item['title'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="overflow-auto">

                    <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" class="mb-3">
                    <p><?= htmlspecialchars_decode($news_item['content']) ?></p>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
