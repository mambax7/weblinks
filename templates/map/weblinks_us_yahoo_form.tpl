<{* $Id: weblinks_us_yahoo_form.html,v 1.1 2011/12/29 14:32:40 ohwada Exp $ *}>

<form action="http://us.rd.yahoo.com/maps/home/submit_a/*-http://maps.yahoo.com/maps" target="_blank" method="get">
    <input type="hidden" name="addr" value="<{$link.addr}>"/>
    <input type="hidden" name="csz" value="<{$link.city}>, <{$link.state}> <{$link.zip}>"/>
    <input type="hidden" name="country" value="us"/>
    <input type="hidden" name="srchtype" value="a"/>
    <input type="submit" name="getmap" value="MAP"/>
</form>
