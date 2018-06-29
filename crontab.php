<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/28
 * Time: 11:38
 */
<<<EOT
crontab定时器（包括执行shell）
如果要让unix系统重复，定期做一件事，我们就会用到crontab．

实质上真正去执行每一个重复任务的是cron，cron是的unix家族的一个后台常驻程序，cron是由cron文件来驱动的，
crontab只是用来管理cron文件的，比如给cron file里面添加任务，删除任务，文件里记录了要执行的任务，以及其＂时间规则＂

crontab的作用，正如crontab的man文档中写的： maintain crontab files for individual users

crontab提供给我们的接口

我们是不需要去直接编辑cron file，修改查看cron file都应该使用crontab


限制用户使用crontab的文件有：/etc/cron.allow /etc/cron.deny 。
当使用crontab建立工作排程后，将被记录到/var/spool/cron里。
cron执行的每一项工作都被记录到/varlog/cron里去。
crontab参数：  www.2cto.com
-u：只有root才可能，帮其他用户建立或移除工作排程。
-l：查阅crontab的工作内容
-r：移除所有的crontab的工作内容，移除一项，用-e编辑。

例1：每天12:00给root发信。
[root@lyy etc]# crontab -e     #用vi编辑
0 12 * * * mail root -s "at 12:00" < /root/.bashrc
************************
每项工作有六个字段分别是：
分钟    小时    日期    月份    周    指令
0-59    0-23    1-31    1-12    0-7    指令         #0和7都代表星期天
************************
辅助特殊字符：
* （星号）代表任何时刻
，（逗号）代表分隔时候。如3点与6点 就是3,6
-（减号）代表一段时间范围内。如：3点到6点 就
EOT;
