打开REDIS文件夹，CMD打开

输入

redis-server.exe redis.windows.conf

启动REDIS



.env =>

配置redis:

REDIS_HOST=127.0.0.1

REDIS_PASSWORD=null

REDIS_PORT=6379

REDIS_CLIENT=predis

配置mail:

MAIL_MAILER=smtp

MAIL_HOST=smtp.163.com

MAIL_PORT=465

MAIL_USERNAME=qgctempler@163.com

MAIL_PASSWORD=UYKJEUSYEBWQBYBF

MAIL_ENCRYPTION=ssl

MAIL_FROM_ADDRESS=qgctempler@163.com

MAIL_FROM_NAME=HAYA

1. 修改.env中的 QUEUE_DRIVER 为 redis
2. php artisan make:job SendReminderEmail  创建JOB类队列任务,编写任务内容（发送邮件等）
3. 在resources/views/emails/reminder.blade.php 中创建邮件视图
4. $this->dispatch(new SendReminderEmail()) 推送队列任务到redis队列
5. 终端中运行 php artisan queue:work --daemon 监听队列
6. config/queue.php中配置REDIS_QUEUE（监听的队列）
