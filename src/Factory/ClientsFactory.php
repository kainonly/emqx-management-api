<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class ClientsFactory extends Factory
{
    /**
     * 返回集群下所有客户端的信息，支持分页
     * @param int $page 页码
     * @param int $limit 每页显示的数据条数
     * @param array $option 支持多条件和模糊查询
     * @return Response
     */
    public function lists(int $page = 1, int $limit = 10000, array $option = []): Response
    {
        return $this->client->request(
            'GET',
            ['clients'],
            array_merge(
                [
                    '_page' => $page,
                    '_limit' => $limit
                ],
                $option
            )
        );
    }

    /**
     * 返回指定客户端的信息
     * @param string $clientid
     * @return Response
     */
    public function get(string $clientid): Response
    {
        return $this->client->request(
            'GET',
            ['clients', $clientid]
        );
    }

    /**
     * 踢除指定客户端
     * @param string $clientid
     * @return Response
     */
    public function delete(string $clientid): Response
    {
        return $this->client->request(
            'DELETE',
            ['clients', $clientid]
        );
    }

    /**
     * 返回指定节点下所有客户端的信息
     * @param string $node
     * @param int $page 页码
     * @param int $limit 每页显示的数据条数
     * @return Response
     */
    public function listsForNodes(string $node, int $page = 1, int $limit = 10000): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'clients'],
            [
                '_page' => $page,
                '_limit' => $limit
            ]
        );
    }

    /**
     * 返回指定节点下指定客户端的信息
     * @param string $node
     * @param string $clientid
     * @return Response
     */
    public function getForNodes(string $node, string $clientid): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'clients', $clientid]
        );
    }

    /**
     * 通过 Username 查询客户端的信息
     * @param string $username
     * @return Response
     */
    public function listsOfUsername(string $username): Response
    {
        return $this->client->request(
            'GET',
            ['clients', 'username', $username]
        );
    }

    /**
     * 在指定节点下，通过 Username 查询指定客户端的信息
     * @param string $node
     * @param string $username
     * @return Response
     */
    public function listsOfUsernameForNode(string $node, string $username): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'clients', 'username', $username]
        );
    }

    /**
     * 查询指定客户端的 ACL 缓存
     * @param string $clientid
     * @return Response
     */
    public function getAclCache(string $clientid): Response
    {
        return $this->client->request(
            'GET',
            ['clients', $clientid, 'acl_cache']
        );
    }

    /**
     * 清除指定客户端的 ACL 缓存
     * @param string $clientid
     * @return Response
     */
    public function deleteAclCache(string $clientid): Response
    {
        return $this->client->request(
            'DELETE',
            ['clients', $clientid, 'acl_cache']
        );
    }
}