<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>车享惠-用户中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <script src="__PUBLIC__/js/index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" >
    <script src="__PUBLIC__/js/bootstrap.min.js"  type="text/javascript"></script>
    <link href="__PUBLIC__/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="__PUBLIC__/js/bootstrapValidator.min.js" type="text/javascript"></script>
</head>
<body>
  <header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
        <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
       <?php if($act != null): echo ($act); else: ?>首页<?php endif; ?>
        <a href="__APP__/Core/index"  class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
    </header>

<section class="section grxg_form">
    <div class="mm_xg">
        <ul>
            <li class="mm_xg_hover">我要充值</li>
            <li>充值记录</li>
        </ul>
    </div>
    <div>
        <form name="form" method="post" action="" style="display: block;" class="mm_xg_form">
            <div class="form-group">
                <label for="grxg_ID">充值ID：</label>
                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="CXH7281501">
            </div>
            <div class="form-group">
                <label for="grxg_ID">当前现金积分：</label>
                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="50000.00">
            </div>
            <div class="form-group">
                <label for="grxg_ID">充值金额：</label>
                <input type="number" class="form-control"  name="Recharge_amount" placeholder="请输入100的整数金额！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">二级密码：</label>
                <input type="password" class="form-control"  name="rj_Password" placeholder="请输入二级密码！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">备注：</label>
                <input type="text" class="form-control"  name="Remarks" placeholder="" value="">
            </div>
              <div class="form-group" >
            <div class="checkbox">
                <label></label>
                <input type="checkbox" name="checkbox" style="margin-top: 8px;">
                <a style="cursor: pointer;" data-toggle="modal" data-target="#myRules">我已阅读并同意弹窗的《经销商经营守则》</a>
            </div>
            <!--弹出框-->
            <div class="modal fade" id="myRules" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title text-center" id="myModalLabel">经销商营业守则</h3>
                        </div>
                        <div class="modal-body" style="line-height: 30px;">
                            <p>
                                <h4>经销商的申请：</h4>

                                1、年满18周岁，具有成人思维及处事自主能力 ，对新能源汽车产业有足够的认识和爱好，并乐意去为国家的能源战略，环境保护，社会健康做出应有的贡献。<br>

                                2、自愿加盟，预交定金，获得新能源推广经营资格。<br>

                                3、申请人所提交的资料必须真实、有效；不得借用、冒用他人名义或使用其他不正当方法成为“车享惠”经销商；如申请人提供不真实或不符合“车享惠”要求的资料或用不正当方法而取得“车享惠”经销商身份，“车享惠”一经发现即对其做出处理包括立即终止“车享惠”经销商资格的权利。

                                <br>4、“车享惠”经销商不得参与同“车享惠”有行业竞争关系的同类企业的业务。

                                <br>5、“车享惠”保留接受或拒绝任何人士申请成为“车享惠”经销商的权利。

                                <h4 style="margin-top: 30px;">经销商的责任：</h4>

                                一、恪守法律法规，尊重社会公德，遵循自愿、公平、诚实、信用的原则开展业务活动；不得以任何不正当竞争的方式侵犯“车享惠”或“车享惠”经销商的合法权益。

                                <br>二、遵守“车享惠”颁布的关于经销商的各项招商细则、规章制度及其在合同期内所作之修正、变更、补充的规定。

                                <br>三、遵守订货、销货规定：

                            <br>&nbsp;&nbsp;&nbsp;1 、不得冒用、借用他人名义订货，亦不得将本人之“车享惠”编号转让或出借给他人使用。

                            <br>&nbsp;&nbsp;&nbsp;2 、审慎估算售货量合理订货，不得为达成业绩盲目囤积产品。

                            <br>&nbsp;&nbsp;&nbsp;3 、未经公司同意，不得在公众场所公开展示、推广、售卖“车享惠”产品。

                            <br>&nbsp;&nbsp;&nbsp;4 、经销商经营场所内须专卖“车享惠”产品，不得在其中展示、推广、售卖任何非“车享惠”提供的产品或服务。

                            <br>&nbsp;&nbsp;&nbsp;5 、在介绍“车享惠”产品和项目过程中，须向消费者详细介绍“车享惠”的退换货制度。

                            <br>&nbsp;&nbsp;&nbsp;6 、不得向任何以转售为目的的人员或商家提供或销售“车享惠”产品。

                            <br>四、遵守产品，项目推广规定

                            <br>&nbsp;&nbsp;&nbsp;（一） 、严格按照“车享惠”提供的产品，项目资料介绍和推广产品，项目。不得对产品的用途、性能、未来空间等做夸大、失实的宣传，更不得欺骗、误导需求者。

                            <br>&nbsp;&nbsp;&nbsp;（二）、以热情、礼貌的服务态度，迅速处理顾客对产品，项目的投诉。严格按照“车享惠”公布的政策程序处理消费者的产品退换事宜。

                            <br>&nbsp;&nbsp;&nbsp;（三）、严禁以如下不正当的方式开展业务活动：

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 、不尊重顾客的自由选择，强行推销产品，项目或擅自为其办理“车享惠”编号及代办续约手续；

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2 、误导、诱导他人购买其所不需要或明显超过其合理消费量的产品，投资项目或诱导他人借贷经营“车享惠”生意；

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 、在“车享惠”经营、服务场所或其他公众场合阻拦行人、进行陌生介绍；

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4、沿街公开介绍或未经同意进入他人住所或办公场所强行介绍产品和推广“车享惠”项目，滋扰他人生活工作；

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5 、向非特定对象广泛散发名片（包括但不限于在公共场所大量派发、向住宅信箱随机投放等）的方式招揽顾客、推销产品及推广业务；

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6 、以夸张、曲解“车享惠”业务计划的不正当方式进行业务宣传和推广；

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7、 抢夺他人客源，进行不正当竞争；

                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8 、开展业务工作中的其他不当行为。

                            <br>&nbsp;&nbsp;&nbsp;（四）、不得利用“车享惠”的资源推广或销售非“车享惠”提供的产品、项目，活动或服务，也不可从事与“车享惠”存在利益冲突或有悖于商业法则的其他产品或服务的营销活动。

                            <br>&nbsp;&nbsp;&nbsp;（五）、在开展业务过程中不得贬低、诋毁、攻击其他职业、行业、公司、品牌、商品及其从业者的声誉。

                            <br>五、遵守市场推广规定

                            <br>&nbsp;&nbsp;&nbsp;1、 认真学习、掌握“车享惠”的有关资料，实事求是地介绍“车享惠”，不得夸大“车享惠”实力。

                            <br>&nbsp;&nbsp;&nbsp;2 、不得散布任何未经“车享惠”核准的、与公司业务营运相关的各类政策信息，不得对“车享惠”发布的各类信息作失实的传播或宣导。

                            <br>&nbsp;&nbsp;&nbsp;3 、认真履行合同规定的责任与义务，按“车享惠”的规范要求切实完成公司指派的各项工作，其工作内容包括但不限于：开展产品、品牌推广活动；为消费者提供信息咨询、了解产品价格，项目发展前景等服务；定期递交工作报告等。

                            <br>&nbsp;&nbsp;&nbsp;4、 严禁在开展业务过程中涉及政治、宗教、迷信、传销及其他不正当或不道德的言行。

                            <br>&nbsp;&nbsp;&nbsp;5 、不得弄虚作假，以人为调控或操纵业绩的手段谋取不正当利益。

                            <br>&nbsp;&nbsp;&nbsp;6 、遵从“车享惠”规定，仅在营业执照核准的经营场所内开展业务推广和市场服务活动。

                            <br>&nbsp;&nbsp;&nbsp;7 、未经“车享惠”同意，不得在任何媒体上（包括但不限于国际互联网、手机短信平台等）刊播有关“车享惠”产品、项目的广告或进行“车享惠”产品、项目的推广，亦不得通过其他渠道传播与散发与“车享惠”产品、项目相关的广告或宣传资料。

                            <br>六、遵守业务辅销资料政策

                            <br>&nbsp;&nbsp;&nbsp;1 、只可使用“车享惠”指定的文字、录音、影像、公司官方网站等辅销资料、辅销器具和业务辅助手段开展业务活动，不得使用任何非公司核准的辅销资料、辅销器具或业务辅助手段（包括自行设立网站等）来进行“车享惠”业务的宣传、推广、联络等活动。因使用非“车享惠”核准的辅销资料、辅销器具和业务辅助手段开展业务活动而产生的一切法律责任由经销商本人承担。同时，因此令“车享惠”遭受损失的，“车享惠”将依法向其追究法律责任。

                            <br>&nbsp;&nbsp;&nbsp;2 、不得展示、推广、售卖、分发任何非“车享惠”指定或核准的辅销资料及器具。尤其不得利用“车享惠”业务关系或通过雇佣、教唆、协助或纵容其他人员等方式进行上述活动。

                            <br>&nbsp;&nbsp;&nbsp;3 、未经“车享惠”许可，不得自行或通过其他单位或个人制作、出版、发行任何与“车享惠”有关（包括但不限于涉及“车享惠”产品、项目、营销方式等相关领域）的印刷品及视听资料。

                            <br>七、未经“车享惠”批准，不得就与“车享惠”产品或项目有关的话题擅自接受新闻、网站等媒介、出版单位或个人作者的采访。

                            <br>八、未经“车享惠”批准，不得接受与“车享惠”的产品类型和经营方式存在竞争关系的企业、团体或个人的邀请进行演讲、授课及经验分享。在接受其他企业、团体或个人的邀请进行上述活动时，如内容涉及“车享惠”，亦须事先征得“车享惠”的同意。同时不可借助“车享惠”的业务关系和渠道，宣传、推销相关活动的内容和资料。

                            <br>九、不得以任何形式自行招募经销商。

                            <br>十、严格遵守公司制定的关于营销人员培训会议及活动的各项政策，不得自行举办任何形式与“车享惠”业务相关的会议、培训和活动；亦不得借用其他个人、团体、组织、公司企事业单位名义或自设培训机构擅自进行上述活动。未经“车享惠”许可，不得擅自跨越其所登记的分支机构所在省（自治区、直辖市）的地域范围参加与“车享惠”项目或产品有关的培训、会议、活动等。

                            <br>十一、善用社会化媒体，严格遵守《使用社会化媒体的规范》。

                            <br>十二、严格按照国家的税务政策和“车享惠”的相关安排履行税务责任。

                            <br>十三、不得利用经销商的经营场所以及与“车享惠”项目相关之场合、资源或关系进行融资、集资、募捐等活动。

                            <br>十四、“车享惠”营销人员在其他海外“车享惠”市场违反当地国家/地区“车享惠”营业守则，有损“车享惠”声誉，“车享惠”保留对其进行营业守则处分的权利。

                            <br>十五、 在履行合同的过程中，经销商如有严重违反合同规定或违背营业守则及其他规章的行为, 公司保留即时终止相关合同的权利。

                            <br>十六、 经销商有责任配合“车享惠”对于营业守则案件的调查工作，不得提供虚假不实之资料，误导“车享惠”的调查工作。

                            <br>&nbsp;&nbsp;&nbsp;1. 不得以任何方式诽谤、诋毁“车享惠”、 “车享惠”员工及营销人员的声誉。

                            <br>&nbsp;&nbsp;&nbsp;2 .不得威胁、恐吓或侵害“车享惠”、 “车享惠”员工及营销人员的人身及财产安全。

                            <br>&nbsp;&nbsp;&nbsp;3 .不得以任何形式扰乱“车享惠”办公室、直营店铺、服务网点或其他与“车享惠”相关活动场所的公共秩序，不得干扰“车享惠”、 “车享惠”员工及营销人员的正常业务活动。


                            <h4 style="margin-top: 30px;">“车享惠”名称、商标及著作权未经许可，任何人不得进行以下行为：</h4>

                            &nbsp;&nbsp;&nbsp;1.1 将与“车享惠”及其关联公司/机构的商标、商号、企业名称、企业标志相同或近似的文字、图案作为其他任何机构、组织、活动的商标、商号、企业名称、企业标志进行使用；

                            <br>&nbsp;&nbsp;&nbsp;1.2 擅自申请、注册或持有含有与“车享惠”及其关联公司/机构的商标、商号、企业名称、企业标志相同或近似的文字、拼音、图案等的商标、域名、网站名称、网店名称、通用网址、无线网址、电脑应用软件、手机应用软件、网络用户名等。

                            <br>&nbsp;&nbsp;&nbsp;1.3 生产、销售任何非“车享惠”提供的或者带有与“车享惠”及其关联公司商标、商号、企业名称、企业标志、产品包装相同或近似的标志、包装装潢的产品；

                            <br>&nbsp;&nbsp;&nbsp;1.4 将“车享惠”及其关联公司/机构的商标、企业标志、产品包装设计以相同或近似的方式使用于任何包装、装潢、广告、网站、宣传资料；

                            <br>&nbsp;&nbsp;&nbsp;1.5 以任何方式使用“车享惠”及其关联公司/机构名义制作、出版的文字、美术、摄影图片、动画、音乐、录像等资料，使用方式包括但不限于复制、转载、发布、传播、在网络上设置链接等。

                            <h4 style="margin-top: 30px;">监督与处分：</h4>

                            &nbsp;&nbsp;&nbsp;1 、经销商发现其权益受到侵害时，须以书面形式向“车享惠”提出投诉及维权要求。自侵权行为发生之日起计十二个月之内未向“车享惠”提出的，“车享惠”保留不予受理的权利。

                            <br>&nbsp;&nbsp;&nbsp;2 、经销商违反本守则，或其行为所导致的后果对“车享惠”产品声誉、市场和谐及企业形象造成损害的，“车享惠”将根据情节轻重，按照《四川车享惠网络科技有限公司经销商营业守则》对相关责任人做出处理，其措施包括但不限于：口头或书面告诫；暂停履行合同；缓发或扣发其部分、全部收益和奖励；暂缓授予或取消相应职级晋升资格；不予续约或立即终止经销商合同等。

                            <br>&nbsp;&nbsp;&nbsp;3 、若经销商涉嫌严重违反本守则，“车享惠”有权在调查期间冻结其业务权的措施，并按照最终的调查结果对其做出处理。

                            <br>&nbsp;&nbsp;&nbsp;4 、经销商本人在接到“车享惠”的处分通知后，如有意申请复查，须自处分函签字之日起计的30天内，以书面形式向“车享惠”申请复查（收件单位为“车享惠”办公室）。逾期“车享惠”保留不予受理的权利。

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 、申请复查人须以书面形式提出申请，并应“车享惠”之要求提供相关证据材料。

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2 、复查结果包括维持、修正原有之处分决定，或由地区业务部重新展开调查。

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.3 、复查期间，原处分决定依然有效。

                            <br>&nbsp;&nbsp;&nbsp;5 、经销商及其雇佣人员活动如有违反公司的营业守则或其他各项纪律及规章制度，该经销商须承担责任，并接受公司之相应处分。对任何以合法形式规避《四川车享惠网络科技有限公司经销商营业守则》管理规定的行为，包括利用他人开展违规活动的，一旦查实，“车享惠”有权认定其行为无效，并对其本人做出相应的处罚。

                            <br>&nbsp;&nbsp;&nbsp; 6 、在开展业务的过程中，如经销商因违反国家法律、法规及“车享惠”制定的各项守则、制度和营运细则而危及“车享惠”利益的，“车享惠”依法保留追究和索赔的权利。

                            <br>&nbsp;&nbsp;&nbsp;7 、经销商因自身或第三方原因，或任何其他不可归责于“车享惠”的原因，导致人身伤害或财产损失的，经销商应自行承担责任或要求相关责任方赔偿，“车享惠”不承担任何责任。因经销商无理要求影响“车享惠”经营或”损失的，“车享惠”有权终止与经销商的合同并保留追究其法律责任的权利。

                            <br>&nbsp;&nbsp;&nbsp;8、 关于经销商退单 凡退出的经销商，从退货的原级别扣除相应的退货业绩，该经销商资格取消。该经销商半年内不得重新申请。

                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 、本守则作为《四川车享惠网络科技有限公司经销商合同》的有效组成部分，“车享惠”对本守则拥有最终解释权。

                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 、“车享惠”可按市场情况及需要和国家政策的要求修订有关“车享惠”经销商的各项纪律及规章制度，有关修订将通过“车享惠”官方网站、微官网，内刊等途径公布或其他方式通知“车享惠”经销商，“车享惠”经销商应自动接受并遵守该调整。

                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 、所有政策以“车享惠”公布的最新资料为准。

                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4 、严禁经销商以诱导，采用各种贿赂手段引诱公司员工拥有市场部门或经营“车享惠”业务。

                                                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 冻结“车享惠”户籍。

                                                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2 继续隐瞒，解除合同并取消户籍。



                            <h4 style="margin-top: 30px;">《四川车享惠网络科技有限公司守则处罚规定》：</h4>

                                1级书面警告
                                <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①印制、使用不符合规定的名片；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②在产品标价之外擅自夸大价格和价值；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;③攻击、轻视、诋毁其他职业、行业、公司、品牌及其从业人员的声誉。

                                <br>&nbsp;&nbsp;&nbsp;违规类型（会议）

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①不按时申报会议/活动；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②会议/活动名称不符合规定。

                                <br>2级暂停业务拓展资格1个月

                                <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①对消费者的产品，项目投诉或退货申请处理不当；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②将本人经销商编号出借他人使用；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;③擅自使用“车享惠”名称、商标及著作权；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;④应邀进行演讲、分享或接受采访时，违反公司的有关规定。

                                <br>&nbsp;&nbsp;&nbsp;违规类型（会议）

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①邀请身份不符的人士参加相关会议/活动；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②邀请未在报备资料中列及的或不符合资格的人士担任演讲嘉宾。

                                <br>3级暂停业务拓展资格1个月，月度收入减半

                                <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ①利用业务职权牟取不当利益；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②违反业务辅销资料政策；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;③进入消费者住所强行推销产品，进行虚假宣传，夸大产品价值、公司实力；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;④散布未经公司认可的信息或对公司公布的信息作失实宣导；

                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⑤提供不实资料或证词，误导公司对守则案件的调查工作违规类型（会议）

                                a实际出席活动人数超过报批人数的10%以上的活动组织者 ；

                                b在会议/活动期间违反业务辅销资料政策。

                            <br>4级暂停经销权1个月，期间不获发月度收入

                            <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①以曲解“车享惠”等不正当方式进行项目推广；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②利用“车享惠”的资源或业务关系进行融资、集资、募捐等行为；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;③擅自利用媒体（包括互联网）及广告推广“车享惠”业务和产品；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;④在店铺、公司场所周围或其他公共场所进行陌生拦挡、滋扰他人；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⑤本人从事竞争企业或有悖商德法规之产品或服务的推广；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⑥擅自在公共场所公开摆卖产品；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⑦冒用其他营销人员的名义购货。违规类型（会议）

                                a擅自提高会议/活动收费，牟取利益；

                                b会议/活动有扰民或煽情失实的行为。

                            <br>5级暂停经销权2个月，期间不获发月度收入

                            <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①与公司战略发展方向背道而驰，传播消极负面言论；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ②在开展业务过程中涉及政治、宗教、迷信及其它不当或不道德的言行

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;③干扰公司、员工或其他营销人员的正常经营。

                            <br>&nbsp;&nbsp;&nbsp;违规类型（会议）

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;会议/活动中出现不规范内容的相关责任人。

                            <br>6级暂停经销权3个月，期间不获发月度收入

                            <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①实施不当竞争、恶意抢夺客源；

                            <br>&nbsp;&nbsp;&nbsp;违规类型（会议）

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①擅自组织召开与“车享惠”相关的会议/活动；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②自行组织举办海外或跨地区会议/活动，或者组织他人参加海外或跨地区会议/活动

                            <br>7级暂停经销权6个月，期间不获发月度收入

                            <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 利用“车享惠”业务关系从事竞争企业或有悖商德法规之产品或服务的推广。

                            <br>8级解除合同并取消以不实资料/身份,取《直销管理条例》规定不得成为直销员的人员隐瞒身份加入。

                            <br>&nbsp;&nbsp;&nbsp;违规类型（推广）

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;①私自结网、自行为他人计算并发放报酬；

                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;②累计打折销售三次或以上（包括网上打折销售）；
                            <br><span style="color: red ">本营业守则解释权归“车享惠”所有,
