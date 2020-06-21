<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class ModulesFactory extends Factory
{
    /**
     * 返回集群下所有内置模块信息
     * @return Response
     */
    public function lists(): Response
    {
        return $this->client->request(
            'GET',
            ['modules']
        );
    }

    /**
     * 返回指定节点下所有内置模块信息
     * @param string $node
     * @return Response
     */
    public function listsForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'modules']
        );
    }

    /**
     * 加载集群下所有节点的指定内置模块
     * @param string $module
     * @return Response
     */
    public function load(string $module): Response
    {
        return $this->client->request(
            'PUT',
            ['modules', $module, 'load']
        );
    }

    /**
     * 卸载集群下所有节点的指定内置模块
     * @param string $module
     * @return Response
     */
    public function unload(string $module): Response
    {
        return $this->client->request(
            'PUT',
            ['modules', $module, 'unload']
        );
    }

    /**
     * 重新加载集群下所有节点的指定内置模块
     * @param string $module
     * @return Response
     */
    public function reload(string $module): Response
    {
        return $this->client->request(
            'PUT',
            ['modules', $module, 'reload']
        );
    }

    /**
     * 加载指定节点下的指定内置模块
     * @param string $node
     * @param string $module
     * @return Response
     */
    public function loadForNodes(string $node, string $module): Response
    {
        return $this->client->request(
            'PUT',
            ['nodes', $node, 'modules', $module, 'load']
        );
    }

    /**
     * 卸载指定节点下的指定内置模块
     * @param string $node
     * @param string $module
     * @return Response
     */
    public function unloadForNodes(string $node, string $module): Response
    {
        return $this->client->request(
            'PUT',
            ['nodes', $node, 'modules', $module, 'unload']
        );
    }

    /**
     * 重新加载集群下所有节点的指定内置模块
     * @param string $node
     * @param string $module
     * @return Response
     */
    public function reloadForNodes(string $node, string $module): Response
    {
        return $this->client->request(
            'PUT',
            ['nodes', $node, 'modules', $module, 'reload']
        );
    }
}