<link rel="stylesheet" href="<?= $path ?>/css/segment.css" type="text/css" />
<link rel="stylesheet" href="<?= $path ?>/css/progress.css" type="text/css" />
<script charset="utf-8" src="<?= $path ?>/res/progress.min.js" type="text/javascript"></script>

<div class="ui segment">
    <span class="votes_name"><?= $name ?></span>
    <script type="text/javascript">
        $('#votes')
                .progress({
                    active: ' {value} . {total}',
                    success: '{total} Победа!'
                })
                ;
    </script>
    <?php
    foreach ($votes AS $vote) {
        ?>
        <div class="ui indicating progress" data-value="<?= $vote['pc'] ?>" data-total="100">

            <?php if ($is_add) { ?>
                <a class="vote_plus" href="<?= $vote['url'] ?>">
                    <div class="bar" style="<?= 'width: ' . max($vote['pc'], 6) . '%' ?>">
                        <div class="progress"></div>
                    </div>
                </a>
            <?php } else { ?>
                <div class="bar" style="<?= 'width: ' . max($vote['pc'], 6) . '%' ?>">
                    <div class="progress"></div>
                </div>
            <?php } ?>
            <div class="label">
                <?= $vote['name'] ?>
                <?= $vote['count'] ? ' (' . $vote['count'] . ')' : '' ?>
            </div>
        </div>
        <script type="text/javascript">
            $('.ui')
                    .progress({
                        active: ' {value} . {total}',
                        success: '{total} Победа!'
                    })
                    ;
        </script>
    <?php } ?>
</div>
