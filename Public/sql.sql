

create table tp_goods(
g_id int not null primary KEY auto_increment,
g_name varchar(255) not null comment '商品名称',
g_count int comment '商品库存',
g_price DECIMAL(10,2) comment '商品价格',
g_img varchar(255) comment '商品图片',
g_img2 varchar(255) comment '商品缩略图',
g_brand varchar(255) comment '品牌',
g_createtime int comment '床架时间,保存格式时间戳'
)charset utf8 engine=myisam;


-- 创建用户表
CREATE table tp_user(
u_id int unsigned primary key auto_increment,
u_username varchar(20) comment '用户姓名',
u_password varchar(50) comment '用户密码,采用md5加密方式',
u_email varchar(50) comment '用户邮箱',
u_sex tinyint comment '用户性别 0男性1女性2不明',
u_qq varchar(11) comment '用户的QQ号',
u_tel varchar(11) comment '用户的联系方式',
u_xueli varchar(11) comment '用户的学历'
)charset utf8 engine=myisam;
