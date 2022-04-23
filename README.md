1.打开REDIS文件夹，CMD打开

输入

redis-server.exe redis.windows.conf

启动REDIS

2.操作

打开新的CMD

redis-cli.exe -h 127.0.0.1 -p 6379


3.env =>

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

4.php artisan migrate

创建REDIS队列失败数据表failed_jobs,即可使用队列推送数据到redis

1. 修改.env中的 QUEUE_DRIVER 为 redis
2. php artisan make:job SendReminderEmail  创建JOB类队列任务,编写任务内容（发送邮件等）
3. 在resources/views/emails/reminder.blade.php 中创建邮件视图
4. $this->dispatch(new SendReminderEmail()) 推送队列任务到redis队列
5. 终端中运行 php artisan queue:work --daemon 监听队列
6. config/queue.php中配置REDIS_QUEUE（监听的队列）

hset (hash表，商品字段，hash字段值)  将队列的商品转移到hash表中

hkeys 获取HASH字段

hvals 获取HASH值

hlen 获取HASH字段数量

set 设置字段

get 获取字段

del 删除字段

incr 值递增 阶梯为1

lpush/lpushx和rpush/rpushx的区别是插入到队列的头部，同上,‘x’含义是只对已存在的key进行操作

lrange 返回队列元素   （0  -1  所有元素）

flushdb 删除当前数据库中的所有Key

flushall 删除所有数据库中的key

keys * 


