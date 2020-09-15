<div id="Profile">
<h2>SProfile</h2>

<?php if (!empty($Profile)) : ?>
<ul>
<?php foreach ($Profile as $anak) : ?>
<li><?=$anak ?></li>
<?php endforeach ?>
</ul>
<?php else : ?>
<p> Tidak ada data kontak.</p>
<?php endif ?>
</div>