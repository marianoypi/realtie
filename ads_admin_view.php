<script src="<?=base_url()?>js/jquery.MultiFile.js" type="text/javascript"></script>
<div class="leftpane">
	    <div class="leftcontent">
	    <h2>Ads</h2>
		
	    <div><a href="#" class="squarelink" id="newtype">+ Add a new ads </a></div>
	    <br/>
		<div id="newtypediv">
			<form action="<?=base_url()?>admin/save_ads" method="post" enctype="multipart/form-data">  
		  <span class="smalltext">Upload Photo only (width 200 height 125) <br />
		  <input type="file" class="multi" accept="jpg|gif" maxlength="1"/>
		  Link<br /><input type="text" name="link"/>
		  </span>
		  <input type="submit" name="submit" value="Add"/>
			</form>
		</div>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tablelist">
		<?
		foreach ($query->result() as $row)
		   { ?>
		   <tr>
			 <td width="90%"><input type="checkbox" name="chk_list" value="<?=$row->adsID?>" /><a href="<?=base_url()?>admin/viewlisting/<?=$row->adsID?>"><img src="<?=base_url()?>pictures/<?=$row->imagename?>" border="0" /></a></td><td width="90%"><a href="<?=base_url()?>admin/edit">view</a></td>
	  	   </tr>
		<? } ?>
  </table></div>
</div>
	   
	  <div class="rightpane">
	  	<div class="rightcontent">
	  		<strong><a href="#">Categories</a></strong>
	  	</div>
	  </div>
	  
<script language="javascript">
	$(function(){
		$("#newtypediv").hide();
		$(".mattblacktabs ul li :contains('Ads')").parent().addClass("selected");	
		$("#newtype").click(function(){
			$("#newtypediv").slideDown(function(){
				$("input[@name=type]").select();
			});		
		});
		$("input[@name=chk_list]").click(function(){
			if (this.checked){
				$(this).parent().parent().css("background","#FFFFCC");
			}else{
				$(this).parent().parent().css("background","#FFFFFF");
			}
		});
	});
</script>
