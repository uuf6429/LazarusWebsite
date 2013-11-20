<?php Page()->set_title('Downloads'); ?>
<?php $cfg = Application()->get_config(); ?>
<?php $sfh = new SourceForgeHelper($cfg); ?>

<p>
	You can download Lazarus <?php e_esc_html($sfh->get_laz_version()); ?>
	which is accompanied by FPC <?php e_esc_html($sfh->get_fpc_version()); ?> from this page.
</p>

<p>Lazarus is cross platform and supported on various platforms. Choose your platform to go to the corresponding page:</p>

<?php
	$versions = array(
		'%LAZ_VERSION%' => $sfh->get_laz_version(),
		'%FPC_VERSION%' => $sfh->get_fpc_version(),
	);
	foreach($cfg->get_keys("menus.download") as $h2){
		if(trim($h2))echo '<h2>'.esc_html($h2).'</h2>';
		foreach($cfg->get_keys("menus.download.$h2") as $h3){
			if(trim($h3))echo '<h3>'.esc_html($h3).'</h2>';
			$html = Page()->get_menu("download.$h2.$h3", 'lists', 'desc');
			echo str_replace(array_keys($versions), array_values($versions), $html);
		}
	}
?>

<h2>Sources</h2>
<h3><a href="<?php e_esc_html(rtrim($cfg->get('sfbaseurl'), '/')); ?>/files/Lazarus%20Zip%20_%20GZip/">Lazarus Zip - GZip</a></h3>

<h2>Other Downloads</h2>
<p>For other downloads, check: <a href="<?php e_esc_html($cfg->get('sfbaseurl')); ?>">The SourceForge Project page</a></p>

<h2>Daily Snapshots</h2>
<p>CAUTION: Daily snapshots are highly experimental and is only provided for testing purposes.</p>
<h3><a href="http://www.hu.freepascal.org/lazarus/">Lazarus Snapshots Mirror</a></h3>

<br /><br />
<hr />
<h2>Mirrors</h2>
<p>It is recommended to use <a href="<?php e_esc_html($cfg->get('sfbaseurl')); ?>">Sourceforge.net</a> for all the downloads.</p>
<p>However, if you cannot access sourceforge.net, then you can use mirror links:</p>
<ul>
	<li><a href="ftp://freepascal.dfmk.hu/pub/lazarus/releases/">ftp://freepascal.dfmk.hu/pub/lazarus/releases/</a></li>
	<li><a href="http://michael-ep3.physik.uni-halle.de/Lazarus/releases/">http://michael-ep3.physik.uni-halle.de/Lazarus/releases/</a></li>
	<li><a href="http://mirrors.iwi.me/lazarus/">http://mirrors.iwi.me/lazarus/</a></li>
</ul>
