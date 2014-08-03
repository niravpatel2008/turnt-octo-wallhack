<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="X-UA-Compatible" content="IE=8">
<TITLE>Deals</TITLE>
<META name="generator" content="BCL easyConverter SDK 3.0.60">
<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;margin: 41px 0px 186px 43px;padding: 0px;border: none;width: 751px;}

#page_1 #dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:710px;height:818px;}
#page_1 #dimg1 #img1 {width:710px;height:818px;}




.dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

.ft0{font: bold 23px 'Arial';color: #4e4e4e;line-height: 27px;}
.ft1{font: bold 14px 'Arial';color: #575757;line-height: 16px;}
.ft2{font: 16px 'Arial';color: #4e4e4e;line-height: 18px;}
.ft3{font: bold 20px 'Arial';color: #4e4e4e;line-height: 24px;}
.ft4{font: bold 16px 'Arial';color: #4e4e4e;line-height: 19px;}
.ft5{font: bold 15px 'Arial';color: #4e4e4e;line-height: 18px;}
.ft6{font: 15px 'Arial';color: #4e4e4e;line-height: 17px;}
.ft7{font: bold 14px 'Arial';color: #4e4e4e;line-height: 16px;}
.ft8{font: 11px 'Arial';color: #4e4e4e;line-height: 15px;}
.ft9{font: bold 18px 'Arial';color: #6d6d6d;line-height: 21px;}
.ft10{font: bold 12px 'Arial';color: #7caa4d;line-height: 15px;}
.ft11{font: 12px 'Arial';color: #575757;line-height: 15px;}
.ft12{font: bold 12px 'Arial';color: #575757;line-height: 15px;}
.ft13{font: 9px 'Arial';color: #4e4e4e;line-height: 12px;}

.p0{text-align: left;padding-left: 292px;margin-top: 31px;margin-bottom: 0px;}
.p1{text-align: left;padding-left: 316px;margin-top: 34px;margin-bottom: 0px;}
.p2{text-align: left;padding-left: 316px;margin-top: 10px;margin-bottom: 0px;}
.p3{text-align: left;padding-left: 316px;margin-top: 3px;margin-bottom: 0px;}
.p4{text-align: left;padding-left: 316px;margin-top: 16px;margin-bottom: 0px;}
.p5{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p6{text-align: left;padding-left: 16px;margin-top: 24px;margin-bottom: 0px;}
.p7{text-align: left;padding-left: 16px;margin-top: 4px;margin-bottom: 0px;}
.p8{text-align: left;padding-left: 16px;margin-top: 21px;margin-bottom: 0px;}
.p9{text-align: left;padding-left: 16px;padding-right: 232px;margin-top: 4px;margin-bottom: 0px;}
.p10{text-align: left;margin-top: 60px;margin-bottom: 0px;}
.p11{text-align: left;margin-top: 41px;margin-bottom: 0px;}
.p12{text-align: left;padding-left: 10px;margin-top: 46px;margin-bottom: 0px;}
.p13{text-align: left;padding-left: 10px;padding-right: 61px;margin-top: 0px;margin-bottom: 0px;}

.td0{padding: 0px;margin: 0px;width: 283px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 215px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 332px;vertical-align: bottom;}
.td3{padding: 0px;margin: 0px;width: 244px;vertical-align: bottom;}

.tr0{height: 29px;}
.tr1{height: 22px;}
.tr2{height: 25px;}
.tr3{height: 23px;}

.t0{width: 498px;margin-left: 41px;margin-top: 99px;font: 16px 'Arial';color: #4e4e4e;}
.t1{width: 576px;margin-left: 40px;margin-top: 16px;font: bold 12px 'Arial';color: #7caa4d;}

</STYLE>
</HEAD>

<BODY>
<?php
#pr($deal_detail);
?>
<DIV id="page_1">
<DIV id="dimg1">
<?php
    if ($deal_detail['links'][0]['dl_type'] == "img") {
?>
    <IMG src="<?=base_url().'/uploads/'.$deal_detail['links'][0]['dl_url']?>" id="img1" style="max-height:200px; max-width:200px;">
<?php
    }
?>

</DIV>


<DIV class="dclr"></DIV>
<P class="p0 ft0">Deal</P>
<P class="p1 ft1"><?=$deal_detail['detail'][0]['dd_name']?></P>
<P class="p2 ft2"><?=$deal_detail['offers']->do_offertitle?></P>
<P class="p3 ft2">Mocktails</P>
<P class="p4 ft3">MRP: Rs.<?=$deal_detail['offers']->do_listprice?></P>
<TABLE cellpadding=0 cellspacing=0 class="t0">
<TR>
	<TD class="tr0 td0"><P class="p5 ft4">Groupon code: 00100698K5</P></TD>
	<TD class="tr0 td1"><P class="p5 ft5">Security Code: F09726A9AD</P></TD>
</TR>
<TR>
	<TD class="tr1 td0"><P class="p5 ft2">Valid until <?=format_date($deal_detail['detail'][0]['dd_expiredate'])?></P></TD>
	<TD class="tr1 td1"><P class="p5 ft2">REF: 537290</P></TD>
</TR>
</TABLE>
<P class="p6 ft5">The merchant: Citrus Cafe, Lemon Tree Hotel, Navrangpura</P>
<P class="p7 ft6">http://www.lemontreehotels.com Tel. +917944232323</P>
<P class="p8 ft7">Fine Print</P>
<P class="p9 ft8"><?=$deal_detail['detail'][0]['dd_description']?></P>
<P class="p10 ft9">This is how it works</P>
<TABLE cellpadding=0 cellspacing=0 class="t1">
<TR>
	<TD class="tr2 td2"><P class="p5 ft10">Print deal</P></TD>
	<TD class="tr2 td3"><P class="p5 ft10">Arrange an appointment with the merchant</P></TD>
</TR>
<TR>
	<TD class="tr3 td2"><P class="p5 ft10">Bring along your deal</P></TD>
	<TD class="tr3 td3"><P class="p5 ft10">Redeem and enjoy</P></TD>
</TR>
</TABLE>
<P class="p11 ft12">Any questions?: Customer Support: <SPAN class="ft11">1800 108 3000, </SPAN><NOBR>E-Mail</NOBR> to Groupon: <SPAN class="ft11">support@groupon.co.in, </SPAN><NOBR><SPAN class="ft11">User-ID:</SPAN></NOBR><SPAN class="ft11"> 630142</SPAN></P>
<P class="p12 ft13">Cancellation Policy</P>
<P class="p13 ft13">Once we send you the deal, you may cancel the transaction at any time within seven working days from the day after the day that you receive the voucher (where a working day is any day that is not a Saturday, Sunday or Indian public holiday). If you do want to cancel, you must do so by sending us an email to: support@groupon.co.in (provided of course that you have not yet redeemed the voucher)</P>
</DIV>
</BODY>
</HTML>
