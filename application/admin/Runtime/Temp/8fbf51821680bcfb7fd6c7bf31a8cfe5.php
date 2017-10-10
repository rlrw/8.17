<?php
//000000000000s:197:"SELECT a.*,c.perf FROM service a LEFT JOIN agent b on a.user_id=b.user_id LEFT JOIN user c on b.new_id=c.id WHERE ( a.state_level=(-1) and b.agent_state=1 ) AND ( `service_state` <> 2 ) LIMIT 0,5  ";
?>