对于注册提供的营业执照的真实及有效性需注明，如有伪造或违反国家及行业规定的以及不在有效期限内的，公司有权撤销注册资格且不退回消费金额以及追究必要的法律责任；</span>
                            </p>
                        </div>

                        <div class="modal-footer">
                            四川车享惠网络科技有限公司&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
            <input type="submit" class="btn center-block" id="join_submit" value="充值">
        </form>
        <div class="mm_xg_form" style="display: none;">
            <table>
                <thead>
                <tr>
                    <th><span>充值ID</span></th>
                    <th class="w310"><span>充值金额</span></th>
                    <th><span>充值时间</span></th>
                    <th><span style="border-right: 0px;">备注</span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>CXH7281501</td>
                    <td>20000.00</td>
                    <td>2014-08-11</td>
                    <td>未审核</td>
                </tr>
                <tr>
                    <td>CXH7281501</td>
                    <td>20000.00</td>
                    <td>2014-08-11</td>
                    <td>未审核</td>
                </tr>
                </tbody>
            </table>
            <ul class="grxg_form_ym">
                <li>首页</li>
                <li>上一页</li>
                <li>
                    <span>1</span>/
                    <span>5</span>
                </li>
                <li>下一页</li>
                <li>末页</li>
            </ul>

        </div>
    </div>

