<?php
# Если активирован ui - включаем css файл

if ($ui_image) {
    ?>
    <link rel="stylesheet" href="<?= $path ?>/css/image.css" type="text/css" />
    <?php
}
if ($ui_label) {
    ?>
    <link rel="stylesheet" href="<?= $path ?>/css/label.css" type="text/css" />
    <?php
}

$classes = array();

if ($class) {
    $classes[] = $class;
}


if ($head) {
    echo $head;
}

echo '<div class="' . implode(' ', $classes) . '" id="' . $id . '">';

$img_class = ($image_class ? "class='$image_class'" : null);
$img_a_class = ($image_a_class ? "<a class='$image_a_class'>" : null);
# Если активирован comments, то строим для него отдельную структуру

if ($avatar) {
    if ($comments) {
        echo ($image_a_class ? "<a class='$image_a_class'>" : null) . "<img src='$avatar' alt='' $img_class>" . ($image_a_class ? "</a>" : null);
    }
    if ($feed) {
        echo ($image_a_class ? "<div class='$image_a_class'>" : null) . "<img src='$avatar' alt='' $img_class>" . ($image_a_class ? "</div>" : null);
    }
    if (!$comments && !$feed) {
        echo ($image_a_class ? "<div class='$image_a_class'>" : null) . "<img src='$avatar' alt='' $img_class>" . ($image_a_class ? "</div>" : null);
    }
}
?>
<div class="content">
    <?php
    if ($image) {
        $i = "<img src='$image' alt='' />";
    } elseif ($icon) {
        $i = "<i class='fa fa-$icon fa-fw'></i>";
    } else {
        $i = null;
    }

    if ($counter) {
        echo '<span class="ui basic label" style="float: right;margin-left: 10px;">';
        echo $counter;
        echo '</span>';
    }

    if ($url) {
        if ($comments) {
            echo "<a class='author' href='$url'>$i $login $title</a>";
        }
        if ($list) {
            echo "<p><a class='item' href='$url'>$i $title</a></p>";
        }
        if ($feed) {
            echo "<div class='summary'><a class='user' href='$url'>$i $login</a> $title </div>";
        }
    } else {
        if ($comments) {
            echo "<a class='author'>$i $login</a>";
        }
        if ($list) {
            echo "<p><span class='item'>$i $title</span> " . ($time ? $time : null) . "</p>";
        }
        if ($feed) {
            echo "<div class='summary'><a class='user'>$i $login</a> $title </div>";
        }
        # Обычно используется в пустых значениях
        if ($icon && $title) {
            echo "<div class='text' style='padding: 5px;'>$i $title</div>";
        }
    }

    if ($time) {
        if ($comments) {
            echo " <div class='metadata'><span class='date'>$time</span></div> ";
        }
        if ($feed) {
            echo " <div class='meta'><span class='date'>$time</span></div> ";
        }
    }

    if ($content) {
        if ($comments || $list) {
            echo "<div class='text'><p>$content</p></div>";
        } else {
            echo $content;
        }
    }
    if ($actions) {
        ?>
        <div class='actions'>
            <?= $this->section($actions, '<a class="reply" href="{url}">{icon} {text}</a>') ?>
        </div>
        <?php
    }

    if ($bottom) {
        echo $bottom;
    }
    ?>
</div>
</div>
