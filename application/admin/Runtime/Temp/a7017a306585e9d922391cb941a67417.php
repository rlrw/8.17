<?php
//000000000000s:204:"SELECT a.*,b.perf,c.corporate_phone,b.userid FROM service a LEFT JOIN user b on a.user_id=b.id LEFT JOIN agent c on a.user_id=c.new_id WHERE ( a.state_level=(-1) ) AND ( `service_state` <> 2 ) LIMIT 0,5  ";
?>