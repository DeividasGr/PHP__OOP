<h1 class="header"><?php print $data['title']; ?></h1>
<section class="box">
    <div class="wall">
        <?php foreach ($data['products'] as $product): ?>
            <span class="pixels" style="
                    background: <?php print $product['colors']; ?>;
                    top: <?php print $product['X']; ?>px;
                    left: <?php print $product['Y']; ?>px; ">
            </span>
        <?php endforeach; ?>
    </div>

</section>

