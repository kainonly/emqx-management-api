<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class PluginsFactory extends Factory
{
    /**
     * 返回集群下的所有插件信息
     * @return Response
     */
    public function lists(): Response
    {
        return $this->client->request(
            'GET',
            ['plugins']
        );
    }

    /**
     * 返回指定节点下的插件信息
     * @param string $node
     * @return Response
     */
    public function listsForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'plugins']
        );
    }

    /**
     * 加载指定节点下的指定插件
     * @param string $node
     * @param string $plugin
     * @return Response
     */
    public function load(string $node, string $plugin): Response
    {
        return $this->client->request(
            'PUT',
            ['nodes', $node, 'plugins', $plugin, 'load']
        );
    }

    /**
     * 卸载指定节点下的指定插件
     * @param string $node
     * @param string $plugin
     * @return Response
     */
    public function unload(string $node, string $plugin): Response
    {
        return $this->client->request(
            'PUT',
            ['nodes', $node, 'plugins', $plugin, 'unload']
        );
    }

    /**
     * 重新加载指定节点下的指定插件
     * @param string $node
     * @param string $plugin
     * @return Response
     */
    public function reload(string $node, string $plugin): Response
    {
        return $this->client->request(
            'PUT',
            ['nodes', $node, 'plugins', $plugin, 'reload']
        );
    }
}