<?
use yii\helpers\Url;

for ($i = 0; $i < count($categor); $i++ )
{
    $cIndex = ($categor[$i]['market_cat'] = $category)? $i: 1;

    ?>
    <a href="<?= Url::to('/site/test/'.$categor[$i]['market_cat'])?>"><?=$categor[$i]['market_cat'];?></a>&nbsp;
    <?
}

print "paginViews<hr>";


print "<pre>"; var_dump($data); print "</pre>";

for ($j = 1; $j <= $cNum; $j++)
{
    print "<button onclick='location.href =\"".Url::to('/site/test/' . $categor[$cIndex]['market_cat'].'?page='.$j)."\"'>{$j}</button>";
}
?>