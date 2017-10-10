<?php
//000000000000s:194:"SELECT a.*,bank.*,user.userid FROM remittance as a LEFT JOIN bank on a.bank_id=bank.bank_id LEFT JOIN user on a.user_id=user.id WHERE ( state_level=(1-1) ) AND ( `remit_state` <> 2 ) LIMIT 0,5  ";
?>