<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Enum;

class ApiEnum
{
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


}