</section>
   <footer class="footer">
        <ul>
            <li>
                <a href="__APP__/Index/index/act/首页" >
                    <i class="glyphicon glyphicon-home"></i>
                    <span>首页</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Join/index/act/定金加盟" >
                    <i class="glyphicon glyphicon-usd"></i>
                    <span>定金加盟</span>
                </a>
            </li>
            <li>
                <a href="__APP__/List/xjhz/act/现金互转" >
                    <i class="glyphicon glyphicon-send"></i>
                    <span>现金互转</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Withdraw/index');?>" >
                    <i class="glyphicon glyphicon-tags"></i>
                    <span>提现申请</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Core/syzxj/act/收益转现金" >
                    <i class="glyphicon glyphicon-paperclip"></i>
                    <span>收益转现金</span>
                </a>
            </li>
        </ul>
    </footer>
<script>
    $(function () {
        //table toggle
        $(".mm_xg li").click(function(){
            $(this).addClass("mm_xg_hover").siblings().removeClass("mm_xg_hover");
            var text=$(this).html();
            var index;
            $(".mm_xg li").each(function(key){
                if(text==$(this).html()){
                    return index=key;
                }
            });
            $(".mm_xg_form").each(function(k){
                if(k==index){
                    $(this).css({ "display": "block" }).siblings().css({ "display": "none" });
                }
            });
        });
        //input Verification
        $('form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Recharge_amount: {
                    validators: {
                        notEmpty: { message: '请输入充值金额!'},
                        regexp:{
                            regexp:/^([1-9]|\d{2,})*00$/,
                            message:'转账金额格式不对!'
                        }
                    }
                },
                rj_Password: {
                    validators: {
                        notEmpty: { message: '请输入二级密码!'},
                        regexp:{
                            regexp:/^\d{6}$/,
                            message:'二级密码格式不对!'
                        }
                    }
                },
                grxg_checkbox: {
                    validators: {
                        notEmpty: { message: '请选择!'}
                    }
                }
            }
        });

    });

</script>
</body>
</html>