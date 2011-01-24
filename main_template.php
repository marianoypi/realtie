<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Test Site</title>
<link href="{$template_dir}css/template_style.css" rel="stylesheet" />
<script src="{$template_dir}js/jquery-1.2.6.min.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
  <div id="content">
   <table cellspacing="0" cellpadding="0">
	<tr>
	<td class="tdleft">
    <div id="leftpane">
	<div class="leftpanebody">
		<img src="images/logo-mcjr.jpg" width="274" height="238" />
		<div>
		<form id="form1" name="form1" method="post" action="">
			<table width="100%" border="0" cellspacing="2" cellpadding="2">
			  <tr>
				<td width="90%">&nbsp;</td>
			  </tr>			  
			  <tr>
				<td align="center">
				  <input name="searchbox" type="text" id="searchbox" value="Looking for.." />
				  <input class="submit" id="searchbtn" type="image" src="images/go_btn.png" alt="Go"/>
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
		   {section name=ad loop=$ads}
                   <tr>
                          <td width="10%" align="center"><img src="pictures/{$ads[ad].imagename}" width="200" height="125" /></td>
                   </tr>
		   {/section}
		   <tr>
			  <td align="center"><img src="images/0805-freshbooks-200x125.png" width="200" height="125" /></td>
		   </tr>
		   <tr>
			  <td align="center"><img src="images/activecollab200x125.gif" width="200" height="125" /></td>
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
		<div><img src="images/nav.jpg" /><img src="images/mainpic.jpg" /></div>
		<div class="contentbody">
		<h5>WHAT'S NEW</h5><span class="smalltext">Posted on Aug 30, 2008</span><br/><span class="heading">Affordable properties available in cordova</span><br/>
		<img src="images/mshouse.jpg" width=200" height="150" />
		<p>As the sun rises from the east, this golden villa meets the seas with its awesome presence. Imposing and grand, setting it apart from the other villas along the coastline. Designed and built by Ed Gallego of E. Gallego & Associates, its Mediterranean flavor gives character to the serene and tranquil shores of Luyang, Carmen.
For Rent. Daily Rate or Weekly Rate available upon request.</p>

<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="50%" valign="top">
		<h5>FEATURED LISTINGS</h5>
    <div class="featuredpane">
		<table width="100%" border="0" cellspacing="1" cellpadding="2">
			{section name=list loop=$listings}
					  <tr bgcolor="{cycle values="#DAEFF5,#DAEFF5"}">
						<td height="50"><span class="smalltext"><a href="{$base_dir}realtie/listingdetails/{$listings[list].id}">{$listings[list].title}</a><br/>{$listings[list].location}<br/>{$listings[list].type}</span></td>
					  </tr>
			{/section}
		</table>
	</div>
	</td>
    <td width="50%">
	<h5>ABOUT CEBU</h5>
	<img src="images/cebu-collage.jpg" width="200" height="90"/>
	<p><span class="smalltext">Cebu is the Queen City of the South and the country's oldest city dating back to Magellan's arrival in 1521. Growth was slow until the mid-19th century, when increasing trade caused rapid development. Today Metropolitan Cebu extends over 350 square kilometers, with five cities and municipalities and a population of more than 1 million.</span></p>
	</td>
  </tr>
</table>
		</div>
	</div>	
	</td>
	</tr>
	</table>
  </div>
</div>
</body>
</html>
