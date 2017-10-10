<?php
//000000000000s:236:"SELECT a.*,bank.*,cxh_users.userid FROM remittance a LEFT JOIN bank on a.bank_id=bank.bank_id LEFT JOIN cxh_users on a.user_id=cxh_users.id WHERE ( state_level=(1-1) ) AND ( `remit_state` <> 2 ) AND ( `userid` LIKE '%201%' ) LIMIT 0,5  ";
?>