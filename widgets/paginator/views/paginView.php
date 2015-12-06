<?
use yii\helpers\Url;

//------------ 4 test -------------
print "<hr>";
for ($i = 0; $i < count($categoryesAll); $i++ )
{
    ?>
    <a href="<?= Url::to('/site/test/'.$categoryesAll[$i]['market_cat'])?>"><?=$categoryesAll[$i]['market_cat'];?></a>&nbsp;
    <?
}
print "<hr>";
//----------------------------------------

//print "<pre>"; var_dump($data); print "</pre>";
?>

<table style="width: 100%">
<?
for ($i = 0; $i < count($data); $i++)
{
    ?>
       <tr>
           <td><?=$data[$i]['market_cat']?></td>
           <td><?=$data[$i]['offer_id']?></td>
           <td><?=$data[$i]['title']?></td>
           <td><?=$data[$i]['price_now']?></td>
       </tr>
    <?
}
?>
</table>
<?=$pButton;?>
