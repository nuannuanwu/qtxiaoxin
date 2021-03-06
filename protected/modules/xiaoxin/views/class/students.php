<div class="header">
    <!--    <div class="headBox fright">
        <div class="headNav">
            <ul>
                <li><a href="<?php echo Yii::app()->createUrl('xiaoxin/class/view/'.$class->cid);?>">首页</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/xiaoxin/class/teachers/'.$class->cid);?>" class="focus">成员</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/xiaoxin/class/update/'.$class->cid);?>">设置</a></li>
            </ul>
        </div>
    </div>-->
    <div class="titleText"><em class="inIco17"></em>我的班级 > <span><?php echo $class->name; ?></span></div>
</div>
<div class="mianBox">
    <div id="submenuBoxR" class="submenuBoxR" data-viwe="show">
        <div class="playerBox">
            <a id="player" href="javascript:void(0);" class="player playerOn" onclick="onClickHide('#submenuBoxR')"></a>
        </div>
        <div class="paneBox">
            <div class="pheader"><em></em>功能说明</div>
            <div class="box" style="padding: 15px 0;">
                查看班级成员（学生,老师）相关信息。
            </div>
        </div>
    </div>
    <div id="contentBox" class="contentBox">
        <div class="box">
            <div class="headBox ">
                <div class="headNav">
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('xiaoxin/class/update/'.$class->cid);?>">基本信息</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('xiaoxin/class/teachers/'.$class->cid);?>">老师</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('xiaoxin/class/students/'.$class->cid);?>" class="focus">学生</a></li>
                        <!--     <li><a href="<?php echo Yii::app()->createUrl('xiaoxin/class/invites/'.$class->cid);?>">已发邀请</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('xiaoxin/class/deleted/'.$class->cid);?>">已移除</a></li>-->
                    </ul>
                    </ul>
                </div>
            </div>
            <div class="classMemberBox" >
                <table class="table">
                    <tbody>
                    <tr class="tableHead">
                        <th width="10%"><div class="name" style="width: 100px;" >学号</div></th>
                        <th width="12%"><div class="name" style="width: 180px;" >姓名</div></th>
                        <th width="15%"><div class="name" style="width: 120px; padding-left: 10px;">手机号码</div></th>
                        
                        <th width="22%">进班时间</th>

                    </tr>
                    <?php if(count($data['datas'])): ?>
                        <?php foreach($data['datas'] as $student): ?>
                            <tr rel="<?php $guradians= $student['guradians']; if(count($guradians)){echo $guradians[0]['mobile'];} ?>">
                                <td><?php echo $student['studentid']; ?></td>
                                <td rel="<?php echo $student['id']; ?>"><div class="name" title="<?php echo $student['name']; ?>"><?php echo $student['name']; ?></div></td>
                                <td class="operation">
                                    <?php $isclient = count($guradians)?(int)$guradians[0]['client']:0;  ?>
                                    <div style=" position: relative;width: 116px;*width: 120px; padding-left: 0px; font-size: 14px;">
                                        <div class="mobileBox fright"  style="position: relative;">
                                            <a href="javascript:void(0);" title="手机号"<?php if(count($guradians)>1): ?> class="mobileHovrer" rel="updateLinkBtn" <?php endif; ?>>&nbsp;</a>
                                            <?php if(count($guradians)>1): ?>
                                                <div class="courseBox">
                                                    <ul>
                                                        <?php foreach($guradians as $gur): ?>
                                                            <li><a href="javascript:void(0);" rel="updateLink" data-url="" data-type="1" ><?php echo $gur['role']?$gur['role']:'家长'; ?>：<?php echo $gur['mobile']; ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                        <a href="javascript:void(0);" class="none" title=""><?php echo isset($guradians[0]['mobile'])?$guradians[0]['mobile']:''; ?></a>
                                    </div>
                                </td>
                                
                                <td><?php echo date('Y年m月d日',strtotime($student['creationtime'])); ?></td>
                                <!--<td class="operation">-->
                                <!--
                                <a href="javascript:void(0);" data-href="<?php echo Yii::app()->createUrl('xiaoxin/class/removestudent/'.$student['id']);?>?cid=<?php echo $class->cid; ?>" rel="dele">移除</a>
                                &nbsp;&nbsp;
                                <a href="<?php echo Yii::app()->createUrl('xiaoxin/class/updatestudent/'.$class->cid).'?student='.$student['userid'];?> ">编辑</a>
								-->
                                <!-- </td>-->
                            </tr>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr class="remindBox">
                            <td colspan="6" style=" padding: 0;">
                                <div class="noContent" style="background: #FFF; padding-bottom: 20px;">
                                    <span ><img src="<?php echo Yii::app()->request->baseUrl; ?>/image/xiaoxin/noContent.png"></span>
                                    <p>空空如也，没有任何数据</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div id="pager">
                    <?php
                    $this->widget('CLinkPager',array(
                            'header'=>'',
                            'firstPageLabel' => '首页',
                            'lastPageLabel' => '末页',
                            'prevPageLabel' => '上一页',
                            'nextPageLabel' => '下一页',
                            'pages' => $data['pager'],
                            'maxButtonCount'=>9
                        )
                    );
                    ?>
                </div>
                <div class="classBtnBox">
                    <!--
                   <a href="<?php echo Yii::app()->createUrl('xiaoxin/class/sinvite/'.$class->cid);?>" class="btn btn-raed"> 添加学生 </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo Yii::app()->createUrl('xiaoxin/class/supload?cid='.$class->cid);?>" class="btn btn-default">批量添加学生</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <a href="javascript:;" needSendpwd="<?php echo $needSendpwdNum;?>" cid="<?php echo $class->cid;?>" id="inviteBtn" class="btn btn-default">重新邀请</a> -->
                    <!--<a href="<?php echo Yii::app()->createUrl('xiaoxin/class/anewpinvite/'.$class->cid);?>?ty=1" class="btn btn-default">重新邀请</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
