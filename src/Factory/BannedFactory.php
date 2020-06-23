<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class BannedFactory extends Factory
{
    /**
     * 获取黑名单
     * @return Response
     */
    public function lists(): Response
    {
        return $this->client->request(
            'GET',
            ['banned']
        );
    }

    /**
     * 将对象添加至黑名单
     * @param string $who
     * @param string $as
     * @param string|null $by
     * @param int|null $at
     * @param int|null $until
     * @return Response
     */
    public function add(
        string $who,
        string $as,
        ?string $by = null,
        ?int $at = null,
        ?int $until = null
    ): Response
    {
        return $this->client->request(
            'POST',
            ['banned'],
            [],
            [
                'who' => $who,
                'as' => $as,
                'by' => $by,
                'at' => $at,
                'until' => $until
            ]
        );
    }

    /**
     * 将对象从黑名单中删除
     * @param string $as
     * @param string $who
     * @return Response
     */
    public function delete(string $who, string $as): Response
    {
        return $this->client->request(
            'DELETE',
            ['banned', $as, $who],
        );
    }

}