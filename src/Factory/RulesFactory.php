<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class RulesFactory extends Factory
{
    /**
     * 查询规则引擎的动作
     * @param string|null $rule_id
     * @return Response
     */
    public function get(?string $rule_id = null): Response
    {
        return $this->client->request(
            'GET',
            ['rules', $rule_id]
        );
    }

    /**
     * 创建规则，返回规则 ID
     * @param string $rawsql
     * @param array $actions
     * @param string|null $description
     * @return Response
     */
    public function add(
        string $rawsql,
        array $actions,
        ?string $description = null
    ): Response
    {
        return $this->client->request(
            'POST',
            ['rules'],
            [],
            [
                'rawsql' => $rawsql,
                'actions' => $actions,
                'description' => $description
            ]
        );
    }

    /**
     * 更新规则，返回规则 ID
     * @param string $rule_id
     * @param string $rawsql
     * @param array $actions
     * @param string|null $description
     * @return Response
     */
    public function update(
        string $rule_id,
        string $rawsql,
        array $actions,
        ?string $description = null
    ): Response
    {
        return $this->client->request(
            'PUT',
            ['rules', $rule_id],
            [],
            [
                'rawsql' => $rawsql,
                'actions' => $actions,
                'description' => $description
            ]
        );
    }

    /**
     * 删除规则
     * @param string $rule_id
     * @return Response
     */
    public function delete(string $rule_id): Response
    {
        return $this->client->request(
            'DELETE',
            ['rules', $rule_id]
        );
    }

}