<div class="text-center">
<?php
$left_id= getIdMianId($menuid)+0;
$result=$lnk -> query("select * from mainbt1 where left_id='".$left_id."'");
if ($result)
while ($kind=mysqli_fetch_assoc($result)){
//if($kind["id"]!=$menu_id)
echo "<a href='".phpname($kind["typea"])."?menuid=".$kind["id"]."'><span class='btn ";
echo $menuid==$kind["id"] ?" btn-danger ": " btn-info ";
echo "'>".$kind['leftname']."</span></a> &nbsp;&nbsp;&nbsp;";
}
?>
</div>
</div>