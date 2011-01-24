<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Test Site</title>
<link href="{$template_dir}css/template_style.css" rel="stylesheet" />
<script src="{$template_dir}js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="{$template_dir}js/jquery_lightbox/js/jquery.lightbox.packed.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
  <div id="content">
   <table cellpadding=0 cellspacing=0>
    <tr>
     <td class="tdleft" valign="top">
    <div id="leftpane">
	<div class="leftpanebody">
		<a href="{$base_dir}"><img src="{$template_dir}images/logo-mcjr.jpg" width="274" height="238" border="0" /></a>
		<div>
		<form id="form1" name="form1" method="post" action="">
			<table width="100%" border="0" cellspacing="2" cellpadding="2">
			  <tr>
				<td width="90%">&nbsp;</td>
			  </tr>			  
			  <tr>
				<td align="center">
				  <input name="searchbox" type="text" id="searchbox" value="Looking for.." />
				  <input class="submit" id="searchbtn" type="image" src="{$template_dir}images/go_btn.png" alt="Go"/>
				 </td>
			  </tr>
			  <tr>
				<td></td>
			  </tr>
			</table>
		</form>
		</div>
		<div>
		 <table width="100%" border="0" cellspacing="0" cellpadding="2">
		   <tr>
			  <td width="10%" align="center"><img src="{$template_dir}images/w3edge200x125.jpg" width="200" height="125" /></td>
		   </tr>
		   <tr>
			  <td align="center"><img src="{$template_dir}images/200_125_90_camtasia_bubble_ad.gif" width="200" height="125" /></td>
		   </tr>
		   <tr>
			  <td align="center"><img src="{$template_dir}images/0805-freshbooks-200x125.png" width="200" height="125" /></td>
		   </tr>
		   <tr>
			  <td align="center"><img src="{$template_dir}images/activecollab200x125.gif" width="200" height="125" /></td>
		   </tr>
		   <tr>
			  <td align="center">&nbsp;</td>
		   </tr>
		 </table>
	    </div>
	</div>
     </div>
    </td>
    <td class="tdright" valign="top">
    <div id="rightpane">
		<div><img src="{$template_dir}images/nav.jpg" /></div>
		<div class="contentbody">
		<h5>LISTING INFO</h5><span class="smalltext">Posted on Aug 30, 2008</span><br/><span class="heading">{$listinginfo[0].title}</span><br/>
		<img src="{$photos_dir}{$photos[0].imagename}" width="400" />		
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="50%" valign="top">
		<h5>PHOTOS</h5>
    <div class="featuredpane">
		{section name=photo loop=$photos}
						<a rel="lightbox-tour" class="lightboxlink" href="{$photos_dir}{$photos[photo].imagename}" title="{$listinginfo[0].title}"><img src="{$photos_dir}{$photos[photo].thumbnail}"/></a>
		             {/section}
	</div>
	</td>
    <td width="50%" valign="top">
	<h5>QUICK INFO</h5><img src="images/cebu-collage.jpg" width="200" height="90"/>
	<ul class="info">
			<li>Location: {$listinginfo[0].location}</li>
			<li>Price: {$listinginfo[0].price}</li>
			<li>Area: {$listinginfo[0].area}</li>
			<li>Interested? <a href="#">Contact Us</a></li>
		</ul> 
	
	</td>
  </tr>
</table>
<h5>DESCRIPTION</h5>
<p>{$listinginfo[0].description}</p>
		</div>
	</div>
     </td>
     </tr>
     </table>
  </div>
</div>
</body>
</html>
