<div class="left_nav" style="float:left">
    <?php if($this->session->userdata('admin_pri_merchant')==1):?>
    <div class="title merchant_manage">
        <a style="cursor:default;" href="javascript:void(0);">商家管理</a>
        <ul>
            <li><a href="/admin_merchant_basic">商家基本信息</a></li>
            <li><a href="/admin_merchant_shop">店铺信息</a></li>
            <li><a href="/admin_merchant_recharge">会员充值记录</a></li>
        </ul>
    </div>
    <?php endif;?>
    <?php if($this->session->userdata('admin_pri_shike')==1):?>
    <div class="title shike_manage">
        <a style="cursor:default;" href="javascript:void(0);">试客管理</a>
        <ul>
            <li><a href="/admin_shike_basic">试客基本信息</a></li>
            <li><a href="/admin_shike_recharge">会员充值记录</a></li>
        </ul>
    </div>
    <?php endif;?>
    <?php if($this->session->userdata('admin_pri_activity')==1):?>
    <div class="title activity_manage">
        <a  href="/admin_activity_manage">活动管理</a>
    </div>
    <?php endif;?>
    <div class="title lottery_manage">
        <a style="cursor:default;" href="javascript:void(0);">中奖管理</a>
        <ul>
            <li><a href="/admin_try_winningManage">免费试用管理</a></li>
            <li><a href="/admin_privilege_buyManage">优惠购买管理</a></li>
        </ul>
    </div>
    <?php if($this->session->userdata('admin_pri_money')==1):?>
    <div class="title account_information">
        <a style="cursor:default;" href="javascript:void(0);">资金管理</a>
        <ul>
            <li><a href="/admin_bankcard_manage">银行卡管理</a></li>
            <li><a href="/admin_withdraw_manage">提现申请</a></li>
            <li><a href="/admin_platform_fund_record">平台资金记录</a></li>
            <li><a href="/admin_fund_record">资金记录</a></li>
        </ul>
    </div>
    <?php endif;?>
    <?php if($this->session->userdata('admin_pri_msg')==1):?>
    <div class="title message_manage">
        <a href="/admin_message_manage">消息管理</a>
    </div>
    <?php endif;?>
    <?php if($this->session->userdata('admin_pri_pri')==1):?>
    <div class="title authority_manage">
        <a style="cursor:default;" href="javascript:void(0);">权限管理</a>
        <ul>
            <li><a href="/admin_role_manage">角色管理</a></li>
            <li><a href="/admin_user_manage">用户管理</a></li>
        </ul>
    </div>
    <?php endif;?>
</div>
