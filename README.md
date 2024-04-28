## Laravel-Easemob

> 这是一个基于环信超级社区Api封装的laravel第三方扩展包。

*   [环信官方文档](https://doc.easemob.com/product/circle/server_mgmt_rest.html)
*   [环信后台](https://console.easemob.com/user/login)

### 依赖
* PHP  >= 8.0
* Laravel 9~10

```shell
composer require pl1998/laravel-easemob:dev-master
```

###  配置发布
```shell
php artisan vendor:publish --provider="Tepeng\LaravelEasemob\LaravelEasemobServiceProvider"  --force
```
### 简单使用

举例 ：发送消息
```php
    /**
     * 发送一条自定义消息看看
     * @return void
     * @throws GuzzleException
     * @throws BindingResolutionException
     */
    #[NoReturn] public function sendMessage(): void
    {
        $config = app()->make(Config::class,['config'=>config('im.super_community')]);
        $appToken = app()->make(Authorization::class,['config' => $config])->getToken();
        $config->setToken($appToken['access_token'] ?? '');

        $result = app()->make(ChannelMessage::class,['config' => $config])
            ->send((new ChannelMessageBody())
                ->to([
                    '240770567176194'
                ]) // 设置发送的群聊
                ->customEvent(CustomMessageEnum::CUSTOM_RICH_TEXT) // 自定义消息类型
                ->customExts((new CustomExt())
                    ->setFinish(true) // 设置任务是否完成
                    ->schedule(20) //任务进度 单位秒
                    ->message('这是一条自定义消息内容') //设置内容
                    ->setImg([]) // 设置绘制完成图片
                )
                ->from('robot_1') // 设置发送人
                ->setMsgType(MessageTypeEnum::CUSTOM) // 设置消息类型为自定义类型
            );
        // 消息id
        dd($result['data']['240770567176194']);
    }
```
#### 自定义消息内容
```php
namespace Tepeng\LaravelEasemob\Api\Message\Send;

use Tepeng\LaravelEasemob\Api\Message\Send\Interface\BodyInterface;
use Tepeng\LaravelEasemob\Enum\MessageTypeEnum;

class ChannelMessageBody extends Body implements BodyInterface
{
     .....

    /**
     * 获取消息请求体
     *
     * @return array
     */
    public function getBody() :array
    {
        return null_filter([
            'from'               => $this->from,
            'to'                 => $this->to,
            'chatroom_msg_level' => $this->chatroom_msg_level,
            'type'               => $this->type,
            'body'               => $this->body,
            'ext'                => empty($this->ext) ? null : $this->ext,
            'msg'                => empty($this->msg) ? null : $this->msg,
            'routetype'          => $this->routeType
            // 在这里可以增加自定义参数返回
        ]);
    }

}

```

#### 提供的自定义消息类型枚举
```php
 /** @var string 绘画消息 */
    public const CUSTOM_EVENT_DRAWING  = 'custom_drawing_event';
    /** @var string 富文本消息 */
    public const CUSTOM_RICH_TEXT  = 'rich_text_event';
    /** @var string 训练消息 */
    public const TRAINING_EVENT  = 'training_event';
    /** @var string 训练文件不合格消息 */
    public const TRAINING_FILE_ERROR_EVENT  = 'training_file_error_event';
    /** @var string 绘画消息 */
    public const DRAWING_EVENT  = 'drawing_event';
```
#### 封装的相关接口
```php
/** @var string https://{host}/{org_name}/{app_name} */
    public const HOST = "https://%s/%s/%s";
    /** GET https://{host}/{org_name}/{app_name}/circle/server/{server_id}/by-id */
    public const CIRCLE_DETAILS = "/circle/server/%s/by-id";
    /** @var string https://{host}/{org_name}/{app_name}/circle/server 创建社区（服务器） */
    public const CIRCLE_CREATE = "/circle/server";
    /** @var string https://{host}/{org_name}/{app_name}/circle/server/{server_id} */
    public const CIRCLE_UPDATE = "/circle/server/%s";

    /** @var string https://{host}/{org_name}/{app_name}/circle/server */
    public const CIRCLE_JOIN = "/circle/server/%s/join?userId=%s";
    /** @var string 判断用户是否存在 */
    public const IS_CIRCLE_USER = '/circle/user/%s';
    /** @var string  获取APP token */
    public const AUTHORIZATION_API = '/token';
    /** @var string 创建渠道 */
    public const CHANNEL_CREATE = '/circle/channel';
    /** @var string 删除频道  https://{host}/{org_name}/{app_name}/circle/channel/{channel_id}?serverId={server_id} */
    public const CHANNEL_DELETE = '/circle/channel/%s?serverId=%s';
    /** @var string 更新频道信息  https://{host}/{org_name}/{app_name}/circle/channel/{channel_id}?serverId={server_id} */
    public const CHANNEL_UPDATE = '/circle/channel/%s?serverId=%s';
    /** @var string 邀请用户进入频道 https://{host}/{org_name}/{app_name}/circle/channel/{channel_id}/join?userId={user_id}&serverId={server_id}*/
    public const JOIN_CHANNEL   = '/circle/channel/%s/join?userId=%s&serverId=%s';
    /** @var string  自定义消息更新 https://{host}/{org_name}/{app_name}/messages/rewrite/{msg_id}*/
    public const MESSAGE_CUSTOM_UPDATE = '/messages/rewrite/{msg_id}';
    /** @var string 自定义消息  https://{host}/{org_name}/{app_name}/messages/chatgroups */
    public const CHANNEL_MESSAGE_SEND = '/messages/chatgroups';
    /** @var string  更新分组 https://{host}/{org_name}/{app_name}/circle/channel/category/{channel_category_id}*/

    /** @var string 自定义消息更新 PUT https://{host}/{org_name}/{app_name}/messages/rewrite/{msg_id} */
    public const CHANNEL_MESSAGE_UPDATE = '/messages/rewrite/%s';
    /** @var string  更新分组 https://{host}/{org_name}/{app_name}/circle/channel/category/{channel_category_id}*/
    public const GROUP_UPDATE = '/circle/channel/category/%s';
    /** @var string 更换频道的频道分组 http://{host}/{org_name}/{app_name}/circle/channel/category/member/transfer?serverId={server_id}&channelCategoryId={channel_category_id}&channelId={channel_id}*/
    public const GROUP_UPDATE_CHANNEL = '/circle/channel/category/member/transfer?serverId=%s&channelCategoryId=%s&channelId=%s';

    /** @var string 创建分组 https://{host}/{org_name}/{app_name}/circle/channel/category */
    public const GROUP_CREATE = '/circle/channel/category';
    /** @var string 获取频道的成员列表  https://{host}/{org_name}/{app_name}/circle/channel/{channel_id}/users?serverId={server_id}&limit={limit}&cursor={cursor}  */
    public const CHANNEL_USER_LIST = '/circle/channel/%s/users';
    /** @var string 批量移除频道成员 POST https://{host}/{org_name}/{app_name}/circle/channel/{channel_id}/users/remove */
    public const CHANNEL_USER_REMOVE = '/circle/channel/%s/users/remove';
    /** @var string GET https://{host}/{org_name}/{app_name}/circle/channel/category/{channel_category_id}/member/list?serverId={server_id}&limit={limit}&cursor={cursor} */
    public const GET_GROUP_CHANNEL = '/circle/channel/category/%s/member/list';
    // GET https://{host}/{org_name}/{app_name}/circle/channel/category/list?serverId={server_id}&limit={limit}&cursor={cursor}
    public const GET_SERVER_GROUP = '/circle/channel/category/list';

    /** @var string DELETE https://{host}/{org_name}/{app_name}/circle/channel/category/{channel_category_id}?serverId={server_id} */
    public const DEL_SERVER_GROUP = '/circle/channel/category/%s';
```
