<?php
include 'config/admin.php';
session_start();?>
<script language=javascript src=../include/mouse_on_title.js></script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="manage.css" type="text/css">
<script language=javascript>
<!--
function CheckAll(form){
for (var i=0;i<form.elements.length;i++){
var e = form.elements[i];
if (e.name != 'chkall') e.checked = form.chkall.checked;
}
}
-->
</script>
</head>
<BODY>
<?php
#��ID��ȡģ����
$somodeid=$_GET['id'];
if ($somodeid!=""){$_SESSION['somoeid']=$somodeid;}
else{$somodeid=$_SESSION['somoeid'];}
$pid=$_GET['pid'];
if ($pid!=""){$_SESSION['sopid']=$pid;}
else{$pid=$_SESSION['sopid'];}
#��¼ID������ҳ���м�¼
$mainbt1=mysqli_query("select * from mainbt1 where id= $somodeid");
while($tang1=mysql_fetch_array($mainbt1))
{
$modename=$tang1['leftname'];
$mainid=$tang1['left_id'];
}
?>
<?php
$none=$_GET['act'];
if ($none==""){
?>
<table width="98%" border="1"  style="border-collapse: collapse; border-style: dotted; border-width: 0px"  bordercolor="#278296" cellspacing="0" cellpadding="2">
<form action=products.php?fs=search method=post name="adv">
<tr class=backs>
<td colspan=3 class=td height=18><?php echo $modename?>����</td>
</tr>
<tr>
<td height="18" align=right>
<?php
/* =======================
rem �������
rem =======================*/
$rsmainid="select * from sort where mainid=".$somodeid
?>
�������ƣ�</td>
<td width="22%"><input name="keyword" type="text" id="keyword" size="20"></td>
<td width="25%"><input name=action2 type="submit" value="����">
<a href="products.php">ȫ��</a> <a href="products.php?id=<?php echo $_GET['id'];?>&act=add">����¼�¼</a> </td>
</tr>
</form>
</table>
<br>
<?php
# ====================================
#rem �б�ģ�鿪ʼ
?>
<table width="98%" border="1"style="border-collapse: collapse; border-style: dotted; border-width: 0px"bordercolor="#278296" cellspacing="0" cellpadding="2">
<form action=products.php method=post name=user>
<tr>
<td colspan=5 class=td height=25><?php echo $modename?>���� &nbsp;</td>
</tr>
<?php
$pxfs=$_GET['desc'];
if ($pxfs!=""){$desced=" ".$pxfs;$_SESSION['pxfs1']=$pxfs;}
elseif ($_SESSION['pxfs1']!=""){$desced=" ".$_SESSION['pxfs1'];}
$order=$_GET['px'];
if ($order!=""){$orders=$order.$desced.",";$_SESSION['orders1']=$order;}
elseif ($_SESSION['orders1']!=""){$orders=$_SESSION['orders1'].$desced.",";}
# =====================
# ��ҳ��������
#����
$keyword=$_REQUEST['keyword'];
if ($_REQUEST['fs']=="search") {$str="name like '%".$keyword."%'";
$sql="select * from products where ".$str." and list_id=".$somodeid." order by ".$orders."px desc,pid desc";}
else {$sql="select * from products  where list_id=".$somodeid." order by ".$orders."px desc,pid desc";}
//ûҳ��ʾ��¼��
$PageSize = 20;
$StartRow = 0;  //��ʼ��ʾ��¼�ı��
//��ȡ��Ҫ��ʾ��ҳ�������û��ύ
if(empty($_GET['PageNo'])){  //���Ϊ�գ����ʾ��1ҳ
if($StartRow == 0){
$PageNo = $StartRow + 1;  //�趨Ϊ1
}
}else{
$PageNo = $_GET['PageNo'];  //����û��ύ��ҳ��
$StartRow = ($PageNo - 1) * $PageSize;  //��ÿ�ʼ��ʾ�ļ�¼���
}
//������ʾҳ��ĳ�ʼֵ
if($PageNo % $PageSize == 0){
$CounterStart = $PageNo - ($PageSize - 1);
}else{
$CounterStart = $PageNo - ($PageNo % $PageSize) + 1;
}
//��ʾҳ������ֵ
$CounterEnd = $CounterStart + ($PageSize - 1);
$result =mysqli_query($sql." LIMIT $StartRow,$PageSize");
$TRecord = mysqli_query($sql);
//��ȡ�ܼ�¼��
$RecordCount = mysql_num_rows($TRecord);
//��ȡ��ҳ��
$MaxPage = $RecordCount % $PageSize;
if($RecordCount % $PageSize == 0){
$MaxPage = $RecordCount / $PageSize;
}else{
$MaxPage = ceil($RecordCount / $PageSize);
}
if ($RecordCount==0){echo "<tr><td colspan=7 align=center height=50>��ʱû��".$modename."</td></tr>";}
?>
<tr>
<td align=center width=4%>ѡ</td>
<td width="25%" align=center>����ʽ��<a href="products.php?desc=asc">����</a>��<a href="products.php?desc=desc">����</a></td>
<td align=center><a href="products.php?px=name">����</a></td>
<td align=center>&nbsp;</td>
<td width="29%" align=center><a href="products.php?px=date">(���)�޸�����</a>��<a href="products.php?px=username">�����û�</a></td>
</tr>
<?php
$i = 1;
while ($row = mysql_fetch_array($result)) {
$bil = $i + ($PageNo-1)*$PageSize;
?>
<tr><td height="43"><input type='checkbox' name='num[]' value='<?php echo $row['pid'] ?>' ></td>
<td colspan="2" align="center"><a href='products.php?act=a_edit&pid=<?php echo $row['pid'] ?>'><?php echo $row['name'] ?></a><a href='products.php?act=a_edit&pid=<?php echo $row['pid'] ?>'></a> <?php if  ($row['tj']!=0){echo "[�Ƽ�]";} ?></td>
<td align="center"><img src=.\temp\<?php echo $row['pic'] ?>  width='115' height='85' border='1'></td>
<td align="center"><span style="font-size:9.5px;color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif; "><?php echo $row['date'] ?></span>��<br>�����ˣ�<?php echo $row['username'] ?></td>
</tr>
<?php
echo "<span style='font-size:12px;color:#000'>";
}//endwhile
print "�ܹ�$RecordCount  ����¼  - ��ǰҳ�� $PageNo  of $MaxPage &nbsp;&nbsp;"; //��ʾ��һҳ����ǰһҳ������
//�����ǰҳ���ǵ�1ҳ������ʾ��һҳ��ǰһҳ������
if($PageNo != 1){
$PrevStart = $PageNo - 1;
print "<a href=products.php?PageNo=1>��ҳ</a>: ";
print "<a href=products.php?PageNo=$PrevStart>ǰҳ</a>";
}
print " [ ";
$c = 0;
//��ӡ��Ҫ��ʾ��ҳ��
for($c=$CounterStart;$c<=$CounterEnd;$c++){
if($c < $MaxPage){
if($c == $PageNo){
if($c % $PageSize == 0){
print "$c ";
}else{
print "$c ,";
}
}elseif($c % $PageSize == 0){
echo "<a href=products.php?PageNo=$c>$c</a> ";
}else{
echo "<a href=products.php?PageNo=$c>$c</a> ,";
}//END IF
}else{
if($PageNo == $MaxPage){
print "$c ";
break;
}else{
echo "<a href=products.php?PageNo=$c>$c</a> ";
break;
}//END IF
}//END IF
}//NEXT
echo "] ";
if($PageNo < $MaxPage){  //�����ǰҳ�������һҳ������ʾ��һҳ����
$NextPage = $PageNo + 1;
echo "<a href=products.php?PageNo=$NextPage>��ҳ</a>";
}
//ͬʱ�����ǰҳ�������һҳ��Ҫ��ʾ����һҳ������
if($PageNo < $MaxPage){
$LastRec = $RecordCount % $PageSize;
if($LastRec == 0){
$LastStartRecord = $RecordCount - $PageSize;
}
else{
$LastStartRecord = $RecordCount - $LastRec;
}
print " : ";
echo "<a href=products.php?PageNo=$MaxPage>ĩҳ</a>";
}
echo "</span>";
?>
<tr><td colspan=5>
<input type='checkbox'a name=chkall onclick='CheckAll(this.form)'>ȫѡ
<input type=hidden name=act value="del">
<input type=submit value="ɾ��" onClick="{if(confirm('ȷ��Ҫɾ������<?php echo $modename?>��')){this.document.user.submit();return true;}return false;}">
</td></tr>
</form>
</table><?php }?>
<?php
$act=$_GET['act'];
if ($act=="a_edit"){
$edit_data=mysqli_query("select * from products where pid= $pid");
while($row_edit=mysql_fetch_array($edit_data))
{
?>
<table width="98%" border="1"style="border-collapse: collapse; border-style: dotted; border-width: 0px"bordercolor="#278296" cellspacing="0" cellpadding="2">
<form name="myform" action="products.php?act=b_edit&pid=<?php echo $pid?>" method="post">
<tr>
<td colspan=2 class=td height=25>�鿴/�༭<?php echo $modename?> &nbsp;</td>
</tr>
<tr>
<td align=right height=25>����&nbsp; </td>
<td>
<input name="pxnid" type="text" id="photo22" value="<?php echo $row_edit['px'] ?>" size="15"></td>
</tr>
<tr>
<td align=right height=25>���� &nbsp;</td>
<td><?php
$sort_main="select * from sort where list_id=".$somodeid." order by px";
$result_sort=mysqli_query($sort_main);
?>
<select name="sort_id" size="1" id="sort_id">
<?php
while($show_sort=mysql_fetch_array($result_sort)){
echo("<option value=".$show_sort['id']);
if ($row_edit['sort_id']==$show_sort['id']){echo " selected ";}
echo ">".$show_sort['sort_name']."</option>";}
?>
</select></td>
</tr>
<tr>
<td align=right height=25>���� &nbsp; </td>
<td><input name="productstitle2" type="text" id="productstitle2" value="<?php echo $row_edit['name'] ?>" size="30">    </td>
</tr>
<tr>
<td align=right height=25>����СͼƬ &nbsp; </td>
<td><input name="photo" type="text" id="photo" value="<?php echo $row_edit['pic']?>" size="30">
<input type="button" name="Submit11" value="�ϴ�ͼƬ" onClick="window.open('./upload.php?formname=myform&editname=photo&uppath=pic&filelx=jpg','','status=no,scrollbars=no,top=20,left=110,width=400,height=100')"></td>
</tr>
<tr>
<td width='20%' align=right height=25>��ӻ��޸�ʱ�䡡 </td>
<td>������ڣ�<?php echo $row_edit['date'] ?> ����ˣ�<?php echo $row_edit['username'] ?> &nbsp;&nbsp;&nbsp;�޸����ڣ�
<?php $mdate=$row_edit['mdate']; if ($mdate==NULL){echo("δ�޸�");}else{echo $mdate;} ?></td>
</tr>
<tr>
<td align=right height=25>��Ʒ���ܡ�</td>
<td>&nbsp;</td>
</tr>
<tr>
<td height=25 colspan="2" ><textarea name="content"  style="display:none"><?php echo $row_edit['content'] ?></textarea>
<iframe ID="topmenu" src="./webedit/ewebeditor.php?id=content&style=" frameborder="0" scrolling="no"
width="98%" HEIGHT="200"></iframe></td>
</tr>
<tr><td colspan=2>
<input name="id" type="hidden" value="<?php echo $row_edit['pid'] ?>">
<input type="submit" name="Submit" value="ȷ���޸�">&nbsp;&nbsp;</td></tr>
</form>
</table>
<?php
}//end while
mysql_free_result($edit_data);
}//end act?>
<?php
$act=$_GET['act'];
if ($act=="b_edit"){
$px=$_POST['pxnid'];
$areaid=$_POST['area_id'];
$name=$_POST['productstitle2'];
$pic=$_POST['photo'];
$name1=$_POST['name1'];
$sort_id=$_POST['sort_id'];
$content=$_POST['content'];
$fandj=$_POST['fandj'];
$tj=$_POST['tj'];
$pass=$_POST['pass'];
if ($px=="" | $name=="" | $content==""){
echo "<script language='javascript'>";
echo "alert('����Ϊ��!');";
echo "location.href='javascript:history.go(-1)';";
echo "</script>";
}
else
{
$update_edit="update products set px='$px' ,area_id='$areaid',name='$name',name1='$name1',sort_id='$sort_id',pic='$pic',content='$content',mdate='".date("Y-m-d H:i:s")."',tj='$tj',fandj='$fandj',pass='$pass' where pid=$pid";
$update_result=mysqli_query($update_edit);
echo "<script language='javascript'>";
echo "alert('�����ɹ������޸�!');";
echo "location.href='products.php';";
echo "</script>";
}
}
?>
<?
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
ɾ�����ݿ�ʼ */
$delact=$_POST['act'];
if ($delact=="del")
{
if (!empty($_POST['num'])){
foreach ($_POST['num'] as $num)
{
$delsoid="DELETE from products where pid in (".$num.")";
$resultdel=mysqli_query($delsoid) or die ( mysql_error());
}
echo "<script language='javascript'>";
echo "alert('��ѡ�����ɾ����');";
echo "location.href='products.php';";
echo "</script>";
}
if(empty($_POST['num'])){
echo "<script language='javascript'>";
echo "alert('�����ˣ���ʲôҲû��ѡ��');";
echo "location.href='products.php';";
echo "</script>";
}
}//end if(act=del)
?>
<?php $action=$_GET['act'];
if ($action=="add"){ ?>
<table width="98%" border="1"style="border-collapse: collapse; border-style: dotted; border-width: 0px"bordercolor="#278296" cellspacing="0" cellpadding="2">
<form name="myform" action="products.php?act=addn" method="post">
<tr>
<td colspan=2 class=td height=25>�鿴/�༭<?php echo $modename?> &nbsp;</td>
</tr>
<tr>
<td align=right height=25>����&nbsp; </td>
<td><input name="pxnid" type="text" id="pxnid" value="0" size="20"></td>
</tr>
<tr>
<td align=right height=25>���� &nbsp;</td>
<td><?php
$sort_main="select * from sort where list_id=".$somodeid." order by px";
$result_sort=mysqli_query($sort_main);
?>
<select name="sort_id" size="1" id="sort_id">
<?php
while($show_sort=mysql_fetch_array($result_sort)){
echo("<option value=".$show_sort['id']);
if ($_SESSION['sort_id']==$show_sort['id']){echo " selected ";}
echo ">".$show_sort['sort_name']."</option>";}
?>
</select></td>
</tr>
<tr>
<td align=right height=25>���� &nbsp; </td>
<td><input name="name" type="text" id="name" value="" size="30">
</td>
</tr>
<tr>
<td align=right height=25>����СͼƬ &nbsp; </td>
<td><input name="photo" type="text" id="photo" value="" size="30">
<input type="button" name="Submit112" value="�ϴ�ͼƬ" onClick="window.open('./upload.php?formname=myform&editname=photo&uppath=pic&filelx=jpg','','status=no,scrollbars=no,top=20,left=110,width=400,height=100')"></td>
</tr>
<tr>
<td align=right height=25>��Ʒ���ܡ�</td>
<td>&nbsp;</td>
</tr>
<tr>
<td height=25 colspan="2" ><textarea name="content"  style="display:none"><?php echo "���ڴ˱༭����" ;?></textarea>
<iframe ID="topmenu" src="./webedit/ewebeditor.php?id=content&style=" frameborder="0" scrolling="no"
width="98%" HEIGHT="200"></iframe></td>
</tr>
<tr>
<td colspan=2>
<input type="submit" name="Submit2" value="ȷ�����">
&nbsp;&nbsp;</td>
</tr>
</form>
</table><?php } ?>
<?php
$act=$_GET['act'];
if ($act=="addn"){
$px=$_POST['pxnid'];
$name=$_POST['name'];
$pic=$_POST['photo'];
$area=$_POST['area_id'];
$sort_id=$_POST['sort_id'];
$list_id=$_SESSION['somoeid'];
$_SESSION['area']=$area;
$_SESSION['sort_id']=$sort_id;
$main_id=$mainid;
$content=$_POST['content'];
$pass=1;
$tj=$_POST['tj'];
$fandj=$_POST['fandj'];
if ($name=="" | $content==""){
echo "<script language='javascript'>";
echo "alert('����Ϊ��!');";
echo "location.href='javascript:history.go(-1)';";
echo "</script>";
}
else
{
$insert_data="insert into  products (px,name,area_id,sort_id,list_id,main_id,pic,content,date,username,pass,tj,fandj) values ('$px','$name','$area','$sort_id','$list_id','$main_id','$pic','$content','".date("Y-m-d H:i:s")."','$username','$pass','$tj','$fandj')";
echo $insert_data;
$insert_result=mysqli_query($insert_data) or die(mysql_error());
echo "<script language='javascript'>";
echo "alert('����ɹ�!');";
echo "location.href='products.php';";
echo "</script>";
}
}
?>