<?php
//000000000000s:203:"SELECT a.*,b.perf,c.corporate_phone,b.userid FROM service a LEFT JOIN user b on a.new_id=b.id LEFT JOIN agent c on a.new_id=c.new_id WHERE ( a.state_level=(1-1) ) AND ( `service_state` <> 2 ) LIMIT 0,5  ";
?>