<?php
//000000000000s:250:"SELECT cxh_users.*,fx_user.pname,fx_user.lv,level.level_name,service.area FROM `cxh_users` LEFT JOIN fx_user ON cxh_users.id=fx_user.uid LEFT JOIN level ON cxh_users.dls_lv=level.level_id LEFT JOIN service ON cxh_users.fwzx=service.new_id LIMIT 0,8  ";
?>