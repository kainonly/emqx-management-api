<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class ActionsFactory extends Factory
{
    /**
     * 查询规则引擎的动作
     * @param string|null $action_name
     * @return Response
     */
    public function get(?string $action_name = null): Response
    {
        return $this->client->request(
            'GET',
            ['actions', $action_name]
        );
    }
}