<div id="remindBox" class="popupBox">
    <div class="remindInfo">
        <div id="remindText" class="centent">是否删除当前学生？</div>
    </div>
    <div class="popupBtn">
        <a id="deleLink" href=""  class="btn btn-raed">确 定</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="hidePormptMaskWeb('#remindBox')" class="btn btn-default">取 消</a>
    </div>
</div>

<div id="inviteBox" class="popupBox" style=" width: 600px;">
    <div class="header">发送邀请 <a href="javascript:void(0);" class="close" onclick="hidePormptMaskWeb('#inviteBox')" > </a></div>
    <div class="remindInfo">
        <p style=" color: #999; margin-bottom: 5px;">立即为新成员发送短信邀请</p>
        <div id="remindText" class="centent" style="text-indent: 0em;padding: 5px; border: 1px solid #f1f1f1; height: 200px;">
            ****家长你好：我是<?php echo $class->s?$class->s->name:'xxx';?>的<?php echo $userinfo->name;?>老师，我刚在<?php echo SITE_NAME;?>创建了班级，今后日常作业和学校通知都通过该平台发放。请您免费下载使用<?php echo SITE_NAME;?>接收信息、跟其他家长交流。系统为您配置的账号是：*********，初始密码：******。下载地址：<?php echo SITE_APP_DOWNLOAD_SHORT_URL;?>
        </div>
    </div>
    <div class="popupBtn">
        <a id="delayPostBtn" href="javascript:void(0);" onclick="hidePormptMaskWeb('#inviteBox')" class="btn btn-raed">稍后发送</a>
        <a id="sendPwdPost" href="javascript:void(0);" tid="0" cid="<?php echo $class->cid;?>" url="<?php echo Yii::app()->createUrl('xiaoxin/class/anewpinvite/');?>" class="btn btn-raed">发送邀请</a>&nbsp;&nbsp;&nbsp;
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/xiaoxin/prompt.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        // 邀请
        $('#inviteBtn').click(function(){
            var url = '<?php echo Yii::app()->createUrl("ajax/checkAnewSendCount");?>';
            var cid = $(this).attr('cid');
            var needSendpwd = $(this).attr('needSendpwd');
            if(needSendpwd=='0'){
                $('#messageBox').show();
                setTimeout( function() {
                    $('#messageBox').slideUp("slow");
                },3000);
            }else{
                $.ajax({
                    url:url,
                    type : 'POST',
                    data : {ty:2,cid:cid},
                    dataType : 'json',
                    contentType : 'application/x-www-form-urlencoded',
                    async : false,
                    success : function(mydata) {
                        if(mydata.status == 1){
                            showPromptPush('#inviteBox');
                        }else{
                            location.reload();
                        }
                    },
                    error : function() {
                        //str = "系统繁忙,请稍后再试";
                    }
                });
            }
        });

        $("#sendPwdPost").click(function(){
            var url = $(this).attr('url');
            var cid = $(this).attr('cid');
            var tid = $(this).attr('tid');
            if(tid=="0"){
                $(this).attr('tid','1');
                $.ajax({
                    url:url,
                    type : 'POST',
                    data:{cid:cid,ty:2},
                    dataType : 'json',
                    contentType : 'application/x-www-form-urlencoded',
                    async : false,
                    success : function(mydata) {
                        var data =mydata;
                        location.reload();

                    },
                    error : function() {
                        //str = "系统繁忙,请稍后再试";
                    }
                });
            }
        });

        //删除操作
        $('[rel=dele]').click(function(){
            var url = $(this).data('href');
            $('#deleLink').attr('href',url);
            showPromptsRemind('#remindBox');
        });
        //显示设置弹框
        $('[rel=updateLinkBtn]').click(function(e){
            clickTarget('[rel=updateLinkBtn]','.courseBox');
            $('.courseBox').hide();
            var hst = '-5px';
            var boxs =$(this).siblings('.courseBox');
            if(boxs.height()>200){
                hst =-(boxs.height()/2)+'px';
            }else{
            }
            boxs.css({top:hst});
            boxs.show();
        });
        function ajaxUpdate(url){
            $.ajax({
                url:url,
                type : 'POST',
                dataType : 'text',
                contentType : 'application/x-www-form-urlencoded',
                async : false,
                success : function(mydata) {
                    var show_data =mydata;

                },
                error : function() {
                    // alert("calc failed");
                }
            });
        }
        //设置课程
        $('[rel=updateLink]').click(function(){
            var url = $(this).data("url");
            var type = $(this).data("type");
            if(parseInt(type)==0){
                ajaxUpdate(url);
            }
            $(this).parents('.courseBox').hide();
        });
    });
</script>
<style>
    #messageBox{ font-size: 18px;  margin: 0px auto; position:absolute; right: 40%; bottom:20px; display: none; z-index: 10000; border-radius: 5px;}
    #messageBox .messageType{ padding:8px 15px; line-height: 30px; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;}
    #messageBox .success{  border: 1px solid #fbeed5; background-color: #e95b5f; color: #fbe4e5; }
    #messageBox .error{border: 1px solid #eed3d7; background-color: #e95b5f; color: #fbe4e5; }
    // #message .messageType span{  float: left;}
</style>
<div id="messageBox">
    <div class="messageType success"><span id="icon-11">✔</span>&nbsp;&nbsp;不存在未使用用户，未发送邀请</div>
</div>